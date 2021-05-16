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
<h3 class="mt-5 text-center">Profilo e configurazione</h3>
<div class="container mt-5">
<div class="row justify-content-center">
    <div class="col-12 col-md-8 p-3 articlesForm">
        <div class="row">
            <div class="col-4">
                <img src="https://picsum.photos/200" alt="">
            </div>
            <div class="col-8">
                <h2>{{Auth::user()->name}}</h2>
                <h6>{{Auth::user()->email}}</h6>
                <a href=""><h6>Modifica la tua Password</h6></a>
                <div class="border-bottom border-dark border-3 mb-3"></div>
                <a href="{{route('user.index')}}"><button class="btn btn-primary">I tuoi Annunci</button></a>


            </div>
        </div>
    </div>
</div>
</div>



</x-layout>
