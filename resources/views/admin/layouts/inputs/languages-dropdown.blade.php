@if(config('translatable.locales'))
    <div class="btn-group">
        <button class="btn btn-info btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-language" aria-hidden="true"></i> {{__('global.lang_' . request('locale', config('translatable.locale')))}}
        </button>
        <div class="dropdown-menu">
            @foreach(config('translatable.locales') as $locale)
                <a class="dropdown-item" href="{{ url()->current() . '?locale=' . $locale}}">{{__('global.lang_' . $locale)}}</a>
            @endforeach
        </div>
    </div>
@endif