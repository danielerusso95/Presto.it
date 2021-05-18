<div class="container-fluid mt-5">
  <div class="row my-5 justify-content-around">
      <div class="col-12 col-md-4 text-center">
        <h1 class="my-3">{{__('ui.welcome')}}</h1>
        <h4>{{__('ui.subWelcome')}}</h4>
      </div>
      <div class="col-12">
          <div class="row h-100 justify-content-center align-items-center">
            <div class="col-12 col-md-4 mx-5">
              <div class="card card-signin my-5">
                <div class="card-body">
                  <h5 class="card-title text-center">{{__('ui.searchTitle')}}</h5>
                  <form class="form-signin" action="{{route('search_results')}}" method="GET">
                    <div class="form-label-group">
                      <input type="search" id="search" class="form-control" name="q" placeholder="Search" required autofocus>
                      <label for="search">{{__('ui.searchButton')}}</label>
                      <div class="d-flex justify-content-center justify-content-md-end">
                        <button class="btn btn-primary mt-5 px-md-5" type="submit">{{__('ui.searchButton')}}</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <div class="col-10 col-md-6 d-flex justify-content-center">
              <img class="img-fluid mx-auto" src="/img/205-2057055_compras-por-internet-icono-png-e-commerce-development-removebg-preview.png" alt="">
          </div>
          </div>
      </div>
    
  </div>
</div>