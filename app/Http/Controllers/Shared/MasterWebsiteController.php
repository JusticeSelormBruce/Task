<?php

namespace App\Http\Controllers\Shared;

use App\Http\Controllers\Controller;
use App\Http\Resources\WebsiteResource;
use App\Models\Website;
use Illuminate\Http\Request;

class MasterWebsiteController extends Controller
{
    
    public   function all()
    {
        return  WebsiteResource::collection(Website::paginate());
    }

    public function create()
    {
      return   Website::create(Website::validateIncomingWebsiteRequest());
    }

    public function getWebsite($id)
    {
       return Website::find($id);
      
    }
}
