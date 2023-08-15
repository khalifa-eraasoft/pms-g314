<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = DB::table("categories")
            ->get();
        return view("categories", compact("categories"));
    }


    public function show($id)
    {
        $category = DB::table("categories")->where("id", $id)
            ->first();
        if ($category) {
            return view("single-category", compact("category"));
        }
        abort(404);
    }

    public function create()
    {
        return view("create");
    }

    public function store(Request $request)
    {
        $validation = $request->validate([
            'name' => ['required', 'string', 'min:3', 'max:50', 'unique:categories,name']
        ]);
        DB::table("categories")->insert([
            'name' => $validation['name']
        ]);
        return back()
            ->with("success", "category created successfully");
    }

    public function edit($id)
    {
        $category = DB::table("categories")
            ->where('id', $id)
            ->first();
        if ($category) {
            return view("edit", compact("category"));
        }
        abort(404);
    }

    public function update(Request $request, $id)
    {
        $validation = $request->validate([
            'name' => ['required', 'string', 'min:3', 'max:50', 'unique:categories,name,' . $id]
        ]);
        DB::table('categories')
            ->where('id', $id)
            ->update([
                'name' => $validation['name'],
            ]);
        return back()
            ->with("success", "category updated successfully");
    }

    public function delete($id)
    {
        $category = DB::table("categories")->where('id', $id)
            ->first();
        if (!$category) {
            abort(404);
        }
        DB::table("categories")->where('id', $id)
            ->delete();
        return back()
            ->with("success", "category deleted successfully");
    }
}
