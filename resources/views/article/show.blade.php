<x-layout>
    <div class="container-fluid p-5">
        <div class="row justify-content-around align-items-center mb-5">
            <div class="col-12 mt-1 d-flex justify-content-center d-lg-block col-lg-6 mb-5" id="wrapper">
                <img class="img-fluid" src="{{$images[0]}}id/278/500" alt="">
            </div>
            <div class="col-12 col-lg-4 articlesForm rounded-3 mb-5">
                <div class="p-5">
                    <h3 class="mb-5">{{$article->title}}</h3>
                    <ul>
                        <dd class="fs-5">Prezzo: {{$article->price}} €</dd>
                        @foreach ($categories as $cate)
                            @if ($cate->id == $article->category_id)
                                <dd class="card-text fs-5">Categoria: <a href="{{route('article.index',compact('cate'))}}">{{$article->category->name}}</a></dd>
                            @endif
                        @endforeach
                        <dd class="fs-5">Autore: {{$article->user->name}}</dd>
                    </ul>
                    <h5 class="mt-5 text-center mb-3">Descrizione</h5>
                    <div class="articlesForm rounded-3 p-3" style="min-height: 150px">
                        <p>{{$article->body}}</p>
                    </div>
                </div>
            </div>
        </div>
        <h3 class="text-center">Immagini correlate</h3>
        <div id="staffWrapper" class="row justify-content-around mt-5">
        </div>

    <script>
          let wrapper = document.querySelector("#staffWrapper");
        let images = {!!json_encode($images)!!};

        images.forEach((member) => {
        wrapper.innerHTML+=`
            <div class="col-md-2 col-sm-6 mb-4 d-flex justify-content-center">
                <a>
                    <img class="member img-fluid" src="${member}200" alt="">
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
            wra.innerHTML = `<img class="img-fluid member" src="${placeholder}500" alt="">`;
        });
    };
    </script>
</x-layout>
