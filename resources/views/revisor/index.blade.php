<x-layout>

    @if ($article)


    <div class="container-fluid p-5">
        <h2 class="my-4">Titolo: {{$article->title}}</h2>
        <div class="row justify-content-around">
          <div class="col-md-8 d-flex justify-content-center mb-5" id="wrapper">
            <img class="img-fluid" src="{{$images[0]}}id/237/500" alt="">
          </div>
          <div class="col-md-4">

                <h3 class="my-3">Dettagli annuncio</h3>
                <ul>
                <li>Prezzo: {{$article->price}} €</li>
                @foreach ($categories as $cate)
                    @if ($cate->id == $article->category_id)
                        <li class="card-text">Categoria: <a href="{{route('article.index',compact('cate'))}}">{{$article->category->name}}</a></li>
                    @endif
                @endforeach
                <li>Autore: {{$article->user->name}}</li>
                </ul>
                <p>Descrizione: {{$article->body}}</p>
            </div>
        </div>

        <div id="staffWrapper" class="row justify-content-around mt-5"></div>

        <div class="row mt-5">
            <div class="col-6 d-flex justify-content-center">
                <form action="{{route('revisor.rejected', compact('article'))}}" method="POST">
                @csrf
                    <button class="btn btn-danger border-dark border-3" type="submit">Elimina</button>
                </form>
            </div>

            <div class="col-6 d-flex justify-content-center">
            <form action="{{route('revisor.accepted', compact('article'))}}" method="POST">
                @csrf
                    <button class="btn btn-success border-dark border-3" type="submit">Accetta</button>
                </form>
            </div>

        </div>

    </div>
    @else
    <h1 class="bg-success text-center">Nessun annuncio da revisionare</h1>
    @endif


        <script>

        let wrapper = document.querySelector("#staffWrapper");
        let images = {!!json_encode($images)!!};

        images.forEach((member) => {
        wrapper.innerHTML+=`
            <div class="col-md-2 col-sm-6 mb-4">
                <a>
                    <img class="member" class="img-fluid" src="${member}200" alt="">
                </a>
            </div>
            `;
        });
        let members = document.querySelectorAll(".member");
        let placeholder;
        let splitholder;
        for (let i = 0; i < members.length; i++) {
        members[i].addEventListener("click",()=>{
            img = members[i];
            placeholder = img.getAttribute('src');
            splitholder=placeholder.split('/');



          splitholder[3] = '';
          placeholder = splitholder.join('/');
          console.log(placeholder);

          let wra = document.querySelector("#wrapper");

          wra.innerHTML= `<img class="member" class="img-fluid" src="${placeholder}500" alt="">`;

      });
    };
        </script>

</x-layout>





