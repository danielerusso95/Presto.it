<x-layout>
<div class="container  p-5">
    <div class="row bg-white">
        <div class="col-12 text-center">
            @foreach ($categories as $cate)
                <a href="{{route('article.index', compact('cate', 'articles_category'))}}" class="mx-4">{{$cate->name}}</a>
            @endforeach
        </div>
    </div>
</div>
<div class="container mt-5">
    <div class="row">
        @if($category->id)
        @foreach($articles_category as $article)
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
        @else
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
        @endif
    </div>
    <div class="container mb-5">
        <div class="row justify-content-center">
            <div class="col-12">
                @foreach ($articles as $article)
                    {{ $article->name }}
                @endforeach
            </div>
        </div>
    </div>


</div>

</x-layout>
