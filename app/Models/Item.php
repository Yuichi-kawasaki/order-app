<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Item extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'total_quantity'];

    public function orders()
    {
        return $this->hasManyThrough(Order::class, OrderedList::class);
    }
}
