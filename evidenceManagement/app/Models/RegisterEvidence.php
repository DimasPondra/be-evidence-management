<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class RegisterEvidence extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'register_number', 'register_date', 'suspect', 'article', 'prosecutor'
    ];

    public function details()
    {
        return $this->hasMany(DetailEvidence::class, 'register_id', 'id');
    }
}
