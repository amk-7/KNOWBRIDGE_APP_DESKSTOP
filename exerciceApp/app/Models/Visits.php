<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visits extends Model
{
    use HasFactory;
    protected $fillable = ['ip', 'country'];
    protected $primaryKey = 'ip';
    protected $casts = [
        "date" => "Carbon"
    ];
}
