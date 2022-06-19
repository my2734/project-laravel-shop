<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AdminRequestCategory;
use App\Models\Category;
use Illuminate\Support\Str;
use Carbon\Carbon;


class AdminCategoryController extends AdminController
{
    public function index()
    {
        $categories = Category::paginate(10);
        $data = ['categories' => $categories];
        return view('admin.category.index', $data);
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(AdminRequestCategory $request)
    {

        $data = $request->except('_token');
        $data['c_slug'] = Str::slug($request->c_name, '-');
        $data['created_at']  = Carbon::now();

        $id = Category::insertGetId($data);
        return redirect()->back();
    }

    public function status($id)
    {
        $category = Category::find($id);
        $category->c_status = !$category->c_status;
        $category->save();
        return redirect()->back();
    }

    public function hot($id)
    {
        $category = Category::find($id);
        $category->c_hot = !$category->c_hot;
        $category->save();
        return redirect()->back();
    }

    public function delete($id)
    {
        $category = Category::find($id);
        $category->delete();
        return redirect()->back();
    }

    public function edit($id)
    {
        $category = Category::find($id);
        return view('admin.category.update', ['category' => $category]);
    }


    public function update(AdminRequestcategory $request, $id)
    {
        $category = Category::find($id);
        $category->c_name = $request->c_name;
        $category->updated_at = Carbon::now();
        $category->save();
        return redirect()->back();
    }
}
