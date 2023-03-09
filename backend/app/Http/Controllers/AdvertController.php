<?php

namespace App\Http\Controllers;

use App\Models\Advert;
use App\Models\AdvertAccompaniment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class AdvertController extends Controller
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
    public function create()
    {
        return view('departments.create-new-advert');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Log::info('here we go');
        // if ($request->user()->can('create', Advert::class)) {
            $request->validate([
                'title' => ['required', 'string'],
                'description' => ['required', 'string'],
                'year' => ['required',],
                'cohort1_vacancies' => ['required', 'min:0', 'numeric'],
                'cohort2_vacancies' => ['required', 'min:0', 'numeric'],
                'cohort3_vacancies' => ['required', 'min:0', 'numeric'],
                'cohort4_vacancies' => ['required', 'min:0', 'numeric'],
            ]);
            Log::info('here we go again');
            // $accompaniments = collect($request->only('gen_req', 'prof_req', 'intern_responsibilities'));
            $department = $request->user()->departmentAdmin->department;
            Log::info($department);
            DB::beginTransaction();
                try{
                    $advert = Advert::create([
                        'title' => $request->title,
                        'department_id' => $department->id,
                        'description' => $request->description,
                        'year' => $request->year,
                        'cohort1_vacancies' => $request->cohort1_vacancies,
                        'cohort2_vacancies' => $request->cohort2_vacancies,
                        'cohort3_vacancies' => $request->cohort3_vacancies,
                        'cohort4_vacancies' => $request->cohort4_vacancies,
                    ]);
                    Log::info($advert);
                    if ($request->filled('gen_req')){
                        $gen_reqs = $request->gen_req;
                        foreach($gen_reqs as $gen_req){
                            AdvertAccompaniment::create([
                                'advert_id' => $advert->id,
                                'value' => $gen_req,
                                'type' => 'general_requirement',
                            ]);
                        }
                    }
                    if ($request->filled('prof_req')){
                        $prof_reqs = $request->prof_req;
                        foreach($prof_reqs as $prof_req){
                            AdvertAccompaniment::create([
                                'advert_id' => $advert->id,
                                'value' => $prof_req,
                                'type' => 'professional_requirement',
                            ]);
                        }
                    }
                    if ($request->filled('intern_responsibilities')){
                        $intern_responsibilities = $request->intern_responsibilities;
                        foreach($intern_responsibilities as $intern_responsibility){
                            AdvertAccompaniment::create([
                                'advert_id' => $advert->id,
                                'value' => $intern_responsibility,
                                'type' => 'intern_responsibility',
                            ]);
                        }
                    }
            DB::commit();
            $advert->reference_number = $request->year.'-'.$department->name. '#Advert' .$advert->id;
            $advert->save();
                } catch (\Exception $e) {
                    DB::rollBack();
                    Log::info($e);
                    return back()->with('error', 'Sorry!! Something went wrong.')->withInput();
                }
                return redirect('/departments/view-advert/'.$advert->id);
        //     $user = User::create([
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'password' => Hash::make($request->password),
        // ]);
        // }
    }

    /**
     * Display the specified resource.
     */
    public function show(Advert $advert)
    {
        //
    }
    /**
     * Display department adverts.
     */
    public function showDepartmentAdverts(Request $request)
    {
        $adverts = $request->user()->departmentAdmin->department->adverts;
        return view('departments.view-adverts', ['data' => $adverts]);
    }

    /**
     * Display specified department advert.
     */
    public function showDepartmentAdvert($id)
    {
        $advert = Advert::find($id);
        $gen_reqs = $advert->accompaniments->where('type', 'general_requirement');
        $prof_reqs = $advert->accompaniments->where('type', 'professional_requirement');
        $responsibilities = $advert->accompaniments->where('type', 'intern_responsibility');
         return view('departments.view-advert', ['advert' => $advert, 'gen_reqs' => $gen_reqs,
        'prof_reqs' => $prof_reqs, 'responsibilities' => $responsibilities,]);
    }

    /**
     * Display all adverts to central services.
     */
    public function showCentralServicesAdvertsView(Request $request)
    {
        $approved_adverts = Advert::where('approval_status', 'approved')->get();
        $disapproved_adverts = Advert::where('approval_status', 'disapproved')->get();
        $pending_adverts = Advert::where('approval_status', 'pending approval')->get();
        return view('central_services.view-adverts', ['approved_adverts' => $approved_adverts,
    'disapproved_adverts' => $disapproved_adverts, 'pending_adverts' => $pending_adverts]);
    }

    /**
     * Display a specific advert on central services.
     */
    public function centralServicesViewAdvert($id)
    {
        $advert = Advert::find($id);
        $gen_reqs = $advert->accompaniments->where('type', 'general_requirement');
        $prof_reqs = $advert->accompaniments->where('type', 'professional_requirement');
        $responsibilities = $advert->accompaniments->where('type', 'intern_responsibility');
         return view('central_services.view-advert', ['advert' => $advert, 'gen_reqs' => $gen_reqs,
        'prof_reqs' => $prof_reqs, 'responsibilities' => $responsibilities,]);
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Advert $advert)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Advert $advert)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Advert $advert)
    {
        //
    }
}
