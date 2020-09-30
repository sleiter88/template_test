
@extends('layouts.app')

@section('css')

		<!--begin::Page Vendors Styles(used by this page)-->
			<link href="{{ asset('assets/plugins/custom/datatables/datatables.bundle.css?v=7.0.3') }}" rel="stylesheet" type="text/css" />
		<!--end::Page Vendors Styles-->

@endsection

@section('content')

	<!--begin::Content-->
	<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
		<!--begin::Subheader-->
		<div class="subheader min-h-lg-175px pt-5 pb-7 subheader-transparent" id="kt_subheader">
			<div class="container d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
				<!--begin::Details-->
				<div class="d-flex align-items-center flex-wrap mr-2">
					<!--begin::Mobile Toggle-->
					<button class="burger-icon burger-icon-left mr-4 d-inline-block d-lg-none" id="kt_subheader_mobile_toggle">
						<span></span>
					</button>
					<!--end::Mobile Toggle-->
					<!--begin::Heading-->
					<div class="d-flex flex-column">
						<!--begin::Title-->
						<h2 class="text-white font-weight-bold my-2 mr-5">Cambiar Contraseña</h2>
						<!--end::Title-->
						<!--begin::Breadcrumb-->
						<div class="d-flex align-items-center font-weight-bold my-2">
							<!--begin::Item-->
							<a href="#" class="opacity-75 hover-opacity-100">
								<i class="flaticon2-shelter text-white icon-1x"></i>
							</a>
							<!--end::Item-->
							<!--begin::Item-->
							<span class="label label-dot label-sm bg-white opacity-75 mx-3"></span>
							<a href="{{ route('admin') }}" class="text-white text-hover-white opacity-75 hover-opacity-100">Dashboard</a>
							<!--end::Item-->

							<!--begin::Item-->
							<span class="label label-dot label-sm bg-white opacity-75 mx-3"></span>
							<a href="" class="text-white text-hover-white opacity-75 hover-opacity-100">Cambiar Contraseña</a>
							<!--end::Item-->
						</div>
						<!--end::Breadcrumb-->
					</div>
					<!--end::Heading-->
				</div>
				<!--end::Details-->
				<!--begin::Toolbar-->

				<!--end::Toolbar-->
			</div>
		</div>
		<!--end::Subheader-->
		<!--begin::Entry-->
		<div class="d-flex flex-column-fluid">
			<!--begin::Container-->
			<div class="container">

			<!-- NOTIFICACION -->
			@if ($errors->any())
				<div class="alert alert-custom alert-light-danger fade show mb-10" role="alert">
					<div class="alert-icon">
						<span class="svg-icon svg-icon-3x svg-icon-danger">
							<!--begin::Svg Icon | path:assets/media/svg/icons/Code/Info-circle.svg-->
							<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
								<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
									<rect x="0" y="0" width="24" height="24" />
									<circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10" />
									<rect fill="#000000" x="11" y="10" width="2" height="7" rx="1" />
									<rect fill="#000000" x="11" y="7" width="2" height="2" rx="1" />
								</g>
							</svg>
							<!--end::Svg Icon-->
						</span>
					</div>
					<div class="alert-text font-weight-bold">
						@foreach ($errors->all() as $err)
							{{ $err }} </br>
						@endforeach
					</div>
					<div class="alert-close">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">
								<i class="ki ki-close"></i>
							</span>
						</button>
					</div>
				</div>
			@endif

			@if(Session::has('msg'))

				<div class="alert alert-custom alert-light-primary fade show mb-10" role="alert">
					<div class="alert-icon">
						<span class="svg-icon svg-icon-primary svg-icon-2x">
							<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
									<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
											<rect x="0" y="0" width="24" height="24"/>
											<circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10"/>
											<path d="M16.7689447,7.81768175 C17.1457787,7.41393107 17.7785676,7.39211077 18.1823183,7.76894473 C18.5860689,8.1457787 18.6078892,8.77856757 18.2310553,9.18231825 L11.2310553,16.6823183 C10.8654446,17.0740439 10.2560456,17.107974 9.84920863,16.7592566 L6.34920863,13.7592566 C5.92988278,13.3998345 5.88132125,12.7685345 6.2407434,12.3492086 C6.60016555,11.9298828 7.23146553,11.8813212 7.65079137,12.2407434 L10.4229928,14.616916 L16.7689447,7.81768175 Z" fill="#000000" fill-rule="nonzero"/>
									</g>
							</svg>
							<!--end::Svg Icon-->
						</span>

					</div>
					<div class="alert-text font-weight-bold">
						{{ Session::get('msg') }}
					</div>
					<div class="alert-close">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">
								<i class="ki ki-close"></i>
							</span>
						</button>
					</div>
				</div>
			@endif

			@if(Session::has('err'))

				<div class="alert alert-custom alert-light-danger fade show mb-10" role="alert">
					<div class="alert-icon">
						<span class="svg-icon svg-icon-3x svg-icon-danger">
							<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
								<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
									<rect x="0" y="0" width="24" height="24" />
									<circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10" />
									<rect fill="#000000" x="11" y="10" width="2" height="7" rx="1" />
									<rect fill="#000000" x="11" y="7" width="2" height="2" rx="1" />
								</g>
							</svg>
							<!--end::Svg Icon-->
						</span>
					</div>
					<div class="alert-text font-weight-bold">
						{{ Session::get('err') }}
					</div>
					<div class="alert-close">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">
								<i class="ki ki-close"></i>
							</span>
						</button>
					</div>
				</div>

			@endif

						<!--end::Notice-->

				<!--begin::Profile Change Password-->
				<div class="d-flex flex-row">
					<!--begin::Aside-->
					<div class="flex-row-auto offcanvas-mobile w-250px w-xxl-350px" id="kt_profile_aside">
						<!--begin::Profile Card-->
						<div class="card card-custom card-stretch">
							<!--begin::Body-->
							<div class="card-body pt-4">
								<!--begin::Toolbar-->
								<div class="d-flex justify-content-end">
									<div class="dropdown dropdown-inline">
										<a href="#" class="btn btn-clean btn-hover-light-primary btn-sm btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											<i class="ki ki-bold-more-hor"></i>
										</a>
										<div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
											<!--begin::Navigation-->
											<ul class="navi navi-hover py-5">
												<li class="navi-item">
													<a href="{{ route('admin.users.show', $user->id) }}" class="navi-link">
														<span class="navi-icon">
															<i class="flaticon2-list-3"></i>
														</span>
														<span class="navi-text">Detalle</span>
													</a>
												</li>
												<li class="navi-item">
													<a href="{{ route('admin.users.edit', $user->id) }}" class="navi-link">
														<span class="navi-icon">
															<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																	<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																			<rect x="0" y="0" width="24" height="24"/>
																			<path d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z" fill="#000000" fill-rule="nonzero" transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) "/>
																			<rect fill="#000000" opacity="0.3" x="5" y="20" width="15" height="2" rx="1"/>
																	</g>
															</svg>
														</span>
														<span class="navi-text">Editar</span>
													</a>
												</li>
											</ul>
											<!--end::Navigation-->
										</div>
									</div>
								</div>
								<!--end::Toolbar-->
								<!--begin::User-->
								<div class="d-flex align-items-center">
									<div class="symbol symbol-60 symbol-xxl-100 mr-5 align-self-start align-self-xxl-center">
										@if(strpos($user->avatar, 'https://') === 0)
											<div class="symbol-label" style="background-image:url({{ $user->avatar }})"></div>
										@else
											<div class="symbol-label" style="background-image:url({{ asset('uploads/users/'.$user->avatar) }})"></div>
										@endif

										@if($user->status == 1)
											<i class="symbol-badge bg-success"></i>
										@endif
									</div>
									<div>
										<a href="#" class="font-weight-bolder font-size-h5 text-dark-75 text-hover-primary">{{$user->name}}</a>
										<div class="text-muted">{{$user->role}}</div>
										<!-- <div class="mt-2">
											<a href="#" class="btn btn-sm btn-primary font-weight-bold mr-2 py-2 px-3 px-xxl-5 my-1">Chat</a>
											<a href="#" class="btn btn-sm btn-success font-weight-bold py-2 px-3 px-xxl-5 my-1">Follow</a>
										</div> -->
									</div>
								</div>
								<!--end::User-->
								<!--begin::Contact-->
								<div class="py-9">
									<div class="d-flex align-items-center justify-content-between mb-2">
										<span class="font-weight-bold mr-2">Correo:</span>
										<a href="#" class="text-muted text-hover-primary">{{$user->email}}</a>
									</div>
									<div class="d-flex align-items-center justify-content-between mb-2">
										<span class="font-weight-bold mr-2">Teléfono:</span>
										<span class="text-muted">+34 {{$user->phone}}</span>
									</div>
									<div class="d-flex align-items-center justify-content-between">
										<span class="font-weight-bold mr-2">Registrado:</span>
										<span class="text-muted">{{$user->created_at}}</span>
									</div>
								</div>
								<!--end::Contact-->
								<!--begin::Nav-->
								<div class="navi navi-bold navi-hover navi-active navi-link-rounded">


								</div>
								<!--end::Nav-->
							</div>
							<!--end::Body-->
						</div>
						<!--end::Profile Card-->
					</div>
					<!--end::Aside-->
					<!--begin::Content-->
					<div class="flex-row-fluid ml-lg-8">
						<!--begin::Card-->
						<div class="card card-custom">
							<!--begin::Header-->
							<div class="card-header py-3">
								<div class="card-title align-items-start flex-column">
									<h3 class="card-label font-weight-bolder text-dark">Cambiar Contraseña</h3>
									<span class="text-muted font-weight-bold font-size-sm mt-1">Contraseña</span>
								</div>
								<div class="card-toolbar">
									<!-- <button type="reset" class="btn btn-success mr-2">Cambiar</button> -->
								</div>
							</div>
							<!--end::Header-->
							<!--begin::Form-->
							<form class="form" action="{{route('admin.users.store-password')}}" method="post">
								@csrf
								<div class="card-body">
									<!--begin::Alert-->
									<div class="alert alert-custom alert-light-danger fade show mb-10" role="alert">
										<div class="alert-icon">
											<span class="svg-icon svg-icon-3x svg-icon-danger">
												<!--begin::Svg Icon | path:assets/media/svg/icons/Code/Info-circle.svg-->
												<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
													<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
														<rect x="0" y="0" width="24" height="24" />
														<circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10" />
														<rect fill="#000000" x="11" y="10" width="2" height="7" rx="1" />
														<rect fill="#000000" x="11" y="7" width="2" height="2" rx="1" />
													</g>
												</svg>
												<!--end::Svg Icon-->
											</span>
										</div>
										<div class="alert-text font-weight-bold">Cambiarta su contraseña, la cual se le recomienda que la guarde.</div>
										<div class="alert-close">
											<button type="button" class="close" data-dismiss="alert" aria-label="Close">
												<span aria-hidden="true">
													<i class="ki ki-close"></i>
												</span>
											</button>
										</div>
									</div>
									<!--end::Alert-->

									<!-- <div class="form-group row">
										<label class="col-xl-3 col-lg-3 col-form-label text-alert">Current Password</label>
										<div class="col-lg-9 col-xl-6">
											<input type="password" class="form-control form-control-lg form-control-solid mb-2" value="" placeholder="Current password" />
											<a href="#" class="text-sm font-weight-bold">Forgot password ?</a>
										</div>
									</div> -->
									<div class="form-group row">
										<label class="col-xl-3 col-lg-3 col-form-label text-alert">Nueva Contraseña</label>
										<div class="col-lg-9 col-xl-6">
											<input type="password" class="form-control form-control-lg form-control-solid" name="password" value="" placeholder="Nueva Contraseña" />
										</div>
									</div>
									<div class="form-group row">
										<label class="col-xl-3 col-lg-3 col-form-label text-alert">Confirmar</label>
										<div class="col-lg-9 col-xl-6">
											<input type="password" class="form-control form-control-lg form-control-solid" name="password_confirmation" value="" placeholder="Confirmar Contraseña" />
										</div>
									</div>

									<div style="text-align: right;">
										<button type="submit" aling="rigth" class="btn btn-success font-weight-bolder px-9 py-4" >Aceptar</button>
									</div>


								</div>
							</form>
							<!--end::Form-->
						</div>
					</div>
					<!--end::Content-->
				</div>
				<!--end::Profile Change Password-->
			</div>
			<!--end::Container-->
		</div>
		<!--end::Entry-->
	</div>
	<!--end::Content-->

@endsection

@section('js')

		<!--begin::Page Scripts(used by this page)-->
		<script src="{{ asset('assets/js/pages/widgets.js?v=7.0.3') }}"></script>
		<script src="{{ asset('assets/js/pages/custom/profile/profile.js?v=7.0.3') }}"></script>
		<!--end::Page Scripts-->

@endsection
