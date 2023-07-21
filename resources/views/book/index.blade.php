@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3>Book</h3>
            </div>
            <div class="card-body">
                <a @can('create-book') href="{{ route('book.create') }}" @endcan
                    class="btn btn-success mb-3 @if(!auth()->user()->can('create-book')) disabled @endif">
                    CREATE
                </a>
                <x-alert/>
                <table class="table table-striped table-bordered">
                    <thead>
                        <th>No</th>
                        <th>Cover</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Year</th>
                        <th>Quantity</th>
                        <th>Category</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @forelse ($books as $key => $book)
                            <tr>
                                <td>{{ $books->firstItem() + $key }}</td>
                                <td style="width: 200px">
                                    <img src="{{ $book->cover_url }}"
                                        class="img-fluid"
                                        alt="img-cover"/>
                                </td>
                                <td>{{ $book->title }}</td>
                                <td>{{ $book->description }}</td>
                                <td>{{ $book->year }}</td>
                                <td>{{ $book->quantity }}</td>
                                <td>
                                    <ul>
                                        @foreach($book->categories as $key => $category)
                                        <li>{{ $category->name }} / {{ $category->pivot->updated_at }}</li>
                                        @endforeach
                                    </ul>
                                </td>
                                <td class="d-flex">
                                    <a href="{{ route('book.edit', $book->id) }}"
                                        class="btn btn-warning me-3">EDIT</a>
                                    <x-button.delete :action="route('book.destroy', $book->id)" />
                                </td>
                            </tr>
                        @empty
                        {{-- JIKA TIDAK ADA BOOK SAMA SEKALI --}}
                            <tr>
                                <td colspan="5" class="text-center">Book is Empty</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                {{ $books->links() }}
            </div>
        </div>
    </div>
@endsection
