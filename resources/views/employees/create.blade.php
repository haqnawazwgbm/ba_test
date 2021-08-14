@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Create Employee') }}</div>

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
                    <form method="POST" action="{{route('store-employee')}}">
                        @csrf
                        <div class="form-group">
                          <label for="first_name">First Name:</label>
                          <input type="text" class="form-control" name="first_name" id="first_name" placeholder="Enter first name">
                        </div>
                        <div class="form-group">
                          <label for="last_name">Last Name:</label>
                          <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Enter last name">
                        </div>
                        <div class="form-group">
                          <label for="last_name">Company:</label>
                          <select name="company_id" class="form-control">
                            @foreach ($companies as $company)
                                <option value="{{$company->id}}">{{$company->name}}</option>
                            @endforeach
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="email">Email:</label>
                          <input type="email" class="form-control" name="email" id="email" placeholder="Enter email">
                        </div>
                        <div class="form-group">
                          <label for="phone">Phone:</label>
                          <input type="text" class="form-control" name="phone" id="phone" placeholder="Enter phone">
                        </div>

                        <button type="submit" class="btn btn-primary">Create</button>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
