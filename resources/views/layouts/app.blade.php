<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	
	<link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">

	<title>Reddit Clone</title>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-12 offset-md-12">
				<h1>Reddit Clone</h1>
			</div>
		</div>
		<hr>
		
		@yield('content')
	</div> {{-- container --}}
	
	{{-- Optional JavaScript --}}
    {{-- jQuery first, then Popper.js, then Bootstrap JS --}}
	<script src="{{ asset('js/jquery.js') }}"></script>
	<script src="{{ asset('js/popper.js') }}"></script>
	<script src="{{ asset('js/bootstrap.js') }}"></script>
</body>
</html>