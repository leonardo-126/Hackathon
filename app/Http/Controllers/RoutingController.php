<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class RoutingController extends Controller
{
    public function index(Request $request)
    {
        return view('index');
    }

    /**
     * Display a view based on first route param
     *
     * @return \Illuminate\Http\Response
     */
    public function root(Request $request, $first)
    {
        if (View::exists($first)) {
            return view($first);
        }
        return abort(404);
    }

    /**
     * second level route
     */
    public function secondLevel(Request $request, $first, $second)
    {
        if (View::exists($first . '.' . $second)) {
            return view($first . '.' . $second);
        }
        return abort(404);
    }

    /**
     * third level route
     */
    public function thirdLevel(Request $request, $first, $second, $third)
    {
        if (View::exists($first . '.' . $second . '.' . $third)) {
            return view($first . '.' . $second . '.' . $third);
        }
        return abort(404);
    }
}
