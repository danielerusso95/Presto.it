<x-layout>

    @if ($article)


    <div class="container-fluid p-5">
        <h2 class="my-4">Titolo: {{$article->title}}</h2>
        <div class="row justify-content-around">
            <div class="col-md-8 d-flex justify-content-center mb-5" id="wrapper">
                @if ($article->images->isNotEmpty())
                    <img src="{{$article->images->first()->getUrl(500,500)}}" class="img-fluid rounded-2" alt="image random">
                @endif

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

        <div id="staffWrapper" class="row justify-content-around mt-5">
            @foreach ($article->images as $image)    
                <div class="col-md-2 col-sm-6 mb-4 d-flex justify-content-center">
                    <a>
                        <img class="member img-fluid" src="{{$image->getUrl(200,200)}}" alt="">
                    </a>
                </div>
            @endforeach
        </div>

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
            let members = document.querySelectorAll(".member");
            let wrapper = document.querySelector("#wrapper");

            members.forEach(member => {
                member.addEventListener("click",()=>{
                    let str = member.outerHTML;
                    str = str.split("200x200");
                    str = str[0]+"500x500"+str[1];
                    wrapper.innerHTML = str;
                });
            });
        </script>

</x-layout>





