<?php

namespace App\Http\Controllers;

use App\Http\Requests\ApplicationRequest;
use App\Models\Application;
use App\Services\UserService;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {
        $apps = Application::paginate(10);

        return view('manager', compact('apps'));
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

    public function update(Request $request, Application $application)
    {
        $application->status = 1;
        $updated = $application->save();

        if ($updated) :
            return redirect('/manager')->with('status', 'Application updated succesfully!');
        else :
            return redirect('/manager')->with('status', 'Application not updated, please try again later.');
        endif;
    }
}
