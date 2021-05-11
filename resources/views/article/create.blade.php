<x-layout>
    @if (session('message'))
        {{session('message')}}

    @endif
<div class="container">
    <div class="row">
        <div class="col-12">
            <form action="{{route('article.store')}}" method="POST">
                @csrf
                <select class="form-select" name="category" id="category" aria-label="Default select example">
                    <option selected>Open this select menu</option>
                    @foreach ($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                  </select>
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
