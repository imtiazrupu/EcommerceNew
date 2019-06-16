<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\SubCategory;

class SubCategoryController extends Controller
{
    public function index()
    {
        $category = Category::where('publicationStatus',1)->get();
        return view('admin.subCategory.subCategoryEntry')->with('categories',$category);
    }
    public function save(Request $request)
    {
        $subCategory = new SubCategory;
        $subCategory->categoryId = $request->categoryId;
        $subCategory->subCategoryName = $request->name;
        $subCategory->shortDescription = $request->shortDescription;
        $subCategory->publicationStatus = $request->publicationStatus;
        $subCategory->image = 'photoName';
        $subCategory->save();

        $lastId = $subCategory->id;
        $pictureInfo = $request->file('photo');
        $pictureName = $lastId.$pictureInfo->getClientOriginalName();
        $folder = "img/";
        $pictureInfo->move($folder,$pictureName);
        $picUrl = $folder.$pictureName;
        $subCategoryPic = SubCategory::find($lastId);
        $subCategoryPic->image = $picUrl;
        $subCategoryPic->save();
        \Session::flash('message','SubCategory Inserted Successfully !!');
        return redirect()->back();
    }
}
