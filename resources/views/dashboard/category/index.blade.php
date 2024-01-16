@extends('dashboard.index')
@section('category')
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-3">
                @if (session('delete'))
                    <div class="alert alert-danger">
                        {{ session('delete') }}
                    </div>
                @endif
                <table class="table text-center rounded p-3">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col" colspan="2">Name</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @foreach ($categories as $category)
                            <tr>
                                <td scope="row">{{ $i }}</td>
                                <td colspan="2">{{ $category->name }}</td>
                                <td>
                                    <a class="btn btn-outline-primary" href="{{ route('category.show', $category) }}"><i
                                            class="fas fa-info"></i></a>
                                    <a class="btn btn-outline-warning ml-2" href="{{ route('category.edit', $category) }}"><i
                                            class="fas fa-pen"></i></a>
                                    <form class="d-inline-block ml-2" action="{{ route('category.destroy', $category) }}"
                                        method="post">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-outline-danger"><i class="fas fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @php
                                $i++;
                            @endphp
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
