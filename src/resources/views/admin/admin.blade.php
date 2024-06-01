<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="author" content="{{ config('app.author') }}">
    <meta name="keywords" content="{{ config('app.keywords') }}">
    <meta name="description" content="{{ $description ?? config('app.description') }}" />

    <meta property="og:type" name="og:type" content="website" />
    <meta property="og:site_name" content="{{ config('app.name') }}" />
    <meta property="og:url" name="og:url" content="{{ request()->url() }}" />
    <meta property="og:caption" name="og:caption" content="{{ config('app.url') }}" />
    <meta property="fb:app_id" name="fb:app_id" content="{{ config('app.facebook_id') }}" />
    <meta property="og:title" name="og:title" content="{{ $title ?? config('app.title') }}">
    <meta property="og:description" name="og:description" content="{{ $description ?? config('app.description') }}">
    <meta property="og:image" name="og:image" content="{{ config('app.url') }}{{ $image ?? asset('/images/logo.png') }}">

    <link rel="shortcut icon" type="image/ico" href="{{ asset('/images/TGP-favicon.png') }}"> 

    <title>{{ $title ?? config('app.name') }}</title>

    @if(config('app.env') !== 'local')
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700">
    @endif
    @yield('prestyles')
    <link rel="stylesheet" href="{{asset('/css/admin.css?v=')}}{{ config('app.assets_version') }}">

      <script src="https://cdn.tiny.cloud/1/3e9uhj6rlt8ft89v9yg4wgku75nlnv2incpdeibs0ta01gsy/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: 'textarea#myeditorinstance',
            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
            tinycomments_mode: 'embedded',
        });
    </script>
    @yield('styles')
</head>

<body class="hold-transition sidebar-mini">
    {{-- <h1 class="d-none">{{ $title ?? config('app.name') }}</h1> --}}

    <div class="wrapper">
        @include('admin.partials.header')

        @include('admin.partials.navigation')

        <div class="content-wrapper text-sm pt-3 pb-1">
            <section class="content">
                <h2 class="d-none">Page</h2>
                @yield('content')
            </section>
        </div>

        <footer class="main-footer bg-dark">
            <div class="row">
                <div class="col-sm-6 text-left">
                    <small>Copyright &copy; {{ date('Y') }}
                        <strong>Promero, Inc. All Rights Reserved </strong>
                    </small>
                </div>
                {{-- <div class="col-sm-6 text-left text-sm-right">
                        <small>
                            Developed by
                        </small>
                    </div> --}}
            </div>
        </footer>
    </div>
    @include('notify::notify')
    @include('admin.partials.modals')
    <script type="text/javascript" charset="utf-8" src="{{asset('/js/admin.js?v=')}}{{ config('app.assets_version') }}"></script>
    @yield('scripts')
    @if(config('app.env') !== 'local')
    @include('partials.analytics')
    @endif
</body>
</html>
