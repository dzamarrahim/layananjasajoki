<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Transaksi extends Model
{
    use HasFactory;
    protected $fillable=['invoice','pelanggan_id','user_id','qty','total'];

    public function detiltransaksi():HasMany {
        return $this->hasMany(DetilTransaksi::class);
    }

    public function pelanggan():BelongsTo {
        return $this->belongsTo(Pelanggan::class);
    }
}