<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;


    public function personal()
    {
        return $this->belongsTo(Personal::class);
    }



    protected $fillable = [
        'personal_id',
        'startday',
        'starttime',
        'finishday',
        'finishtime',
        'cartype'
    ];
}
