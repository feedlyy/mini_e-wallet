<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class UserBalanceModel extends Model
{
    //
    use Notifiable;

    protected $table = 'user_balance';
    protected $primaryKey = 'id';

    protected $fillable = [
        'user_id', 'balance', 'balance_achieve'
    ];
}
