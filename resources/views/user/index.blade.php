<x-layout>
    <div class="container  p-5">
        <div class="row">
            <div class="col-12 text-center">
                <h3 class="text-center mb-3">I tuoi Annunci</h3>

            </div>
        </div>
    </div>
    <div class="container mt-5">
        <h3 class="text-center mb-5">Annunci approvati</h3>
        <div class="row">
            @foreach($revisedArticles as $article)
            <div class="col-12 col-lg-4 mb-5 ">
                <div class="card mx-auto" style="width: 100%;">
                    <img src="{{$images[0]}}200" class="card-img-top" alt="image random">
                    <div class="card-body">
                        <h5 class="card-title">{{$article->customTitle($article,20)}}</h5>
                        <h5 class="card-subtitle my-3">Prezzo: {{$article->price}} €</h5>
                        <p class="card-text">Descrizione: {{$article->body}}</p>
                        <p class="card-text">Autore: {{$article->user->name}}</p>
                        @foreach ($categories as $cate)
                            @if ($cate->id == $article->category_id)
                                <p class="card-text">Categoria: <a href="{{route('article.index',compact('cate'))}}">{{$article->category->name}}</a></p>
                            @endif
                        @endforeach
                        <p class="card-text">Creato il: {{$article->created_at}}</p>
                        <a href="{{route('article.show', compact('article'))}}" class="btn btn-primary">Visualizza</a>
                        <form action="" method="post"></form>
                        <form action="" method="post"></form>
                    </div>
                </div>
            </div>

            @endforeach
            <div class="container mb-5">
                <div class="row justify-content-center">
                    <div class="col-12">
                        @foreach ($revisedArticles as $article)
                            {{ $article->name }}
                        @endforeach
                    </div>
                </div>
            </div>
            {{ $revisedArticles->links() }}
        </div>
        <h3 class="text-center mb-5">Annunci da approvare</h3>
        <div class="row">
            @foreach($articles as $article)
                <div class="col-12 col-lg-4 mb-5 ">
                    <div class="card mx-auto" style="width: 18rem;">
                        <img src="{{$images[0]}}200" class="card-img-top" alt="image random">
                        <div class="card-body">
                            <h5 class="card-title">{{$article->customTitle($article,20)}}</h5>
                            <h5 class="card-subtitle my-3">Prezzo: {{$article->price}} €</h5>
                            <p class="card-text">Descrizione: {{$article->body}}</p>
                            <p class="card-text">Autore: {{$article->user->name ?? ''}}</p>
                            @foreach ($categories as $cate)
                                @if ($cate->id == $article->category_id)
                                    <p class="card-text">Categoria: <a href="{{route('article.index',compact('cate'))}}">{{$article->category->name}}</a></p>
                                @endif
                            @endforeach
                            <p class="card-text">Creato il: {{$article->created_at}}</p>
                            <a href="{{route('article.show', compact('article'))}}" class="btn btn-primary">Visualizza</a>
                            <form action="" method="post"></form>
                            <form action="" method="post"></form>
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
        </div>





    </div>
</x-layout>
