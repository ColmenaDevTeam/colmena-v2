<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8">
<title>Colmena - Sistema de Gestión de Talento Humano</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="description" content="" />
<meta name="author" content="" />
<!-- css -->

<link href="/css/bootstrap.min.css" rel="stylesheet" />
<link href="/css/fancybox/jquery.fancybox.css" rel="stylesheet">
<link href="/css/flexslider.css" rel="stylesheet" />
<link href="/css/style.css" rel="stylesheet" />
@yield('customcss')

<!--Estos archivos no existen en el template original
<link href="css/jcarousel.css" rel="stylesheet" />

<link href="/js/owl-carousel/owl.carousel.css" rel="stylesheet">
-->
<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
<style>
    .dropdown-menu{
        background-color: #2FADDE;
    }
    .highlight{
        font-weight: bold;
    }
    .panel-heading span{
        font-size: 30px;
        font-weight: bold;
        color: #656565;
    }
    .badge-menu-bar{
        background-color: black;
    }
</style>
@include("layouts.menu")
</head>
	<body>
		<div id="wrapper">

			@yield('content')


		</div><!-- ./wrapper -->
			@include("layouts.footer")
		<!-- javascript
		================================================== -->
		<!-- Placed at the end of the document so the pages load faster -->
		<script src="/js/jquery.min.js"></script>
		@yield('customjs')
		<script src="/js/jquery.easing.1.3.js"></script>
		<script src="/js/bootstrap.min.js"></script>
		<script src="/js/jquery.fancybox.pack.js"></script>
		<script src="/js/jquery.fancybox-media.js"></script>
		<script src="/js/portfolio/jquery.quicksand.js"></script>
		<script src="/js/portfolio/setting.js"></script>
		<script src="/js/jquery.flexslider.js"></script>
		<script src="/js/animate.js"></script>
		<script src="/js/custom.js"></script>
		<!--Archivo faltante en el template original
		<script src="/js/owl-carousel/owl.carousel.js"></script>
		-->
		<script src="/js/main.js"></script>
	</body>
</html>
