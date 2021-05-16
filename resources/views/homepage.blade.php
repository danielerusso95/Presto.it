<x-layout>

    @if(session('access.denied.revisor.only'))
        <div class="alert alert-danger">
           Accesso negato. Solo per revisori.
        </div>
    @endif

    <x-_above />
        
    
    <div class="container mt-5">
        <h3 class="fs-2 mt-5 text-center mb-5">Ecco gli ultimi 5 articoli inseriti</h3>
        <div class="row">
            @foreach($articles_home as $article)
                <div class="col-12 mx-auto mx-md-0 mb-4">
                    <div class="rounded-2 pb-5 articlesForm justify-content-around align-items-center row mb-5">
                        <div class="col-12 text-center my-3"> 
                            <h3 class="mb-2">{{$article->customTitle($article,50)}}</h5>
                        </div>
                        <div class="col-12 col-md-4 ps-5">
                            <img src="{{$images[0]}}/200" class="img-fluid rounded-2" alt="image random">
                        </div>
                        <div class="col-12 col-md-6" style="">
                           <div class="ms-3 ms-md-0 card-body">
                               <h5 class="card-subtitle mb-3">Prezzo: {{$article->price}} €</h5>
                                <p class="card-text">Descrizione: {{$article->body}}</p>
                                <p class="card-text">Autore: {{$article->user->name}}</p>
                                @foreach ($categories as $cate)
                                    @if ($cate->id == $article->category_id)
                                        <p class="card-text">Categoria: <a href="{{route('article.index',compact('cate'))}}">{{$article->category->name}}</a></p>
                                    @endif
                                @endforeach
                                <p class="card-text">Creato il: {{$article->created_at}}</p>
                            </div>
                        </div>
                        <div class="col-12 col-md-2 d-flex justify-content-center d-md-block">
                            <a href="{{route('article.show', compact('article'))}}" class="btn btn-primary">Visualizza</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-layout>
