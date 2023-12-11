@foreach ($articles as $article)
    <h1>{{ $article['title'] }}</h1>

    <iframe src="{{ $article['youtube'] }}" frameborder="0"></iframe>

    <a href="{{ $article['url']}}">Lire +</a>
@endforeach