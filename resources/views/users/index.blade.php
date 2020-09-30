

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
					<!--begin::Heading-->
					<div class="d-flex flex-column">
						<!--begin::Title-->
						<h2 class="text-white font-weight-bold my-2 mr-5">Usuarios</h2>
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
							<a href="" class="text-white text-hover-white opacity-75 hover-opacity-100">Usuarios</a>
							<!--end::Item-->
						</div>
						<!--end::Breadcrumb-->
					</div>
					<!--end::Heading-->
				</div>
				<!--end::Details-->

			</div>
		</div>
		<!--end::Subheader-->
		<!--begin::Entry-->
		<div class="d-flex flex-column-fluid">
			<!--begin::Container-->
			<div class="container">
				<!--begin::Notice-->

					<!-- NOTIFICACION -->
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
				<!--begin::Card-->
				<div class="card card-custom">
					<div class="card-header flex-wrap py-5">
						<div class="card-title">
							<h3 class="card-label">Usuarios
							<div class="text-muted pt-2 font-size-sm">Listados</div></h3>
						</div>
						<div class="card-toolbar">
							<!--begin::Dropdown-->
							<div class="dropdown dropdown-inline mr-2">
								<button type="button" class="btn btn-light-primary font-weight-bolder dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<span class="svg-icon svg-icon-md">
									<!--begin::Svg Icon | path:assets/media/svg/icons/Design/PenAndRuller.svg-->
									<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
										<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
											<rect x="0" y="0" width="24" height="24" />
											<path d="M3,16 L5,16 C5.55228475,16 6,15.5522847 6,15 C6,14.4477153 5.55228475,14 5,14 L3,14 L3,12 L5,12 C5.55228475,12 6,11.5522847 6,11 C6,10.4477153 5.55228475,10 5,10 L3,10 L3,8 L5,8 C5.55228475,8 6,7.55228475 6,7 C6,6.44771525 5.55228475,6 5,6 L3,6 L3,4 C3,3.44771525 3.44771525,3 4,3 L10,3 C10.5522847,3 11,3.44771525 11,4 L11,19 C11,19.5522847 10.5522847,20 10,20 L4,20 C3.44771525,20 3,19.5522847 3,19 L3,16 Z" fill="#000000" opacity="0.3" />
											<path d="M16,3 L19,3 C20.1045695,3 21,3.8954305 21,5 L21,15.2485298 C21,15.7329761 20.8241635,16.200956 20.5051534,16.565539 L17.8762883,19.5699562 C17.6944473,19.7777745 17.378566,19.7988332 17.1707477,19.6169922 C17.1540423,19.602375 17.1383289,19.5866616 17.1237117,19.5699562 L14.4948466,16.565539 C14.1758365,16.200956 14,15.7329761 14,15.2485298 L14,5 C14,3.8954305 14.8954305,3 16,3 Z" fill="#000000" />
										</g>
									</svg>
									<!--end::Svg Icon-->
								</span>Exportar</button>
								<!--begin::Dropdown Menu-->
								<div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
									<!--begin::Navigation-->
									<ul class="navi flex-column navi-hover py-2">
										<li class="navi-header font-weight-bolder text-uppercase font-size-sm text-primary pb-2">Opciones:</li>

										<li class="navi-item">
											<a href="#" class="navi-link">
												<span class="navi-icon">
													<i class="la la-file-excel-o"></i>
												</span>
												<span class="navi-text">Excel</span>
											</a>
										</li>

									</ul>
									<!--end::Navigation-->
								</div>
								<!--end::Dropdown Menu-->
							</div>
							<!--end::Dropdown-->
							<!--begin::Button-->
							<a href="{{ route('admin.users.create') }}" class="btn btn-primary font-weight-bolder">
							<span class="svg-icon svg-icon-md">
								<!--begin::Svg Icon | path:assets/media/svg/icons/Design/Flatten.svg-->
								<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
									<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
										<rect x="0" y="0" width="24" height="24" />
										<circle fill="#000000" cx="9" cy="15" r="6" />
										<path d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z" fill="#000000" opacity="0.3" />
									</g>
								</svg>
								<!--end::Svg Icon-->
							</span>Nuevo Usuario</a>
							<!--end::Button-->
						</div>
					</div>
					<div class="card-body">
						<!--begin: Datatable-->
						<table class="table table-separate table-head-custom table-checkable" id="kt_datatable">
							<thead>
								<tr>
									<th>Usuario</th>
									<th>Email</th>
									<th>Progreso</th>
									<th>Gimnasio</th>
									<th>Rol</th>
									<th>Estado</th>
									<th>Actions</th>
								</tr>
							</thead>
							<tbody>
								@foreach($users as $user)
									<tr>
										<td>
											<div class="d-flex align-items-center">
													<div class="symbol symbol-50 flex-shrink-0">
															<!-- <img src="assets/media/users/ user_img" alt="photo"> -->
														@if(strpos($user->avatar, 'https://') === 0)
															<img alt="photo" src="{{ $user->avatar }}">
														@else
															<img alt="photo" src="{{ asset('uploads/users/'.$user->avatar) }}">
														@endif
													</div>
													<div class="ml-3">
															<span class="text-dark-75 font-weight-bold line-height-sm d-block pb-2">{{ $user->name }}</span>
															<a href="#" class="text-muted text-hover-primary">{{ $user->email }}</a>
													</div>
											</div>

										</td>
										<td><a class="text-dark-50 text-hover-primary" href="mailto:hboule0@hp.com">hboule0@hp.com</a></td>
										<td>N1</td>
										<td>VideoMake</td>
										<td>{{ $user->role }}</td>
										<td>{{ $user->status }}</td>
										<td>
											<div class="dropdown dropdown-inline">
												<a href="javascript:;" class="btn btn-sm btn-clean btn-icon mr-2" data-toggle="dropdown">
														<span class="svg-icon svg-icon-md">
																<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																		<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																				<rect x="0" y="0" width="24" height="24"/>
																				<path d="M5,8.6862915 L5,5 L8.6862915,5 L11.5857864,2.10050506 L14.4852814,5 L19,5 L19,9.51471863 L21.4852814,12 L19,14.4852814 L19,19 L14.4852814,19 L11.5857864,21.8994949 L8.6862915,19 L5,19 L5,15.3137085 L1.6862915,12 L5,8.6862915 Z M12,15 C13.6568542,15 15,13.6568542 15,12 C15,10.3431458 13.6568542,9 12,9 C10.3431458,9 9,10.3431458 9,12 C9,13.6568542 10.3431458,15 12,15 Z" fill="#000000"/>
																		</g>
																</svg>
														</span>
												</a>
												<div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
													<ul class="navi flex-column navi-hover py-2">
															<li class="navi-header font-weight-bolder text-uppercase font-size-xs text-primary pb-2">
																	Opciones:
															</li>
															<li class="navi-item">
																	<a href="{{ route('admin.users.show', $user->id) }}" class="navi-link">
																			<span class="navi-icon"><i class="la la-eye"></i></span>
																			<span class="navi-text">Detalle</span>
																	</a>
															</li>
															@if(!$user->status)
																<li class="navi-item">
																		<a href="{{ route('admin.users.status', $user->id) }}" class="navi-link">
																				<span class="navi-icon"><i class="la la-toggle-off"></i></span>
																				<span class="navi-text">Activar</span>
																		</a>
																</li>
															@else
																<li class="navi-item">
																		<a href="{{ route('admin.users.status', $user->id) }}" class="navi-link">
																				<span class="navi-icon"><i class="la la-toggle-on"></i></span>
																				<span class="navi-text">Desactivar</span>
																		</a>
																</li>
															@endif
															<li class="navi-item">
																	<a href="#" class="navi-link">
																			<span class="navi-icon"><i class="la la-file-text-o"></i></span>
																			<span class="navi-text">Plan</span>
																	</a>
															</li>

													</ul>
												</div>
											</div>
											<a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-sm btn-clean btn-icon mr-2" title="Edit details">
													<span class="svg-icon svg-icon-md">
															<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																	<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																			<rect x="0" y="0" width="24" height="24"/>
																			<path d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z" fill="#000000" fill-rule="nonzero" transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) "/>
																			<rect fill="#000000" opacity="0.3" x="5" y="20" width="15" height="2" rx="1"/>
																	</g>
															</svg>
													</span>
											</a>

											{!! Form::open(['route' => ['admin.users.destroy', $user->id], 'id' => 'form_user_'.$user->id, 'style' => 'display: inline']) !!}
												<input type="hidden" name="_method" value="DELETE">

												<button type="submit" data-dialog="delete_dialog" class="btn btn-sm btn-clean btn-icon" title="Delete" form-id="form_user_{{$user->id}}">
														<span class="svg-icon svg-icon-md">
																<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																		<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																				<rect x="0" y="0" width="24" height="24"/>
																				<path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero"/>
																				<path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3"/>
																		</g>
																</svg>
														</span>
												</button>
											{!! Form::close() !!}

										</td>
									</tr>
								@endforeach
							</tbody>
						</table>
						<!--end: Datatable-->
					</div>
				</div>
				<!--end::Card-->
			</div>
			<!--end::Container-->
		</div>
		<!--end::Entry-->
	</div>


	<div class="modal modal-stick-to-bottom fade" id="delete_dialog" role="dialog" data-backdrop="false" style="display: none;" aria-hidden="true">
			<div class="modal-dialog" role="document">
					<div class="modal-content">
							<div class="modal-header">
									<h5 class="modal-title" id="exampleModalLabel">{!! trans('share.views.carefull') !!}</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									</button>
							</div>
							<div class="modal-body">
									<p>{!! trans('share.views.msg_delete') !!}</p>
							</div>
							<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-dismiss="modal">{!! trans('share.views.cancel') !!}</button>
									<button type="button" class="btn btn-danger delete">{!! trans('share.views.delete') !!}</button>
							</div>
					</div>
			</div>
	</div>
	<!--end::Content-->

@endsection

@section('js')

		<!--begin::Page Vendors(used by this page)-->
		<script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js?v=7.0.3') }}"></script>
		<!--end::Page Vendors-->
		<!--begin::Page Scripts(used by this page)-->
		<!-- <script src="{{ asset('assets/js/pages/crud/datatables/advanced/column-rendering.js?v=7.0.3') }}"></script> -->
		<!--end::Page Scripts-->

		<!--end::Page Vendors -->

		<!--begin::Page Scripts(used by this page) -->
		<!-- <script src="{{ asset('assets/js/demo4/pages/crud/datatables/advanced/multiple-controls.js') }}" type="text/javascript"></script> -->

		<script type="text/javascript">
				var form_to_submit = '';

				$(document).ready(function() {

						$('[data-dialog]').click(function (e) {
								e.preventDefault();
								form_to_submit = $(this).attr('form-id');
								$('#delete_dialog').modal('show');
						});

						$('.delete').click(function () {
								if(form_to_submit != '') {
										// alert('Eliminar '+form_to_submit);
										$("#"+form_to_submit).submit();
								}
						});
				});

		</script>
		<!--end::Page Scripts -->

	<script type="text/javascript">

		var KTDatatablesAdvancedColumnRendering = function() {

				var init = function() {
					var table = $('#kt_datatable');

					// begin first table
					table.DataTable({
						responsive: true,
						paging: true,
						columnDefs: [
							{
								targets: 4,
								render: function(data, type, full, meta) {
									var status = {
										'Client': {'title': 'Client', 'class': 'label-light-primary'},
										'Coach': {'title': 'Coach', 'class': ' label-light-danger'},
										'Secretary': {'title': 'Secretary', 'class': ' label-light-primary'},
										'Admin': {'title': 'Admin', 'class': ' label-light-success'},
										'Super Admin': {'title': 'Super Admin', 'class': ' label-light-info'},
									};
									if (typeof status[data] === 'undefined') {
										return data;
									}
									return '<span class="label label-lg font-weight-bold' + status[data].class + ' label-inline">' + status[data].title + '</span>';
								},
							},
							{
								targets: 5,
								render: function(data, type, full, meta) {
									var status = {
										0: {'title': 'Desactivado', 'state': 'danger'},
										1: {'title': 'Activo', 'state': 'success'},
									};
									if (typeof status[data] === 'undefined') {
										return data;
									}
									return '<span class="label label-' + status[data].state + ' label-dot mr-2"></span>' +
										'<span class="font-weight-bold text-' + status[data].state + '">' + status[data].title + '</span>';
								},
							}
						],
					});

					// $('#kt_datatable_search_status').on('change', function() {
					// 	datatable.search($(this).val().toLowerCase(), 'Status');
					// });

					$('#kt_datatable_search_type').on('change', function() {
						datatable.search($(this).val().toLowerCase(), 'Type');
					});

					// $('#kt_datatable_search_status, #kt_datatable_search_type').selectpicker();
				};

				return {

					//main function to initiate the module
					init: function() {
						init();
					}
				};
		}();

    jQuery(document).ready(function() {
			KTDatatablesAdvancedColumnRendering.init();
		});

</script>

@endsection
