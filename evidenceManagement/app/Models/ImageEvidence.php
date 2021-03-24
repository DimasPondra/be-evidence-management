<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ImageEvidence extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'detail_id', 'image'
    ];

    public function detail()
    {
        return $this->belongsTo(DetailEvidence::class, 'detail_id', 'id');
    }

    public function getImageAttribute($value)
    {
        return url('storage/' . $value);
    }
}
