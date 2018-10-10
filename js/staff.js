$(function () {

    $('.verify').on('click', function (e) {
        e.preventDefault();


        // Let get the email
        var ticket = $('#ticket').val();

        if (ticket === '') {
            $('#ticket').focus();
            return false;
        }

        var ticketVerify = $.ajax({
            type: 'POST',
            url: 'staff/verifyTicket',
            data: {ticket: ticket},
            dataType: 'json'
        });

        ticketVerify.done(function (data, textStatus, jqXHR) {
            if (data.message === true) {
                alert('Ticket is valid');
                return false;
            }
            if (data.message === false) {
                alert('Ticket Number does not exist');
                return false;
            }
        });

        ticketVerify.fail(function (jqXHR, textStatus, errorThrown) {

        })

    });
});

