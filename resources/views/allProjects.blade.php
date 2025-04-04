@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col"> 
        <a href="/{{$lang}}/admin/add-project" class="button">
            <span class="plus-icon"></span> Add
        </a>
        <div class="searchBar d-flex align-items-center">
            <input type="text" class="search-input" placeholder="Search..." name=""> 
            <a href="#"><i class="fa-solid fa-magnifying-glass"></i></a> 
        </div>
    </div>
</div>

<table class="table table-no-border-between-columns">
    <thead>
        <tr>
            <th>Title</th>
            <th>Date</th>
            <th>Action</th>
            <th>Id</th>
            <th>Remove</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($portfolio as $i)
        <tr>
            <td>{{ json_decode($i['title'], true)[$lang] ?? 'No title' }}</td>
            <td>{{ $i['when'] }}</td>
            <td>
                <a href="/{{$lang}}/admin/edit-project/{{$i['id']}}" class=" btn btn-primary">
                    <i class="fa-regular fa-pen-to-square"></i>
                </a>
            </td>
            <td>{{ $i['id'] }}</td>
            <td>
                <button type="button" class="btn btn-danger mx-1" onclick="deleteProject('{{$i['id']}}', '{{$lang}}');">
                    <i class="fa-regular fa-trash-can"></i>
                </button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<div class="d-flex justify-content-center">
    {{ $portfolio->links() }}
</div>
@endsection