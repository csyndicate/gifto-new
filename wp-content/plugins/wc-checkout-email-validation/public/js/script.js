document.addEventListener('DOMContentLoaded', (event) => {

	if ( document.body.classList.contains( 'woocommerce-checkout' ) ) {

		var email = document.querySelector('#billing_email');		

		var errorText = document.createElement( 'p' );

		email.addEventListener( 'blur', function() {

			var inputEmail = email.value.toLowerCase();

			if( inputEmail.length > 3 ) {

				var correctEmail = true; 

				var parentWrap = document.querySelector('#billing_email_field');
			
				var emailProviders = [ 'hotnail', 'hormail', 'hornail', 'hotmal', 'outlok', 'oulook', 'gnail', 'gmal', 'gmaik', 'yaho', 'protonmal', 'protonmaik', 'potonmail' ];

				var emailSuffixes = [ 'con', 'co', 'ml' ];
			
				var emailSuffix = inputEmail.split('@')[1];

				var emailProvider = emailSuffix.split('.');	

				if( emailProviders.includes( emailProvider[0] ) || emailSuffixes.includes( emailProvider[1] ) ) {
					correctEmail = false;
				}

				if ( correctEmail == true ) {
					var warning = document.querySelector( '.b4-woocommerce-email-validation-warning' );
                    if( warning ) {
					    warning.remove();
                    }			
				} else {
					errorText.className = 'b4-woocommerce-email-validation-warning';
					errorText.innerHTML = b4_validation_params['b4_validation_warning_text'];
					parentWrap.append(errorText)
				}			

			}

		}, true);

	}

});