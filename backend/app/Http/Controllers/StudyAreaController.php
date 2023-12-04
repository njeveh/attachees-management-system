<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudyAreaController extends Controller
{

    /**
     * Notify user that they need to create study areas before proceeding to create adverts if none exist
     */
    public function createStudyAreasNotification()
    {
        return view('departments.create-study-areas-notification');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('departments.create-new-study-area');
    }

    /**
     * Display department study areas.
     */
    public function showDepartmentStudyAreas(Request $request)
    {
        $study_areas = $request->user()->departmentAdmin->department->studyAreas->sortByDesc('created_at');
        return view('departments.study-areas-view', ['data' => $study_areas]);
    }
}
