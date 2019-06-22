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

    public function manage()
    {
        /*
        $subCategories = \DB::table('sub_categories')
                         ->join('categories','categories.id', '=','categoryId')
                         ->select('sub_categories.*','categories.categoryName as catName')
                         ->get();
        */

       /*
        $subCategories = \DB::table('sub_categories')
                         ->join('categories','sub_categories.categoryId','categories.id')
                         ->get();
        */
        $subCategories = SubCategory::paginate(10);
        return view('admin.subCategory.subcategoryManage')->with('subCategories',$subCategories);
    }

    public function singlesubcategory($id)
    {
        $subCategory = \DB::table('sub_categories')
        ->join('categories','sub_categories.categoryId','categories.id')
        ->where('sub_categories.id',$id)
        ->first();
        return view('admin.subCategory.singleSubCategory')->with('subCategory',$subCategory);
    }
    public function edit($id)
    {
        $subCategory = SubCategory::find($id);
        $categories = Category::where('publicationStatus',1)->get();
        return view('admin.subCategory.subCategoryEdit')
        ->with('subCategory',$subCategory)
        ->with('categories',$categories);
    }
    public function update(Request $request,$id)
    {
        $subCategoryPic = SubCategory::where('id',$id)->first();
        if($pictureInfo = $request->file('photo')){
            if(file_exists($subCategoryPic->image)){
                unlink($subCategoryPic->image);
            }
            $pictureName = $id.$pictureInfo->getClientOriginalName();
            $folder = "img/";
            $pictureInfo->move($folder,$pictureName);
            $picUrl = $folder.$pictureName;
        }else{
            $picUrl = $subCategoryPic->image;
        }
        $subCategory = SubCategory::findOrFail($id);
        $subCategory->categoryId = $request->categoryId;
        $subCategory->subCategoryName = $request->name;
        $subCategory->shortDescription = $request->shortDescription;
        $subCategory->publicationStatus = $request->publicationStatus;
        $subCategory->image = $picUrl;
        $subCategory->save();

        \Session::flash('message','SubCategory Updated Successfully !!');
        return redirect('/subCategory/manage');
    }
}
