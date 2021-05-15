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
                        <img src="{{$images[0]}}200" class="card-img-top" alt="image random">
                        <div class="card-body">
                            <h5 class="card-title">Titolo: {{$article->title}}</h5>
                            <p class="card-subtitle">Prezzo: {{$article->price}} €</p>
                            <p class="card-text">Descrizione: {{$article->body}}</p>
                            <p class="card-text">Autore: {{$article->user->name ?? ''}}</p>
                            <div class="d-flex justify-content-center">
                                <form action="{{route('revisor.undo', compact('article'))}}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-success">Ripristina</button>
                                   </form>
                            </div>
                            <div class="d-flex justify-content-center">
                            <form action="{{route('revisor.delete', compact('article'))}}" method="POST">
                             @csrf
                             @method('DELETE')
                             <button type="submit" class="btn btn-danger mt-3">Elimina definitivamente</button>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
    @endforeach
@endif
</x-layout>
