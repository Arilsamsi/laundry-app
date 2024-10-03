<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Laundry extends Model
{
    use HasFactory;
    protected $table = 'laundry';
    protected $guarded = [];

    public function pelanggan(){
        return $this->belongsTo(Pelanggan::class);
    }
    public function pakaian(){
        return $this->belongsTo(Pakaian::class);
    }
}
