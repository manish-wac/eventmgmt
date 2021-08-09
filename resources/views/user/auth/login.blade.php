<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<link href="{{ asset('assets/theme/fonts/font-style.css') }}" rel="stylesheet">
	<link href="{{ asset('assets/theme/build/styles/ltr-core.css') }}" rel="stylesheet">
	<link href="{{ asset('assets/theme/build/styles/ltr-vendor.css') }}" rel="stylesheet">
	<link href="{{ asset('assets/css/common-admin.css') }}" rel="stylesheet">
	<link href="{{ asset('assets/theme/images/favicon.ico') }}" rel="shortcut icon" type="image/x-icon">
	<title>Login | {{env('APP_NAME')}}</title>
</head>

<body class="theme-light preload-active" id="fullscreen">
	<!-- BEGIN Preload -->
	<div class="preload">
		<div class="preload-dialog">
			<!-- BEGIN Spinner -->
			<div class="spinner-border text-primary preload-spinner"></div>
			<!-- END Spinner -->
		</div>
	</div>
	<!-- END Preload -->
	<!-- BEGIN Page Holder -->
	<div class="holder">
		<!-- BEGIN Page Wrapper -->
		<div class="wrapper">
			<!-- BEGIN Page Content -->
			<div class="content ">
				<div class="container-fluid">
					<div class="row no-gutters align-items-center justify-content-center h-100">
						<div class="col-sm-8 col-md-6 col-lg-4 col-xl-3">
							<!-- BEGIN Portlet -->
							<div class="portlet">
								<div class="portlet-body">
									<div class="text-center mb-4">
										<!-- BEGIN Avatar -->
										<div class="avatar avatar-label-primary avatar-circle widget12">
											<div class="avatar-display">
                                                <img  src="{{asset('assets/images/icon.png')}}">
{{--												<i class="fa fa-user-alt"></i>--}}
											</div>
										</div>
										<!-- END Avatar -->
									</div>
									<!-- BEGIN Form -->
									<form action="{{ route('admin.auth.login') }}" id="login-form" method="POST">
                                        @csrf
                                        <div class="results">
                                            @if(Session::get('fail'))
                                                <div class="alert alert-danger">
                                                    {{ Session::get('fail')}}
                                                </div>
                                            @endif
                                        </div>
										<!-- BEGIN Form Group -->
										<div class="form-group">
											<div class="float-label float-label-lg">
												<input class="form-control form-control-lg @error('email') {{'is-invalid'}} @enderror" type="email" id="email" name="email" placeholder="Please insert your email" value="{{old('email')}}">
												<label for="email">Email</label>
											</div>
                                            <span class="text-danger">@error('email') {{$message}} @enderror</span>
										</div>
										<!-- END Form Group -->
										<!-- BEGIN Form Group -->
										<div class="form-group">
											<div class="float-label float-label-lg">
												<input class="form-control form-control-lg @error('password') {{'is-invalid'}} @enderror" type="password" id="password" name="password" placeholder="Please insert your password" value="{{old('password')}}">
												<label for="password">Password</label>
											</div>
                                            <span class="text-danger">@error('password') {{$message}} @enderror</span>
										</div>
										<!-- END Form Group -->
										<div class="d-flex align-items-center justify-content-between mb-3">
											<!-- BEGIN Form Group -->
											{{-- <div class="form-group mb-0">
												<div class="custom-control custom-control-lg custom-switch">
													<input type="checkbox" class="custom-control-input" id="remember" name="remember">
													<label class="custom-control-label" for="remember">Remember me</label>
												</div>
											</div> --}}
											<div class="d-flex align-items-center justify-content-between">
												<button type="submit" class="btn btn-label-primary btn-lg btn-widest">Login</button>
											</div>
											<!-- END Form Group -->
											<a href="javascript:void(0)" data-toggle="modal" data-target="#forgot-password">Forgot password?</a>
											{{-- <a href="{{route('admin.auth.forgot-password')}}">Forgot password?</a> --}}
										</div>

									</form>
									<!-- END Form -->
								</div>
							</div>
							<!-- END Portlet -->
						</div>
					</div>
				</div>
			</div>
			<!-- END Page Content -->
		</div>
		<!-- END Page Wrapper -->
	</div>
	<!-- END Page Holder -->
	<!-- BEGIN Modal -->
	<div class="modal fade" id="forgot-password">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Find your email</h5>
					<button type="button" class="btn btn-icon" data-dismiss="modal">
						<i class="fa fa-times"></i>
					</button>

				</div>
				<form action="{{ route('admin.auth.forgot-password') }}" id="forgot-password-form" method="POST">
                    @csrf
					<input type="hidden" id="forgot-session" value="{{Session::get('forgot-fail') || Session::get('forgot-success')}}"/>
					<div class="results">
                        @if(Session::get('forgot-fail'))

							<div class="alert alert-danger">
								{{ Session::get('forgot-fail')}}

							</div>
                        @endif

						@if(Session::get('forgot-success'))

							<div class="alert alert-success">
								{{ Session::get('forgot-success')}}

							</div>
                        @endif

                    </div>

					<div class="modal-body">
						<!-- BEGIN Form Group -->
						<div class="form-group">
							<div class="float-label float-label-lg">
								<input class="form-control form-control-lg @error('forgot') {{'is-invalid'}} @enderror" type="email" id="forgot" name="forgot" placeholder="Please insert your email" value="{{old('forgot')}}">
								<label for="email">Email</label>
							</div>
                            <span class="text-danger">@error('email') {{$message}} @enderror</span>
						</div>

							<!-- END Form Group -->

					</div>
					<div class="modal-footer">
						<button class="btn btn-primary mr-2">Submit</button>
						{{-- <button class="btn btn-outline-danger">Reset</button> --}}
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- END Modal -->
	<!-- BEGIN Modal -->
	<div class="modal fade" id="reset-password">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Change your password</h5>
					<button type="button" class="btn btn-icon" data-dismiss="modal">
						<i class="fa fa-times"></i>
					</button>

				</div>
				<form action="{{ route('admin.auth.update-password') }}" id="reset-password-form" method="POST">
                    @csrf
					<input type="hidden" id="reset-session" value="{{Session::get('reset-fail') || Session::get('reset-success')}}"/>
					<div class="results">
                        @if(Session::get('reset-fail'))

							<div class="alert alert-danger">
								{{ Session::get('reset-fail')}}

							</div>
                        @endif

						@if(Session::get('reset-success'))

							<div class="alert alert-success">
								{{ Session::get('reset-success')}}

							</div>
                        @endif

                    </div>

					<div class="modal-body">
						<!-- BEGIN Form Group -->
						<div class="form-group">
							<div class="float-label float-label-lg">
								<input class="form-control form-control-lg @error('user_email') {{'is-invalid'}} @enderror" type="email" id="user_email" name="user_email" placeholder="Please insert your email" value="{{isset($email) ? $email: ''}}" readonly>
								<label for="user_email">Email</label>
							</div>
                            <span class="text-danger">@error('user_email') {{$message}} @enderror</span>
						</div>
						<!-- END Form Group -->
						<!-- BEGIN Form Group -->
						<div class="form-group">
							<div class="float-label float-label-lg">
								<input class="form-control form-control-lg" type="password" id="new_password" name="new_password" placeholder="Please insert your new password" value="{{old('new_password')}}">
								<label for="new_password">New Password</label>

							</div>
							<span class="text-danger">@error('new_password') {{$message}} @enderror</span>
						</div>
						<!-- END Form Group -->
                        <!-- BEGIN Form Group -->
						<div class="form-group">
							<div class="float-label float-label-lg">
								<input class="form-control form-control-lg" type="password" id="confirm_password" name="confirm_password" placeholder="Please re-enter your password" value="{{old('confirm_password')}}">
								<label for="confirm_password">Confirm Password</label>

							</div>
							<span class="text-danger">@error('confirm_password') {{$message}} @enderror</span>
						</div>
					</div>
					<div class="modal-footer">
						<button class="btn btn-primary mr-2">Submit</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- END Modal -->
	<!-- END Float Button -->
	<script type="text/javascript" src="{{ asset('assets/theme/build/scripts/mandatory.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/theme/build/scripts/core.js') }}"></script>
	<script type="text/javascript" src="{{asset('assets/theme/build/scripts/vendor.js')}}"></script>
	<script type="text/javascript" src="{{ asset('assets/theme/app/pages/login.js') }}"></script>
	<script type="text/javascript" src="{{asset('assets/js/main.js')}}"></script>

</body>

</html>
