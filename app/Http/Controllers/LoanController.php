<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class LoanController extends Controller
{
    public function loan1(Request $request)
    {
        if ($request->isMethod('post'))
        {

        }
        return view('loan');
    }
}
