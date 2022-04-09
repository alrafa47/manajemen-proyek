@extends('layout.index')

@section('content')


<div class="card">
    <div class="card-header">
      Tugas
    </div>
    <div class="card-body">
        @if (session('pesan'))
            <div class="alert alert-{{ session('pesan')->status}} ">
                {{ session('pesan')->message }}
            </div>
        @endif
        <form action="{{ route('tugas.store') }}" method="post" accept-charset="utf-8" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputPassword1">Id</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" name="id_tugas">
                    @error('id_tugas')
                        <span class="text-danger text-muted">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Bidang Keahlian </label>
                    <select class="form-control" name="bidangkeahlian">
                        @forelse ($bidangkeahlian as $dataBidangkeahlian)
                            <option value="{{ $dataBidangkeahlian->id }}">{{ $dataBidangkeahlian->nama_bk }}</option>
                        @empty
                            <option value="">Data Kosong</option>
                        @endforelse
                    </select>
                    @error('bidangkeahlian')
                        <span class="text-danger text-muted">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Nama Pegawai</label>
                    <select class="form-control" name="pegawai">
                        @forelse ($pegawai as $dataPegawai)
                            <option value="{{ $dataPegawai->id }}">{{ $dataPegawai->nama_pegawai }}</option>
                        @empty
                            <option value="">Data Kosong</option>
                        @endforelse
                    </select>
                    @error('pegawai')
                        <span class="text-danger text-muted">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Nama Proyek</label>
                    <select class="form-control" name="proyek">
                        @forelse ($proyek as $dataProyek)
                            <option value="{{ $dataProyek->id }}">{{ $dataProyek->nama_proyek }}</option>
                        @empty
                            <option value="">Data Kosong</option>
                        @endforelse
                    </select>
                    @error('proyek')
                        <span class="text-danger text-muted">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Tanggal Mulai</label>
                    <input type="date" class="form-control" id="exampleInputPassword1" name="tgl_mulai">
                    @error('tgl_mulai')
                        <span class="text-danger text-muted">{{ $message }}</span>
                    @enderror
                </div>
                    <div class="form-group">
                    <label for="exampleInputPassword1">Tanggal Selesai</label>
                    <input type="date" class="form-control" id="exampleInputPassword1" name="tgl_selesai">
                    @error('tgl_selesai')
                        <span class="text-danger text-muted">{{ $message }}</span>
                    @enderror
                </div>

                <input type="submit" name="save" class="btn btn-primary" value="Save">
            </div>
            <!-- /.card-body -->
        </form>
        <hr>
        <h3>List Tugas</h3>
        <table id="example1" class="table table-bordered table-striped responsive">
            <thead>
            <tr>
                <th>No</th>
                <th>Id</th>
                <th>Bidang Keahlian</th>
                <th>Nama Pegawai</th>
                <th>Nama Proyek</th>
                <th>Tanggal Mulai</th>
                <th>Tanggal Selesai</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @forelse ($tugas as $row )
                    <tr>
                        <td> {{ $loop->iteration }}</td>
                        <td>{{$row->id}}</td>
                        <td>{{ $row->bidangkeahlian->nama_bk }}</td>
                        <td>{{ $row->pegawai->nama_pegawai }}</td>
                        <td>{{ $row->proyek->nama_proyek }}</td>
                        <td>{{ $row->tgl_mulai }}</td>
                        <td>{{ $row->tgl_selesai }}</td>

                        <td>{{ $row->kualifikasi }}</td>

                        <td>
                            <div class="btn-group">
                                <div class="d-flex">
                                    <form action={{route('tugas.destroy', ['id'=>$row->id])}} method="POST">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger">hapus</button>
                                    </form>
                                    <a class="btn btn-warning" href={{route('tugas.edit', ['id'=>$row->id])}}>ubah
                                    </a>
                                </div>
                            </div>
                        </td>
                    </tr>
            @empty
                    <tr>
                        <td colspan="7"> Data Tugas Kosong</td>
                    </tr>
            @endforelse
            </tbody>
        </table>
    </div>
  </div>


@endsection
