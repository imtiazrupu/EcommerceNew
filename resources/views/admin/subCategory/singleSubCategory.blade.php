@extends('admin.master')
@section('pageTitle')
    Admin: Single SubCategory
@endsection
@section('title')
    Single SubCategory Details
@endsection
@section('mainContent')
<img width="300" src="{{ asset($subCategory->image)}}"><br>
<h3>Name:</h3> {{$subCategory->subCategoryName}}<br>
<h3>Description:</h3> {{$subCategory->shortDescription}}<br>
<h3>Category Name:</h3> {{$subCategory->categoryName}}<br>
<h3>Publication Status:</h3>{{($subCategory->publicationStatus==1)? "Published": "Unpublished"}}<br>
@endsection
