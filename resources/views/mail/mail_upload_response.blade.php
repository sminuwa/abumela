@foreach($previews as $preview)
    {{--    <img width="100" src="mails/{{ $preview->name }}"  alt=""/>--}}
    {{--    {{ $preview->name }}--}}

    <ul>
        <li>
            <a href="{{ asset('mails').'/'. $preview->name }}" title="Preview" target="_blank">
                {{ $preview->name }}
            </a>
        </li>
    </ul>

@endforeach
