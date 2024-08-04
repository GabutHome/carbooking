<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarModel extends Model
{
    use HasFactory;

    //protected $fillable = [];
    protected $guarded = ['carmodel_id'];
    protected $primaryKey = 'carmodel_id';
}
