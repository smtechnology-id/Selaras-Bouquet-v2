@extends('layouts.app')

@section('content')
    <div class="row">
        <table class="table table-borderless">
            <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#addKader">Tambah
                Category</button>
            <thead>
                <tr>
                    <td>No</td>
                    <td>Nama Category</td>
                    <td>Aksi</td>
                </tr>
            </thead>
            <tbody>
                @php
                    $no = 1;
                @endphp
                @foreach ($category as $data)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $data->category_name }}</td>
                        <td>
                            <button type="button" class="btn btn-secondary mb-2" data-bs-toggle="modal"
                                data-bs-target="#updateCat{{ $data->id }}">Update</button>
                            <div id="updateCat{{ $data->id }}" class="modal fade" tabindex="-1" role="dialog"
                                aria-labelledby="standard-modalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="standard-modalLabel">Tambah Kader</h4>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('admin.updateCategory') }}" method="POST"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <div class="form-group mb-2">
                                                    <label for="category_name">Nama Kategory</label>
                                                    <input type="text" name="category_name" id="category_name"
                                                        class="form-control" value="{{ $data->category_name }}">
                                                    <input type="hidden" name="id" id="id" class="form-control"
                                                        required value="{{ $data->id }}">
                                                </div>
                                                <div class="form-group mb-2">
                                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-light"
                                                data-bs-dismiss="modal">Close</button>
                                        </div>
                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div><!-- /.modal -->
                            <button type="button" class="btn btn-danger mb-2" data-bs-toggle="modal"
                                data-bs-target="#deleteCat{{ $data->id }}">Delete</button>
                            <div id="deleteCat{{ $data->id }}" class="modal fade" tabindex="-1" role="dialog"
                                aria-labelledby="standard-modalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="standard-modalLabel">Tambah Kader</h4>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Apakah Anda Yakin Ingin Menghapus Data ?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-light"
                                                data-bs-dismiss="modal">Close</button>
                                            <a href="{{ route('admin.deleteCategory', ['id' => $data->id]) }}"
                                                class="btn btn-danger">Delete</a>

                                        </div>
                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div><!-- /.modal -->
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div id="addKader" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="standard-modalLabel">Tambah Kader</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.addCategory') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-2">
                            <label for="category_name">Nama Kategory</label>
                            <input type="text" name="category_name" id="category_name" class="form-control" required>
                        </div>
                        <div class="form-group mb-2">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
@endsection
