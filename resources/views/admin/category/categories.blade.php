@extends("layouts.admin.main")
@section('content')

<div class="content">
    @include('layouts.admin.header')

    <div class="container-fluid pt-4 px-4">
                <div class="bg-secondary text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Categoriess List</h6>
                        <a href="{{ route('category.create') }}" class="btn btn-primary m-2">Add New Category</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0">
                            <thead>
                                <tr class="text-white">
                                    <!-- <th scope="col"><input class="form-check-input" type="checkbox"></th> -->
                                    <th scope="col">Category Name</th>
                                    <th scope="col">Details</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($category as $data)
                                <tr>
                                    <!-- <td><input class="form-check-input" type="checkbox"></td> -->
                                    <td>{{ $data['name'] }}</td>
                                    <td>{!! $data['details'] !!}</td>
                                    <td>{{ $data['status']==1? "Active":"In-Active" }}</td>
                                    <td>
                                        <div class="dropdown show">
                                            <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Action
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                <a class="dropdown-item" href="{{ route('category.show', $data['id']) }}">View</a>
                                                <a class="dropdown-item" href="{{ route('category.edit', $data['id']) }}">Edit</a>
                                                <a class="dropdown-item" href="{{ route('category.destroy', $data['id']) }}">Delete</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

    @include('layouts.admin.footer')
</div>

@endsection