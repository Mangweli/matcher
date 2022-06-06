<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyType extends Model
{
    public $incrementing = false;
    // protected $keyType = 'string';
    // protected $casts = [
    //     'id' => 'string',
    // ];
    use HasFactory;
}
