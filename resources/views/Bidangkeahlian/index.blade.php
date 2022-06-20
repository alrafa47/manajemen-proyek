@extends('layout.index')

@section('content')
    <div class="card">
        <div class="card-header">
            Bidang Keahlian
        </div>
        <div class="card-body">
            @if (session('pesan'))
                <div class="alert alert-{{ session('pesan')->status }} ">
                    {{ session('pesan')->message }}
                </div>
            @endif
            @if (Auth::user()->role == 'admin')
                <form action="{{ route('bidangkeahlian.store') }}" method="post" accept-charset="utf-8"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Nama Bidang Keahlian</label>
                            <input type="text" class="form-control" id="exampleInputPassword1" name="nama_bk">
                            @error('nama_bk')
                                <span class="text-danger text-muted">{{ $message }}</span>
                            @enderror
                        </div>

                        <input type="submit" name="save" class="btn btn-primary" value="Save">
                    </div>
                    <!-- /.card-body -->
                </form>
                <hr>
                <h3>List Bidang Keahlian</h3>
                <table id="example1" class="table table-bordered table-striped responsive">
                    <thead>
                        <tr>
                            <th>No</th>
                            {{-- <th>Id</th> --}}
                            <th>Nama Bidang Keahlian</th>
                            <th>Action</th>
                        </tr>

                    </thead>
                    <tbody>
                        @forelse ($bidangkeahlian as $row)
                            <tr>
                                <td> {{ $loop->iteration }}</td>
                                {{-- <td>{{$row->id}}</td> --}}
                                <td>{{ $row->nama_bk }}</td>

                                <td>
                                    <div class="btn-group">
                                        <div class="d-flex">
                                            <form action={{ route('bidangkeahlian.destroy', ['id' => $row->id]) }}
                                                method="POST">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-danger">hapus</button>
                                            </form>
                                            <a class="btn btn-warning"
                                                href={{ route('bidangkeahlian.edit', ['id' => $row->id]) }}>ubah
                                            </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7"> Data Bidang Keahlian Kosong</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            @endif
        </div>
    </div>
@endsection
