<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Shared\MasterWebsiteController;
use App\Http\Resources\WebsiteResource;
use App\Models\Website;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    public $website_controller_controller;
    public function  __construct()
    {
        $this->website_controller_controller = new MasterWebsiteController();
    }

    public function index()
    {
        return $this->website_controller_controller->all();
    }

    public function store()
    {
      return $this->website_controller_controller->create();
    }
    
    public function show($id)
    {
       $website = Website::whereId($id)->get();
        return WebsiteResource::collection($website);
    }
}
