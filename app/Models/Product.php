<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    protected $table = 'products';
    protected $primaryKey = 'id';

    protected $fillable = [
        'productname',
        'cat_id',
        'description',
        'price',
        'photo',
    ];

    //  protected $casts = [
    //     'cat_id' => 'integer',
    // ];

    use HasFactory;

    /**
     * Get the category that owns the product.
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'cat_id');
    }
}
