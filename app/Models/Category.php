<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['category_name', 'description', 'status'];

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
}
