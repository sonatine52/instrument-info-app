<?php

namespace App\Http\Controllers;

use App\Models\Instrument;
use App\Models\Category;
use Illuminate\Http\Request;

class TopController extends Controller
{
    public function index() {
        // $instruments = Instrument::all();
        // return view('top.index', compact('instruments'));

        $categories = Category::all();
        return view('top.index', compact('categories')); 
    }
}
