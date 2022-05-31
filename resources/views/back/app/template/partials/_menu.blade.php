<div class="side-menu sidebar-inverse">
    <nav class="navbar navbar-default" role="navigation">
        <div class="side-menu-container">
            <div class="navbar-header">
                <a class="navbar-brand" href="{{ route('voyager.dashboard') }}">
                    <div class="logo-icon-container">
                        <?php $admin_logo_img = Voyager::setting('admin.icon_image', ''); ?>
                        @if ($admin_logo_img == '')
                            <img src="{{ voyager_asset('images/logo-icon-light.png') }}" alt="Logo Icon">
                        @else
                            <img src="{{ Voyager::image($admin_logo_img) }}" alt="Logo Icon">
                        @endif
                    </div>
                    <div class="title">{{ Voyager::setting('admin.title', 'VOYAGER') }}</div>
                </a>
            </div><!-- .navbar-header -->

            <div class="panel widget center bgimage"
                style="background-image:url({{ Voyager::image(Voyager::setting('admin.bg_image'), voyager_asset('images/bg.jpg')) }}); background-size: cover; background-position: 0px;">
                <div class="dimmer"></div>
                <div class="panel-content">
                    <img src="{{ asset('storage/' . Auth::user()->avatar) }}" class="avatar"
                        alt="{{ Auth::user()->name }} avatar">
                    <h4>{{ ucwords(Auth::user()->name) }}</h4>
                    <p>{{ Auth::user()->email }}</p>

                    <a href="{{ route('voyager.profile') }}"
                        class="btn btn-primary">{{ __('voyager::generic.profile') }}</a>
                    <div style="clear:both"></div>
                </div>
            </div>

        </div>
        <div id="adminmenu">
            {{-- <admin-menu :items="{{ menu('back', '_json') }}"></admin-menu> --}}
            {{-- {!! menu('back', '_json') !!} --}}
            {{-- {!! menu('back','back-menu') !!} --}}

            @php
                $menus = menu('back', '_json');
            @endphp

            <ul class="nav navbar-nav">
                @foreach ($menus as $item)
                    {{-- <li class="{{ classes($item) }}"> --}}
                    <li>
                        <a target="{{ $item->target }}"
                            href="{{ count($item->children) > 0 ? '#' . $item->id . '-dropdown-element' : $item->url }}"
                            style="'color:'+{{ $item->color }}"
                            data-toggle="{{ count($item->children) > 0 ? 'collapse' : false }}"
                            aria-expanded="{{ count($item->children) > 0 ? String($item->active) : false }}">
                            <span class="icon {{ $item->icon_class }}"></span>
                            <span class="title">{{ $item->title }}</span>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </nav>
</div>
