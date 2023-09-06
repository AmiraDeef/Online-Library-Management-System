<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Book extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'author', 'description', 'publication_date', 'borrowed_by'];



    public function borrowedBy()
    {
        return $this->belongsTo(User::class, 'borrowed_by');
    }
}
