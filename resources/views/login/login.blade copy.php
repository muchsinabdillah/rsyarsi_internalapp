@extends('layouts.main')

<link rel="stylesheet" href="{{ URL::asset('css/login.css') }}">
@section('container') 
<body class="my-login-page">
 	<section class="h-100">
		<div class="container h-100">
			<div class="row justify-content-md-center h-100">
				<div class="card-wrapper">  
					<div class="card fat">
						<div class="card-body">
							 @if(session('error'))
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            {{session('error')}}
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        @endif
                                                    @error('login_gagal')
                                                        {{-- <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span> --}}
                                                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                                            {{-- <span class="alert-inner--icon"><i class="ni ni-like-2"></i></span> --}}
                                                            <span class="alert-inner--text"><strong>Warning!</strong> {{ $message }}</span>
                                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        @enderror
							 <form action="{{url('proses_login')}}" method="POST" id="logForm">
                                                {{ csrf_field() }}
								<div class="form-group">
                                    <img class="mb-4 mx-auto d-block mt-10 " src="img/joki.png" alt="" width="170" height="80"> 
									<label for="email">Username</label>
								 	<input class="form-control mt-2" id="username" name="username" type="text"
                                                        placeholder="Masukkan Username"
                                                        autofocus
                                                        autocomplete="off"/>
                                                    @if($errors->has('username'))
                                                    <span class="error">{{ $errors->first('username') }}</span>
                                                    @endif 
								</div>

								<div class="form-group mt-4">
									<label for="password">Password </label>
								    <input
                                                        class="form-control mt-2"
                                                        id="inputPassword"
                                                        type="password"
                                                        name="password"
                                                        placeholder="Masukkan Password"
                                                        required
                                                         data-eye
                                                        autocomplete="off"/>
                                                    @if($errors->has('password'))
                                                    <span class="error">{{ $errors->first('password') }}</span>
                                                    @endif
                                    <div class="invalid-feedback">
								    	Password is required
							    	</div>
								</div> 
								<div class="form-group mt-4">
									<button type="submit" class="btn btn-primary btn-block">
										Login
									</button>
								</div>
								<div class="mt-4 text-center">
									Don't have an account? <a href="register.html">Create One</a>
								</div>
							</form>
						</div>
					</div>
					<div class="footer">
						Copyright &copy; 2022 &mdash; Join Kilat Team
					</div>
				</div>
			</div>
		</div>
	</section>
</body>
    @endsection 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript" src="{{URL::asset('js/jquerylogin.js')}}"></script>
 