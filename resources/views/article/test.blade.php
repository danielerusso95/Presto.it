<x-layout>
    <div class="container p-5">
        <h2 class="my-4">Page Heading
        </h2>
        <div class="row" id="wrapper">
          <div class="col-md-8">
            <img class="img-fluid" src="{{$article->images->first()->img1}}" alt="">
          </div>

          <div class="col-md-4">
                <h3 class="my-3">Titolo: {{$article->title}}</h3>
                <h3 class="my-3">Dettagli annuncio</h3>
                <ul>
                <li>Prezzo: {{$article->price}}</li>
                <li>Categoria: {{$article->category->name}}</li>
                <li>Autore: {{$article->user->name}}</li>
                </ul>
                <p>Descrizione: {{$article->body}}</p>
            </div>
        </div>
        <h3 class="my-4">Related Members</h3>
        <div id="staffWrapper" class="row">
        </div>
    <script>
          let article = {!! json_encode($article) !!};
          let images = [];

           for (let i = 1; i <= 5; i++) {

              images.push(article['images'][0]['img' + i]);

          }
          console.log(images);
          let wrapper = document.querySelector("#staffWrapper");
          console.log(article['images']);
          images.forEach((member) => {
            wrapper.innerHTML+=`
                <div class="col-md-2 col-sm-6 mb-4">
                    <a class="member" href="#">
                        <img class="img-fluid" src="${member}" alt="">
                    </a>


                </div>
                `;
          });
        let members = document.querySelectorAll(".member");

        for (let i = 0; i < members.length; i++) {

            members[i].addEventListener("click",()=>{
                let wra = document.querySelector("#wrapper");
                let img = document.querySelectorAll(".name");
                images.forEach(member=>{
                    if(member["fullname"] == name[i].innerHTML){
                        wra.innerHTML=`<div class="col-md-8">
                        <img class="img-fluid" src="${member["photo"]}/500" alt="">
                        </div>
                        <div class="col-md-4">
                            <h3 class="my-3">Member Description</h3>
                            <p>${member["bio"]}</p>
                            <h3 class="my-3">Member Details</h3>
                            <ul>
                            <li>${member["fullname"]}</li>
                            <li>${member["level"]}</li>
                            <li>${member["tasks"]}</li>
                            </ul>
                        </div>`
                    }
                });
            });
        };
    </script>
</x-layout>
