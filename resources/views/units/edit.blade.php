@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        {{ __('Update Room') }}
                        <a href="{{ route('units.index') }}" class="float-right">Back</a>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('units.update', $units->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row mb-3">
                                <label for="name"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>
                                <div class="col-md-6">
                                    <input type="text" name="name" value="{{ $units->name }}" class="form-control">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="code"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Code') }}</label>
                                <div class="col-md-6">
                                    <input type="text" name="code" value="{{ $units->code }}" class="form-control">
                                </div>
                            </div>
                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-danger">{{ __('Update') }}</button>
                                </div>
                            </div>
                        </form>
                        <form method="POST" action="{{ route('units.destroy', $units->id) }}">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
