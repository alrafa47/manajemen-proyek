@extends('layout.index')

@section('content')


    <div class="card">
        <div class="card-header">
            Daftar Tugas Proyek : {{ $proyek->nama_proyek }}
        </div>
        <div class="card-body">
            @if (session('pesan'))
                <div class="alert alert-{{ session('pesan')->status }} ">
                    {{ session('pesan')->message }}
                </div>
            @endif
            @if (Auth::user()->role == 'pegawai')
                <form action="{{ route('tugas.store', ['proyek_id' => $proyek->id]) }}" method="post" accept-charset="utf-8"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Bidang Keahlian </label>
                            <select class="form-control" name="bidangkeahlian">
                                @forelse ($bidangkeahlian as $dataBidangkeahlian)
                                    <option value="{{ $dataBidangkeahlian->id }}">{{ $dataBidangkeahlian->nama_bk }}
                                    </option>
                                @empty
                                    <option value="">Data Kosong</option>
                                @endforelse
                            </select>
                            @error('bidangkeahlian')
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
            @endif
            <h3>List Tugas</h3>
            @forelse ($tugas as $row)
                <div class="card card-success collapsed-card">
                    <div class="card-header">
                        <h3 class="card-title">{{ $row->bidangkeahlian->nama_bk }}</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool btn-default" data-card-widget="collapse"><i
                                    class="fas fa-plus"></i>
                            </button>
                        </div>
                        <!-- /.card-tools -->
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body" style="display: none;">
                        <h6>Tanggal Mulai : {{ $row->tgl_mulai }}</h6>
                        <h6>Tanggal Selesai : {{ $row->tgl_selesai }}</h6>
                        <a class="btn btn-default" href="{{ route('penugasan.create', ['tugas_id' => $row->id]) }}">Tambah
                            Tugas</a>
                        </br>
                        <table id="example1" class="table table-bordered table-striped responsive">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Pegawai</th>
                                    <th>Tugas</th>
                                    <th>Deskripsi</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($row->Penugasan as $dataPenugasan)
                                    <tr>
                                        <td> {{ $loop->iteration }}</td>
                                        <td>{{ $dataPenugasan->pegawai->nama_pegawai }}</td>
                                        <td>{{ $dataPenugasan->judul_tugas }}</td>
                                        <td>{{ $dataPenugasan->deskripsi_tugas }}</td>

                                        <td>
                                            <div class="btn-group">
                                                <div class="d-flex">
                                                    <form
                                                        action={{ route('penugasan.destroy', ['id' => $dataPenugasan->id]) }}
                                                        method="POST">
                                                        @csrf
                                                        @method('delete')
                                                        <button class="btn btn-danger">hapus</button>
                                                    </form>
                                                    <a class="btn btn-warning"
                                                        href={{ route('penugasan.edit', ['id' => $dataPenugasan->id]) }}>ubah
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7"> Data Penugasan Kosong</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <hr>
            @empty
                <div class="card-body">
                    <div class="alert alert-danger">
                        Data Kosong
                    </div>
                </div>
            @endforelse


        </div>
    </div>


@endsection
