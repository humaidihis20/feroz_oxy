@section('footer')
<footer class="section-footer mt-5 border-top">
  <div class="container pt-5">
    <div class="row justify-content-center">
      <div class="col-12">
        <div class="row">
          <div class="col-12">
            <div class="row">
              <div class="col-12 col-lg">
                <h5>Product</h5>
                <ul class="list-unstyled">
                  <li>
                    <a href="#">Updates</a>
                  </li>
                  <li>
                    <a href="#">Security</a>
                  </li>
                </ul>
              </div>
              <div class="col-12 col-lg">
                <h5>Company</h5>
                <ul class="list-unstyled">
                  <li><a href="#">FaQs</a></li>
                  <li><a href="#">Privacy Police</a></li>
                  <li><a href="#">Join Us</a></li>
                </ul>
              </div>
              <div class="col-12 col-lg">
                <h5>Contact</h5>
                <ul class="list-unstyled">
                  <li><a href="https://api.whatsapp.com/send?phone=6282118869659&text=Halo%20Admin%20Saya%20Mau%20Pesan%20Air%20Minum%20....." class=""><i class="fab fa-whatsapp-square"></i> +6282118869659</a></li>
                  <li><div id="map" class="maps"></div></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row border-top justify-content-center align-items-center">
      <div class="col-auto text-gray-500 font-weight-light p-3" style="font-size: 20px; margin-top: -5px;" >
        2021 Copyright &copy; FerozOxy • All rights reserved • Made in Banten
      </div>
    </div>
  </div>
</footer>

<!-- Make sure you put this AFTER Leaflet's -->
<script src="{{ asset('frontend/js/leaflet-panel-layers.js') }}"></script>
<script src="{{ asset('frontend/js/leaflet.ajax.js') }}"></script>
<script src="{{ asset('frontend/js/leaflet.ajax.min.js') }}"></script>
<script>
  var mymap = L.map('map').setView([-6.077774199136875, 106.11025223890829], 12);
	L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
		maxZoom: 18,
		id: 'mapbox/streets-v11',
		tileSize: 512,
		zoomOffset: -1
	}).addTo(mymap);

  var myStyle = {
    "color": "#bbdefb",
    "weight": 2,
    "opacity": 0.20
  };

  function popUp(f,l){
      var out = [];
      if (f.properties){
          // for(key in f.properties){
          //   console.log(key);
          //   out.push(key+":"+f.properties[key]);  
          
          // }
          out.push("Toko: "+f.properties['Toko']);
          out.push("Provinsi: "+f.properties['Provinsi']);
          out.push("Kota: "+f.properties['Kota']);
          l.bindPopup(out.join("<br />"));
      }
  }
  var jsonTest = new L.GeoJSON.AJAX(["frontend/js/cilegon2.geojson"],{onEachFeature:popUp, style: myStyle}).addTo(mymap);
</script>

@endsection
{{-- <section class="footer mt-5">

  <div class="container-box">
    <div class="box">
      <h3>Product</h3>
      <a href="#">Updates</a>
      <a href="#">Security</a>
    </div>

    <div class="box">
      <h3>Company</h3>
      <a href="#">FaQs</a>
      <a href="#">Privacy Police</a>
      <a href="#">Join Us</a>
    </div>

    <div class="box">
      <h3>Contact</h3>
      <a href="https://api.whatsapp.com/send?phone=6282118869659&text=Halo%20Admin%20Saya%20Mau%20Pesan%20Air%20Minum%20....." class="text-decoration-none"><i class="fab fa-whatsapp-square"></i> +6282118869659</a>
      <div id="map" class="maps"></div>
    </div>
  </div>

  <h1 class="credit"> 2021 Copyright &copy; <span>Feroz-Oxy</span> • All rights reserved • Made in Banten</h1>
</section> --}}

  {{-- <div class="container pt-5">
    <div class="row justify-content-center">
      <div class="col-12">
        <div class="row">
          <div class="col-12">
            <div class="row justify-content-center">
              <div class="col-8 col-lg-2">
                <h5>Product</h5>
                <ul class="list-unstyled text-decoration-none">
                  <li>
                    <a href="#">Updates</a>
                  </li>
                  <li>
                    <a href="#">Security</a>
                  </li>
                </ul>
              </div>
              <div class="col-8 col-lg-2">
                <h5>Company</h5>
                <ul class="list-unstyled text-decoration-none">
                  <li><a href="#">About</a></li>
                  <li><a href="#">Join Us</a></li>
                </ul>
              </div>
              <div class="col-8 col-lg-2">
                <h5>Support</h5>
                <ul class="list-unstyled text-decoration-none">
                  <li><a href="#">FaQs</a></li>
                  <li><a href="#">Privacy Police</a></li>
                  <li><a href="#">Term & Condition</a></li>
                </ul>
              </div>
              <div class="col-8 col-lg-2 line-highlight">
                <h5>Contact</h5>

                <ul class="list-unstyled text-decoration-none">
                  <a href="https://api.whatsapp.com/send?phone=6282118869659&text=Halo%20Admin%20Saya%20Mau%20Pesan%20Air%20Minum%20....." >
                    <li>
                      <i class="fab fa-whatsapp-square icon-success rounded-circle"><span class="ml-1">+6282118869659</span></i>
                    </li>
                  </a>

                  <li id="mapid" class="maps mb-4"></li>
                </ul>
                
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="container text-center">
    <div class="row border-top justify-content-center align-items-center">
      <div class="col-auto text-gray-500 font-weight-light p-3" style="font-size: 20px; margin-top: -5px;">
        2021 Copyright &copy; FerozOxy • All rights reserved • Made in Banten
      </div>
    </div>
  </div> --}}
