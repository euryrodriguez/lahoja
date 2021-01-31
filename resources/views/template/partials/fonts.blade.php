<link rel="preconnect" href="https://fonts.gstatic.com">
@foreach($fonts as $font)
    <link href="{{ $font->url}}" rel="stylesheet">
@endforeach