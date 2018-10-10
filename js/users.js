$(function () {

    var userTable = $('#data-table-simple').dataTable();
    $.get('users/getAllUsers', function (e) {

//        console.log(e[0].person_id, e[1].firstname);
        console.log(e);
        userTable.fnClearTable();
        for (var i = 0; i < e.length; i++) {
            userTable.fnAddData([e[i].person_id, e[i].firstname, e[i].lastname, e[i].email, e[i].role,
                '&nbsp; <a class="edit-user" data-name=' + e[i].firstname + ' data-edit="' + e[i].person_id + '" href=""><i class="mdi-editor-border-color"></i></a>']);


            // Let delete the items
//        $('.del').on('click', function(){
//           var delItem = $(this);
//           var id = $(this).attr('rel');
//           alert(id);
//        });

            // Let's update the user's detail
            $(document).on('click', '.edit-user', function (e) {
                e.preventDefault();

                var name = $(this).data('name');


                $('.user-name').text('Add privileges to ' + name);
                var userid = $(this).data('edit');

                $('#edit-modal').openModal();
                $('select').material_select();
                
                $(document).on('click', '.update-user', function (e) {
                    e.preventDefault();

                    var role = $('#role').val();

                    var updateUsersProfile = $.ajax({
                        type: 'POST',
                        url: 'users/updateUsersRole',
                        data: {userid: userid, role: role},
                        dataType: 'json'
                    });

                    updateUsersProfile.done(function (data, textStatus, jqXHR) {
                        if (data.message === true) {
                            location.reload();
                            return false;
                        }
                        return false;
                    });

                    updateUsersProfile.fail(function (jqXHR, textStatus, errorThrown) {
                        alert("Wrong credentials (" + textStatus + ")." + jqXHR.responseText);
                        console.log(textStatus);

                        return false;
                    });
                });

//          $.redirect('users/edit', {id: id, name: name});

                return false;
            });

        }

    }, 'json');


});

