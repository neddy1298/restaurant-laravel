<!--

=========================================================
* Argon Dashboard - v1.1.0
=========================================================

* Product Page: https://www.creative-tim.com/product/argon-dashboard
* Copyright 2019 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://github.com/creativetimofficial/argon-dashboard/blob/master/LICENSE.md)

* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software. -->



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>
    Argon Dashboard - Free Dashboard for Bootstrap 4 by Creative Tim
  </title>
  <!-- Favicon -->
  <link href="{{ asset('assets')}}/img/brand/favicon.png" rel="icon" type="image/png">
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <!-- Icons -->
  <link href="{{ asset('assets')}}/js/plugins/nucleo/css/nucleo.css" rel="stylesheet" />
  <link href="{{ asset('assets')}}/js/plugins/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link href="{{ asset('assets')}}/css/argon-dashboard.css?v=1.1.0" rel="stylesheet" />

</head>

<body class="">
  @include('layouts.navbars.sidebar')

  <div class="main-content">
    <!-- Navbar -->
    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
      @include('layouts.navbars.navbar')
      @yield('header')
    </div>
    <!-- End Navbar -->
    <!-- Header -->
    @yield('content')
  </div>
  <!--   Core   -->
  <script src="{{ asset('assets')}}/js/plugins/jquery/dist/jquery.min.js"></script>
  <script src="{{ asset('assets')}}/js/plugins/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <!--   Optional JS   -->
  <script src="{{ asset('assets')}}/js/plugins/chart.js/dist/Chart.min.js"></script>
  <script src="{{ asset('assets')}}/js/plugins/chart.js/dist/Chart.extension.js"></script>
  <!--   Argon JS   -->
  <script src="{{ asset('assets')}}/js/argon-dashboard.min.js?v=1.1.0"></script>
  <script src="https://cdn.trackjs.com/agent/v3/latest/t.js"></script>
  <script>
    window.TrackJS &&
      TrackJS.install({
        token: "ee6fab19c5a04ac1a32a645abde4613a",
        application: "argon-dashboard-free"
      });
    window.setTimeout(function() {
      $(".alert").fadeTo(500, 0).slideUp(500, function() {
        $(this).remove();
      });
    }, 2000);
  </script>

  {{-- Format Rupiah --}}
  {{-- <script>
     var harga = document.getElementById('harga');
    harga.addEventListener('keyup', function(e)
    {
        harga.value = formatRupiah(this.value, 'Rp. ');
    });
    
    /* Fungsi */
    function formatRupiah(angka, prefix)
    {
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split    = number_string.split(','),
            sisa     = split[0].length % 3,
            rupiah     = split[0].substr(0, sisa),
            ribuan     = split[0].substr(sisa).match(/\d{3}/gi);
            
        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }
        
        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? rupiah : '');
    }
</script> --}}
  
  <!-- ChatBot -->
  <!-- <script>
    document.addEventListener('DOMContentLoaded', function() {
        var s,t; s = document.createElement('script'); s.type = 'text/javascript';
        s.src = 'https://s3-ap-southeast-1.amazonaws.com/qiscus-sdk/public/qismo/qismo-v2.js'; s.async = true;
        s.onload = s.onreadystatechange = function() { new Qismo("mol-xoswrga2wrpbmvbq6"); }
        t = document.getElementsByTagName('script')[0]; t.parentNode.insertBefore(s, t);
    });
</script> -->
</body>

</html>