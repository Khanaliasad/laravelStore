<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class AdminCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');

    }

    public function index()
    {

        $allCategories = Category::all()->toArray();
        return view('pages.admin.category', compact('allCategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $name = $request->get('name');
        $description = $request->get('description');

        $catData = compact("name","description");
        Category::create($catData);
        return redirect(route('admin.category'))->with('success', 'Category successfully created');

        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category, Request $request, $id)
    {
        $data = Category::where("id", $id)->first();
        if (is_null($data)) {
            abort(404);
        }
        $show = $request->input('show');
        return view('pages.admin.categoryEdit',['data'=>$data->toArray() ,'id'=>$id]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category, $id)
    {
        $name = $request->get('name');
        $description = $request->get('description');

        $catData = compact("name","description");
        $data = Category::where("id", $id)->first();
        if (is_null($data)) {
//            Category::create($catData);
            dd('fuck');
            return redirect(route('admin.category'))->with('error', 'Error updating category');
        }
        Category::where("id", $id)->update($catData);
        return redirect(route('admin.category'))->with('success', 'category updated successfully');

    }
    public function delete()
    {

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category,$id)
    {
        //
        $res = Category::destroy($id);
        if ($res) {
            return  redirect(route('admin.category'))->with('success', 'category Deleted successfully');
        } else {
            return  redirect(route('admin.category'))->with('error', 'error while Deleting Category');
        }
    }
}
