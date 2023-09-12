<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // 一覧ページ
    public function index() {
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }

    // 作成ページ
    public function create() {
        return view('admin.categories.create');
    }

    // 作成機能
    public function store(Request $request) {
        $request->validate([
            'name' => 'required',
        ]);

        $category = new Category();
        $category->name = $request->input('name');
        $category->save();

        return redirect()->route('admin.categories.index')->with('flash_message', 'レコードを作成しました。');
    }

    // 更新ページ
    public function edit($id) {
        $category = Category::find($id);
        return view('admin.categories.edit', compact('category'));
    }

    // 更新機能
    public function update(Request $request, $id) {
        $request->validate([
            'name' => 'required',
        ]);
        
        $category = Category::find($id);
        $category->name = $request->input('name');
        $category->save();

        return redirect()->route('admin.categories.index')->with('flash_message', 'レコードを更新しました。');
    }

    // 削除機能
    public function destroy($id) {
        $category = Category::find($id);
        $category->delete();

        return redirect()->route('admin.categories.index')->with('flash_message', 'レコードを削除しました。');
    }
}
