<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\MasterApiController;
use App\Models\Film;

class FilmApiController extends MasterApiController
{
    protected $model;
    protected $path = 'films';
    protected $upload = 'cover';

    public function __construct(Film $film, Request $request)
    {
        $this->model = $film;
        $this->request = $request;
    }
}
