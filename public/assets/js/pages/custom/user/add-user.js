/*
 * @Author: Ifmuela
 * @Date:   2020-06-17 00:43:33
 * @Last Modified by:   Ifmuela
 * @Last Modified time: 2020-06-17 05:35:40
 */
"use strict";

// Class Definition
var KTAddUser = function () {
	// Private Variables
	var _wizardEl;
	var _formEl;
	var _wizard;
	var _avatar;
	var _validations = [];

	// Private Functions
	var _initWizard = function () {
		// Initialize form wizard
		_wizard = new KTWizard(_wizardEl, {
			startStep: 1, // initial active step number
			clickableSteps: true  // allow step clicking
		});

		// Validation before going to next page
		_wizard.on('beforeNext', function (wizard) {
			_validations[wizard.getStep() - 1].validate().then(function(status) {
		        if (status == 'Valid') {
					_wizard.goNext();
					KTUtil.scrollTop();
				} else {
					Swal.fire({
		                text: "Sorry, looks like there are some errors detected, please try again.",
		                icon: "error",
		                buttonsStyling: false,
		                confirmButtonText: "Ok, got it!",
						customClass: {
							confirmButton: "btn font-weight-bold btn-light"
						}
		            }).then(function() {
						KTUtil.scrollTop();
					});
				}
		    });

			_wizard.stop();  // Don't go to the next step
		});

		// Change Event
		_wizard.on('change', function (wizard) {
			KTUtil.scrollTop();
		});
	}

	var _initValidations = function () {
		// Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/

		// Validation Rules For Step 1
		_validations.push(FormValidation.formValidation(
			_formEl,
			{
				fields: {
					name: {
						validators: {
							notEmpty: {
								message: 'Nombre requerido'
							}
						}
					},
					role: {
						validators: {
							notEmpty: {
								message: 'Rol requerido'
							}
						}
					},
					phone: {
						validators: {
							notEmpty: {
								message: 'Teléfono es requerido'
							}
						}
					},
					email: {
						validators: {
							notEmpty: {
								message: 'Email is required'
							},
							emailAddress: {
								message: 'The value is not a valid email address'
							}
						}
					}
					// companywebsite: {
					// 	validators: {
					// 		notEmpty: {
					// 			message: 'Website URL is required'
					// 		}
					// 	}
					// }
				},
				plugins: {
					trigger: new FormValidation.plugins.Trigger(),
					bootstrap: new FormValidation.plugins.Bootstrap()
				}
			}
		));

		_validations.push(FormValidation.formValidation(
			_formEl,
			{
				fields: {
					// Step 2
					// communication: {
					// 	validators: {
					// 		choice: {
					// 			min: 1,
					// 			message: 'Please select at least 1 option'
					// 		}
					// 	}
					// },
					gym_id: {
						validators: {
							notEmpty: {
								message: 'Por favor seleccione el gimnasio'
							}
						}
					},
					timezone: {
						validators: {
							notEmpty: {
								message: 'Please select a timezone'
							}
						}
					}
				},
				plugins: {
					trigger: new FormValidation.plugins.Trigger(),
					bootstrap: new FormValidation.plugins.Bootstrap()
				}
			}
		));

		_validations.push(FormValidation.formValidation(
			_formEl,
			{
				fields: {
					height: {
						validators: {
							notEmpty: {
								message: 'Altura es requerido'
							}
						}
					},
					weight: {
						validators: {
							notEmpty: {
								message: 'Peso es requerido'
							}
						}
					},
					fat_percentage: {
						validators: {
							notEmpty: {
								message: 'Grasa colporal es requerido'
							}
						}
					},
					waist_measurements: {
						validators: {
							notEmpty: {
								message: 'Medidas de la cintura es requerido'
							}
						}
					},
					age: {
						validators: {
							notEmpty: {
								message: 'Edad es requerido'
							}
						}
					},
					sex: {
						validators: {
							notEmpty: {
								message: 'Sexo es requerido'
							}
						}
					},
				},
				plugins: {
					trigger: new FormValidation.plugins.Trigger(),
					bootstrap: new FormValidation.plugins.Bootstrap()
				}
			}
		));
	}

	var _initAvatar = function () {
		_avatar = new KTImageInput('kt_user_add_avatar');
	}

	return {
		// public functions
		init: function () {
			_wizardEl = KTUtil.getById('kt_wizard');
			_formEl = KTUtil.getById('kt_form');

			_initWizard();
			_initValidations();
			_initAvatar();
		}
	};
}();

jQuery(document).ready(function () {
	KTAddUser.init();
});
