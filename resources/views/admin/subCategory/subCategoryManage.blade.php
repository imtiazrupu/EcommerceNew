@extends('admin.master')
@section('pageTitle')
    Admin: SubCategory Manage
@endsection
@section('title')
    SubCategory Manage<br>
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
                    <th>Category Name</th>
                    <th>Description</th>
                    <th>Photo</th>
                    <th>Publication Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody><?php $i = 0; ?>
                @foreach ($subCategories as $subCategory)
                <tr class="odd gradeX">
                    <td>{{ ++$i }}</td>
                    <td>{{ $subCategory->subCategoryName}}</td>
                    <td>{{ $subCategory->category->categoryName}}</td>
                    <td>{{ $subCategory->shortDescription}}</td>
                    <td><img width="80px" src="{{url($subCategory->image)}}"></td>
                    <td class="center">{{ ($subCategory->publicationStatus ==1? 'Published':
                    'Unpublished')}}</td>
                    <td>
                        <a href ="{{url('/subCategory/view/'.$subCategory->id)}}" class="btn btn-info btn-sm">View</a>
                        <a href="{{url('/subCategory/edit',['id'=>$subCategory->id])}}" class="btn btn-primary btn-sm">Edit</a>
                        <a href="{{url('/subCategory/delete/'.$subCategory->id)}}" 
                        onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-danger btn-sm">Delete</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $subCategories->links()}}

    </div>
@endsection
