<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = ['completado', 'dishes_id', 'user_id', 'tables_id'];

    public function user()
    {
        return $this->hasmany(User::class);
    }

    public function category()
    {
        return $this->hasMany(Category::class);
    }
    public function table()
    {
        return $this->hasMany(Table::class);
    }
}

