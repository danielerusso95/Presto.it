<x-layout>

<div class="container">
    <div class="row">
        <div class="col-12 col-md-4">
            <div class="card" style="width: 18rem;">
                <img src="{{$article->img}}" class="card-img-top" alt="image random">
                <div class="card-body">
                    <h5 class="card-title">Titolo: {{$article->title}}</h5>
                    <p class="card-subtitle">Prezzo: {{$article->price}}</p>
                    <p class="card-text">Descrizione: {{$article->body}}</p>
                </div>
            </div>
        </div>
    </div>
</div>

</x-layout>