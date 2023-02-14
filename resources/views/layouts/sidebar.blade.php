<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="{{ url('/home') }}" class="brand-link">
        <img src="https://media.licdn.com/dms/image/C4D0BAQGK7AAESkDUfQ/company-logo_200_200/0/1642003481204?e=2147483647&v=beta&t=uHmRWvy1WDecF-l2Ktz2PFo8uxFXuGZcZ3QNTbUtmMM"
             alt="{{ config('app.name') }} Logo"
             class="brand-image img-circle elevation-3">
        <span class="brand-text font-weight-light">Cooperativa Guayacan</span>
    </a>
    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                @include('layouts.menu')
            </ul>
        </nav>
    </div>
</aside>
