<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Document model
 * @property int $id
 * @property int $user_id
 * @property string $status
 *
 * @property User $user
 */
class Offer extends BaseModel
{
    use HasFactory;

    protected $guarded = ['id'];

    /**
     * @return BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);  // 1 offer belongs to 1 user
    }

    public function getCondition()
    {
        if ($this->status == 'tender') {
            return '<span class="badge badge-danger">Tenderda</span>';
        } elseif ($this->status == 'shartnoma') {
            return '<span class="badge badge-warning">Shartnomali</span>';
        } elseif ($this->status == 'ecokorik') {
            return '<span class="badge badge-success">Ekologik ko`rikda</span>';
        } elseif ($this->status == 'auksion') {
            return '<span class="badge badge-info">Auksionda</span>';
        } elseif ($this->status == 'real') {
            return '<span class="badge badge-primary">Realizatsiya qilingan</span>';
        }
    }

    public function getEdit()
    {
        $url = route('admin.offers.edit', $this->id);
        if ($this->status == 'tender' || $this->status == 'shartnoma') {
            return $this->editButton($url);
        }
        return '';
    }

    public function getUser()
    {
        if ($this->user_id !== null){
            return $this->user->name;
        }else{
            return 'Topilmadi';
        }
    }
}
