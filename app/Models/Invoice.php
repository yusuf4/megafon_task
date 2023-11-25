<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Invoice extends Model
{
    protected $fillable = [
        'name',
        'lastname',
        'invoice',
        'phone',
        'status',
        'user_id'
    ];

    public function userInvoice()
    {
        return $this->hasMany(User::class, 'id', 'user_id');
    }
}
