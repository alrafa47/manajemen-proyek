@extends('layout.index')

@section('content')


<div class="card">
    <div class="card-header">
      Penugasan
    </div>
    <div class="card-body">
        @if (session('pesan'))
            <div class="alert alert-{{ session('pesan')->status}} ">
                {{ session('pesan')->message }}
            </div>
        @endif
        <form action="{{ route('penugasan.update', ['id'=>$penugasan -> id]) }}" method="post" accept-charset="utf-8" enctype="multipart/form-data">
            @csrf
            @method ('put')
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputPassword1">Nama Pegawai </label>
                    <select class="form-control" name="pegawai">
                        @forelse ($pegawai as $dataPegawai)
                            <option value="{{ $dataPegawai->id }}"
                            {{ $penugasan->pegawai_id == $dataPegawai->id ? 'selected' : ''}}>
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
                    <label for="exampleInputPassword1">Judul Tugas</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" value = "{{ old('judul_tugas', $penugasan->judul_tugas)}} "name="judul_tugas">
                    @error('judul_tugas')
                        <span class="text-danger text-muted">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Deskripsi</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" value = "{{ old('deskripsi', $penugasan->deskripsi)}} "name="deskripsi_tugas">
                    @error('deskripsi_tugas')
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
