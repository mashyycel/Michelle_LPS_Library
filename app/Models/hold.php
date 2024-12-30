<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hold extends Model
{
    use HasFactory;

    protected $table = 'hold_book';
    protected $primaryKey = 'id_hold';

    protected $fillable = [
        'id_user', 'id_book', 'hold_date', 'status'
    ];
}
