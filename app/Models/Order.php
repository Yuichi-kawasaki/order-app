<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['user_id'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function orderedLists(): HasMany
    {
        return $this->hasMany(OrderedList::class);
    }

    public function items()
    {
        return $this->hasManyThrough(Item::class, OrderedList::class);
    }

    public function updateTotalQuantity()
    {
        foreach ($this->orderedLists as $line_item) {
            $item = Item::find($line_item->item_id);
            $item->total_quantity += $line_item->quantity;
            $item->save();
        }
    }
}
