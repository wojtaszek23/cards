<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    use HasFactory;


    protected $table = 'cards';
    public $timestamps = true;

    protected $casts = [
        'amount' => 'float'
    ];


    protected $fillable = 
    ['number', 
    'pin', 
    'activated_at', 
    'valid_until', 
    'amount'];
}
