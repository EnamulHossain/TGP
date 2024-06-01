<h2 class="d-none">Navigation</h2>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="/" class="brand-link">
        <img src="{{asset('/images/logo.png')}}" alt="{{ config('app.name') }} Logo" class="brand-image elevation-3 bg-white" style="opacity: .8">
        <span class="brand-text font-weight-light">The Grant Portal</span>
    </a>

    <section class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent text-sm" data-widget="treeview" role="menu" data-accordion="false">
                @include('admin.partials.navigation.navigation_list', ['collection' => $navigation['root']])
            </ul>
        </nav>
    </section>
</aside>
