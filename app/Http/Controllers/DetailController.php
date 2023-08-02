<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Instrument;

class DetailController extends Controller
{
    public function index($id) {
        $instrument = Instrument::find($id);
        $categories = Category::all();
        return view('top.show', compact('instrument','categories'));
    }
}
