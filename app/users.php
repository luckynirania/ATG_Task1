<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class users extends Model {
    use Notifiable;

    protected $table = 'user_info';
    protected $primaryKey = 'id';
    public $fillable = ['name','email','pincode'];

}
