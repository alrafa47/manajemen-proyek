@extends('layout.index')

@section('content')
    <div class="card">
        <div class="card-header">
            Jabatan
        </div>
        <div class="card-body">
            @if (session('pesan'))
                <div class="alert alert-{{ session('pesan')->status }} ">
                    {{ session('pesan')->message }}
                </div>
            @endif
            @if (Auth::user()->role == 'admin')
                <form action="{{ route('jabatan.store') }}" method="post" accept-charset="utf-8"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Nama Jabatan</label>
                            <input type="text" class="form-control" id="exampleInputPassword1" name="nama_jabatan">
                            @error('nama_jabatan')
                                <span class="text-danger text-muted">{{ $message }}</span>
                            @enderror
                        </div>

                        <input type="submit" name="save" class="btn btn-primary" value="Save">
                    </div>
                    <!-- /.card-body -->
                </form>
                <hr>
                <h3>List Jabatan</h3>
                <table id="example1" class="table table-bordered table-striped responsive">
                    <thead>
                        <tr>
                            <th>No</th>
                            {{-- <th>Id</th> --}}
                            <th>Nama Jabatan</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($jabatan as $row)
                            <tr>
                                <td> {{ $loop->iteration }}</td>
                                {{-- <td>{{$row->id}}</td> --}}
                                <td>{{ $row->nama_jabatan }}</td>

                                <td>
                                    <div class="btn-group">
                                        <div class="d-flex">
                                            <form action={{ route('jabatan.destroy', ['id' => $row->id]) }} method="POST">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-danger">hapus</button>
                                            </form>
                                            <a class="btn btn-warning"
                                                href={{ route('jabatan.edit', ['id' => $row->id]) }}>ubah
                                            </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7"> Data Jabatan Kosong</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            @endif
        </div>
    </div>
@endsection
