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
                <?php foreach ($cluster as $index => $any) { ?>
                    div.innerHTML += '<span>{{ $any->name }} : {{ $any->detail }}</span><br>';
                <?php } ?>
                return div;
                };

                legend.addTo(map);

                // <?php foreach ($cluster as $index => $any) { ?>
                //     var {{ $any->name }} = L.icon({
                //         iconUrl: '{{ $any->FileMarker }}',
                //         iconSize:     [38, 95], // size of the icon
                //         iconAnchor:   [22, 94], // point of the icon which will correspond to marker's location
                //         popupAnchor:  [-3, -76] // point from which the popup should open relative to the iconAnchor
                //     });
                // <?php } ?>
                
                res.map((list) => {
                    // var icon = {icon: list.clus_hasil.name};
                    // console.log(icon);
                    L.marker([list.latitude, list.longitude]).addTo(map)
                        .bindPopup(`${list.sample}<br> ${list.clus_hasil.name}`)
                        .openPopup();
                })
                
              }
          });
    });
  </script>
@endpush
