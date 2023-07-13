<?php

namespace App\Models;

use App\Models\Blog;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    protected $table = 'author';

    protected $fillable = [
        'nama',
    ];

    public function blog()
    {
        return $this->hasMany(Blog::class);
    }
}
