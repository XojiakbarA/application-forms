<?php

namespace App\Http\Controllers;

use App\Http\Requests\ApplicationRequest;
use App\Services\UserService;

class ApplicationController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function create(ApplicationRequest $request)
    {
        $created = $this->userService->createApplication($request);

        if ($created) :
            return redirect('/')->with('status', 'Your application has been successfully sent!');
        else :
            return redirect('/')->with('status', 'Application not sent, please try again later.');
        endif;
    }
}
