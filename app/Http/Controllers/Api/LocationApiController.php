<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\MasterApiController;
use App\Models\Location;
class LocationApiController extends MasterApiController
{
    protected $model;
    protected $path;
    protected $upload;

    public function __construct(Location $location, Request $request)
    {
        $this->model = $location;
        $this->request = $request;
    }

    public function customer(){

    }
}
