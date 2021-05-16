


<div class="container aboveContainer">
    <div class="row h-100">
      <div class="col-sm-9 col-md-12 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
            <h5 class="card-title text-center">Cerca l'annuncio che fa per te</h5>
            <form class="form-signin" action="{{route('search_results')}}" method="GET">
              <div class="form-label-group">
                <input type="search" id="search" class="form-control" name="q" placeholder="Search" required autofocus>
                <label for="search">Cerca</label>
                <div class="d-flex justify-content-center justify-content-md-end">
                <button class="btn btn-primary mt-5 px-md-5" type="submit">Cerca</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
