<nav class="site-navigation position-relative text-right" role="navigation">
    <ul class="site-menu main-menu js-clone-nav mr-auto d-none d-lg-block">
        @php
            if (Voyager::translatable($items)) {
                $items = $items->load('translations');
            }
        @endphp

        @foreach ($items as $item)
            @php
                $originalItem = $item;
                if (Voyager::translatable($item)) {
                    $item = $item->translate($options->locale);
                }

                $listItemClass = null;
                $linkAttributes =  null;
                $styles = null;
                $icon = null;
                $caret = null;

                // Background Color or Color
                if (isset($options->color) && $options->color == true) {
                    $styles = 'color:'.$item->color;
                }
                if (isset($options->background) && $options->background == true) {
                    $styles = 'background-color:'.$item->color;
                }

                // With Children Attributes
                if(!$originalItem->children->isEmpty()) {
                    $linkAttributes =  'class="dropdown-toggle" data-toggle="dropdown"';
                    $caret = '<span class="caret"></span>';

                    if(url($item->link()) == url()->current()){
                        $listItemClass = 'dropdown active';
                    }else{
                        $listItemClass = 'dropdown';
                    }
                }

                // Set Icon
                if(isset($options->icon) && $options->icon == true){
                    $icon = '<i class="' . $item->icon_class . '"></i>';
                }

            @endphp


            @if(!$originalItem->children->isEmpty()) 
                <li class="has-children">
                @if(!$originalItem->children->isEmpty())
                     <a href="#" class="nav-link text-left">{{$item->title}}</a>
                     <ul class="dropdown">
                        @foreach($originalItem->children as $child)
                            <li>
                                <a href="{{url($child->link())}}">
                                    {{$child->title}}
                                </a>
                            </li>
                        @endforeach
                     </ul>   
                  @endif        
                </li>
            @else                
            <li>
                <a class="nav-link text-left" href="{{ url($item->link()) }}" target="{{ $item->target }}" style="{{ $styles }}" {!! $linkAttributes ?? '' !!}>
                    <span>{{ $item->title }}</span>
                </a>
            </li>
            @endif    
        @endforeach    
    </ul>    
</nav>    