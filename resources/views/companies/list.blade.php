@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Companies') }}</div>

                <div class="card-body">
                    @if(session()->has('message'))
                        <div class="alert alert-success">
                            {{ session()->get('message') }}
                        </div>
                    @endif
                    <a href="{{route('create-company')}}" class="btn btn-primary">Create new company</a>
                    <br>
                    <br>
                    <div class="table-responsive">
                        <table class="table table-condensed">
                            <thead>
                                <tr>
                                    <th>Logo</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Website</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($companies as $company)
                                <tr>
                                    <td><img src="{{ url('storage/'.$company->logo) }}" height="100" width="100"></td>
                                    <td>{{$company->name}}</td>
                                    <td>{{$company->email}}</td>
                                    <td>{{$company->website}}</td>
                                    <td><a class="btn btn-warning" href="{{ url('/edit-company/'.$company->id) }}">EDIT</a> | <a onclick="delete_element(event)" class="btn btn-danger" href="{{ url('/delete-company/'.$company->id) }}">DELETE</a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $companies->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
