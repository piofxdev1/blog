<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

       @include("components.themes.front.blocks.styles")

        <title>Piofx</title>
    </head>
    <body class="antialiased">

        @include("components.themes.front.blocks.header")

        {{ $slot }}

        @include("components.themes.front.blocks.footer")
        @include("components.themes.front.blocks.scrolltop")
        @include("components.themes.front.blocks.scripts")

    </body>
</html>
