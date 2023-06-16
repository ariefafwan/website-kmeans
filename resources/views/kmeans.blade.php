@extends('layouts.dashboard')

@section('body')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ $page }}</div>

                <div class="card-body">
                    <div class="panel">
                        <div class="panel-heading">
							<h3 class="panel-title">Inisialisasi Awal</h3>
                        </div>
                        <div class="panel-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Ha Block</th>
                                        <th>FFB Produksi Block</th>
                                        <th>Janjang Panen</th>
                                        <th>Brondolan Kg</th>
                                    </tr>
                                </thead>
                                <tbody class="body">
                                    @foreach ($centroid[0] as $key_centroid => $value_centroid)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$value_centroid[0]}}</td>
                                        <td>{{$value_centroid[1]}}</td>
                                        <td>{{$value_centroid[2]}}</td>
                                        <td>{{$value_centroid[3]}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">Akurasi K-Means</h3>
                        </div>
                        <div class="panel-body">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <th>#</th>
                                        <td>Hasil DBI</td>
                                        <td>Hasil Purity</td>
                                    </tr>
                                    <tr>
                                        <th>Hasil</th>
                                        <th>{{$ratio}}</th>
                                        <th>{{$puritygeo}}</th>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    @foreach ($hasil_iterasi as $key => $value)
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">Iterasi {{$key+1}}</h3>
                            <div class="right">
                                <button class="btn btn-info" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{$key}}"><i class="bi bi-eye"></i></button>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div id="collapse{{$key}}" class="collapse">
                                <table class="table table-bordered table-striped table-sm">
                                    <thead>
                                        <tr>
                                            <th rowspan="2" class="text-center">#</th>
                                            <th rowspan="2" class="text-center">Bulan</th>
                                            <th rowspan="2" class="text-center">Ha Block</th>
                                            <th rowspan="2" class="text-center">FFB Produksi Bulan</th>
                                            <th rowspan="2" class="text-center">Janjang Panen</th>
                                            <th rowspan="2" class="text-center">Brondolan Kg</th>
                                            <th rowspan="1" class="text-center" colspan="{{ $cluster }}">Jarak ke Centroid</th>
                                            <th rowspan="2" class="text-center">Jarak Terdekat</th>
                                            <th rowspan="2" class="text-center">Cluster</th>
                                        </tr>
                                        <tr>
                                            @for ($i=1; $i <=$cluster ; $i++) <th rowspan="1" class="text-center">
                                                {{ $i }}
                                            </th>
                                            @endfor
                                        </tr>
                                    </thead>
                                    <tbody class="body">
                                        @foreach ($value as $key_data => $value_data)
                                        <tr>
                                            <td class="text-center" scope="row">{{ $key_data+1 }}</td>
                                            <td class="text-center">{{$name[$key_data]}}</td>
                                            <td class="text-center">{{$value_data['data'][0]}}</td>
                                            <td class="text-center">{{$value_data['data'][1]}}</td>
                                            <td class="text-center">{{$value_data['data'][2]}}</td>
                                            <td class="text-center">{{$value_data['data'][3]}}</td>
                                            @foreach ($value_data['jarak_centroid'] as $key_jc => $value_jarak)
                                            <td class="text-center">{{$value_jarak}}</td>
                                            @endforeach
                                            <td>{{ $value_data['jarak_terdekat']['value'] }}</td>
                                            <td>{{ $value_data['jarak_terdekat']['cluster'] }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
