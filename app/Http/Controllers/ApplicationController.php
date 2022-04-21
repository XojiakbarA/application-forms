<?php

namespace App\Http\Controllers;

use App\Http\Requests\ApplicationRequest;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    public function create(ApplicationRequest $request)
    {
        $data = $request->validated();

        return $data;
    }
}
