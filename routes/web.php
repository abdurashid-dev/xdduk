<?php

use App\Models\Document;
use App\Models\Offer;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\LeaderController;
use App\Http\Controllers\LinkController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\SocialSettingController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//locale
Route::get('/lang/{locale}', function ($locale) {
    session()->put('locale', $locale);
    return back();
})->name('locale');

//Frontend
Route::get('/', [FrontendController::class, 'index'])->name('index');
Route::get('/all-news', [FrontendController::class, 'news'])->name('news');
Route::get('/new/{id}', [FrontendController::class, 'new'])->name('new');
Route::get('/leaders', [FrontendController::class, 'leaders'])->name('leaders');
Route::get('/leader/{id}', [FrontendController::class, 'leader'])->name('leader');
Route::get('/page/{slug}', [FrontendController::class, 'page'])->name('page');
Route::get('/offers', [FrontendController::class, 'offers'])->name('offers');
Route::get('/contact', [FrontendController::class, 'contact'])->name('contact');


Route::middleware('waitList')->group(function () {
    Route::get('/wait-list', [FrontendController::class, 'waitList'])->name('waitList');
});
//Admin
Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    //organization
    Route::middleware('user')->group(function () {
        Route::get('/cabinet', [UserController::class, 'index'])->name('user');
        Route::get('/user/documents', [UserController::class, 'table'])->name('user.table');
        Route::post('/upload-file', [UserController::class, 'uploadFile'])->name('uploadFile');
        Route::post('/upload-file/update', [UserController::class, 'uploadFileUpdate'])->name('uploadFileUpdate');
        Route::post('/cabinet/store', [UserController::class, 'store'])->name('user.store');
        Route::get('/user/send/', [UserController::class, 'send'])->name('user.send');
        Route::get('/user/documents/{id}/', [UserController::class, 'show'])->name('user.show');
        Route::get('/user/documents/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
        Route::put('/cabinet/{id}/update', [UserController::class, 'update'])->name('user.update');
    });
    //admin
    Route::middleware('admin')->group(function () {
        Route::get('/profile/index', [AdminController::class, 'profile'])->name('profile.index');
        Route::post('/changeData/index', [AdminController::class, 'data'])->name('data.index');
        Route::get('/password/index', [AdminController::class, 'password'])->name('profile.password.index');
        Route::post('/password/index', [AdminController::class, 'passwordChange'])->name('password.change.index');
        Route::get('/', [AdminController::class, 'index'])->name('index');
        Route::get('/optimize', [AdminController::class, 'optimize'])->name('optimize');
        Route::post('/status/{id}', [AdminController::class, 'status'])->name('status');
        Route::get('/profile', [AdminController::class, 'profile'])->name('profile');
        Route::post('/changeData', [AdminController::class, 'data'])->name('data');
        Route::post('/changePassword', [AdminController::class, 'password'])->name('password');
        Route::get('/menus/order', [MenuController::class, 'order'])->name('menus.order');
        Route::post('/menus/order', [MenuController::class, 'saveOrder'])->name('menus.saveOrder');
        Route::get('/get-menus/{id}', [PageController::class, 'getMenu'])->name('get-menus');
        Route::resources([
            'categories' => CategoryController::class,
            'blogs' => BlogController::class,
            'videos' => VideoController::class,
            'links' => LinkController::class,
            'leaders' => LeaderController::class,
            'sliders' => SliderController::class,
            'settings' => SettingController::class,
            'social' => SocialSettingController::class,
            'menus' => MenuController::class,
            'pages' => PageController::class,
        ]);
    });
    //super admin
    Route::middleware('super')->group(function () {
        Route::get('/dashboard', function () {
            $all = Document::count();
//            dd($all);
            $users = User::where('role', '!=', 'user1')->get();
            $tender = Offer::where('status', '=', 'tender')->count();
            $shartnoma = Offer::where('status', '=', 'shartnoma')->count();
            $ecokorik = Offer::where('status', '=', 'ecokorik')->count();
            $auksion = Offer::where('status', '=', 'auksion')->count();
            $real = Offer::where('status', '=', 'real')->count();
            $news = Document::with('user', 'offer')->where('status', '=', 'yangi')->get();
            return view('admin.super', compact('users', 'tender', 'shartnoma', 'ecokorik', 'auksion', 'real', 'news', 'all'));
        })->name('dashboard');
        Route::get('/profile', [AdminController::class, 'profile'])->name('profile');
        Route::post('/changeData', [AdminController::class, 'data'])->name('data');
        Route::get('/password', [AdminController::class, 'password'])->name('profile.password');
        Route::post('/password', [AdminController::class, 'passwordChange'])->name('password.change');
        Route::post('/users/{id}/role', [UsersController::class, 'role'])->name('users.role');
        Route::post('/user/{id}/password', [UsersController::class, 'password'])->name('users.password');
        Route::get('/documents', [DocumentController::class, 'index'])->name('documents.index');
        Route::get('document/{id}', [DocumentController::class, 'show'])->name('documents.show');
        Route::put('document/{id}/update', [DocumentController::class, 'update'])->name('documents.update');
        Route::resource('/offers', \App\Http\Controllers\OfferController::class);
        Route::resource('/users', UsersController::class);
        Route::post('/user-status/{id}', [UsersController::class, 'status'])->name('userStatus');
    });
});

\Illuminate\Support\Facades\Auth::routes([
    'register' => false,
]);
Route::get('logout', [\App\Http\Controllers\Auth\LoginController::class, 'logout']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
