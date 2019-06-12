@extends('admin.master')
@section('pageTitle')
    Category Manage
@endsection
@section('title')
    Category Manage
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
                    <td class="center">X</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
