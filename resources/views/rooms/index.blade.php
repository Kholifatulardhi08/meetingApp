@extends('layouts.main')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h2 class="h3 mb-0 text-gray-800">Room</h2>
    </div>
    <div class="row">
        <div class="card mx-auto">
            <div>
                @if (session()->has('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                        <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
            </div>
            <div class="card-header">
                <form method="GET" action="{{ route('rooms.index') }}" class="row row-cols-lg-auto g-3 align-items-center">
                    <div class="col-5">
                        <div class="input-group">
                            <input type="search" name="search" class="form-control" id="inlineFormInputGroupUsername"
                                placeholder="Search room">
                        </div>
                    </div>
                    <div class="col-4">
                        <button type="submit" class="btn btn-danger">Search</button>
                    </div>
                    @can('rooms.create', Room::class)
                    <div class="col-2">
                        <a href="{{ route('rooms.create') }}" class="btn btn-danger">Create</a>
                    </div>
                    @endcan
                </form>
            </div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Code</th>
                        <th scope="col">Capacity</th>
                        @can('rooms.create', Room::class)
                        <th scope="col">Management</th>
                        @endcan
                    </tr>
                </thead>
                <tbody>
                    @foreach ($rooms as $rooms)
                        <tr>
                            <td>{{ $rooms->name }}</td>
                            <td>{{ $rooms->code }}</td>
                            <td>{{ $rooms->capacity }}</td>
                            @can('rooms.edit', Room::class)
                            <td>
                                <a href="{{ route('rooms.edit', $rooms->id) }}" class="btn btn-danger">Edit</a>
                            </td>
                            @endcan
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
