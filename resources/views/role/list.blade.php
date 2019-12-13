@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Role List</h1>
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
                        <div class="card-header">
                            <h3 class="card-title">Showing Role list</h3>
                        </div>
                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <table class="table table-bordered table-hover font-13">
                                <thead>
                                <tr>
                                    <th class="align-top" scope="col">
                                        #
                                    </th>
                                    <th class="align-top" scope="col">
                                        Name
                                    </th>
                                    <th class="align-top" scope="col">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($roles as $role)
                                    <tr>
                                        <th scope="row">{{ $loop->index + 1 }}</th>
                                        <td>{{ $role->name }}</td>
                                        <td>
                                            <a href="{{route('role.edit', $role->id)}}"><i class="fa fa-edit fa-sm"></i></a>
                                            <a href="{{ route('role.delete', $role->id) }}" onclick="return confirm('Are you sure?')"><i class="fa fa-trash text-danger fa-sm ml-1"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection
