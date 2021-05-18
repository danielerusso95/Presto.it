<x-layout>
    @if (session('message'))
        <div class="alert alert-danger">
            {{session('message')}}
        </div>
    @endif
    <div class="container  p-5">
        <div class="row">
            <div class="col-12 text-center">
                <h3 class="text-center mb-3">{{__('ui.yourMP')." ".__('ui.announcementsNavDrop')}}</h3>

            </div>
        </div>
    </div>
    <div class="container mt-5">
        <h3 class="text-center mb-5">{{__('ui.approved')}}</h3>
        <div class="row">
            @foreach($revisedArticles as $article)
            <div class="col-12 col-lg-4 mb-5 ">
                <div class="card mx-auto" style="width: 18rem;">
                    <img src="{{$article->images->first()->getUrl(200,200)}}" class="card-img-top" alt="image random">
                    <div class="card-body">
                        <h5 class="card-title">{{$article->customTitle($article,20)}}</h5>
                        <h5 class="card-subtitle my-3">{{__('ui.price')}}: {{$article->price}} €</h5>
                        <p class="card-text">{{__('ui.details')}}: {{$article->body}}</p>
                        <p class="card-text">{{__('ui.author')}}: {{$article->user->name}}</p>
                        @foreach ($categories as $cate)
                            @if ($cate->id == $article->category_id)
                                <p class="card-text">{{__('ui.category')}}: <a href="{{route('article.index',compact('cate'))}}">{{$article->category->name}}</a></p>
                            @endif
                        @endforeach
                        <p class="card-text">{{__('ui.createdAt')}}: {{$article->created_at}}</p>
                        <div class="row">
                            <div class="col-4">
                                <a href="{{route('article.show', compact('article'))}}" class="btn w-100 p-0 btn-success">{{__('ui.show')}}</a>
                            </div>
                            <div class="col-4">
                                <a href="{{route('user.article_edit',compact('article'))}}" class="btn w-100 p-0 btn-primary">{{__('ui.edit')}}</a>
                            </div>
                            <div class="col-4">
                                <button data-bs-toggle="modal" data-bs-target="#deleteArticle" class="btn w-100 p-0 btn-danger">{{__('ui.delete')}}</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--delete modal-->
            <div class="modal fade" id="deleteArticle" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">{{__('ui.delete')}}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            {{__('ui.modalDelete')}}
                        </div>
                        <div class="modal-footer ">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{__('ui.close')}}</button>
                            <form action="{{route('user.delete',compact('article'))}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">{{__('ui.delete')}}</button>
                            </form>
                        </div>
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
        <h3 class="text-center mb-5">{{__('ui.announcementsNav')." ".__('ui.revisorAnnouncementsNav')}}</h3>
        <div class="row">
            @foreach($articles as $article)
                <div class="col-12 col-lg-4 mb-5 ">
                    <div class="card mx-auto" style="width: 18rem;">
                        <img src="{{$article->images->first()->getUrl(200,200)}}" class="card-img-top" alt="image random">
                        <div class="card-body">
                            <h5 class="card-title">{{$article->customTitle($article,20)}}</h5>
                            <h5 class="card-subtitle my-3">{{__('ui.price')}}: {{$article->price}} €</h5>
                            <p class="card-text">{{__('ui.details')}}: {{$article->body}}</p>
                            <p class="card-text">{{__('ui.author')}}: {{$article->user->name ?? ''}}</p>
                            @foreach ($categories as $cate)
                                @if ($cate->id == $article->category_id)
                                    <p class="card-text">{{__('ui.category')}}: <a href="{{route('article.index',compact('cate'))}}">{{$article->category->name}}</a></p>
                                @endif
                            @endforeach
                            <p class="card-text">{{__('ui.createdAt')}}: {{$article->created_at}}</p>
                            <a href="{{route('article.show', compact('article'))}}" class="btn btn-primary">{{__('ui.show')}}</a>
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
