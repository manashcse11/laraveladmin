@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">User Update</h1>
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
                            <form method="POST" action="{{ route('user.update', $id) }}">
                                @method('PUT')
                                @csrf
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input class="form-control {{ $errors->has('name') ? 'is-invalid' : ''}}" type="text" name="name" value="{{ old('name', $name)}}" placeholder="Name">
                                    <small class="text-danger">{{ $errors->first('name') }}</small>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input class="form-control {{ $errors->has('email') ? 'is-invalid' : ''}}" type="email" name="email" placeholder="Email " value="{{ old('email', $email)}}">
                                    <small class="text-danger">{{ $errors->first('email') }}</small>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-primary">Update</button>
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
