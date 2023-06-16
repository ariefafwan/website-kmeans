@extends('layouts.dashboard')

@section('body')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="container">
                    <h3 class="panel-title">Data Hasil Produksi</h3>
                        <div class="row">
                            <div class="col-md-8">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal"><i class="bi bi-plus-circle"></i> Tambah Data</button>
                                <!-- Button trigger modal -->																	
                                <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#importmodal"><i class="bi bi-arrow-down-circle"></i> Import Data </button>
                                <a href="{{ route('data.export') }}" class="btn btn-success"><i class="bi bi-cloud-upload-fill" target="_blank"></i> Export Data </a>
                            </div>
                            <div class="col-md-4">
                                <form action="/disasters" method="get">
                                <div class="input-group">
                                    <input class="form-control" name="search" type="text" placeholder="Search Data"> 
                                    <button class="btn btn-primary" type="submit"><i class="bi bi-search"></i> Search!</button>
                                </div>
                                </form>									
                            </div>
                        </div>
                        <br>
                        @include('data.dataadd')
                        <table id="datatable" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Date</th>
                                    <th>Ha Block</th>
                                    <th>FFB Produksi Ton</th>
                                    <th>Janjang Panen</th>
                                    <th>Brondolan Panen</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $index => $row)
                                <tr>
                                    <td scope="row">{{ $index + 1 }}</td>
                                    <td>{{ $row->bulan }}</td>
                                    <td>{{ $row->ha_block }}</td>
                                    <td>{{ $row->ffb_produksi_ton }}</td>
                                    <td>{{ $row->janjang_panen }}</td>
                                    <td>{{ $row->brondolan_kg }}</td>
                                    <td align="center" class="d-flex justify-content-evenly">
                                        <a href="#!" class="btn btn-warning edit" data-id="{{ $row->id }} data-bs-toggle="modal" data-bs-target="#editModal">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        <a href="javascript:void(0)" class="btn btn-danger" onclick="event.preventDefault();
                                                    document.getElementById('data-delete-form-{{ $row->id }}').submit();">
                                            <i class="bi bi-trash"></i>
                                        </a>
                                        <form id="data-delete-form-{{$row->id}}"
                                            action="{{ route('data.destroy', $row->id) }}" method="POST"
                                            style="display: none;">
                                            @csrf
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @include('data.dataimport')
                        @include('data.dataedit')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
    $(document).ready(function() {
    //edit data
    $('.edit').on("click",function() {
    var id = $(this).attr('data-id');
    $.ajax({
    url: '/edit/'+id,
    type: "GET",
    dataType: "JSON",
    success: function(data)
    {
        $('#editid').val(data.id);
        $('#editbulan').val(data.bulan);
        $('#editha_block').val(data.ha_block);
        $('#editffb_produksi_ton').val(data.ffb_produksi_ton);
        $('#editjanjang_panen').val(data.janjang_panen);
        $('#editbrondolan_kg').val(data.brondolan_kg);
        $('#editModal').modal('show');
    }
    });
    });
    });
</script>
@endsection
