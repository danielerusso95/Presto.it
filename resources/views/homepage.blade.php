<x-layout>
    <h3 class="mt-5 text-center">Ecco gli ultimi 5 articoli inseriti</h3>
    <div class="container-fluid d-flex justify-content-center mt-5">
        <div class="row">
            <div class="col-12">
                    @foreach($articles_home as $article)
                   
                    <div class="col-12 mb-5">
                    <div class="card mx-auto" style="width: 18rem;">
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
    </div>
</x-layout>
