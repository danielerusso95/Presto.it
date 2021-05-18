<x-layout>
    <div class="container-fluid p-5">
        <div class="row justify-content-around align-items-center mb-5">
            <div class="col-12 mt-1 d-flex justify-content-center d-lg-block col-lg-6 mb-5" id="wrapper">
                <img class="img-fluid" src="{{$article->images->first()->getUrl(500,500)}}" alt="">
            </div>
            <div class="col-12 col-lg-4 articlesForm rounded-3 mb-5">
                <div class="p-5">
                    <h3 class="mb-5">{{$article->title}}</h3>
                    <ul>
                        <dd class="fs-5">{{__('ui.price')}}: {{$article->price}} €</dd>
                        @foreach ($categories as $cate)
                            @if ($cate->id == $article->category_id)
                                <dd class="card-text fs-5">Categoria: <a href="{{route('article.index',compact('cate'))}}">{{$article->category->name}}</a></dd>
                            @endif
                        @endforeach
                        <dd class="fs-5">{{__('ui.author')}}: {{$article->user->name}}</dd>
                    </ul>
                    <h5 class="mt-5 text-center mb-3">{{__('ui.detail')}}</h5>
                    <div class="articlesForm rounded-3 p-3" style="min-height: 150px">
                        <p>{{$article->body}}</p>
                    </div>
                </div>
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
    </div>

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
