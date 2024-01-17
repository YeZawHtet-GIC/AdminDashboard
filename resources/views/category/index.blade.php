@extends('dashboard.index')
@section('category')
    <div class="container">
        <div class="row">
            <div class="col-md-12 p-5 bg-dark rounded">
                <div class="h3 text-center">Category List</div>
                @if (session('update'))
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>{{ session('update') }}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                @if (session('delete'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>{{ session('delete') }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif
                <div class="d-flex justify-content-end">{{ $categories->links() }}</div>
                <table class="table table-dark table-borderd table-striped rounded p-3">
                    <thead class="h5">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col" colspan="2">Name</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                            <tr>
                                <td scope="row">{{ $loop->iteration }}</td>
                                <td colspan="2">{{ $category->name }}</td>
                                <td>
                                    <a class="btn btn-outline-primary" href="{{ route('category.show', $category) }}"><i
                                            class="fas fa-info"></i></a>
                                    <a class="btn btn-outline-warning ml-1"
                                        href="{{ route('category.edit', $category) }}"><i class="fas fa-pen"></i></a>
                                    @if (!$category->item()->exists())
                                        <form class="d-inline-block ml-1"
                                            action="{{ route('category.destroy', $category) }}" method="post" onsubmit="return confirm('Are you sure you want to delete this category?');">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-outline-danger"><i class="fas fa-trash"></i></button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
