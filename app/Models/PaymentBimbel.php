<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PaymentBimbel extends Model
{
    use HasFactory;

    public $table = 'payment_bimbels';

    public $guarded = [];

    public function bimbel(): BelongsTo
    {
        return $this->belongsTo(CategoryBimbel::class, 'category_bimbel_id', 'id');
    }

    public function invoice(): HasMany
    {
        return $this->hasMany(Invoice::class, 'payment_bimbels_id', 'id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
