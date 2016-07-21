function showName(){
	    var signUpForm = `
		    <form id="signupform" method="post" action="">

		    	<ul>
		    		<li>
		    			<label for="Name">Name:</label>
		    			<input type="text" name="username" />
		    		</li>
		    		<li>
		    			<label for="email">Email:</label>
		    			<input id="email" type="text" name="email" />
		    		</li>
		    		<li>
		    			<input id="submitbutton" type="submit" value="Join" name="join" disabled="disabled" />
		    		</li>
		    	</ul>

			</form>
			`;
		$("#fannav").append(signUpForm);
		$("#joinlink").css('display','none');

		function isEmail(email) {
			  var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
			  return regex.test(email);
			}

		(function() {
	    	$('input').(function() {console.log('here2');

	        var empty = false;
	        $('input').each(function() {
	            if ($(this).val() == '') {
	                empty = true;
	            }
	        });

	        var email = $('#email').val();console.log(email)
	        var validEmail = isEmail(email);console.log(validEmail)

	        if(!validEmail){
	        	empty = true;
	        }

	        if (empty) {
	            $('#sumitbutton').attr('disabled', 'disabled');
	        } else {
	            $('#submitbutton').removeAttr('disabled');
	        }
	    });
	})();

}



