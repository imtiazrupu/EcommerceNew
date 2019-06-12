<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Category;


class CategoryController extends Controller
{
    public function index()
    {
        return view('admin.category.categoryEntry');
    }

    public function save(Request $request)
    {
        $category = new Category;
        $category->categoryName = $request->name;
        $category->shortDescription = $request->shortDescription;
        $category->publicationStatus = $request->publicationStatus;
        $category->save();

        \Session::flash('message','Data Inseted Successfully!!!');
        return redirect()->back();

        /*
        $data = $request->all(['name','shortDescription','publicationStatus']);

        $category = new Category($data);
        $category->save();
        \Session::flash('message','Data Inseted Successfully');
        return redirect()->back();
        */

        /*
        Category::create([
            'categoryName'=> $request->name,
            'shortDescription'=> $request->shortDescription,
            'publicationStatus'=> $request->publicationStatus
        ]);
        \Session::flash('message','Data Inseted Successfully');
        return redirect()->back();
        */
    }

    public function manage()
    {
       /* $categories = Category::select(['id','categoryName','shortDescription','publicationStatus'])

        ->orderBy('id','desc')
        ->get();
        return view('admin.category.categoryManage', compact('categories'));*/

        $category = Category::all();
        return view('admin.category.categoryManage',['categories'=>$category]);
    }
}
