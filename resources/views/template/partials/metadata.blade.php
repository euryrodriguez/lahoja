<meta name="title" content="Hojas de presentación para trabajos universitarios UASD | UTESA | ITSC | O&M">
<meta name="description" content="Imprime tus hojas de presentación para trabajos universitarios UASD | UTESA | ITSC | O&M">
<meta charset="utf-8">
<link rel="canonical" href="https://lahoja.herokuapp.com/"/>
<meta property="og:locale" content="es_ES"/>
<meta property="og:title" content="Hojas de presentación para trabajos universitarios UASD | UTESA | ITSC | O&M"/>
<meta property="og:description"
      content="Hojas de presentación para trabajos universitarios UASD | UTESA | ITSC | O&M"/>
<meta property="og:url" content="https://lahoja.herokuapp.com/"/>
<meta property="og:site_name" content="Hojas de presentación para trabajos universitarios UASD | UTESA | ITSC | O&M"/>
<meta property="og:image"
      content="{{ asset('img/captura-app.png')  }}"/>
<meta property="og:image:secure_url"
      content="{{ asset('img/captura-app.png')  }}"/>
<meta property="og:image:width" content="521"/>
<meta property="og:image:height" content="296"/>
<meta property="og:image:alt" content="Hojas de presentación para trabajos universitarios UASD | UTESA | ITSC | O&M"/>
<!-- / Yoast SEO Premium plugin. -->

<meta property='og:image' content='{{ asset('img/captura-app.png')  }}'/>
<meta name="viewport" content="width=device-width, initial-scale=1"/>
<meta name="robots" content="index, follow"/>
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="public-path" content="{{ asset('/') }}">

<title>@yield('title') lahoja | Hojas de presentación</title>

@include('template.partials.fonts')
@include('template.partials.clases')

<link rel="stylesheet" href="{{ asset('css/app.css') }}">