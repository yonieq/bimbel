<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Invoice extends Model
{
    use HasFactory;

    protected $table = 'invoices';

    protected $guarded = [];

    public function payment(): BelongsTo
    {
        return $this->belongsTo(PaymentBimbel::class, 'payment_bimbels_id', 'id');
    }

    public function student(): BelongsTo
    {
        return $this->belongsTo(StudentOfBimbel::class, 'student_id', 'id');
    }
}
