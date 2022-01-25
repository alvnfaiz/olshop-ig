<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CallbacksModel extends Model
{
    use HasFactory;
    protected $table = 'callbacks';
    public $timestamps = false;
    protected $fillable = [
        'id',
        'name',
        'value',
    ];
}
