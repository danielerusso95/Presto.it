<x-layout>
    <div class="container">
        <div class="content-section-heading text-center">
            <h3>Risultati ricerca per: {{$q}}</h3>
        </div>
        <div class="row">
            @foreach($articles as $article)
            <div class="col-12 col-md-4 mb-5 ">
                <div class="card mx-auto" style="width: 18rem;">
                    <img src="{{$images[0]}}200" class="card-img-top" alt="image random">
                    <div class="card-body">
                        <h5 class="card-title">Titolo: {{$article->title}}</h5>
                        <p class="card-subtitle">Prezzo: {{$article->price}} €</p>
                        <p class="card-text">Descrizione: {{$article->body}}</p>
                        <p class="card-text">Autore: {{$article->user->name ?? ''}}</p>
                        <a href="{{route('article.show', compact('article'))}}" class="btn btn-primary">Visualizza</a>
                    </div>
                </div>
            </div>

        @endforeach
        <div class="container mb-5">
            <div class="row justify-content-center">
                <div class="col-12">
                    @foreach ($articles as $article)
                        {{ $article->name }}
                    @endforeach
                </div>
            </div>
        </div>
        
            <div class="col-12">
                {{ $articles->links() }}
            </div>
        </div>
    </div>


</x-layout>
