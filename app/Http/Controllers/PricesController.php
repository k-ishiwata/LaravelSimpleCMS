<?php

namespace App\Http\Controllers;

use App\Price;

class PricesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prices = Price::all();
        return view('prices.index', compact('prices'));
    }
}
