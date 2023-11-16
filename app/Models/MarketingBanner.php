<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MarketingBanner extends Model
{
    use HasFactory;
    protected $table = 'marketing_banners';
    protected $fillable = [
        'name', 'description', 'image', 'book_id', 'created_at', 'updated_at'
    ];
  
}
