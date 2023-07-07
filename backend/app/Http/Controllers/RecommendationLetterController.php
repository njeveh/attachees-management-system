<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class RecommendationLetterController extends Controller
{
    /**
     * Show applicant Recommendtion letters view/download page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function show(): View
    {
        $applicant_recommendation_letters = auth()->user()->applicant->recommendationLetters;
        return view('attachee.recommendation-letters', ['recommendation_letters' => $applicant_recommendation_letters]);
    }
}
