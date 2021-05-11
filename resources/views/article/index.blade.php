<x-layout>

<div class="container">
    <div class="row">
        @foreach($articles as $article)
            <div class="col-12 col-md-4">
                <div class="card" style="width: 18rem;">
                    <img src="{{$article->img}}" class="card-img-top" alt="image random">
                    <div class="card-body">
                        <h5 class="card-title">Titolo: {{$article->title}}</h5>
                        <p class="card-subtitle">Prezzo: {{$article->price}}</p>
                        <p class="card-text">Descrizione: {{$article->body}}</p>
                        <a href="{{route('article.show', compact('article'))}}" class="btn btn-primary">Visualizza</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

</x-layout>