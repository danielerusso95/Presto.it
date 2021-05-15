
<x-layout>

<div class="container">
    <div class="row">
        <div class="col-lg-10 col-xl-9 mx-auto">
            <div class="card card-signin flex-row my-5">
                <div class="card-img-left d-none d-md-flex">

                </div>


                 <div class="card-body">
                    <div class="card-title d-flex justify-content-center">
                        <h5>{{ __('Register') }}</h5>
                    </div>
                    <form class="form-signin" method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{__('Name')}}</label>

                            <div class="form-label-group">
                                <input id="name" type="text"  placeholder="Inserire nome" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="form-label-group">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Inserire email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="form-label-group">
                                <input id="password" type="password" placeholder="Inserire password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="form-label-group">
                                <input id="password-confirm" placeholder="Conferma password" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary me-5">
                                    {{ __('Register') }}
                                </button>
                                <a href="{{route('login')}}">Sign In</a>
                            </div>
                        </div>
                    </form>
                 </div>

            </div>
        </div>
    </div>
</div>
</x-layout>
