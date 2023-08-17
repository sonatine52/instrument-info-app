<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Instrument;

class DetailController extends Controller
{
    public function index($id) {
        $categories = Category::all();
        $instrument = Instrument::find($id);
        return view('top.show', compact('categories','instrument'));
    }
}
