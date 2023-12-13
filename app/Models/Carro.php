<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carro extends Model
{
    use HasFactory;
    protected $with = ['status'];
    protected $fillable = [
        'modelo',
        'ano',
        'preco',
        'status_id'
    ];

    public function status()
    {
        return $this->belongsTo(Status::class);
    }
}
