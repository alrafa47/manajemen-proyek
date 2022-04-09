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
        <form action="{{ route('penugasan.store') }}" method="post" accept-charset="utf-8" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputPassword1">Id Tugas </label>
                    <select class="form-control" name="tugas">
                        @forelse ($tugas as $dataTugas)
                            <option value="{{ $dataTugas->id }}">{{ $dataTugas->id_tugas }}</option>
                        @empty
                            <option value="">Data Kosong</option>
                        @endforelse
                    </select>
                    @error('tugas')
                        <span class="text-danger text-muted">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Judul Tugas</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" name="judul_tugas">
                    @error('judul_tugas')
                        <span class="text-danger text-muted">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Deskripsi</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" name="deskripsi_tugas">
                    @error('deskripsi_tugas')
                        <span class="text-danger text-muted">{{ $message }}</span>
                    @enderror
                </div>

                <input type="submit" name="save" class="btn btn-primary" value="Save">
            </div>
            <!-- /.card-body -->
        </form>
        <hr>
        <h3>List Penugasan</h3>
        <table id="example1" class="table table-bordered table-striped responsive">
            <thead>
            <tr>
                <th>No</th>
                <th>Id Tugas</th>
                <th>Judul Tugas</th>
                <th>Deskripsi</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @forelse ($penugasan as $row )
                    <tr>
                        <td> {{ $loop->iteration }}</td>
                        <td>{{ $row->tugas->id_tugas }}</td>
                        <td>{{ $row->tugas }}</td>
                        <td>{{ $row->deskripsi }}</td>

                        <td>
                            <div class="btn-group">
                                <div class="d-flex">
                                    <form action={{route('penugasan.destroy', ['id'=>$row->id])}} method="POST">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger">hapus</button>
                                    </form>
                                    <a class="btn btn-warning" href={{route('penugasan.edit', ['id'=>$row->id])}}>ubah
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
  </div>


@endsection
