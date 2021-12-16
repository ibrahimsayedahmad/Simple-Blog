@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><a href="{{route('dashboard')}}">{{ __('Dashboard') }}</a></div>
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
                        <form action="{{route('saveimport')}}" method="post">
                            {{csrf_field()}}
                            <div class="row">
                                <div class="col-2">
                                    <button type="submit" class="btn btn-primary">Import</button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 ">
                                    <div class="form-group m-2">
                                        <label class="form-label">Source API</label>
                                        <input class="form-control" type="text" name="api">
                                    </div>
                                    <div class="form-group m-2">
                                        <label class="form-label">Add under User:</label>
                                        <select class="form-control" name="userid">
                                            @foreach($users as $user)
                                                <option value="{{$user->id}}">{{$user->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

