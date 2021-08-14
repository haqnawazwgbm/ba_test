@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Create Company') }}</div>

                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    
                    <form method="POST" action="{{route('store-company')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                          <label for="name">Name:</label>
                          <input type="text" class="form-control" name="name" id="name" placeholder="Enter name">
                        </div>
                        <div class="form-group">
                          <label for="email">Email:</label>
                          <input type="email" class="form-control" name="email" id="email" placeholder="Enter email">
                        </div>
                        <div class="form-group">
                          <label for="website">Website:</label>
                          <input type="text" class="form-control" name="website" id="website" placeholder="Enter website">
                        </div>
                        <div class="form-group">
                          <label for="website">Logo:</label>
                          <input type="file" class="form-control" name="logo" id="logo">
                          <span>Minimum size (100*100)</span>
                        </div>
                        <button type="submit" class="btn btn-primary">Create</button>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
