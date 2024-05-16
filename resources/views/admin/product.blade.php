@extends('layouts.app')

@section('content')
    <div class="row">
        <table class="table table-borderless">
            <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#addKader">Tambah
                Product</button>
            <thead>
                <tr>
                    <td>No</td>
                    <td>Gambar</td>
                    <td>Nama Product</td>
                    <td>Kategori</td>
                    <td>Harga</td>
                    <td>Aksi</td>
                </tr>
            </thead>
            <tbody>
                @php
                    $no = 1;
                @endphp
                @foreach ($product as $data)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td> <img src="{{ asset('storage/product_images/' . $data->product_image) }}" style="width: 150px; height: 150px; object-fit: cover" class="rounded"></td>
                        <td>{{$data->product_title}}</td>
                        <td>{{$data->category->category_name}}</td>
                        <td>{{$data->product_price}}</td>
                        <td>
                            <button type="button" class="btn btn-secondary mb-2" data-bs-toggle="modal"
                                data-bs-target="#update{{ $data->id }}">Update</button>
                            <div id="update{{ $data->id }}" class="modal fade" tabindex="-1" role="dialog"
                                aria-labelledby="standard-modalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="standard-modalLabel">Update Product</h4>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <img src="{{ asset('storage/product_images/' . $data->product_image) }}" style="width: 100%; height: 100%; object-fit: cover" class="rounded">
                                            <form action="{{ route('admin.updateProduct') }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <div class="form-group mb-2">
                                                    <label for="product_image">Gambar Produk</label>
                                                    <input type="file" name="product_image" id="product_image" class="form-control" required value="{{$data->product_image}}">
                                                    <input type="hidden" name="id" id="id" class="form-control" required value="{{$data->id}}">
                                                </div>
                                                <div class="form-group mb-2">
                                                    <label for="product_title">Nama Produk</label>
                                                    <input type="text" name="product_title" id="product_title" class="form-control" required value="{{$data->product_title}}">
                                                </div>
                                                <div class="form-group mb-2">
                                                    <label for="product_desc">Deskripsi Produk</label>
                                                    <textarea name="product_desc" id="product_desc" cols="30" rows="3" class="form-control">{{$data->product_desc}}</textarea>
                                                </div>
                                                <div class="form-group mb-2">
                                                    <label for="product_price">Harga Produk</label>
                                                    <input type="number" name="product_price" id="product_price" class="form-control" required  value="{{$data->product_price}}">
                                                </div>
                                                <div class="form-group mb-2">
                                                    <label for="product_price">Kategori Produk</label>
                                                    <select name="category_id" id="category_id" class="form-control" required>
                                                        @foreach ($category as $cat)
                                                            <option value="{{ $cat->id }}">{{ $cat->category_name }}</option>
                                                        @endforeach
                                                    </select>
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
                                data-bs-target="#delete{{ $data->id }}">Delete</button>
                            <div id="delete{{ $data->id }}" class="modal fade" tabindex="-1" role="dialog"
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
                                            <a href="{{ route('admin.deleteProduct', ['id' => $data->id]) }}"
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
                    <h4 class="modal-title" id="standard-modalLabel">Tambah Product</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.addProduct') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-2">
                            <label for="product_image">Gambar Produk</label>
                            <input type="file" name="product_image" id="product_image" class="form-control" required>
                        </div>
                        <div class="form-group mb-2">
                            <label for="product_title">Nama Produk</label>
                            <input type="text" name="product_title" id="product_title" class="form-control" required>
                        </div>
                        <div class="form-group mb-2">
                            <label for="product_desc">Deskripsi Produk</label>
                            <textarea name="product_desc" id="product_desc" cols="30" rows="3" class="form-control"></textarea>
                        </div>
                        <div class="form-group mb-2">
                            <label for="product_price">Harga Produk</label>
                            <input type="number" name="product_price" id="product_price" class="form-control" required>
                        </div>
                        <div class="form-group mb-2">
                            <label for="product_price">Kategori Produk</label>
                            <select name="category_id" id="category_id" class="form-control" required>
                                @foreach ($category as $cat)
                                    <option value="{{ $cat->id }}">{{ $cat->category_name }}</option>
                                @endforeach
                            </select>
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
