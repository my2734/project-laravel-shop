<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AdminRequestKeyword;
use Carbon\Carbon;
use App\Models\Keyword;
use Illuminate\Support\Str;

class AdminKeywordController extends Controller
{
    public function index()
    {
        $keywords = Keyword::paginate(10);
        $data = ['keywords' => $keywords];
        return view('admin.keyword.index', $data);
    }

    public function create()
    {
        return view('admin.keyword.create');
    }

    public function store(AdminRequestKeyword $request)
    {
        $data = $request->except('_token');
        $data['created_at'] = Carbon::now();
        $slug = Str::of($request->k_name)->slug('-');
        $data['k_slug'] = $slug;
        $data['k_description'] = $request->k_description;
        $id = Keyword::insertGetId($data);
        return redirect()->back();
    }

    public function delete($id)
    {
        $keyword = Keyword::find($id)->delete();
        return redirect()->back();
    }

    public function hot($id)
    {
        $keyword = Keyword::find($id);
        $keyword->k_hot = !$keyword->k_hot;
        $keyword->save();
        return redirect()->back();
    }

    public function edit($id)
    {
        $keyword = Keyword::find($id);
        return view('admin.keyword.update', ['keyword' => $keyword]);
    }

    public function update(AdminRequestKeyword $request, $id)
    {
        $keyword = Keyword::find($id);
        $keyword->k_name = $request->k_name;
        $keyword->k_description = $request->k_description;
        $keyword->save();
        return redirect()->back();
    }
}
