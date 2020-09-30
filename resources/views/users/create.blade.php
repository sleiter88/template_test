
@extends('layouts.app')

@section('css')

	<!--begin::Page Custom Styles(used by this page)-->
	<link href="{{ asset('assets/css/pages/wizard/wizard-4.css?v=7.0.3') }}" rel="stylesheet" type="text/css" />
	<!--end::Page Custom Styles-->

@endsection

@section('content')

	<!--begin::Content-->
	<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
		<!--begin::Subheader-->
		<div class="subheader min-h-lg-175px pt-5 pb-7 subheader-transparent" id="kt_subheader">
			<div class="container d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
				<!--begin::Details-->
				<div class="d-flex align-items-center flex-wrap mr-2">
					<!--begin::Heading-->
					<div class="d-flex flex-column">
						<!--begin::Title-->
						<h2 class="text-white font-weight-bold my-2 mr-5">Nuevo Usuario</h2>
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
							<a href="{{ route('admin.users.index') }}" class="text-white text-hover-white opacity-75 hover-opacity-100">Usuarios</a>
							<!--end::Item-->
							<!--begin::Item-->
							<span class="label label-dot label-sm bg-white opacity-75 mx-3"></span>
							<a href="" class="text-white text-hover-white opacity-75 hover-opacity-100">Nuevo Usuario</a>
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

				<!--begin::Card-->
				<div class="card card-custom card-transparent">
					<div class="card-body p-0">
						<!--begin::Wizard-->
						<div class="wizard wizard-4" id="kt_wizard" data-wizard-state="step-first" data-wizard-clickable="true">
							<!--begin::Wizard Nav-->
							<div class="wizard-nav">
								<div class="wizard-steps">
									<div class="wizard-step" data-wizard-type="step" data-wizard-state="current">
										<div class="wizard-wrapper">
											<div class="wizard-number">1</div>
											<div class="wizard-label">
												<div class="wizard-title">Perfil</div>
												<div class="wizard-desc">Información del usuario</div>
											</div>
										</div>
									</div>
									<div class="wizard-step" data-wizard-type="step">
										<div class="wizard-wrapper">
											<div class="wizard-number">2</div>
											<div class="wizard-label">
												<div class="wizard-title">Gimnasio</div>
												<div class="wizard-desc">Información del &amp; Gimnasio</div>
											</div>
										</div>
									</div>
									<div class="wizard-step" data-wizard-type="step">
										<div class="wizard-wrapper">
											<div class="wizard-number">3</div>
											<div class="wizard-label">
												<div class="wizard-title">Información</div>
												<div class="wizard-desc">Medidas y somatotipos</div>
											</div>
										</div>
									</div>
									<div class="wizard-step" data-wizard-type="step">
										<div class="wizard-wrapper">
											<div class="wizard-number">4</div>
											<div class="wizard-label">
												<div class="wizard-title">Confirmar</div>
												<div class="wizard-desc">Confirmar y Submit</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!--end::Wizard Nav-->
							<!--begin::Card-->
							<div class="card card-custom card-shadowless rounded-top-0">
								<!--begin::Body-->
								<div class="card-body p-0">
									<div class="row justify-content-center py-8 px-8 py-lg-15 px-lg-10">
										<div class="col-xl-12 col-xxl-10">
											<!--begin::Wizard Form-->
											<form class="form" id="kt_form" action="{{route('admin.users.store')}}" method="post" enctype="multipart/form-data">
												@csrf
												<div class="row justify-content-center">

													<div class="col-xl-9">
														<!--begin::Wizard Step 1-->
														<div class="my-5 step" data-wizard-type="step-content" data-wizard-state="current">
															<h5 class="text-dark font-weight-bold mb-10">Perfil de Usuario:</h5>
															<!--begin::Group-->
															<div class="form-group row">
																<label class="col-xl-3 col-md-3 col-lg-3 col-form-label text-left">Avatar</label>
																<div class="col-lg-9 col-md-9 col-xl-9">
																		<div class="image-input image-input-outline" id="kt_user_add_avatar">
																				<div class="image-input-wrapper" style="background-image: url({{ asset('uploads/users/profile.png') }})"></div>
																				<label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Change avatar">
																						<i class="fa fa-pen icon-sm text-muted"></i>
																						<input type="file" name="profile_avatar" accept=".png, .jpg, .jpeg" />
																						<input type="hidden" name="profile_avatar_remove" />
																				</label>
																				<span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="Cancel avatar">
																						<i class="ki ki-bold-close icon-xs text-muted"></i>
																				</span>
																		</div>
																</div>
															</div>
															<!--end::Group-->
															<!--begin::Group-->
															<div class="form-group row">
																	<label class="col-xl-3 col-lg-3 col-md-3 col-form-label"><span>*</span> Nombre</label>
																	<div class="col-lg-9 col-md-9 col-xl-9">
																		<input class="form-control form-control-solid form-control-lg" name="name" type="text" value="{{ old('name') }}" />
																	</div>
															</div>

															<!--end::Group-->
															<!--begin::Group-->
															<!-- <div class="form-group row">
																	<label class="col-xl-3 col-lg-3 col-form-label">Last Name</label>
																	<div class="col-lg-9 col-xl-9">
																			<input class="form-control form-control-solid form-control-lg" name="lastname" type="text" value="" />
																	</div>
															</div> -->
															<!--end::Group-->
															<!--begin::Group-->
															<div class="form-group row">
																	<label class="col-xl-3 col-lg-3 col-md-3 col-form-label"><span>*</span> Rol</label>
																	<div class="col-lg-9 col-md-9 col-xl-9">
																			{!! Form::select('role', $roles, null, ['class' => 'form-control form-control-lg form-control-solid']) !!}
																			<span class="form-text text-muted">El usuario es en dependencia del nivel de accesos requierido.</span>
																	</div>
															</div>
															<!--end::Group-->
															<!--begin::Group-->
															<div class="form-group row">
																	<label class="col-xl-3 col-lg-3 col-md-3 col-form-label"><span>*</span> Teléfono</label>
																	<div class="col-lg-9 col-xl-9 col-md-9">
																			<div class="input-group input-group-solid input-group-lg">
																					<div class="input-group-prepend">
																							<span class="input-group-text">
																									<i class="la la-phone"></i>
																							</span>
																					</div>
																					<input type="text" class="form-control form-control-solid form-control-lg" name="phone" value="{{ old('phone') }}" placeholder="Phone" />
																			</div>
																			<span class="form-text text-muted">Entre un número de teléfono valido(e.g: 654531320).</span>
																	</div>
															</div>
															<!--end::Group-->
															<!--begin::Group-->
															<div class="form-group row">
																	<label class="col-xl-3 col-md-3 col-lg-3 col-form-label"><span>*</span> Correo</label>
																	<div class="col-lg-9 col-xl-9 col-md-9">
																			<div class="input-group input-group-solid input-group-lg">
																					<div class="input-group-prepend">
																							<span class="input-group-text">
																									<i class="la la-at"></i>
																							</span>
																					</div>
																					<input type="text" class="form-control form-control-solid form-control-lg" name="email" value="{{ old('email') }}" />
																			</div>
																	</div>
															</div>
															<!--end::Group-->
														</div>
														<!--end::Wizard Step 1-->
														<!--begin::Wizard Step 2-->
														<div class="my-5 step" data-wizard-type="step-content">
																<h5 class="text-dark font-weight-bold mb-10 mt-5">Información del Gimnasio</h5>
																<!--begin::Group-->
																<div class="form-group row">
																		<label class="col-form-label col-xl-3 col-md-3 col-lg-3"><span>*</span> Gimnasio</label>
																		<div class="col-xl-9 col-lg-9 col-md-9">
																				{!! Form::select('gym_id', $gyms, null, ['class' => 'form-control form-control-lg form-control-solid']) !!}

																		</div>
																</div>
																<!--end::Group-->
																<!--begin::Group-->

																<!--end::Group-->
																<div class="separator separator-dashed my-10"></div>
																<h5 class="text-dark font-weight-bold mb-10">Información</h5>
																<!--begin::Group-->
																<div class="form-group row">
																		<label class="col-form-label col-xl-3 col-lg-3 col-md-3">Reglas de uso</label>
																		<div class="col-xl-9 col-lg-9 col-md-9">
																				<button type="button" class="btn btn-light-primary font-weight-bold btn-sm">Roles</button>
																				<div class="form-text text-muted mt-3">Para cada nivel de acceso las visuales seran correspondientes al mismo, los usuarios que interactuan con el Dashboard ('Secretary', 'Admin', 'Super Admin').
																				</div>
																		</div>
																</div>
																<!--end::Group-->
																<!--begin::Group-->

																<!--end::Group-->
																<!--begin::Group-->

																<!--end::Group-->
														</div>
														<!--end::Wizard Step 2-->
														<!--begin::Wizard Step 3-->
														<div class="my-5 step" data-wizard-type="step-content">
															<h5 class="mb-10 font-weight-bold text-dark">Medidas y somatotipos</h5>
															<!--begin::Group-->
															<!--begin::Row-->
															<div class="row">
																<div class="col-xl-6 col-md-6">
																	<div class="form-group">
																			<label><span>*</span> Altura cm</label>
																			<input type="text" class="form-control form-control-solid form-control-lg" name="height" placeholder="Altura" value="{{ old('height') }}" />
																			<span class="form-text text-muted">Altura en cm.</span>
																	</div>
																	<!--end::Group-->
																</div>
																<div class="col-xl-6 col-md-6">
																	<!--begin::Group-->
																	<div class="form-group">
																			<label><span>*</span> Peso kg</label>
																			<input type="text" class="form-control form-control-solid form-control-lg" name="weight" placeholder="Peso" value="{{ old('weight') }}" />
																			<span class="form-text text-muted">Peso en kg.</span>
																	</div>
																</div>
															</div>
															<!--begin::Row-->
															<div class="row">
																	<div class="col-xl-4 col-md-4">
																			<!--begin::Group-->
																			<div class="form-group">
																					<label><span>*</span> Grasa corporal</label>
																					<input type="text" class="form-control form-control-solid form-control-lg" name="fat_percentage" placeholder="Porciento de grasa corporal" value="{{ old('fat_percentage') }}" />
																					<span class="form-text text-muted">Grasa corporal.</span>
																			</div>
																	</div>
																	<!--end::Group-->
																	<!--begin::Group-->
																<div class="col-xl-4 col-md-4">
																		<!--begin::Group-->
																		<div class="form-group">
																				<label><span>*</span> Edad</label>
																				<input type="text" class="form-control form-control-solid form-control-lg" name="age" placeholder="Edad" value="{{ old('age') }}" />
																				<span class="form-text text-muted">Edad actual.</span>
																		</div>
																		<!--end::Group-->
																</div>
																<div class="col-xl-4 col-md-4">
																		<!--begin::Group-->
																		<div class="form-group">
																				<label><span>*</span> Sexo</label>
																				<select name="sex" class="form-control form-control-solid form-control-lg">
																						<option value="">--Seleccionar</option>
																						<option value="Hombre">Hombre</option>
																						<option value="Mujer">Mujer</option>
																				</select>
																				<span class="form-text text-muted">Sexo.</span>
																		</div>
																		<!--end::Group-->
																</div>
																<!--end::Group-->
															</div>
															<!--end::Row-->
															<!--begin::Row-->
															<div class="row">

															</div>
														</div>
														<!--end::Wizard Step 3-->
														<!--begin::Wizard Step 4-->
														<div class="my-5 step" data-wizard-type="step-content">
															<h5 class="mb-10 font-weight-bold text-dark">Revizar y Agregar</h5>
															<!--begin::Item-->
															<div class="border-bottom mb-5 pb-5">
																	<div class="font-weight-bolder mb-3">Detalles de la cuenta:</div>
																	<div class="line-height-xl"><i id="name"></i>
																		<br />Rol: <i id="role"></i>
																		<br />Phone: <i id="phone"></i>
																		<br />Email: <i id="email"></i>
																	</div>
															</div>
															<!--end::Item-->
															<!--begin::Item-->
															<div class="border-bottom mb-5 pb-5">
																	<div class="font-weight-bolder mb-3">Detalles somatotipo:</div>
																	<div class="line-height-xl"><i id="address"></i>
																		<br />Altura: <i id="height"></i>
																		<br />Peso: <i id="weight"></i>
																		<br />Edad: <i id="age"></i>
																		<br />Sexo: <i id="sex"></i>
																	</div>
															</div>
															<!--end::Item-->
															<!--begin::Item-->
															<div>
																	<div class="font-weight-bolder">Gimnasio:</div>
																	<div class="line-height-xl"><i id="gym"></i>
																	<!-- <br />Card Name: John Wick
																	<br />Card Expiry: 01/21</div> -->
																	</div>
															</div>
															<!--end::Item-->
														</div>
														<!--end::Wizard Step 4-->
														<!--begin::Wizard Actions-->
														<div class="d-flex justify-content-between border-top pt-10 mt-15">
																<div class="mr-2">
																		<button id="prev-step" class="btn btn-light-primary font-weight-bolder px-9 py-4" data-wizard-type="action-prev">Atrás</button>
																</div>
																<div>
																		<button type="submit" class="btn btn-success font-weight-bolder px-9 py-4" data-wizard-type="action-submit">Aceptar</button>
																		<button id="next-step" class="btn btn-primary font-weight-bolder px-9 py-4" data-wizard-type="action-next">Siguiente</button>
																</div>
														</div>
														<!--end::Wizard Actions-->
													</div>

												</div>
											</form>
											<!--end::Wizard Form-->
										</div>
									</div>
								</div>
								<!--end::Body-->
							</div>
							<!--end::Card-->
						</div>
						<!--end::Wizard-->
					</div>
				</div>
				<!--end::Card-->
			</div>
			<!--end::Container-->
		</div>
		<!--end::Entry-->
	</div>
	<!--end::Content-->

@endsection

@section('js')

		<!--begin::Page Scripts(used by this page)-->
		<script src="{{ asset('assets/js/pages/custom/user/add-user.js?v=7.0.3') }}"></script>
		<!--end::Page Scripts-->

		<script type="text/javascript">

			$(document).ready(function() {

				$('#next-step').click(function () {
					$("#name").text($('input[name="name"]').val());
					$("#phone").text($('input[name="phone"]').val());
					$("#email").text($('input[name="email"]').val());
					$("#height").text($('input[name="height"]').val());
					$("#weight").text($('input[name="weight"]').val());
					$("#age").text($('input[name="age"]').val());
					$("#sex").text($('select[name="sex"] option:selected').html());
					$("#gym").text($('select[name="gym_id"] option:selected').html());
					$("#role").text($('select[name="role"] option:selected').html());
				});

			});

		</script>
		<!--end::Page Scripts -->

@endsection
