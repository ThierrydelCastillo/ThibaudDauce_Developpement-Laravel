<h1>{{ $article->title() }}</h1>

<iframe src="{{ $article->youtube() }}" frameborder="0"></iframe>


{!! $article->html() !!}