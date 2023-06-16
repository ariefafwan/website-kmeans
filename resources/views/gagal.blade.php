@extends('layouts.dashboard')

@section('body')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ $page }}</div>

                <div class="card-body">
                    <h5 class="card-title">Gagal !</h5>
                    <p class="card-text">Data Tidak Cukup, Minimal 25 Data!</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection