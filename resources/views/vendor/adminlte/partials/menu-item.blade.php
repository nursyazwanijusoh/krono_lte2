@if (is_string($item))
    <li class="header">{{ $item }}</li>
@elseif (isset($item['header']))
    <li class="header">{{ $item['header'] }}</li>
@elseif (isset($item['search']) && $item['search'])
    <form action="{{ $item['href'] }}" method="{{ $item['method'] }}" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="{{ $item['input_name'] }}" class="form-control" placeholder="
            {{ $item['text'] }}
          ">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat">
                  <i class="fas fa-search"></i>
                </button>
              </span>
        </div>
      </form>
@elseif (isset($item['otmodal']))
    <!-- <li class="{{ $item['class'] }}">
        <a href="#"
        data-toggle="modal" data-target="#applyOT"
        >
        <i class="{{ $item['icon'] ?? 'far fa-fw fa-circle' }} {{ isset($item['icon_color']) ? 'text-' . $item['icon_color'] : '' }}"></i>
            <span>
                {{ $item['text'] }}
            </span></a>
    </li> -->
@elseif (isset($item['otnew']))
    <li class="{{ $item['class'] }}">
        <a href="{{ route('ot.formnew') }}"
           @if (isset($item['target'])) target="{{ $item['target'] }}" @endif
        >
        <i class="{{ $item['icon'] ?? 'far fa-fw fa-circle' }} {{ isset($item['icon_color']) ? 'text-' . $item['icon_color'] : '' }}"></i>
            <span>
                {{ $item['text'] }}
            </span></a>
    </li>
@elseif (isset($item['otm']))
    <li class="{{ $item['class'] }}">
        <a href="{{ route('oe.otm') }}"
           @if (isset($item['target'])) target="{{ $item['target'] }}" @endif
        >
        <i class="{{ $item['icon'] ?? 'far fa-fw fa-circle' }} {{ isset($item['icon_color']) ? 'text-' . $item['icon_color'] : '' }}"></i>
            <span>
                {{ $item['text'] }}
            </span></a>
    </li>
@else
    <li class="{{ $item['class'] }}">
        <a href="{{ $item['href'] }}"
           @if (isset($item['target'])) target="{{ $item['target'] }}" @endif
        >
            <i class="{{ $item['icon'] ?? 'far fa-fw fa-circle' }} {{ isset($item['icon_color']) ? 'text-' . $item['icon_color'] : '' }}"></i>
            <span>
                {{ $item['text'] }}
            </span>

            @if (isset($item['label']))
                <span class="pull-right-container">
                    <span class="label label-{{ $item['label_color'] ?? 'primary' }} pull-right">{{ $item['label'] }}</span>
                </span>
            @elseif (isset($item['submenu']))
                <span class="pull-right-container">
                    <i class="fas fa-angle-left pull-right"></i>
                </span>
            @endif
        </a>
        @if (isset($item['submenu']))
            <ul class="{{ $item['submenu_class'] }}" style="padding-left: 24px;">
                @each('adminlte::partials.menu-item', $item['submenu'], 'item')
            </ul>
        @endif
    </li>
@endif
