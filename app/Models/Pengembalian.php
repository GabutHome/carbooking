<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengembalian extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $primaryKey = 'id_pengembalian';

    public function carmodel()
    {
        return $this->belongsTo(CarModel::class, 'carmodel_id', 'carmodel_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }

    public function booking()
    {
        return $this->belongsTo(User::class, 'booking_id', 'booking_id');
    }
}
