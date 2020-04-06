<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    //1st convention : table name
    // protected $table = 'myMembers';

    //2nd convention : primary key
    // protected $primaryKey = 'cin';
    
    //3rd convention : primary key incrementing
    // public $incrementing = false;
    
    //4th convention : timestamps
    public $timestamps = false;
}
