<header class="site-navbar py-4 js-sticky-header site-navbar-target" role="banner">

    <div class="container">
        <div class="d-flex align-items-center">
            <div class="site-logo">
                <a href="{{ url('/') }}" class="d-block">
                    <img src="{{ asset('storage/' . $infos->logo->img) }}" alt="Image" class="img-fluid">
                </a>
            </div>
            <div class="mr-auto">
                @include('site.template.partials._menu')
            </div>
            <div class="ml-auto">
                <div class="social-wrap">
                    <a href="#"><span class="icon-facebook"></span></a>
                    <a href="#"><span class="icon-twitter"></span></a>
                    <a href="#"><span class="icon-linkedin"></span></a>

                    <a href="#" class="d-inline-block d-lg-none site-menu-toggle js-menu-toggle text-black"><span
                            class="icon-menu h3"></span></a>
                </div>
            </div>

        </div>
    </div>

</header>
