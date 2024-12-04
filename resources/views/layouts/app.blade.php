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
    <link rel="stylesheet" href="{{ asset('assets')}}/js/materialize.css">
    <link href="{{ asset('assets')}}/js/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css" />
    {{-- <link href="{{ asset('assets')}}/js/plugins/bootstrap-datetimepicker/dist/css/bootstrap-datetimepicker.min.css"/>
    --}}

    {{-- <!-- Compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css"> --}}

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
    {{-- External --}}
    <script src="{{ asset('assets')}}/js/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
    {{-- <script src="{{ asset('assets')}}/js/plugins/bootstrap-datetimepicker/dist/js/bootstrap-datetimepicker.min.js">
    </script> --}}

    {{-- <!-- Compiled and minified JavaScript -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
   --}}
    <script src="http://cdn.jsdelivr.net/timepicker.js/latest/timepicker.min.js"></script>
    <link href="http://cdn.jsdelivr.net/timepicker.js/latest/timepicker.min.css" rel="stylesheet" />



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
    <script type="text/javascript">
    $('.date').datepicker({
        format: 'yyyy-mm-dd'

    });
    </script>
    {{-- <script>
var timepicker = new TimePicker('time', {
  lang: 'en',
  theme: 'dark'
});
timepicker.on('change', function(evt) {
  
  var value = (evt.hour || '00') + ':' + (evt.minute || '00');
  evt.element.value = value;

});
</script> --}}
    <!-- <script>
$( document ).ready(function() {
  // Date Time Picker Initialization
  $('.date-time').dateTimePicker();
});
</script> -->
    <script>
    $(function() {
        var d = new Date(),
            h = d.getHours(),
            m = d.getMinutes();
        if (h < 10) h = '0' + h;
        if (m < 10) m = '0' + m;
        $('input[type="time"][value="now"]').each(function() {
            $(this).attr({
                'value': h + ':' + m
            });
        });
    });
    </script>
    {{-- <script>
    const Calender = document.querySelector('.datepicker');
    M.datepicker.init(Calender,{})
</script>  --}}

    <!-- Format Rupiah -->
    <!-- <script>
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
</script> -->

    <!-- ChatBot -->
    <!-- <script>
    document.addEventListener('DOMContentLoaded', function() {
        var s,t; s = document.createElement('script'); s.type = 'text/javascript';
        s.src = 'https://s3-ap-southeast-1.amazonaws.com/qiscus-sdk/public/qismo/qismo-v2.js'; s.async = true;
        s.onload = s.onreadystatechange = function() { new Qismo("mol-xoswrga2wrpbmvbq6"); }
        t = document.getElementsByTagName('script')[0]; t.parentNode.insertBefore(s, t);
    });
</script> -->

    <!-- Search -->
    <!-- <script>
    $(document).ready(function() {
        $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#myTable tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
    </script> -->
</body>

</html>