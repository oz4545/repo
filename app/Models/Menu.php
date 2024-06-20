<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'user_id', 'categoria_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function Category()
    {
        return $this->hasMany(Category::class);
    }
}
