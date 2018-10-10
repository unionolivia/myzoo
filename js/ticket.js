$(function () {
    
    var userTable = $('#data-table-simple').dataTable();
    $.get('ticket/getAllTicket', function (e) {

//        console.log(e[0].person_id, e[1].firstname);
        console.log(e);
        userTable.fnClearTable();
        for (var i = 0; i < e.length; i++) {
            userTable.fnAddData([e[i].ticket_id, e[i].ticket_no, e[i].status, e[i].date_added]);
        }
    }, 'json');
    
       $('#ticket-modal').openModal();
       
        $('.generate-ticket').on('click', function (e) {
        e.preventDefault();

        var number = $('#num').val();
        var generateTicket = $.ajax({
            type: 'POST',
            url: 'ticket/generateTicket',
            data: {number: number},
            dataType: 'json'
        });

        generateTicket.done(function (data, textStatus, jqXHR) {

           location.reload();
           
        });

        generateTicket.fail(function (jqXHR, textStatus, errorThrown) {
            alert("Wrong credentials (" + textStatus + ")." + jqXHR.responseText);
            console.log(textStatus);

            return false;
        });

        return false;
    });

});