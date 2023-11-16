<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'id','category_id', 'brand_id','promotion_id','name', 'image', 'price', 'description','quantity', 'banner_id', 'created_at', 'updated_at'
    ];

    public function promotion()
    {
        return $this->belongsTo(Promotion::class);
    }

}
