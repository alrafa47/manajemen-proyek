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
        @if (Auth::user()->role == 'admin')
        <form action="{{ route('pegawai.store') }}" method="post" accept-charset="utf-8" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputPassword1">Nama</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" name="nama_pegawai">
                    @error('nama_pegawai')
                        <span class="text-danger text-muted">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Jenis Kelamin</label>
                    <select class="form-control" name="jenis_kelamin">
                    <option>--Pilih Jenis Kelamin--</option>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                    </select>
                    @error('jenis_kelamin')
                        <span class="text-danger text-muted">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Alamat</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" name="alamat_pegawai">
                    @error('alamat_pegawai')
                        <span class="text-danger text-muted">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Telepon</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" name="tlp_pegawai">
                    @error('tlp_pegawai')
                        <span class="text-danger text-muted">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Email</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" name="email_pegawai">
                    @error('email_pegawai')
                        <span class="text-danger text-muted">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Jabatan </label>
                    <select class="form-control" name="jabatan">
                        @forelse ($jabatan as $dataJabatan)
                            <option value="{{ $dataJabatan->id }}">{{ $dataJabatan->nama_jabatan }}</option>
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
                    <input type="text" class="form-control" id="exampleInputPassword1" name="kualifikasi">
                    @error('kualifikasi')
                        <span class="text-danger text-muted">{{ $message }}</span>
                    @enderror
                </div>
                    <div class="form-group">
                    <label for="exampleInputPassword1">Username</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" name="username">
                    @error('username')
                        <span class="text-danger text-muted">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" name="password">
                    @error('password')
                        <span class="text-danger text-muted">{{ $message }}</span>
                    @enderror
                </div>
                <input type="submit" name="save" class="btn btn-primary" value="Save">
            </div>
            <!-- /.card-body -->
        </form>
        <hr>
        @endif
        <h3>List Pegawai</h3>
        <table id="example1" class="table table-bordered table-striped responsive">
            <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Telepon</th>
                <th>Jabatan</th>
                <th>Kualifikasi</th>
                @if (Auth::user()->role == 'admin')
                    <th>Action</th>
        @endif

            </tr>
            </thead>
            <tbody>
            @forelse ($pegawai as $row )
                    <tr>
                        <td> {{ $loop->iteration }}</td>

                        <td>{{ $row->nama_pegawai }}</td>
                        <td>{{ $row->tlp_pegawai }}</td>
                        <td>{{ $row->jabatan->nama_jabatan }}</td>
                        <td>{{ $row->kualifikasi }}</td>
                        @if (Auth::user()->role == 'admin')
                            <td>
                                <div class="btn-group">
                                    <div class="d-flex">
                                        <form action={{route('pegawai.destroy', ['id'=>$row->id])}} method="POST">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger">hapus</button>
                                        </form>
                                        <a class="btn btn-warning" href={{route('pegawai.edit', ['id'=>$row->id])}}>ubah
                                        </a>
                                    </div>
                                </div>
                            </td>
        @endif


                    </tr>
            @empty
                    <tr>
                        <td colspan="7"> Data Pegawai Kosong</td>
                    </tr>
            @endforelse
            </tbody>
        </table>
    </div>
  </div>


@endsection
