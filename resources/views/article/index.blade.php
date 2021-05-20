<x-layout>  
<div class="container p-5">
    <div class="row">
        <div class="col-12 text-center">
            <h3 class="text-center mb-3">{{__('ui.chooseCategory')}}</h3>
            <div class="articlesForm justify-content-center row">
                @foreach ($categories as $cate)
                    <div class="col-lg-2 p-0 col-md-4 col-6 d-flex justify-content-around">
                        <a href="{{route('article.index', compact('cate'))}}" style="width: 120px" class="articlesForm my-1 btn text-dark text-center text-decoration-none">{{$cate->name}}</a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
<div class="container mt-5" style="height: 80vh">
    <div class="row">
        @if($category->id)
            <div class="col-12"><h3 class="text-center mb-5">{{__('ui.hereThereAre')}} {{__('ui.announcements')}} {{__('ui.ofFS')}} {{__('ui.category')}} {{$category->name}}</h3></div>
        @foreach($articles_category as $article)
        <div class="col-12 mx-auto mx-md-0 mb-4">
            <div class="rounded-2 pb-5 articlesForm justify-content-around align-items-center row mb-5">
                <div class="col-12 text-center my-3">
                    <h3 class="mb-2">{{$article->customTitle($article,50)}}</h5>
                </div>
                <div class="col-12 col-md-4 ps-5">
                @if ($article->images->count()>0)
                    <img src="{{$article->images->first()->getUrl(200,200)}}" class="img-fluid rounded-2" alt="image random">
                @else
                    <img src="https://picsum.photos/200" class="img-fluid rounded-2" alt="image random">
                @endif
                </div>
                <div class="col-12 col-md-6">
                    <div class="ms-3 ms-md-0 card-body">
                        <h5 class="card-subtitle mb-3">{{__('ui.price')}}: {{$article->price}} €</h5>
                        <p class="card-text">{{__('ui.details')}}: {{$article->body}}</p>
                        <p class="card-text">{{__('ui.author')}}: {{$article->user->name}}</p>
                    @foreach ($categories as $cate)
                        @if ($cate->id == $article->category_id)
                            <p class="card-text">{{__('ui.category')}}: <a href="{{route('article.index',compact('cate'))}}">{{$article->category->name}}</a></p>
                        @endif
                    @endforeach
                    <p class="card-text">{{__('ui.createdAt')}}: {{$article->created_at}}</p>
                    </div>
                    <a href="{{route('article.show', compact('article'))}}" class="btn button">{{__('ui.show')}}</a>
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
        <div class="col-12"><h3 class="text-center mb-5">{{__('ui.allAnnouncements')}}</h3></div>
            @foreach($articles as $article)
            <div class="col-12 mx-auto mx-md-0 mb-4">
                <div class="rounded-2 pb-5 articlesForm justify-content-around align-items-center row mb-5">
                    <div class="col-12 text-center my-3">
                        <h3 class="mb-2">{{$article->customTitle($article,50)}}</h5>
                    </div>
                    <div class="col-12 col-md-4 ps-5">
                    @if ($article->images->count()>0)
                        <img src="{{$article->images->first()->getUrl(200,200)}}" class="img-fluid rounded-2" alt="image random">
                    @else
                        <img src="https://picsum.photos/200" class="img-fluid rounded-2" alt="image random">
                    @endif
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="ms-3 ms-md-0 card-body">
                            <h5 class="card-subtitle mb-3">{{__('ui.price')}}: {{$article->price}} €</h5>
                            <p class="card-text">{{__('ui.details')}}: {{$article->body}}</p>
                            <p class="card-text">{{__('ui.author')}}: {{$article->user->name}}</p>
                        @foreach ($categories as $cate)
                            @if ($cate->id == $article->category_id)
                                <p class="card-text">{{__('ui.category')}}: <a href="{{route('article.index',compact('cate'))}}">{{$article->category->name}}</a></p>
                            @endif
                        @endforeach
                        <p class="card-text">{{__('ui.createdAt')}}: {{$article->created_at}}</p>
                        </div>
                        <a href="{{route('article.show', compact('article'))}}" class="btn button">{{__('ui.show')}}</a>
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
