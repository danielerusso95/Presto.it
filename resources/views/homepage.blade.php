<x-layout>

    @if(session('access.denied.revisor.only'))
        <div class="alert alert-danger">
           Accesso negato. Solo per revisori.
        </div>
    @endif

    <x-_above />
        
    
    <div class="container-fluid mt-5">
        <h3 class="mt-5 text-center">Ecco gli ultimi 5 articoli inseriti</h3>
        <div class="row">
            @foreach($articles_home as $article)
                <div class="col-12 col-md-4">
                    <div class="mb-5">
                        <div class="card mx-auto" style="">
                            <img src="{{$images[0]}}/200" class="card-img-top" alt="image random">
                            <div class="card-body">
                                <h5 class="card-title mb-1">Titolo: {{$article->title}}</h5>
                                <h5 class="card-subtitle mb-3">Prezzo: {{$article->price}} €</h5>
                                <p class="card-text">Descrizione: {{$article->body}}</p>
                                <p class="card-text">Autore: {{$article->user->name}}</p>
                                @foreach ($categories as $cate)
                                    @if ($cate->id == $article->category_id)
                                        <p class="card-text">Categoria: <a href="{{route('article.index',compact('cate'))}}">{{$article->category->name}}</a></p>
                                    @endif
                                @endforeach
                                <p class="card-text">Creato il: {{$article->created_at}}</p>
                                <a href="{{route('article.show', compact('article'))}}" class="btn btn-primary">Visualizza</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-layout>
