<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class CategoryBimbel extends Model
{
    use HasFactory;

    public $table = 'category_bimbels';
    public $guarded = [];

    public function schedule(): HasOne
    {
        return $this->hasOne(ScheduleBimbel::class, 'category_bimbel_id', 'id');
    }

    public function student(): HasMany
    {
        return $this->hasMany(StudentOfBimbel::class, 'category_bimbel_id', 'id');
    }

    public function payment(): HasMany
    {
        return $this->hasMany(PaymentBimbel::class, 'category_bimbel_id', 'id');
    }
}
