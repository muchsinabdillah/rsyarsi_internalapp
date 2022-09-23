<!DOCTYPE html>
<html lang="zxx" class="js">

<head>
    <base href="../../../">
    <meta charset="utf-8">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="A powerful and conceptual apps base dashboard template that especially build for developers and programmers.">
    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="{{ URL::asset('images/loginJoinKilatFix.png') }}">
    <!-- Page Title  -->
    <title>RS YARSI Dashboard</title>
    <!-- StyleSheets  -->
    <link rel="stylesheet" href="{{ URL::asset('assets/css/dashlite.css?ver=3.0.0') }}">
    <link id="skin-default" rel="stylesheet" href="{{ URL::asset('assets/css/theme.css?ver=3.0.0') }}">

     <script src="{{ URL::asset('js/jquery3.6.0.min.js') }}"></script>
    
    <script src="{{ URL::asset('js/bootstrap3-typeahead.min.js') }}"></script>
    
</head>
<body class="nk-body bg-white npc-general pg-auth">
    @yield('container')
    <script src="{{ URL::asset('assets/js/bundle.js?ver=3.0.0') }}"></script> 
    <script src="{{ URL::asset('assets/js/charts/gd-default.js?ver=3.0.0') }}"></script>
    <script src="{{ URL::asset('js/trix.js') }}"></script>
    <script src="{{ URL::asset('js/sweetalert.min.js') }}"></script> 
    <script src="{{ URL::asset('js/JsBarcode.all.min.js') }}"></script>
        <!--Start of Tawk.to Script-->
    {{-- <script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
    var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
    s1.async=true;
    s1.src='https://embed.tawk.to/627775e0b0d10b6f3e712174/1g2ha8tm1';
    s1.charset='UTF-8';
    s1.setAttribute('crossorigin','*');
    s0.parentNode.insertBefore(s1,s0);
    })();
    </script> --}}
    <!--End of Tawk.to Script-->
</body>
