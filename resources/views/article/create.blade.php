<x-layout>
    @if (session('message'))
        <div class="bg-primary py-3 text-center">
            {{session('message')}}
        </div>


    @endif
    <h3 class="mt-5 text-center">Compila il form e crea il tuo annuncio</h3>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-12 col-md-8 p-3" style="background-color: rgba(255, 255, 255, 0.5)">
            <form action="{{route('article.store')}}" method="POST">
                @csrf
                <label for="category" class="form-label">Seleziona la categoria:</label>
                <select class="form-select" name="category" id="category" aria-label="Default select example">
                    <option selected>Categorie</option>
                    @foreach ($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
                <div class="mb-3 mt-3">
                    <label for="title" class="form-label">Titolo:</label>
                    <input type="text" name="title" class="form-control" id="title" aria-describedby="title">
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">Prezzo:</label>
                    <input type="text" name="price" class="form-control" id="price" aria-describedby="price">
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
