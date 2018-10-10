$(function () {


    $('.edit').on('click', function (e) {
        e.preventDefault();

        var email = $(this).data('user');

        $.post('profile/updateProfile', {email: email}, function (e) {
            if (e) {

                $('#theModal').html('<div id="user-edit-modal" class="modal">\n\
<div class="modal-content">\n\
<h4 class="user-name">Update your details!</h4>\n\
<div class="row form"><form class="col s12">\n\
<div class="row email-row">\n\
<div class="input-field col s6"><i class="mdi-social-person prefix"></i>\n\
<input id="firstname" type="text" value=' + e[0].firstname + ' class="validate"><label for="firstname">Firstname</label></div></div>\n\
<div class="row email-row">\n\
<div class="input-field col s6">\n\
<i class="mdi-social-person-outline prefix"></i>\n\
<input id="lastname" type="text" value=' + e[0].lastname + ' class="validate"><label for="lastname">Lastname</label></div></div>\n\
<div class="row"><div class="input-field col s2"><button class="edit-update btn waves-effect waves-light" type="submit">update</button></div></div>\n\
</form></div></div> </div>');
                $('#user-edit-modal').openModal();






                $(document).on('click', '.edit-update', function (e) {
                    e.preventDefault();
                    var firstname = $('#firstname').val();
                    var lastname = $('#lastname').val();

                    var updateUserDetail = $.ajax({
                        type: 'POST',
                        url: 'profile/updateUser',
                        data: {email: email, firstname: firstname, lastname: lastname},
                        dataType: 'json'
                    });


                    updateUserDetail.done(function (data, textStatus, jqXHR) {
                        if (data.message == true) {
                            alert('profile updated');
                            location.reload();
                            return false;
                        }

                        if (data.message == false) {
                            alert('Unable to update profile');
                            return false;
                        }
                    });

                    updateUserDetail.fail(function (jqXHR, textStatus, errorThrown) {
                        alert("Wrong credentials (" + textStatus + ")." + jqXHR.responseText);
                        console.log(textStatus);

                        return false;
                    });

                    return false;
                });

            }

        }, 'json');

    });

    $('#file').css('display', 'none');
    var email = $('#email').val();


    $.post('dashboard/profile', {email: email}, function (e) {
        $('.fn').text(e[0].firstname);
        $('.ln').text(e[0].lastname);
        if (e[0].image === null) {
            $('.profile').html('<img class="circle responsive-img profile-image" src="public/image/pic/avatar.png">');
            $('.display-pic').html('<img alt="" class="circle responsive-img" src="public/image/pic/avatar.png">');

        }
//        for (var i = 0; i < e.length; i++) {
        else {
            $('.profile').html('<img class="circle responsive-img profile-image" src="public/image/pic/' + e[0].image + '">');
            $('.display-pic').html('<img alt="" class="circle responsive-img" src="public/image/pic/' + e[0].image + '">');

        }



    }, 'json');


    $(document).on('change', '#file', function () {
        var property = document.getElementById('file').files[0];
        var user = $('#email').val();
        var image_name = property.name;
        var image_extension = image_name.split('.').pop().toLowerCase();
        if (jQuery.inArray(image_extension, ['gif', 'png', 'jpg', 'jpeg']) == -1) {
            alert('Invalid image File');
        }
        var image_size = property.size;
        if (image_size > 2000000) {
            alert('Image File Size is very big');
        } else {
            var form_data = new FormData();
            form_data.append("file", property);
            form_data.append("email", user);
            var processFile = $.ajax({
                url: 'dashboard/process',
                method: 'post',
                data: form_data,
                contentType: false,
                cache: false,
                processData: false
            });
            $('.display-pic').html('<div class="preloader-wrapper small active">\n\
<div class="spinner-layer spinner-green-only"><div class="circle-clipper left">\n\
<div class="circle"></div></div><div class="gap-patch"><div class="circle">\n\
</div></div><div class="circle-clipper right"><div class="circle"></div></div></div></div>');
            processFile.done(function (data, textStatus, jqXHR) {
                $('.display-pic').html(data);
                $('.profile').html(data);
            });
            processFile.fail(function (jqXHR, textStatus, errorThrown) {
                alert("Wrong credentials (" + textStatus + ")." + jqXHR.responseText);
                console.log(textStatus);
                return false;
            });
        }


    });


});

