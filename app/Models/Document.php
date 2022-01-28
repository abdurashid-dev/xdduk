<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Document model
 * @property int $id
 * @property string $status
 */
class Document extends BaseModel
{

    const STATUS_NEW = 'yangi';
    const STATUS_CANCELLED = 'rad etilgan';
    const STATUS_ACCEPTED = 'tasdiqlangan';

    use HasFactory;

    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function offer()
    {
        return $this->belongsTo(Offer::class, 'offer_id');
    }

    /**
     * @return string
     */
    public function status()
    {
        if ($this->isNew()) {
            return '<button class="btn btn-sm btn-primary mt-2" title="* Status">Yangi</button>';
        } elseif ($this->status == 'rad etilgan') {
            return '<button class="btn btn-sm btn-danger mt-2" title="* Status">Rad etilgan</button>';
        } elseif ($this->status == 'tasdiqlangan') {
            return '<button class="btn btn-sm btn-success mt-2" title="* Status">Tasdiqlangan</button>';
        } elseif ($this->status == 'korildi') {
            return '<button class="btn btn-sm btn-success mt-2" title="* Status">Ko`rildi</button>';
        }
        return '<button class="btn btn-sm btn-warning mt-2" title="* Status">Xatolik</button>';
    }

    /**
     * @param $offer Offer
     * @return string|void
     */
    public function showStatus($offer)
    {
        if ($offer->status == 'shartnoma') {
            return '<option value="ecokorik">Ekologik korikka otkazish</option>';
        } elseif ($offer->status == 'ecokorik') {
            return '<option value="auksion">Auksionga o`tkazish</option>';
        } elseif ($offer->status == 'auksion') {
            return '<option value="real">Realizatsiya qilish</option>';
        }
        return '<option value="">---</option>';
    }

    public function checkStatus()
    {
        if ($this->status == 'yangi') {
            $this->update([
                'status' => 'korildi'
            ]);
        }
    }

    public function getOfferStatus()
    {
        if ($this->offer->status == 'tender') {
            return '<button class="btn btn-sm btn-primary mt-2" title="* Status">Tender</button>';
        } elseif ($this->offer->status == 'shartnoma') {
            return '<button class="btn btn-sm btn-success mt-2" title="* Status">Shartnomali</button>';
        } elseif ($this->offer->status == 'ecokorik') {
            return '<button class="btn btn-sm btn-success mt-2" title="* Status">Ekologik korikda</button>';
        } elseif ($this->offer->status == 'auksion') {
            return '<button class="btn btn-sm btn-success mt-2" title="* Status">Auksionda</button>';
        } elseif ($this->offer->status == 'real') {
            return '<button class="btn btn-sm btn-success mt-2" title="* Status">Realizatsiya qilingan</button>';
        }

    }

    public function isNew()
    {
        return $this->status == self::STATUS_NEW;
    }

    public function isCancelled()
    {
        return $this->status == self::STATUS_CANCELLED;
    }

    public function isAccepted()
    {
        return $this->status == self::STATUS_ACCEPTED;
    }
}
