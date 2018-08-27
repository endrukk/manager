@if(isset($footer_scripts) && is_array($footer_scripts))
    @foreach($footer_scripts as $script)
        {{--this prints HTML, and not escapes chars--}}
        {!! $script !!}
    @endforeach
@endif