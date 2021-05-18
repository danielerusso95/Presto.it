<x-layout>
    @if (session('message'))
        <div class="alert alert-danger">
            {{session('message')}}
        </div>
    @endif

    @if($articles)
        @foreach($articles as $article)
            <div class="col-12 col-md-4 mb-5 mt-5">
                <div class="card mx-auto" style="width: 18rem;">
                    <img src="{{$article->images->first()->getUrl(200,200)}}" class="card-img-top" alt="image random">
                    <div class="card-body">
                        <h5 class="card-title">{{$article->customTitle($article,20)}}</h5>
                        <p class="card-subtitle">{{__('ui.price')}} {{$article->price}} €</p>
                        <p class="card-text">{{__('ui.details')}}: {{$article->body}}</p>
                        <p class="card-text">{{__('ui.author')}}: {{$article->user->name ?? ''}}</p>
                        <div class="d-flex justify-content-center">
                            <form action="{{route('revisor.undo', compact('article'))}}" method="POST">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-success">{{__('ui.undo')}}</button>
                            </form>
                        </div>
                        <div class="d-flex justify-content-center">
                            <button data-bs-toggle="modal" data-bs-target="#deleteArticle" class="btn btn-danger mt-3">{{__('ui.delete')}}</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="deleteArticle" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">{{__('ui.delete')}}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            {{__('ui.areYouSureToDelete')}}
                        </div>
                        <div class="modal-footer ">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{__('ui.close')}}</button>

                            <form action="{{route('revisor.delete', compact('article'))}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" data-bs-toggle="modal" data-bs-target="#deleteArticle" class="btn btn-danger">{{__('ui.delete')}}</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @endif


</x-layout>
