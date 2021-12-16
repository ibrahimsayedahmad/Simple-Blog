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
                        <form action="{{route('store')}}" method="post">
                            {{csrf_field()}}
                            <div class="row">
                                <div class="col-2">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 ">
                                    <div class="form-group m-2">
                                        <label class="form-label">Title</label>
                                        <input class="form-control" type="text" name="title">
                                    </div>
                                    <div class="form-group m-2">
                                        <label class="form-label">Description</label>
                                        <textarea id="editor" class="bi-textarea" cols="99%" name="description"></textarea>
                                    </div>
                                    <div class="form-group m-2">
                                        <label class="form-label">Publication Date</label>
                                        <input class="form-control" type="date" name="publicationdate">
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
@section('scripts')
    <script>
        $(document).ready(function(){
            tinymce.init({
                selector:'#editor'
            });
        });
    </script>
@endsection
