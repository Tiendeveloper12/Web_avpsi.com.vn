<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Review extends Model
{
    use HasFactory;

    protected $table = 'reviews';

    protected $fillable = [
        'product_id',
        'user_id',
        'rating',
        'title',
        'body',
        'image',
        'status',
        'admin_note'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
