@extends('dashboard.index')
@section('category')
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-3">
                <div class="bg-dark p-3"><a class="btn btn-outline-success" href="{{ route('item.create') }}"><i
                            class="fas fa-plus"></i></a>
                </div>
                <table class="table text-center rounded p-3">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col" colspan="2">Name</th>
                            <th scope="col" colspan="2">Price</th>
                            <th scope="col" colspan="2">Category Name</th>
                            <th scope="col" colspan="2">Expire Date</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @foreach ($items as $item)
                            <tr>
                                <td scope="row">{{ $i }}</td>
                                <td colspan="2">{{ $item->name }}</td>
                                <td colspan="2">{{ $item->price }}</td>
                                <td colspan="2">{{ $item->id }}</td>
                                <td colspan="2">{{ $item->expire_date }}</td>
                                <td>
                                    <a class="btn btn-outline-primary" href="{{ route('item.show', $item) }}"><i
                                            class="fas fa-info"></i></a>
                                    <a class="btn btn-outline-warning ml-2" href="{{ route('item.edit', $item) }}"><i
                                            class="fas fa-pen"></i></a>
                                    <form class="d-inline-block ml-2" action="{{ route('item.destroy', $item) }}"
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
