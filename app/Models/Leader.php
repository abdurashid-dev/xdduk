<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leader extends BaseModel
{
    use HasFactory;
    protected $guarded = ['id'];
    public function getLeaderImage( $style = 'width:100px')
    {
        return '<img class="img-thumbnail m-1" src="' . asset($this->image) . '" style="' . $style . '">';
    }
}
