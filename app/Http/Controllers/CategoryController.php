<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function redirect;

class CategoryController extends Controller
{
    public function index()
    {
//        $categoriesDB = DB::table("categories")
//            ->get();
//        $categoriesALL = Category::all();
        $categories = Category::get();

//        dd($categoriesALL,$categories);

        return view("categories", compact("categories"));
    }


    public function create()
    {
        return view("create");
    }

    public function store(Request $request)
    {
//        dd($request->all());
        $request->validate([
            'name' => ['required', 'string', 'min:3', 'max:50', 'unique:categories,name'],

        ]);
//        DB::table("categories")->insert([
//            'name' => $validation['name']
//        ]);

//        $catgory = new Category();
//        $catgory->name = $request->name;
//        $catgory->save();


        Category::create(
            [
                'name' => $request->name,
            ]
        );


        return redirect()->route("categories.index")
            ->with("success", "category created successfully");
    }

    public function edit($id)
    {
//        $category = DB::table("categories")
//            ->where('id', $id)
//            ->first();
        $category = Category::findOrfail($id);
        return view("edit", compact("category"));
    }

    public function update(Request $request, $id)
    {
        $validation = $request->validate([
            'name' => ['required', 'string', 'min:3', 'max:50', 'unique:categories,name,' . $id]
        ]);
//        DB::table('categories')
//            ->where('id', $id)
//            ->update([
//                'name' => $validation['name'],
//            ]);
        $category = Category::findOrfail($id);
        $category->update(
            $request->all()
        );

        return redirect()->route('categories.index')
            ->with("success", "category updated successfully");
    }

        public function show(Category $category)
    {
//        $category = DB::table("categories")->where("id", $id)
//            ->first();
//        if ($category) {
//        }
//        abort(404);
//        $category = Category::findOrfail($id);
        return view("single-category", compact('category'));
    }

    public function delete($id)
    {
//        $category = DB::table("categories")->where('id', $id)
//            ->first();
//        if (!$category) {
//            abort(404);
//        }
//        DB::table("categories")->where('id', $id)
//            ->delete();
        $category = Category::findOrfail($id);
        $category->delete();
        return back()
            ->with("success", "category deleted successfully");
    }
}
