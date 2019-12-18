@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Permission List</h1>
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
                            <h3 class="card-title">Showing Permission list</h3>
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
                                    <th class="align-top" scope="col">
                                        Route
                                    </th>
                                    <th class="align-top" scope="col">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($permissions as $key => $permission)
                                    <tr>
                                        <th scope="row">{{ $permissions->firstItem() + $key }}</th>
                                        <td>{{ $permission->name }}</td>
                                        <td>{{ $permission->route }}</td>
                                        <td>
                                            <a href="{{route('permission.edit', $permission->id)}}"><i class="fa fa-edit fa-sm"></i></a>
                                            <a href="{{ route('permission.delete', $permission->id) }}" onclick="return confirm('Are you sure?')"><i class="fa fa-trash text-danger fa-sm ml-1"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        {{ $permissions->links() }}
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection
