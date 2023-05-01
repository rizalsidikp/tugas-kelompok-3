@extends('layout/layout')
@section('layout-style')
@endsection
@section('layout-content')
<div class="container" style="margin-top: 80px" id="tableinput">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">
                    TAMBAH USER
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
                    <form action="{{ route('users.store') }}" method="POST">
                        @csrf

                        <div class="form-group mb-2">
                            <label>Nama Lengkap</label>
                            <input type="text" name="name" placeholder="Masukkan Nama" class="form-control"
                                required="required" value="{{ old('name') }}"
                                class="@error('name') is-invalid @enderror">
                        </div>

                        <div class="form-group mb-2">
                            <label for="role">Role</label>
                            <select id="role" name="role" class="form-control @error('role') is-invalid @enderror"
                                required>
                                <option value="">Pilih Role</option>
                                <option value="staff" {{ old('role')=='staff' ? 'selected' : '' }}>Staff
                                </option>
                                <option value="customer" {{ old('role')=='customer' ? 'selected' : '' }}>
                                    Customer
                                </option>
                            </select>
                            @error('role')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>


                        <div class="form-group mb-2">
                            <label>Email</label>
                            <input type="text" name="email" placeholder="email" class="form-control" required="required"
                                value="{{ old('email') }}" class="@error('email') is-invalid @enderror">
                        </div>

                        <div class="form-group mb-2">
                            <label>Password</label>
                            <input type="password" name="password" placeholder="password" class="form-control"
                                required="required" class="@error('password') is-invalid @enderror">
                        </div>

                        <div class="form-group mb-2">
                            <label>Retype Password</label>
                            <input type="password" name="rtype" placeholder="retype password" class="form-control"
                                required="required" class="@error('rtype') is-invalid @enderror">
                        </div>

                        @if ($user->role == 'staff')
                        <div class="form-group mb-2">
                            <label>Tempat Tanggal Lahir</label>
                            <input type="date" name="ttl" placeholder="ttl" class="form-control" required="required"
                                class="@error('ttl') is-invalid @enderror">
                        </div>

                        <div class="form-group mb-2">
                            <label for="jenis_kelamin">Jenis Kelamin</label>
                            <select id="jenis_kelamin" name="jenis_kelamin"
                                class="form-control @error('role') is-invalid @enderror" required>
                                <option value="">Pilih</option>
                                <option value="laki-laki" {{ old('jenis_kelamin')=='laki-laki' ? 'selected' : '' }}>
                                    Laki-laki
                                </option>
                                <option value="perempuan" {{ old('jenis_kelamin')=='perempuan' ? 'selected' : '' }}>
                                    Perempuan
                                </option>
                            </select>
                            @error('role')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group mb-2">
                            <label>Alamat</label>
                            <input type="text" name="alamat" placeholder="alamat" class="form-control"
                                required="required" class="@error('alamat') is-invalid @enderror">
                        </div>

                        <div class="form-group mb-2">
                            <label>Upload KTP</label>
                            <input type="file" name="ktp" placeholder="ktp" class="form-control" required="required"
                                class="@error('ktp') is-invalid @enderror">
                        </div>
                        @endif


                        <button type="submit" class="btn btn-success">SIMPAN</button>
                        <button type="reset" class="btn btn-warning">RESET</button>
                        <button type="button" class="btn btn-danger" onclick="history.back()">CANCEL</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
@section('layout-scripts')
@endsection