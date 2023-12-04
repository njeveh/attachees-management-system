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
        $requirements = $advert->advertAccompaniments->where('type', 'requirement');
         return view('view-advert', ['advert' => $advert, 'requirements' => $requirements]);
    }
}
