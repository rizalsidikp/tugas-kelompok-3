@extends('layout/layout')
@section('layout-style')
@endsection
@section('layout-content')
    <div class="container" style="margin-top: 80px" id="tableinput">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">
                        EDIT SISWA
                    </div>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="card-body">
                        <form action="{{ route('users.update', $user->id) }}" method="POST">
                            @csrf
                            @method('PUT')


                            <div class="form-group mb-2">
                                <label>Nama Lengkap</label>
                                <input type="text" name="name" placeholder="Masukkan Nama" class="form-control"
                                    required="required" value="{{ $user->name }}"
                                    class="@error('name') is-invalid @enderror">
                            </div>

                            <div class="form-group mb-2">
                                <label>Role</label>
                                <input type="text" name="role" placeholder="Role" class="form-control"
                                    required="required" value="{{ $user->role }}"
                                    class="@error('role') is-invalid @enderror">
                            </div>

                            <div class="form-group mb-2">
                                <label>Email</label>
                                <input type="text" name="email" placeholder="email" class="form-control"
                                    required="required" value="{{ $user->email }}"
                                    class="@error('email') is-invalid @enderror">
                            </div>

                            <div class="form-group mb-2">
                                <label>Password</label>
                                <input type="text" name="password" placeholder="password" class="form-control"
                                    required="required" class="@error('password') is-invalid @enderror">
                            </div>

                            <button type="submit" class="btn btn-success">SIMPAN</button>
                            <button type="reset" class="btn btn-warning">RESET</button>
                            <button type="button" class="btn btn-danger" onclick="history.back()">CANCEL</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('layout-scripts')
@endsection
