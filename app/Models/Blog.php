<?php

namespace App\Models;

use Illuminate\Support\Facades\App;

use App\Models\Kategori;
use App\Models\Author;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $table = 'blog';

    protected $fillable = [
        'kategori_id',
        'author_id',
        'judul',
        'konten',
        'tanggal',
    ];

    protected $cast = [
        'tanggal' => 'date',
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    public function author()
    {
        return $this->belongsTo(Author::class);
    }    

}
