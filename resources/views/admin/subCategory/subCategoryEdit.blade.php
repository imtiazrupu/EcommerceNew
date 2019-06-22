@extends('admin.master')
@section('pageTitle')
    Admin: SubCategory Edit<br>
    @if(Session::has('message'))
   <p class="alert alert-success">{{Session::get('message')}}</p>
    @endif
@endsection
@section('title')
     SubCategory Edit
@endsection
@section('mainContent')
<div class="panel-body">
    <div class="row">
        <div class="col-lg-6">
        <form role="form" action="{{url('subCategory/update',['id'=>$subCategory->id])}}"name="subCategoryEditForm" method="POST" enctype="multipart/form-data">
            @csrf
               <div class="form-group">
                    <label>Category Name</label>
                    <select class="form-control" name="categoryId">
                        @foreach ($categories as $category)
                    <option value="{{$category->id}}">{{$category->categoryName}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>SubCategory Name</label>
                    <input class="form-control" name="name" value="{{ $subCategory->subCategoryName}}">
                </div>
                <div class="form-group">
                    <label>Short Description</label>
                    <textarea class="form-control" rows="3" name="shortDescription"  placeholder="Enter Short Description">{{ $subCategory->shortDescription}}</textarea>
                </div>
                <div class="form-group">
                    <label>Image</label>
                    <input type="file" name="photo">
                </div>
                <div class="form-group">
                    <label>Publication Status</label>
                    <select class="form-control" name="publicationStatus">
                        <option value="1">Published</option>
                        <option value="0">Unpublished</option>
                    </select>
                </div>
                <input type="submit" class="btn btn-primary" value="Submit">
            </form>
        </div>
        <!-- /.col-lg-6 (nested) -->
        <!-- /.col-lg-6 (nested) -->
        <script>
            document.forms['subCategoryEditForm'].elements['categoryId'].value = '{{ $subCategory->categoryId}}';
            document.forms['subCategoryEditForm'].elements['publicationStatus'].value = '{{$subCategory->publicationStatus}}';
        </script>
    </div>
    <!-- /.row (nested) -->
</div>
@endsection
