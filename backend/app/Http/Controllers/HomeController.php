<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
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

    /**
     * Show the application attachee dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function attacheeHome()
    {
                    if (auth()->user()->type == 'department_admin') {
                return redirect()->route('departments.home');
            }else if (auth()->user()->type == 'attachee') {
return view('attachee.home');
            }else if (auth()->user()->type == 'dipca_admin') {
                return redirect()->route('dipca.home');
            }else if (auth()->user()->type == 'central_services_admin') {
                return redirect()->route('central_services.home');
            }else{
                return redirect()->route('welcome.page');
            }
        // return view('attachee.home');
    }
  
    /**
     * Show the application department admin dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function departmentHome()
    {
        return view('departments.home');
    }

    /**
     * Show the application central services admin dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function centralServicesHome()
    {
        return view('central_services.home');
    }

    /**
     * Show the application dipca admin dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function dipcaHome()
    {
        return view('dipca.home');
    }

    /**
     * Show the application dipca admin dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function showguestHomePage()
    {
        return view('dipca.home');
    }
}
