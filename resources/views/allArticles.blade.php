@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col">
            <a href="/{{$lang}}/admin/add-article" class="button">
                <span class="plus-icon"></span> Add
            </a>
        </div>
    </div>
    <table class="table table-no-border-between-columns">
        <thead>
            <tr>
                <th>Title</th>
                <th>Action</th>
                <th>Id</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($blog as $i)
                <tr>
                    <td class="mb-2">{{$i['title_tm']}}</td>
                    <td class="d-flex">
                        <a href="/{{$lang}}/admin/edit-article/{{$i['id']}}" class=" btn btn-primary mx-1">
                            <i class="fa-regular fa-pen-to-square"></i>
                        </a>
                        <form action="{{ route('articles.destroy', ['lang' => $lang, 'id' => $i['id']]) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE') 
                            <button type="submit" class="btn btn-danger mx-1" onclick="return confirm('Are you sure you want to delete this article?');">
                                <i class="fa-regular fa-trash-can"></i>
                            </button>
                        </form>
                    </td>
                    <td>{{$i['id']}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div class="d-flex justify-content-center">
    {{$blog->links()}}
</div>
@endsection
