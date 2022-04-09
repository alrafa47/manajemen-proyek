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
        <form action="{{ route('tugas.update', ['id'=>$tugas -> id]) }}" method="post" accept-charset="utf-8" enctype="multipart/form-data">
            @csrf
            @method ('put')
                <div class="form-group">
                    <label for="exampleInputPassword1">Bidang Keahlian </label>
                    <select class="form-control" name="bidangkeahlian">
                        @forelse ($bidangkeahlian as $dataBidangkeahlian)
                            <option value="{{ $dataBidangkeahlian->id }}"
                                {{ $tugas->bidangkeahlian_id == $dataBidangkeahlian->id ? 'selected' : ''}}>
                                {{ $dataBidangkeahlian->nama_bk }}</option>
                        @empty
                            <option value="">Data Kosong</option>
                        @endforelse
                    </select>
                    @error('bidangkeahlian')
                        <span class="text-danger text-muted">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Nama Proyek</label>
                    <select class="form-control" name="proyek">
                        @forelse ($proyek as $dataProyek)
                            <option value="{{ $dataProyek->id }}"
                                {{ $tugas->proyek_id == $dataProyek->id ? 'selected' : ''}}>
                                {{ $dataProyek->nama_proyek }}</option>
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
                    <input type="date" class="form-control" id="exampleInputPassword1" value = "{{ old('tgl_mulai', $tugas->tgl_mulai)}} "name="tgl_mulai">
                    @error('tgl_mulai')
                        <span class="text-danger text-muted">{{ $message }}</span>
                    @enderror
                </div>
                    <div class="form-group">
                    <label for="exampleInputPassword1">Tanggal Selesai</label>
                    <input type="date" class="form-control" id="exampleInputPassword1" value = "{{ old('tgl_selesai', $tugas->tgl_selesai)}} "name="tgl_selesai">
                    @error('tgl_selesai')
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
