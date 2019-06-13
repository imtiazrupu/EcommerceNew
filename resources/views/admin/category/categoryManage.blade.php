@extends('admin.master')
@section('pageTitle')
    Admin: Category Manage
@endsection
@section('title')
    Category Manage<br>
    @if(Session::has('message'))
    <p class="alert alert-success">{{Session::get('message')}}</p>
    @endif
@endsection
@section('mainContent')

    <div class="panel-body">
        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
            <thead>
                <tr>
                    <th>SI(Serial Index)</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Publication Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                <tr class="odd gradeX">
                    <td>Trident</td>
                    <td>{{ $category->categoryName}}</td>
                    <td>{{ $category->shortDescription}}</td>
                    <td class="center">{{ ($category->publicationStatus ==1? 'Published':
                    'Unpublished')}}</td>
                    <td>
                        <!--<a href="{{url('/categoryEdit/'.$category->id)}}" class="btn btn-primary btn-sm">Edit</a> -->
                        <a href="{{url('/categoryEdit',['id'=>$category->id])}}" class="btn btn-primary btn-sm">Edit</a>
                        <a href="{{url('/categoryDelete/'.$category->id)}}" class="btn btn-danger btn-sm">Delete</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
