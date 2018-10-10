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
            url: 'user/verifyTicket',
            data: {ticket: ticket},
            dataType: 'json'
        });

        ticketVerify.done(function (data, textStatus, jqXHR) {
            if (data.message === 'u') {
                alert('1 attempt left');
                window.location.replace('display');
                return false;
            }
            if (data.message === 'use') {
                alert('0 attempt left');
                window.location.replace('display');
                return false;
            }
            if (data.message === 'used') {
                alert('Sorry, buy a ticket from nearest zoo');
//                window.location.replace('use');
                return false;
            }
        });

        ticketVerify.fail(function (jqXHR, textStatus, errorThrown) {

        })

    });
    
});

