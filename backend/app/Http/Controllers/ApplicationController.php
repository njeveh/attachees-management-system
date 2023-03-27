<?php

namespace App\Http\Controllers;

use App\Models\Advert;
use App\Models\Applicant;
use App\Models\Application;
use App\Models\Attachee;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $applicant = Applicant::where('user_id', auth()->user()->id)->first();
        if (Application::where('advert_id', $id)->where('applicant_id', $applicant->id)->exists()) {
            $application = Application::where('advert_id', $id)->where('applicant_id', $applicant->id)->first();
            $application_id = $application->id;
            return view('attachee.feedback', [
                'header' => 'Request Denied!!',
                'message' => "You can't apply to this post more than once",
                'link' => '/attachee/my-applications/' . $application_id . '/view-application/',
                'link_text' => 'view my application',
                'alert_class' => 'alert-danger'
            ]);
        } else {
            return view('attachee.apply', ['advert_id' => $id]);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Application $application)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Application $application)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Application $application)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Application $application)
    {
        //
    }

    /**
     * get all applications belonging to a specific attachee
     */
    public function getAttacheeapplications()
    {
        $applications = auth()->user()->applicant->applications;
        return view('attachee.applications', ['applications' => $applications]);
    }

    /**
     * get a specific application belonging to a specific attachee
     */
    public function getAttacheeapplication($id)
    {
        $application = auth()->user()->applicant->applications->where('id', $id);
        return view('attachee.applications', ['application' => $application]);
    }


}