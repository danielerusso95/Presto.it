<x-layout>
<div class="container  p-5">
    <div class="row">
        <div class="col-12 text-center">
            <h3 class="text-center mb-3">Seleziona la categoria che desideri</h3>
            @foreach ($categories as $cate)
            <button class="p-0 rounded my-2 border-0 shadow ">
                <a href="{{route('article.index', compact('cate'))}}" class="mx-4 text-decoration-none">{{$cate->name}}</a>
            </button>

            @endforeach
        </div>
    </div>
</div>
<div class="container mt-5">
    <div class="row">
        @if($category->id)
        <div class="col-12"><h3 class="text-center mb-5">Ecco gli articoli della categoria {{$category->name}}</h3></div>
        @foreach($articles_category as $article)
        <div class="col-12 col-md-4 mb-5 ">
            <div class="card mx-auto" style="width: 18rem;">
                <img src="{{$images[0]}}200" class="card-img-top" alt="image random">
                <div class="card-body">
                    <h5 class="card-title">Titolo: {{$article->title}}</h5>
                    <h5 class="card-subtitle mb-5">Prezzo: {{$article->price}} €</h5>
                    <p class="card-text">Descrizione: {{$article->body}}</p>
                    <p class="card-text">Autore: {{$article->user->name}}</p>
                    <p class="card-text">Categoria: {{$article->category->name}}</p>
                    <p class="card-text">Creato il: {{$article->created_at}}</p>
                    <a href="{{route('article.show', compact('article'))}}" class="btn btn-primary">Visualizza</a>
                </div>
            </div>
        </div>
        @endforeach
        <div class="container mb-5">
            <div class="row justify-content-center">
                <div class="col-12">
                    @foreach ($articles_category as $article)
                        {{ $article->name }}
                    @endforeach
                </div>
            </div>
        </div>
        {{ $articles_category->links() }}
        @else
        <div class="col-12"><h3 class="text-center mb-5">Ecco tutti gli articoli</h3></div>
            @foreach($articles as $article)
                <div class="col-12 col-md-4 mb-5 ">
                    <div class="card mx-auto" style="width: 18rem;">
                        <img src="{{$images[0]}}200" class="card-img-top" alt="image random">
                        <div class="card-body">
                            <h5 class="card-title">Titolo: {{$article->title}}</h5>
                            <h5 class="card-subtitle mb-5">Prezzo: {{$article->price}} €</h5>
                            <p class="card-text">Descrizione: {{$article->body}}</p>
                            <p class="card-text">Autore: {{$article->user->name ?? ''}}</p>
                            <p class="card-text">Categoria: {{$article->category->name}}</p>
                            <p class="card-text">Creato il: {{$article->created_at}}</p>
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
            {{ $articles->links() }}
        @endif
    </div>


</div>

</x-layout>
