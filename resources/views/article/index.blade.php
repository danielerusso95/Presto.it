<x-layout>
<h3 class="mt-5 text-center">Indice degli annunci</h3>
<div class="container mt-5">
    <div class="row">
        @foreach($articles as $article)
            <div class="col-12 col-md-4 mb-5 ">
                <div class="card mx-auto" style="width: 18rem;">
                    <img src="{{$article->img}}" class="card-img-top" alt="image random">
                    <div class="card-body">
                        <h5 class="card-title">Titolo: {{$article->title}}</h5>
                        <p class="card-subtitle">Prezzo: {{$article->price}} €</p>
                        <p class="card-text">Descrizione: {{$article->body}}</p>
                        <a href="{{route('article.show', compact('article'))}}" class="btn btn-primary">Visualizza</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="container mb-5">
        @foreach ($articles as $article)
            {{ $article->name }}
        @endforeach
    </div>

    {{ $articles->links() }}
</div>

</x-layout>
