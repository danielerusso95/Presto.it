<x-layout>

    @if(session('access.denied.revisor.only'))
        <div class="alert alert-danger">
           Accesso negato. Solo per revisori.
        </div>
    @endif

    <div class="container-fluid">
        <div class="row my-5 justify-content-around">
            <div class="col-12 col-md-4 text-center">
            <h1 class="my-3">Benvenuti su Presto!</h1>
            <h4>Qui puoi mettere in vendita ciò che non usi più e cercare i tuoi acquisti tra migliaia di annunci</h4>
            <x-_above />
            </div>

            <div class="col-10 col-md-6 d-flex justify-content-center">
                <img class="img-fluid mx-auto" src="/img/205-2057055_compras-por-internet-icono-png-e-commerce-development-removebg-preview.png" alt="">
            </div>
        </div>
    </div>

    <h3 class="mt-5 text-center">Ecco gli ultimi 5 articoli inseriti</h3>
    <div class="container-fluid mt-5">
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
