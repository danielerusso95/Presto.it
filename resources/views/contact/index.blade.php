<x-layout>
    @if (session('message'))
        <div class="bg-primary py-3 text-center">
            {{session('message')}}
        </div>
    @endif
    @if ($errors->any())
              <div class="alert alert-danger col-12 mt-2">
                <ul>
                  @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                  @endforeach
                </ul>
              </div>
        @endif
    <h3 class="mt-5 text-center">Compila il form e richiedi un colloquio per lavorare con noi!</h3>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-12 col-md-8 p-3 articlesForm">
            <form action="{{route('contact.store')}}" method="POST">
                @csrf
                <div class="mb-3 mt-3">
                    <label for="name" class="form-label">Nome:</label>
                    <input type="name" name="name" class="form-control" value="{{old('name')}}" id="name" aria-describedby="title">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" name="email" class="form-control" value="{{old('email')}}" id="email" aria-describedby="price">
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Telefono:</label>
                    <input type="tel" name="phone" class="form-control" value="{{old('phone')}}" id="phone" aria-describedby="price">
                </div>
                <div class="mb-3">
                    <label for="body" class="form-label">Messaggio:</label>
                    <textarea name="body" id="body" cols="30" rows="10" class="form-control">{{old('body')}}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">Invia la tua candidatura</button>
            </form>
        </div>
    </div>
</div>
</x-layout>