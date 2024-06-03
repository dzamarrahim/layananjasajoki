<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DetilTransaksi extends Model
{
    use HasFactory;
    protected $fillable=['transaksi_id','layanan_id','qty','harga'];

    public function transaksi():BelongsTo {
        return $this->belongsTo(Transaksi::class);
    }

    public function layanan():BelongsTo {
        return $this->belongsTo(Layanan::class);
    }

}
