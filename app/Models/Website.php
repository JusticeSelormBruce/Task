<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Website extends Model
{
    use HasFactory;

    protected $guarded  = [];


    public static function validateIncomingWebsiteRequest()
    {
        return request()->validate(
            [
                'name' => 'string|required'
            ]
        );
    }

    public static function getWebsite($id)
    {
        return Website::find($id);
    }

    
}
