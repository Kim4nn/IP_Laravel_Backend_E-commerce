<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Attribute;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $table = 'orders';
    protected $fillable = ['order_date', 'total_price'];

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function order_products()
    {
        return $this->hasMany(OrderProduct::class);
    }

    protected function order_date(): Attribute
    {
        return Attribute::Make(
            // Mutator: Convert input format to MySQL format before saving
            set: fn ($value) => Carbon::createFromFormat('d/m/Y H:i:s', $value)->format('Y-m-d H:i:s'),

            // Accessor: Convert database format to user format when retrieving
            get: fn ($value) => Carbon::parse($value)->format('d/m/Y H:i:s')
        );
    }
}
