<x-layout>
    @if (session('message'))
        {{session('message')}}

    @endif
<div class="container">
    <div class="row">
        <div class="col-12">
            <form action="{{route('article.store')}}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Titolo:</label>
                    <input type="text" name="title" class="form-control" id="title" aria-describedby="title">
                </div>
                <div class="mb-3">
                    <label for="body" class="form-label">Descrizione:</label>
                    <textarea name="body" id="body" cols="30" rows="10" class="form-control"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Posta Annuncio</button>
            </form>
        </div>
    </div>
</div>
</x-layout>
