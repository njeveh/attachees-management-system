<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
            if (auth()->user()->type == 'department_admin') {
                return redirect()->route('departments.home');
            }else if (auth()->user()->type == 'attachee') {
                return redirect()->route('attachee.home');
            }else if (auth()->user()->type == 'dipca_admin') {
                return redirect()->route('dipca.home');
            }else if (auth()->user()->type == 'central_services_admin') {
                return redirect()->route('central_services.home');
            }else{
                return redirect()->route('welcome.page');
            }
    }
}
