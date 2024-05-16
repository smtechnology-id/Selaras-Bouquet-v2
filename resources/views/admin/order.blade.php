@extends('layouts.app')

@section('content')
    <div class="row">
        <table class="table table-borderless">
            <thead>
                <tr>
                    <td>No</td>
                    <td>Kode Pesanan</td>
                    <td>Nama User</td>
                    <td>Total Harga</td>
                    <td>Status Pesanan</td>
                    <td>Aksi</td>
                </tr>
            </thead>
            <tbody>
                @php
                    $no = 1;
                @endphp
                @foreach ($order as $data)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $data->kode_pesanan }}</td>
                        <td>{{ $data->user->name }}</td>
                        <td>{{ $data->total_price }}</td>
                        <td>{{ $data->status_order }}</td>
                        <td> 
                            <a href="{{route('admin.detailOrder', ['kodePesanan' => $data->kode_pesanan])}}" class="btn btn-primary mb-2">Detail</a>
                        </td>
                    </tr>
                    @endforeach
            </tbody>
        </table>
    </div>
@endsection
