<x-layout>
    <div class="container">
        <div class="content-section-heading text-center">
            <h3 class="my-5">{{__('ui.searchResults')}}: {{$q}}</h3>
        </div>
        <div class="row">
            @if ($articles->count()>0)
                @foreach($articles as $article)
                <div class="col-12 col-md-4 mb-5 ">
                    <div class="card mx-auto" style="width: 18rem;">
                        <img src="{{$article->images->first()->getUrl(200,200)}}" class="card-img-top" alt="image random">
                        <div class="card-body">
                            <h5 class="card-title">@if(strlen($article->title)>15){{Str::substr($article->title, 0, -(strlen($article->title)-15))."..."}}@else{{$article->title}}@endif</h5>
                            <p class="card-subtitle">{{__('ui.price')}}: {{$article->price}} €</p>
                            <p class="card-text">{{__('ui.details')}}: {{$article->body}}</p>
                            <p class="card-text">{{__('ui.author')}}: {{$article->user->name ?? ''}}</p>
                            @foreach ($categories as $cate)
                                @if ($cate->id == $article->category_id)
                                    <p class="card-text">{{__('ui.category')}}: <a href="{{route('article.index',compact('cate'))}}">{{$article->category->name}}</a></p>
                                @endif
                            @endforeach
                            <a href="{{route('article.show', compact('article'))}}" class="btn btn-primary">{{__('ui.show')}}:</a>
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
            @else
            <h3>no result</h3>
            @endif
        </div>
    </div>


</x-layout>
