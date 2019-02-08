@if(config('translatable.locales'))
    <div class="btn-group">
        <button type="button" class="btn btn-info">
            <i class="fa fa-language" aria-hidden="true"></i> {{__('global.lang_' . request('locale', config('translatable.locale')))}}
        </button>
        <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
            <span class="caret"></span>
            <span class="sr-only">Toggle Dropdown</span>
        </button>
        <ul class="dropdown-menu" role="menu">
            @foreach(config('translatable.locales') as $locale)
                <li><a href="{{ url()->current() . '?locale=' . $locale}}">{{__('global.lang_' . $locale)}}</a></li>
            @endforeach
        </ul>
    </div>
@endif