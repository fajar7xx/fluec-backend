<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'transactions';
    protected $fillable =[
        'user_id',
        'address',
        'total_price',
        'shipping_price',
        'status',
        'payment'
    ];

    //relasi

    /**
     * mto1 user model
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    /**
     * 1tom transaction items
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function items()
    {
        return $this->hasMany(TransactionItem::class, 'transaction_id', 'id');
    }
}
