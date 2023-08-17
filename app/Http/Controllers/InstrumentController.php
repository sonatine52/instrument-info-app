<?php

namespace App\Http\Controllers;

use App\Models\Instrument;
use App\Models\Category;
use Illuminate\Http\Request;

class InstrumentController extends Controller
{
    // 一覧ページ
    public function index() {
        $instruments = Instrument::all();
        return view('admin.instruments.index', compact('instruments'));
    }

    // 作成ページ
    public function create() {
        $categories = Category::all();
        return view('admin.instruments.create', compact('categories'));
    }

    // 作成機能
    public function store(Request $request) {
        $request->validate([
            'name' => 'required',
            // 'img' => 'image',
            'category_id' => 'required',
        ]);

        $instrument = new Instrument();
        $instrument->name = $request->input('name');
        // 音色データ(未作成)
        // 画像(仮)
        $instrument->img = $request->input('img');
        $instrument->content = $request->input('content');
        $instrument->category_id = $request->input('category_id');
        $instrument->save();

        return redirect()->route('admin.instruments.index')->with('flash_message', 'レコードを作成しました。');
    }

    // 更新ページ
    public function edit($id) {
        $instrument = Instrument::find($id);
        $categories = Category::all();
        return view('admin.instruments.edit', compact('instrument','categories'));
    }

    // 更新機能
    public function update(Request $request, Instrument $instrument) {
        $request->validate([
            'name' => 'required',
            // 'img' => 'image',
            'category_id' => 'required',
        ]);

        $instrument->name = $request->input('name');
        // 音色データ(未作成)
        // 画像(仮)
        $instrument->img = $request->input('img');
        $instrument->content = $request->input('content');
        $instrument->category_id = $request->input('category_id');
        $instrument->save();

        return redirect()->route('admin.instruments.index')->with('flash_message', 'レコードを更新しました。');
    }

    // 削除機能
    public function destroy($id) {
        $instrument = Instrument::find($id);
        $instrument->delete();

        return redirect()->route('admin.instruments.index')->with('flash_message', 'レコードを削除しました。');
    }
}