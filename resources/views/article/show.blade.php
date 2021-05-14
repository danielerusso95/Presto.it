<x-layout>
    <div class="container-fluid p-5">
        <h2 class="my-4">Titolo: {{$article->title}}</h2>
        <div class="row justify-content-around">
          <div class="col-md-8 d-flex justify-content-center mb-5" id="wrapper">
            <img class="img-fluid" src="{{$images[0]}}id/278/500" alt="">
          </div>
          <div class="col-md-4">

                <h3 class="my-3">Dettagli annuncio</h3>
                <ul>
                <li>Prezzo: {{$article->price}} €</li>
                <li>Categoria: {{$article->category->name}}</li>
                <li>Autore: {{$article->user->name}}</li>
                </ul>
                <p>Descrizione: {{$article->body}}</p>
            </div>
        </div>

        <div id="staffWrapper" class="row justify-content-around mt-5">
        </div>
    
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
            wra.innerHTML = "";
            wra.innerHTML = `<img class="member" class="img-fluid" src="${placeholder}500" alt="">`;
        });
    };
    </script>
</x-layout>
