<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
	@include('layouts.includes.head')
</head>

<body class="">


	<div id="page-container" class="page-container">

		@include('layouts.includes.navigation')

		<div id="app" class="main-content">
			@yield('content')
		</div>


		@include('layouts.includes.footer')

	</div>

	@include('layouts.includes.scripts')
</body>
</html>
