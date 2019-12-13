@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">User Create</h1>
                </div>
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <form method="POST" action="{{ route('user.store') }}">
                                @csrf
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input class="form-control {{ $errors->has('name') ? 'is-invalid' : ''}}" type="text" name="name" value="{{ old('name')}}" placeholder="Name">
                                    <small class="text-danger">{{ $errors->first('name') }}</small>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input class="form-control {{ $errors->has('email') ? 'is-invalid' : ''}}" type="email" name="email" placeholder="Email " value="{{ old('email')}}">
                                    <small class="text-danger">{{ $errors->first('email') }}</small>
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input class="form-control {{ $errors->has('password') ? 'is-invalid' : ''}}" type="password" name="password" placeholder="Password" value="{{ old('password')}}">
                                    <small class="text-danger">{{ $errors->first('password') }}</small>
                                </div>
                                <div class="form-group">
                                    <label for="password_confirmation">Confirm Password</label>
                                    <input class="form-control {{ $errors->has('password_confirmation') ? 'is-invalid' : ''}}" type="password" name="password_confirmation" placeholder="Confirm password" value="{{ old('password_confirmation')}}">
                                    <small class="text-danger">{{ $errors->first('password_confirmation') }}</small>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-primary">Add</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection
