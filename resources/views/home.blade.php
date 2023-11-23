@extends('layouts.dashboard')

@push('css')
<style>
    #map { 
              height: 380px; 
              width: 100%;
          }
     /*Legend specific*/
     .legend {
    padding: 6px 8px;
    font: 14px Arial, Helvetica, sans-serif;
    background: white;
    background: rgba(255, 255, 255, 0.8);
    box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
    border-radius: 5px;
    line-height: 24px;
    color: #555;
    }
    .legend h4 {
    text-align: left;
    font-size: 12px;
    margin: 2px 12px 8px;
    color: #000000;
    }

    .legend span {
    position: relative;
    bottom: 3px;
    }

    .legend i {
    width: 18px;
    height: 18px;
    float: left;
    margin: 0 8px 0 0;
    opacity: 0.7;
    }

    .legend i.icon {
    background-size: 18px;
    background-color: rgba(255, 255, 255, 1);
    }
</style>
@endpush

@section('body')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ $page }}</div>
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                        {{ __('You are logged in!') }}
                    </div>
                    @endif
                    <div class="col-md-12">
                        <div class="d-flex justify-content-center">
                            <div id="map"></div>
                        </div>
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
      $.ajax({
              url: '/resourcedata',
              type: "GET",
              dataType: "JSON",
              success:function(res) {
                let map = L.map('map').setView([4.2656737, 97.9327067], 11);
    
                L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    maxZoom: 19,
                    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
                }).addTo(map);

                /*Legend specific*/
                var legend = L.control({ position: "bottomright" });

                legend.onAdd = function(map) {
                var div = L.DomUtil.create("div", "legend");
                div.innerHTML += "<h4>Pembagian Cluster</h4>";
                    div.innerHTML += '<i style="background: #31882A"></i><span>C1 : Sangat Baik</span><br>';
                    div.innerHTML += '<i style="background: #C1A32D"></i><span>C2 : Baik</span><br>';
                    div.innerHTML += '<i style="background: #982E40"></i><span>C3 : Kurang Baik</span><br>';
                return div;
                };

                legend.addTo(map);

                var greenIcon = new L.Icon({
                  iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-green.png',
                  shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
                  iconSize: [25, 41],
                  iconAnchor: [12, 41],
                  popupAnchor: [1, -34],
                  shadowSize: [41, 41]
                });

                var yellowIcon = new L.Icon({
                    iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-yellow.png',
                    shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
                    iconSize: [25, 41],
                    iconAnchor: [12, 41],
                    popupAnchor: [1, -34],
                    shadowSize: [41, 41]
                });

                var redIcon = new L.Icon({
                  iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-red.png',
                  shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
                  iconSize: [25, 41],
                  iconAnchor: [12, 41],
                  popupAnchor: [1, -34],
                  shadowSize: [41, 41]
                });
                
                res.map((list) => {
                    if (list.clus_hasil == 'C1') {
                      L.marker([list.latitude, list.longitude], {icon: greenIcon}).addTo(map)
                        .bindPopup(`<div class="card" style="width: 10rem;">
                                <div class="card-body">
                                    <h5 class="card-title text-center">${list.desa.title}</h5>
                                    <p class="text-start">
                                        <span>Luas Tanah : ${list.luas_tanah}</span></br>
                                        <span>PH Tanah : ${list.ph_tanah}</span></br>
                                        <span>PH Air : ${list.ph_air}</span></br>
                                        <span>Suhu : ${list.suhu}</span></br>
                                        <span>Cluster : ${list.clus_hasil}</span></br>
                                    </p>
                                    </div>
                                </div>`)
                        .openPopup();
                    } else if (list.clus_hasil == 'C2') {
                      L.marker([list.latitude, list.longitude], {icon: yellowIcon}).addTo(map)
                        .bindPopup(`<div class="card" style="width: 10rem;">
                                        <div class="card-body">
                                            <h5 class="card-title text-center">${list.desa.title}</h5>
                                            <p class="text-start">
                                                <span>Luas Tanah : ${list.luas_tanah}</span></br>
                                                <span>PH Tanah : ${list.ph_tanah}</span></br>
                                                <span>PH Air : ${list.ph_air}</span></br>
                                                <span>Suhu : ${list.suhu}</span></br>
                                                <span>Cluster : ${list.clus_hasil}</span></br>
                                            </p>
                                        </div>
                                    </div>`)
                        .openPopup();
                    } else if (list.clus_hasil == 'C3') {
                      L.marker([list.latitude, list.longitude], {icon: redIcon}).addTo(map)
                        .bindPopup(`<div class="card" style="width: 10rem;">
                                        <div class="card-body">
                                            <h5 class="card-title text-center">${list.desa.title}</h5>
                                            <p class="text-start">
                                                <span>Luas Tanah : ${list.luas_tanah}</span></br>
                                                <span>PH Tanah : ${list.ph_tanah}</span></br>
                                                <span>PH Air : ${list.ph_air}</span></br>
                                                <span>Suhu : ${list.suhu}</span></br>
                                                <span>Cluster : ${list.clus_hasil}</span></br>
                                            </p>
                                        </div>
                                    </div>`)
                        .openPopup();
                    }
                })
              }
          });
    });
  </script>
@endpush
