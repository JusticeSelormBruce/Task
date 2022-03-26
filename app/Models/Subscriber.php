<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscriber extends Model
{
    public $table = "subscribe";
    use HasFactory;

    
    
    protected $guarded  =[];


    public static function validateIncomingSubscriberRequest()
    {
        return request()->validate(
            [
                'name'=> 'string|required',
                'email'=> 'email|string|unique:subscribe|required',
                'website_id'=> 'array|required'
            ]
        );
    }

    
}
