<?php

namespace App\Http\Controllers;

use App\Models\AttacheeBiodata;
use Illuminate\Http\Request;

class AttacheeBiodataController extends Controller
{


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('attachee.biodata');
    }

}
