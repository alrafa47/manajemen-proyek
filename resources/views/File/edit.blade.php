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
        <form action="{{ route('file.update', ['id'=>$file -> id]) }}" method="post" accept-charset="utf-8" enctype="multipart/form-data">
            @csrf
            @method ('put')
                <div class="form-group">
                    <label for="exampleInputPassword1">Created By</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" value = "{{ old('created_by', $file->created_by)}} "name="created_by">
                    @error('created_by')
                        <span class="text-danger text-muted">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Judul Tugas</label>
                    <select class="form-control" name="penugasan">
                        @forelse ($penugasan as $dataPenugasan)
                            <option value="{{ $dataPenugasan->id }}"
                                {{ $file->penugasan_id == $dataPenugasan->id ? 'selected' : ''}}>
                                {{ $dataPenugasan->judul_tugas }}</option>
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
                    <input type="text" class="form-control" id="exampleInputPassword1" value = "{{ old('file', $file->file)}} "name="file">
                    @error('file')
                        <span class="text-danger text-muted">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">ACC</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" value = "{{ old('acc', $file->acc)}} "name="acc">
                    @error('acc')
                        <span class="text-danger text-muted">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Deskripsi</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" value = "{{ old('deskripsi', $file->deskripsi)}} "name="deskripsi">
                    @error('deskripsi')
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
