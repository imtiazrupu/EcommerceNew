@extends('admin.master')
@section('pageTitle')
    Admin: Category Edit
@endsection
@section('title')
    Category Edit
@endsection
@section('mainContent')
<div class="panel-body">
    <div class="row">
        <div class="col-lg-6">
        <form role="form" name="editForm" action="{{url('categoryUpdate',['id'=>$category->id])}}" method="POST">
            @csrf
                <div class="form-group">
                    <label>Category Name</label>
                    <input class="form-control" name="name" value="{{$category->categoryName}}">
                </div>
                <div class="form-group">
                    <label>Short Description</label>
                    <textarea class="form-control" rows="3"  name="shortDescription" >{{$category->shortDescription}}</textarea>
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
        <script>
        document.forms['editForm'].elements['publicationStatus'].value='{{$category->publicationStatus}}'
        </script>
        <!-- /.col-lg-6 (nested) -->
        <!-- /.col-lg-6 (nested) -->
    </div>
    <!-- /.row (nested) -->
</div>
@endsection