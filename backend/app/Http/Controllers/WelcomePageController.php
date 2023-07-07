<?php

namespace App\Http\Controllers;

use App\Models\Advert;
use Illuminate\Http\Request;

class WelcomePageController extends Controller
{
    /**
     * show all valid adverts
     */
    public function index()
    {
        return view('welcome');
    }

    /**
     * show a specific advert
     */
    public function show($id)
    {
        $advert = Advert::find($id);
        $gen_reqs = $advert->accompaniments->where('type', 'general_requirement');
        $prof_reqs = $advert->accompaniments->where('type', 'professional_requirement');
        $responsibilities = $advert->accompaniments->where('type', 'intern_responsibility');
         return view('view-advert', ['advert' => $advert, 'gen_reqs' => $gen_reqs,
        'prof_reqs' => $prof_reqs, 'responsibilities' => $responsibilities,]);
    }
}
