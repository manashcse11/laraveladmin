@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Permission Create</h1>
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
                            <form method="POST" action="{{ route('permission.store') }}">
                                @csrf
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input class="form-control {{ $errors->has('name') ? 'is-invalid' : ''}}" type="text" name="name" value="{{ old('name')}}" placeholder="Name">
                                    <small class="text-danger">{{ $errors->first('name') }}</small>
                                </div>
                                <div class="form-group">
                                    <label for="route">Route</label>
                                    <input class="form-control {{ $errors->has('route') ? 'is-invalid' : ''}}" type="text" name="route" value="{{ old('route')}}" placeholder="Route">
                                    <small class="text-danger">{{ $errors->first('route') }}</small>
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
