@extends('layouts.admin')

@section('page-title', 'Все проекты')

@section('content')
<div class="bg-white rounded-lg shadow-sm p-6">
    <div class="flex flex-wrap items-center justify-between mb-6">
    <a href="/{{ $lang }}/admin/add-project" class="bg-blue-500 text-white px-4 py-2 rounded inline-flex items-center">
        <span class="mr-2">+</span> Add
    </a>
    <div class="flex items-center border border-gray-300 rounded overflow-hidden">
        <input type="text" class="px-3 py-2 outline-none" placeholder="Search...">
        <a href="#" class="px-3 py-2 bg-gray-200 text-gray-700">
            <i class="fa-solid fa-magnifying-glass"></i>
        </a>
    </div>
</div>

<table class="min-w-full divide-y divide-gray-200">
    <thead class="bg-gray-50">
        <tr>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Title</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Статус</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Сортировка</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Id</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Remove</th>
        </tr>
    </thead>
    <tbody class="bg-white divide-y divide-gray-200">
        @foreach ($portfolio as $i)
            <tr>
                <td class="px-6 py-4 whitespace-nowrap">{{ $i->translation($lang)?->title ?? 'No title' }}</td>
                <td class="px-6 py-4 whitespace-nowrap">{{ $i->when ? $i->when->format('Y-m-d') : '' }}</td>
                <td class="px-6 py-4 whitespace-nowrap">
                    {{ $i->status ? 'Включено' : 'Выключено' }}
                </td>
                <td class="px-6 py-4 whitespace-nowrap">{{ $i->ordering }}</td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <a href="/{{ $lang }}/admin/edit-project/{{ $i->id }}" class="bg-blue-500 text-white px-2 py-1 rounded inline-flex items-center">
                        <i class="fa-regular fa-pen-to-square"></i>
                    </a>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">{{ $i->id }}</td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <!-- Delete form -->
                    <form method="POST" action="/{{ $lang }}/admin/destroy/{{ $i->id }}" onsubmit="return confirm('Are you sure you want to delete this project?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded inline-flex items-center">
                            <i class="fa-regular fa-trash-can"></i>
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<!-- Pagination -->
<div class="mt-6">
    {{ $portfolio->links() }}
</div>
</div>
@endsection
