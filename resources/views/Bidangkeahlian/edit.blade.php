@extends('layout.index')

@section('content')


<div class="card">
    <div class="card-header">
      Bidang Keahlian
    </div>
    <div class="card-body">
        @if (session('pesan'))
            <div class="alert alert-{{ session('pesan')->status}} ">
                {{ session('pesan')->message }}
            </div>
        @endif
        <form action="{{ route('bidangkeahlian.update', ['id'=>$bidangkeahlian -> id]) }}" method="post" accept-charset="utf-8" enctype="multipart/form-data">
            @csrf
            @method ('put')
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputPassword1">Nama Bidang Keahlian</label>
                    <input type="text" class="form-control" id="exampleInputPassword1"
                    value = "{{ old('nama_bk', $bidangkeahlian->nama_bk)}} "name="nama_bk">
                    @error('nama_bk')
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
