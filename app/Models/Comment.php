<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function document()
    {
        return $this->belongsTo(Document::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function doc_status()
    {
        if ($this->doc_status == 'ecokorik'){
            return 'Shartnomali';
        }elseif ($this->doc_status == 'auksion') {
            return 'Ekologik ko`rikda';
        }elseif ($this->doc_status == 'real') {
            return 'Auksiondan realizatsiyaga o`tdi';
        }elseif($this->doc_status == 'rad etilgan'){
            return 'Rad etilgan';
        }else{
            return 'Rad etilgan';
        }
    }
}
