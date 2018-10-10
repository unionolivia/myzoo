$(function () {
    $('#signup-modal').openModal();
    $('.signup').on('click', function (e) {
        e.preventDefault();

        // Let get the email
        var email = $('#email').val();
//        var email = $(this).serialize();

        if (email === '') {
            $('#email').focus();
            return false;
        }

        var signMeUp = $.ajax({
            type: 'POST',
            url: 'signup/checkIfEmailExist',
            data: {email: email},
            dataType: 'json'
        });

        signMeUp.done(function (data, textStatus, jqXHR) {
//            alert(data);
            if (data.message === true) {
                alert('This email already exist');
                $('#email').focus();
                return false;
                // $('.email-row').remove();
                // $('.other-signup-row').show();
            } else {
                $('#email').attr('disabled', true);
                $('.other-signup-row').show();
                $('.signup').replaceWith('<button class="finish btn waves-effect waves-light" type="submit">finish</button>');

                // let's complete the process
                $(document).on('submit', 'form', function (e) {
                    e.preventDefault();

//                    var data = $('form').serialize();
                    var firstname = $('#firstname').val();
                    var lastname = $('#lastname').val();
                    var password = $('#password').val();


                    var finishSignupProcess = $.ajax({
                        url: 'signup/processSignup',
                        type: 'POST',
                        data: {email: email, firstname: firstname, lastname: lastname, password: password},
                        // contentType: false,
                        // processData: false
                        dataType: 'json'
                    });


                    finishSignupProcess.done(function (data, textStatus, jqXHR) {
                        if (data.message === true) {
                            window.location.replace('user');
                            return false;
                        } else {
                            alert('No way');
                            return false;

                        }
                        return false;
                    });


                });


                return false;
            }

        });

        // On Fail
        signMeUp.fail(function (jqXHR, textStatus, errorThrown) {
            alert("Wrong credentials (" + textStatus + ")." + jqXHR.responseText);
            console.log(textStatus);

            return false;
        });

        return false;

    });

});

