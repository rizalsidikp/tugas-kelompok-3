@extends('layout/layout')
@section('layout-style')
@endsection
@section('layout-content')
<div class="container">
    @if (session('success'))
    <div class="row justify-center">
        <div class="col-xs-12 col-md-8">
            <div class="alert alert-success alert-dismissible fade show" role="alert" id="myAlert"
                style="display: flex; align-items: center; padding-right: 1rem;">
                {{ session('success') }}
                <button type="button" class="btn btn-close" data-bs-dismiss="alert" aria-label="Close"
                    style="margin-left: auto;" onclick="closeAlert()">
                    <i class="fa fa-times" aria-hidden="true"></i>
                </button>
            </div>
        </div>
    </div>
    @endif
    <h1>List of Users</h1>
    <div class="row justify-center">
        <div class="col-xs-12 col-md-12 text-center">
            <table class="table table-striped" style="margin-bottom: 60px;">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Role</th>
                        @if ($user->role == 'staff')
                        <th>Ttl</th>
                        <th>Alamat</th>
                        <th>Foto KTP</th>
                        @endif
                        <th colspan="2" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($users) < 1) <tr>
                        <td colspan="12" class="text-center">
                            Data not found.
                        </td>
                        </tr>
                        @else
                        @foreach ($users as $index => $data)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $data->name }}</td>
                            <td>{{ $data->role }}</td>
                            @if ($user->role == 'staff')
                            <td>{{ $data->ttl }}</td>
                            <td>{{ $data->alamat }}</td>
                            <td align="center"><img src="{{ asset('storage/images/fotoktp/' . $data->ktp) }}" alt=""
                                    height="100px">
                            </td>
                            @endif
                            <td>
                                <form action="{{ route('users.destroy', $data->id) }}" method="POST">
                                    <a class="btn btn-primary" href="{{ route('users.edit', $data->id) }}">Edit</a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        @endif
                </tbody>
            </table>
            <a href="{{ route('users.create') }}" class="btn btn-primary">+ Add New Data</a>
        </div>
    </div>
</div>
@endsection
@section('layout-scripts')
@endsection