<!DOCTYPE html>
<html lang="en" data-theme="light">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="{{ config('app.author') }}">
    <meta name="keywords" content="{{ config('app.keywords') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="{{ $description ?? config('app.description') }}" />
    <meta property="og:type" name="og:type" content="website" />
    <meta property="og:site_name" content="{{ config('app.name') }}" />
    <meta property="og:url" name="og:url" content="{{ request()->url() }}" />
    <meta property="og:caption" name="og:caption" content="{{ config('app.url') }}" />
    <meta property="fb:app_id" name="fb:app_id" content="{{ config('app.facebook_id') }}" />
    <meta property="og:title" name="og:title" content="{{ $title ?? config('app.title') }}">
    <meta property="og:description" name="og:description" content="{{ $description ?? config('app.description') }}">
    <meta property="og:image" name="og:image" content="{{ config('app.url') }}{{ $image ?? '/images/logo.png' }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400&display=swap" rel="stylesheet">
    <link href="{{ asset('/images/TGP-favicon.png') }}" rel="icon" type="image/png">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdn.tiny.cloud/1/3e9uhj6rlt8ft89v9yg4wgku75nlnv2incpdeibs0ta01gsy/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: '#OppDesSubInstance',
            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
            tinycomments_mode: 'embedded',
        });

        tinymce.init({
            selector: '#addNoteInstance',
            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
            tinycomments_mode: 'embedded',
        });

        tinymce.init({
            selector: '#opportunityTeaserInstance',
            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
            tinycomments_mode: 'embedded',
        });
    </script>
    <title>@yield('title', 'The Grant portal')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('icons/font-awesome-4.7.0/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">

    @yield('styles')
</head>

<body>
    @include('website.partials.header')
    @include('website.chat_snippets')

    <main>
        @yield('content')
    </main>

    @include('website.partials.footer')
    @stack('js')
</body>

</html>