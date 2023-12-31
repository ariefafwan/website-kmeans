@extends('layouts.dashboard')

@section('body')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="container">
                    <h3 class="panel-title">Data Desa</h3>
                        <div class="row">
                            <div class="col-md-8">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal"><i class="bi bi-plus-circle"></i> Tambah Data</button>
                            </div>
                        </div>
                        <br>
                        @include('desa.desaadd')
                        <table id="datatable" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama Desa</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($desa as $index => $row)
                                <tr>
                                    <td scope="row">{{ $index + 1 }}</td>
                                    <td>{{ $row->title }}</td>
                                    <td align="center" class="d-flex justify-content-evenly">
                                        <button class="btn btn-warning edit" data-id="{{ $row->id }} data-bs-toggle="modal" data-bs-target="#editModal">
                                            <i class="bi bi-pencil"></i>
                                        </button>
                                        <a href="javascript:void(0)" class="btn btn-danger" onclick="event.preventDefault();
                                                    document.getElementById('data-delete-form-{{ $row->id }}').submit();">
                                            <i class="bi bi-trash"></i>
                                        </a>
                                        <form id="data-delete-form-{{$row->id}}"
                                            action="{{ route('desa.destroy', $row->id) }}" method="POST"
                                            style="display: none;">
                                            @csrf
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @include('desa.desaedit')
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
        console.log(true);
        var id = $(this).attr('data-id');
        $.ajax({
            url: '/desa/'+id+'/edit',
            type: "GET",
            dataType: "JSON",
            success: function(data)
                {
                    $('#editid').val(data.id);
                    $('#edittitle').val(data.title);
                    $('#editModal').modal('show');
                }
            });
        });
    });
</script>
@endpush
