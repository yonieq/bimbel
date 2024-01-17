<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PaymentBimbel extends Model
{
    use HasFactory;

    public $table = 'payment_bimbels';

    public $guarded = [];

    public function bimbel(): BelongsTo
    {
        return $this->belongsTo(CategoryBimbel::class, 'category_bimbel_id', 'id');
    }
}
