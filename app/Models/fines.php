<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fines extends Model
{
    use HasFactory;

    protected $table = 'fines';
    protected $primaryKey = 'id_fine';

    protected $fillable = [
        'id_checkout', 'fine_amount','status', 'paid_date'
    ];

    public function checkout()
    {
        return $this->belongsTo(Checkout::class, 'id_checkout', 'id_checkout');
    }

    public function isPaid()
    {
        return !is_null($this->paid_date);
    }

}
