<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />

<title>{{ $title ?? 'Laravel' }}</title>

<link rel="preconnect" href="https://fonts.bunny.net">
<link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
<script src="{{ asset('js/chart.min.js') }}"></script>
<link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">

@vite(['resources/css/app.css', 'resources/js/app.js'])
@fluxAppearance
