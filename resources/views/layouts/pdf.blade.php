<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">

    {{-- Application Tile --}}
    <meta name="application-name" content="{{ config('app.name') }}" />
    <meta name="msapplication-TileColor" content="#FFFFFF" />
    <meta name="msapplication-TileImage" content="{{ asset('mstile-144x144.png') }}" />
    <meta name="msapplication-square70x70logo" content="{{ asset('mstile-70x70.png') }}" />
    <meta name="msapplication-square150x150logo" content="{{ asset('mstile-150x150.png') }}" />
    <meta name="msapplication-wide310x150logo" content="{{ asset('mstile-310x150.png') }}" />
    <meta name="msapplication-square310x310logo" content="{{ asset('mstile-310x310.png') }}" />

    {{-- Application Icon --}}
    <link type="image/x-icon" href="{{ asset('favicon.ico?v=3') }}" rel="shortcut icon">
    <link type="image/x-icon" href="{{ asset('favicon.ico?v=2') }}" rel="icon">
    <link href="{{ asset('apple-touch-icon-57x57.png') }}" rel="apple-touch-icon-precomposed" sizes="57x57" />
    <link href="{{ asset('apple-touch-icon-114x114.png') }}" rel="apple-touch-icon-precomposed" sizes="114x114" />
    <link href="{{ asset('apple-touch-icon-72x72.png') }}" rel="apple-touch-icon-precomposed" sizes="72x72" />
    <link href="{{ asset('apple-touch-icon-144x144.png') }}" rel="apple-touch-icon-precomposed" sizes="144x144" />
    <link href="{{ asset('apple-touch-icon-60x60.png') }}" rel="apple-touch-icon-precomposed" sizes="60x60" />
    <link href="{{ asset('apple-touch-icon-120x120.png') }}" rel="apple-touch-icon-precomposed" sizes="120x120" />
    <link href="{{ asset('apple-touch-icon-76x76.png') }}" rel="apple-touch-icon-precomposed" sizes="76x76" />
    <link href="{{ asset('apple-touch-icon-152x152.png') }}" rel="apple-touch-icon-precomposed" sizes="152x152" />
    <link type="image/png" href="{{ asset('favicon-196x196.png') }}" rel="icon" sizes="196x196" />
    <link type="image/png" href="{{ asset('favicon-96x96.png') }}" rel="icon" sizes="96x96" />
    <link type="image/png" href="{{ asset('favicon-32x32.png') }}" rel="icon" sizes="32x32" />
    <link type="image/png" href="{{ asset('favicon-16x16.png') }}" rel="icon" sizes="16x16" />
    <link type="image/png" href="{{ asset('favicon-128.png') }}" rel="icon" sizes="128x128" />

    {{-- Title --}}
    <title>{{ config('app.name') }}</title>

    <style>
        @font-face {
            font-family: 'Calibri';
            font-style: normal;
            font-weight: normal;
            src: url({{ storage_path('fonts/calibri/Calibri.ttf') }}) format('truetype');
        }
        #oogabooga{
            text-align: right;
        }
        @font-face {
            font-family: 'Calibri';
            font-style: normal;
            font-weight: bold;
            src: url({{ storage_path('fonts/calibri/Calibri Bold.ttf') }}) format('truetype');
        }

        @font-face {
            font-family: 'Calibri';
            font-style: italic;
            font-weight: normal;
            src: url({{ storage_path('fonts/calibri/Calibri Italic.ttf') }}) format('truetype');
        }

        @font-face {
            font-family: 'Calibri';
            font-style: italic;
            font-weight: bold;
            src: url({{ storage_path('fonts/calibri/Calibri Bold Italic.ttf') }}) format('truetype');
        }
        div.h5{
            font-size: 7pt;
        }
        html,
        body {
            padding: 0;
            margin: 0;
        }

        body {
            
            padding-top: {{ config('paper.A4.margin.top') }}pt;
            padding-bottom: {{ config('paper.A4.margin.bottom') }}pt;
            font-family: 'Calibri';
            font-size: {{ config('paper.A4.font-size') }}pt;
            line-height: 90%;
        }

        #content {
            padding-left: {{ config('paper.A4.margin.left') }}pt;
            padding-right: {{ config('paper.A4.margin.right') }}pt;
        }

        table {
            border-spacing: 0;
            border-collapse: separate;
        }
    </style>

    @yield('styles')
</head>

<body>
    <div id="content">
        @yield('content')
    </div>

    {{-- Page numbering (location not affected by DPI) --}}
    <script type="text/php">
        if ( isset($pdf)) {
            $text = "{!! config('paper.A4.page-number.text') !!}";
            $font = $fontMetrics->get_font("Calibri", "normal");
            $size = {{ config('paper.A4.page-number.font-size') }};
            $color = {{ '['.implode(',',config('paper.A4.page-number.color')).']' }};
            {{--$x = {{ $definitions['page-number']['x-pos'] ?? 540 }};--}}
            $y = {{ config('paper.A4.page-number.y-pos') }};

            $textWidth = $fontMetrics->getTextWidth($text, $font, $size);
            $x = $pdf->get_width() - ($textWidth - 117.95 + 5.07 + 5.07) - {{ config('paper.A4.margin.right') }};

            $pdf->page_text($x, $y, $text, $font, $size, $color);
        }
    </script>
</body>

</html>