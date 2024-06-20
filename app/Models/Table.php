<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    use HasFactory;
    protected $fillable = ['capacidad', 'categoria_id', 'user_id'];

    public function user()
    {
        return $this->hasMany(User::class);
    }

    public function category()
    {
        return $this->hasMany(Category::class);
    }

    public function order()
    {
        return $this->hasMany(Order::class);
    }
    public function table()
    {
        return $this->hasMany(Table::class);
    }
}
