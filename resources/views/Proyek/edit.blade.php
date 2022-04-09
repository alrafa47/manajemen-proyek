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
        <form action="{{ route('proyek.update', ['id'=>$proyek -> id]) }}" method="post" accept-charset="utf-8" enctype="multipart/form-data">
            @csrf
            @method ('put')
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputPassword1">Nama Proyek</label>
                    <input type="text" class="form-control" id="exampleInputPassword1"  value = "{{ old('nama_proyek', $proyek->nama_proyek)}} " name="nama_proyek">
                    @error('nama_proyek')
                        <span class="text-danger text-muted">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Tanggal Mulai</label>
                    <input type="date" class="form-control" id="exampleInputPassword1" value = "{{ old('tgl_mulai', $proyek->tgl_mulai)}} " name="tgl_mulai">
                    @error('tgl_mulai')
                        <span class="text-danger text-muted">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Tanggal Selesai</label>
                    <input type="date" class="form-control" id="exampleInputPassword1" value = "{{ old('tgl_selesai', $proyek->tgl_selesai)}} " name="tgl_selesai">
                    @error('tgl_selesai')
                        <span class="text-danger text-muted">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">SPK</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" value = "{{ old('spk', $proyek->spk)}} "name="spk">
                    @error('spk')
                        <span class="text-danger text-muted">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">BAST</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" value = "{{ old('bast', $proyek->bast)}} "name="bast">
                    @error('bast')
                        <span class="text-danger text-muted">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Kontrak Kerja</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" value = "{{ old('kontrak_kerja', $proyek->kontrak_kerja)}} "name="kontrak_kerja">
                    @error('kontrak_kerja')
                        <span class="text-danger text-muted">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Nama Klien</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" value = "{{ old('nama_klien', $proyek->nama_klien)}} "name="nama_klien">
                    @error('nama_klien')
                        <span class="text-danger text-muted">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Telepon Klien</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" value = "{{ old('tlp_klien', $proyek->tlp_klien)}} "name="tlp_klien">
                    @error('tlp_klien')
                        <span class="text-danger text-muted">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Alamat Klien</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" value = "{{ old('alamat_klien', $proyek->alamat_klien)}} "name="alamat_klien">
                    @error('alamat_klien')
                        <span class="text-danger text-muted">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Nama Leader </label>
                    <select class="form-control" name="pegawai">
                        @forelse ($pegawai as $dataPegawai)
                            <option value="{{ $dataPegawai->id }}"
                            {{ $proyek->pegawai_id == $dataPegawai->id ? 'selected' : ''}}>
                            {{ $dataPegawai->nama_pegawai }}</option>
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
                    <input type="text" class="form-control" id="exampleInputPassword1" value = "{{ old('lap_pendahuluan', $proyek->lap_pendahuluan)}} "name="lap_pendahuluan">
                    @error('lap_pendahuluan')
                        <span class="text-danger text-muted">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Laporan Akhir</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" value = "{{ old('lap_akhir', $proyek->lap_akhir)}} "name="lap_akhir">
                    @error('lap_akhir')
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
