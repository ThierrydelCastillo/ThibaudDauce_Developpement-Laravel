@extends('layout')

@section('title')
    @parent - {{ $article->title() }}
@endsection


@push('scripts')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/styles/solarized-light.min.css"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/highlight.min.js"></script>
    <script>
        document.querySelectorAll('pre code').forEach(function(block) {
            hljs.highlightBlock(block);
        });
    </script>
@endpush

@section('content')

<iframe src="{{ $article->youtube() }}" frameborder="0"></iframe>


{!! $article->html() !!}

@endsection