@extends('layout.index')

@section('content')


<div class="card">
    <div class="card-header">
      Pegawai
    </div>
    <div class="card-body">
        @if (session('pesan'))
            <div class="alert alert-{{ session('pesan')->status}} ">
                {{ session('pesan')->message }}
            </div>
        @endif
        <form action="{{ route('pegawai.update', ['id'=>$pegawai -> id]) }}" method="post" accept-charset="utf-8" enctype="multipart/form-data">
            @csrf
            @method ('put')
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputPassword1">Nama</label>
                    <input type="text" class="form-control" id="exampleInputPassword1"
                    value = "{{ old('nama_pegawai', $pegawai->nama_pegawai)}} " name="nama_pegawai">
                    @error('nama_pegawai')
                        <span class="text-danger text-muted">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Jenis Kelamin</label>
                    <select class="form-control" name="jenis_kelamin">
                    <option >--Pilih Jenis Kelamin--</option>
                    <option {{ $pegawai->jenis_kelamin == 'Laki-laki' ? 'selected' : ''}} value="Laki-laki">Laki-laki</option>
                    <option {{ $pegawai->jenis_kelamin == 'Perempuan' ? 'selected' : ''}} value="Perempuan">Perempuan</option>
                    </select>
                    @error('jenis_kelamin')
                        <span class="text-danger text-muted">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Alamat</label>
                    <input type="text" class="form-control" value = "{{ old('alamat_pegawai', $pegawai->alamat_pegawai)}} id="exampleInputPassword1" name="alamat_pegawai">
                    @error('alamat_pegawai')
                        <span class="text-danger text-muted">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Telepon</label>
                    <input type="text" class="form-control" value = "{{ old('tlp_pegawai', $pegawai->tlp_pegawai)}} id="exampleInputPassword1" name="tlp_pegawai">
                    @error('tlp_pegawai')
                        <span class="text-danger text-muted">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Email</label>
                    <input type="text" class="form-control" value = "{{ old('email_pegawai', $pegawai->user->email)}} id="exampleInputPassword1" name="email_pegawai">
                    @error('email_pegawai')
                        <span class="text-danger text-muted">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Jabatan </label>
                    <select class="form-control" name="jabatan">
                        @forelse ($jabatan as $dataJabatan)
                            <option value="{{ $dataJabatan->id }}"
                            {{ $pegawai->jabatan_id == $dataJabatan->id ? 'selected' : ''}}>
                            {{ $dataJabatan->nama_jabatan }}</option>
                        @empty
                            <option value="">Data Kosong</option>
                        @endforelse
                    </select>
                    @error('jabatan')
                        <span class="text-danger text-muted">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Kualifikasi</label>
                    <input type="text" class="form-control" value = "{{ old('kualifikasi', $pegawai->kualifikasi)}} id="exampleInputPassword1" name="kualifikasi">
                    @error('kualifikasi')
                        <span class="text-danger text-muted">{{ $message }}</span>
                    @enderror
                </div>
                    <div class="form-group">
                    <label for="exampleInputPassword1">Username</label>
                    <input type="text" class="form-control" value = "{{ old('username', $pegawai->user->name)}} id="exampleInputPassword1" name="username">
                    @error('username')
                        <span class="text-danger text-muted">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control"  id="exampleInputPassword1" name="password">
                    @error('password')
                        <span class="text-danger text-muted">{{ $message }}</span>
                    @enderror
                </div>
                <input type="submit" name="save" class="btn btn-primary" value="Save">
            </div>
            <!-- /.card-body -->
        </form>

    </div>
  </div>


@endsection
