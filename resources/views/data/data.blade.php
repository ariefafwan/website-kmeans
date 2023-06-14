@extends('layouts.dashboard')

@section('body')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                {{-- <div class="card-header text-center">{{ $page }}</div> --}}
                <div class="card-body">
                    <div class="container">
                        <div class="panel">
                            <div class="panel-heading">
                                <h3 class="panel-title">Data Hasil Produksi</h3>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-8">
                                        <button type="button" class="btn btn-primary" id="add-disaster" name="add-disaster" data-toggle="modal" data-target="#addModal"><i class="bi bi-plus-circle"></i> Add Data </button>
                                        <!-- Button trigger modal -->																	
                                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#importDisaster"><i class="bi bi-arrow-down-circle"></i> Import Data </button>
                                        <a href="#!" class="btn btn-success"><i class="bi bi-cloud-upload-fill"></i> Export Data </a>									
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
                                            <th>Nama Wilayah</th>
                                            <th>Jumlah Kejadian</th>
                                            <th>Jumlah Korban Jiwa</th>
                                            <th>Jumlah Kerusakan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $dst)
                                        <tr>
                                            <td scope="row">{{($disasters->currentPage() - 1) * $disasters->perPage() + $loop->iteration}}</td>
                                            <td>{{$dst->namawilayah}}</td>
                                            <td>{{$dst->jumlahkejadian}}</td>
                                            <td>{{$dst->jumlahkorban}}</td>
                                            <td>{{$dst->jumlahkerusakan}}</td>
                                            <td>   
                                                {{-- UPDATE BUTTON --}}
                                                <a class="label label-success edit-modal" value="{{$dst->id}}" data-id="{{$dst->id}}"
                                                    data-namawilayah="{{$dst->namawilayah}}" data-jumlahkejadian="{{$dst->jumlahkejadian}}" data-jumlahkorban="{{$dst->jumlahkorban}}" data-jumlahkerusakan="{{$dst->jumlahkerusakan}}" >Edit</a>											
                                                {{-- DELETE BUTTON --}}											
                                                <a class="label label-danger delete-confirm" data-id="{{$dst->id}}" data-namawilayah="{{$dst->namawilayah}}">Delete</a>											
                                            </td>
                                        </tr>		                                        
                                        @endforeach					
                                    </tbody>
                                </table>	
                                {{-- {{$data->render()}} --}}
                                
                                <!-- Modal Import Excel-->
                                <div class="modal fade" id="importDisaster" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                    <form method="post" action="#!" id="frmImport" enctype="multipart/form-data">								
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h3 class="modal-title" id="exampleModalLabel">Import Data</h3>									
                                        </div>
                                        @csrf
                                        <div class="modal-body">									
                                            <div class="form-group">
                                                <input type="file" id="file" name="file" required="required">											
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>									
                                            <input type="submit" class="btn btn-primary" value="import">										
                                        </div>
                                    </div>
                                    </form>
                                    </div>
                                </div>
                                @include('data.dataedit')							
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
