@extends('layout.index')

@section('content')


<div class="card">
    <div class="card-header">
      File
    </div>
    <div class="card-body">
        @if (session('pesan'))
            <div class="alert alert-{{ session('pesan')->status}} ">
                {{ session('pesan')->message }}
            </div>
        @endif
        <form action="{{ route('file.store') }}" method="post" accept-charset="utf-8" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                {{-- <div class="form-group">
                    <label for="exampleInputPassword1">Id</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" name="id_file">
                    @error('id_file')
                        <span class="text-danger text-muted">{{ $message }}</span>
                    @enderror
                </div> --}}
                <div class="form-group">
                    <label for="exampleInputPassword1">Created By</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" name="created_by">
                    @error('created_by')
                        <span class="text-danger text-muted">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Judul Tugas</label>
                    <select class="form-control" name="penugasan">
                        @forelse ($penugasan as $dataPenugasan)
                            <option value="{{ $dataPenugasan->id }}">{{ $dataPenugasan->judul_tugas }}</option>
                        @empty
                            <option value="">Data Kosong</option>
                        @endforelse
                    </select>
                    @error('penugasan')
                        <span class="text-danger text-muted">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">File</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" name="file">
                    @error('file')
                        <span class="text-danger text-muted">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">ACC</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" name="acc">
                    @error('acc')
                        <span class="text-danger text-muted">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Deskripsi</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" name="deskripsi">
                    @error('deskripsi')
                        <span class="text-danger text-muted">{{ $message }}</span>
                    @enderror
                </div>

                <input type="submit" name="save" class="btn btn-primary" value="Save">
            </div>
            <!-- /.card-body -->
        </form>
        <hr>
        <h3>List File</h3>
        <table id="example1" class="table table-bordered table-striped responsive">
            <thead>
            <tr>
                <th>No</th>
                <th>Created By</th>
                <th>Judul Tugas</th>
                <th>File</th>
                <th>ACC</th>
                <th>Deskripsi</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @forelse ($file as $row )
                    <tr>
                        <td> {{ $loop->iteration }}</td>
                        <td>{{ $row->created_by }}</td>
                        <td>{{ $row->penugasan->judul_tugas }}</td>
                        <td>{{ $row->file }}</td>
                        <td>{{ $row->acc }}</td>
                        <td>{{ $row->deskripsi }}</td>

                        <td>
                            <div class="btn-group">
                                <div class="d-flex">
                                    <form action={{route('file.destroy', ['id'=>$row->id])}} method="POST">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger">hapus</button>
                                    </form>
                                    <a class="btn btn-warning" href={{route('file.edit', ['id'=>$row->id])}}>ubah
                                    </a>
                                </div>
                            </div>
                        </td>
                    </tr>
            @empty
                    <tr>
                        <td colspan="7"> Data File Kosong</td>
                    </tr>
            @endforelse
            </tbody>
        </table>
    </div>
  </div>


@endsection
