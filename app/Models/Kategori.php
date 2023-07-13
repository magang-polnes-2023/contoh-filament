<?php

namespace App\Models;

use App\Models\Blog;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    protected $table = 'kategori';

    protected $fillable = [
        'nama',
        'tanggal',
    ];

    protected $cast = [
        'tanggal' => 'date',
    ];

    public function blog()
    {
        return $this->hasMany(Blog::class);
    }
}
