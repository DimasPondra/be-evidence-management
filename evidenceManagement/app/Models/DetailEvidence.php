<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DetailEvidence extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'register_id', 'criteria_id', 'name', 'amount', 'description'
    ];

    public function register()
    {
        return $this->belongsTo(RegisterEvidence::class, 'register_id', 'id');
    }

    public function criteria()
    {
        return $this->hasOne(CriteriaEvidence::class, 'id', 'criteria_id');
    }

    public function images()
    {
        return $this->hasMany(ImageEvidence::class, 'detail_id', 'id');
    }
}
