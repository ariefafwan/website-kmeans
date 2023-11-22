@extends('layouts.dashboard')

@section('body')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="container">
                    <h3 class="panel-title">Data Sample</h3>
                        <div class="row">
                            <div class="col-md-8">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal"><i class="bi bi-plus-circle"></i> Tambah Data</button>
                            </div>
                        </div>
                        <br>
                        @include('data.dataadd')
                        <table id="datatable" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Desa</th>
                                    <th>Luas Tanah</th>
                                    <th>PH Air</th>
                                    <th>PH Tanah</th>
                                    <th>Suhu</th>
                                    <th>Cluster</th>
                                    <th>Latitude</th>
                                    <th>Longitude</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $index => $row)
                                <tr>
                                    <td scope="row">{{ $index + 1 }}</td>
                                    <td>{{ $row->desa->title }}</td>
                                    <td>{{ $row->luas_tanah }}</td>
                                    <td>{{ $row->ph_air }}</td>
                                    <td>{{ $row->ph_tanah }}</td>
                                    <td>{{ $row->suhu }}</td>
                                    <td>{{ $row->clus_hasil }}</td>
                                    <td>{{ $row->latitude }}</td>
                                    <td>{{ $row->longitude }}</td>
                                    <td align="center" class="d-flex justify-content-evenly">
                                        <button class="btn btn-warning edit" data-id="{{ $row->id }} data-bs-toggle="modal" data-bs-target="#editModal">
                                            <i class="bi bi-pencil"></i>
                                        </button>
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
                        @include('data.dataedit')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('script')
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
                    $('#editclus_hasil').val(data.clus_hasil);
                    $('#editdesa_id').val(data.desa_id);
                    $('#editlatitude').val(data.latitude);
                    $('#editlongitude').val(data.longitude);
                    $('#editluas_tanah').val(data.luas_tanah);
                    $('#editph_tanah').val(data.ph_tanah);
                    $('#editph_air').val(data.ph_air);
                    $('#editsuhu').val(data.suhu);
                    $('#editModal').modal('show');
                }
            });
        });
    });
</script>
@endpush
