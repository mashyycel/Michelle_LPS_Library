<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Checkout extends Model
{
    use HasFactory;

    protected $table = 'checkout';
    protected $primaryKey = 'id_checkout';

    protected $fillable = [
        'id_user', 'id_book', 'borrow_date', 
        'due_date', 'status'
    ];
    public function books()
    {
        return $this->belongsTo(Books::class, 'id_book', 'id_book');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }

    public function isReturned()
    {
        return !is_null($this->return_date);
    }

}
