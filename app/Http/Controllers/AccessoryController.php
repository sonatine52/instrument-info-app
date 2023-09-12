<?php

namespace App\Http\Controllers;

use App\Models\Accessory;
use App\Models\Instrument;
use Illuminate\Http\Request;

class AccessoryController extends Controller
{
    // 一覧ページ
    public function index() {
        $accessories = Accessory::all();
        return view('admin.accessories.index', compact('accessories') );
    }

    // 作成ページ
    public function create() {
        $instruments = Instrument::all();
        return view('admin.accessories.create', compact('instruments'));
    }

    // 作成機能
    public function store(Request $request) {
        $request->validate([
            'name' => 'required',
            'instrument_id' => 'required',
            'img' => 'image',
        ]);

        $accessory = new Accessory();
        $accessory->name = $request->input('name');
        $accessory->content = $request->input('content');
        $accessory->instrument_id = $request->input('instrument_id');
        $accessory->img = $request->file('img')->store('images');
        $accessory->save();

        return redirect()->route('admin.accessories.index')->with('flash_message', 'レコードを作成しました。');
    }

    // 更新ページ
    public function edit($id) {
        $accessory = Accessory::find($id);
        $instruments = Instrument::all();
        return view('admin.accessories.edit', compact('accessory', 'instruments'));
    }

    // 更新機能
    public function update(Request $request, $id) {
        $request->validate([
            'name' => 'required',
            'instrument_id' => 'required',
            'img' => 'image',
        ]);

        $accessory = Accessory::find($id);
        $accessory->name = $request->input('name');
        $accessory->content = $request->input('content');
        $accessory->instrument_id = $request->input('instrument_id');
        $accessory->img =$request->file('img')->store('images');
        $accessory->save();

        return redirect()->route('admin.accessories.index')->with('flash_message', 'レコードを更新しました。');
    }

    // 削除機能
    public function destroy($id) {
        $accessory = Accessory::find($id);
        $accessory->delete();

        return redirect()->route('admin.accessories.index')->with('flash_message', 'レコードを削除しました。');
    }
}
