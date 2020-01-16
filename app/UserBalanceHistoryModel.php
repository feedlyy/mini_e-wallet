<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class UserBalanceHistoryModel extends Model
{
    //
    use Notifiable;

    protected $table = 'user_balance_history';
    protected $primaryKey = 'id';

    protected $fillable = [
        'user_balance_id', 'balance_before', 'balance_after',
        'activity', 'type', 'ip', 'location', 'user_agent',
        'author'
    ];
}
