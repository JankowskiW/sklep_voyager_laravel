
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

            $isActive = null;
            $styles = null;
            $icon = null;

            // Background Color or Color
            if (isset($options->color) && $options->color == true) {
                $styles = 'color:'.$item->color;
            }
            if (isset($options->background) && $options->background == true) {
                $styles = 'background-color:'.$item->color;
            }

            // Check if link is current
            if(url($item->link()) == url()->current()){
                $isActive = 'active';
            }

            // Set Icon
            if(isset($options->icon) && $options->icon == true){
                $icon = '<i class="' . $item->icon_class . '"></i>';
            }

        @endphp
        <li class="nav-item active {{ $isActive }}">
            @if(Auth::user())
                @if($item->title == "Kategorie")
                    <a href="{{ url($item->link()) }}" target="{{ $item->target }}" style="{{ $styles }}"
                       class="links a-no-style" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {!! $icon !!}
                        <span class="links">{{ $item->title }}</span>
                    </a>
                    <div class="bg-orange dropdown-menu">
                        @foreach($categories as $category)
                            <a href="/categories?categoryId={{ $category->id }}"
                               class="h-100 w-100 no-decoration-links">{{ $category->name }}</a>
                            <div class="dropdown-divider"></div>
                        @endforeach
                    </div>
                @elseif($item->title != "Zaloguj" && $item->title != "Zarejestruj")
                    <a href="{{ url($item->link()) }}" target="{{ $item->target }}" style="{{ $styles }}" class="links">
                        {!! $icon !!}
                        <span class="links">{{ $item->title }}</span>
                    </a>
                @endif
            @elseif(Auth::guest())
                @if($item->title == "Kategorie")
                    <a href="{{ url($item->link()) }}" target="{{ $item->target }}" style="{{ $styles }}"
                       class="links a-no-style" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {!! $icon !!}
                        <span class="links">{{ $item->title }}</span>
                    </a>
                    <div class="bg-orange dropdown-menu">
                        @foreach($categories as $category)
                            <a href="/categories?categoryId={{ $category->id }}"
                               class="h-100 w-100 no-decoration-links">{{ $category->name }}</a>
                            <div class="dropdown-divider"></div>
                        @endforeach
                    </div>
                @elseif($item->title != "Wyloguj")
                    <a href="{{ url($item->link()) }}" target="{{ $item->target }}" style="{{ $styles }}" class="links">
                        {!! $icon !!}
                        <span class="links">{{ $item->title }}</span>
                    </a>
                @endif
            @endif
            @if(!$originalItem->children->isEmpty())
                @include('voyager::menu.default', ['items' => $originalItem->children, 'options' => $options])
            @endif
        </li>
    @endforeach

