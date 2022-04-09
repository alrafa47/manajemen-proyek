@extends('layout.index')

@section('content')


<div class="card">
    <div class="card-header">
      Proyek
    </div>
    <div class="card-body">
        @if (session('pesan'))
            <div class="alert alert-{{ session('pesan')->status}} ">
                {{ session('pesan')->message }}
            </div>
        @endif
        <form action="{{ route('proyek.store') }}" method="post" accept-charset="utf-8" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputPassword1">Id</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" name="id_proyek">
                    @error('id_proyek')
                        <span class="text-danger text-muted">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Nama Proyek</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" name="nama_proyek">
                    @error('nama_proyek')
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
                <div class="form-group">
                    <label for="exampleInputPassword1">SPK</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" name="spk">
                    @error('spk')
                        <span class="text-danger text-muted">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">BAST</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" name="bast">
                    @error('bast')
                        <span class="text-danger text-muted">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Kontrak Kerja</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" name="kontrak_kerja">
                    @error('kontrak_kerja')
                        <span class="text-danger text-muted">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Nama Klien</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" name="nama_klien">
                    @error('nama_klien')
                        <span class="text-danger text-muted">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Telepon Klien</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" name="tlp_klien">
                    @error('tlp_klien')
                        <span class="text-danger text-muted">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Alamat Klien</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" name="alamat_klien">
                    @error('alamat_klien')
                        <span class="text-danger text-muted">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Nama Leader </label>
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
                    <label for="exampleInputPassword1">Laporan Pendahuluan</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" name="lap_pendahuluan">
                    @error('lap_pendahuluan')
                        <span class="text-danger text-muted">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Laporan Akhir</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" name="lap_akhir">
                    @error('lap_akhir')
                        <span class="text-danger text-muted">{{ $message }}</span>
                    @enderror
                </div>


                <input type="submit" name="save" class="btn btn-primary" value="Save">
            </div>
            <!-- /.card-body -->
        </form>
        <hr>
        <h3>List Proyek</h3>
        <table id="example1" class="table table-bordered table-striped responsive">
            <thead>
            <tr>
                <th>No</th>
                <th>Id Proyek</th>
                <th>Nama Proyek</th>
                <th>Tanggal Mulai</th>
                <th>Tanggal Selesai</th>
                <th>SPK</th>
                <th>BAST</th>
                <th>Kontrak Kerja</th>
                <th>Nama Klien</th>
                <th>Telepon Klien</th>
                <th>Alamat Klien</th>
                <th>Nama Leader</th>
                <th>Laporan Pendahuluan</th>
                <th>laporan Akhir</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @forelse ($proyek as $row )
                    <tr>
                        <td> {{ $loop->iteration }}</td>
                        <td>{{$row->id}}</td>
                        <td>{{ $row->nama_proyek }}</td>
                        <td>{{ $row->tgl_mulai }}</td>
                        <td>{{ $row->tgl_selesai }}</td>
                        <td>{{ $row->spk }}</td>
                        <td>{{ $row->bast }}</td>
                        <td>{{ $row->kontak_kerja }}</td>
                        <td>{{ $row->nama_klien }}</td>
                        <td>{{ $row->tlp_klien }}</td>
                        <td>{{ $row->alamat_klien }}</td>
                        <td>{{ $row->pegawai->nama_pegawai }}</td>
                        <td>{{ $row->lap_pendahuluan }}</td>
                        <td>{{ $row->lap_akhir }}</td>

                        <td>
                            <div class="btn-group">
                                <div class="d-flex">
                                    <form action={{route('proyek.destroy', ['id'=>$row->id])}} method="POST">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger">hapus</button>
                                    </form>
                                    <a class="btn btn-warning" href={{route('proyek.edit', ['id'=>$row->id])}}>ubah
                                    </a>
                                </div>
                            </div>
                        </td>
                    </tr>
            @empty
                    <tr>
                        <td colspan="7"> Data Proyek Kosong</td>
                    </tr>
            @endforelse
            </tbody>
        </table>
    </div>
  </div>


@endsection