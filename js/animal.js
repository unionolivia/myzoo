$(function () {
    $('#animal-modal').openModal();

    $('.add-animal').on('click', function (e) {
        e.preventDefault();

        var name = $('#name').val();
        var description = $('#description').val();

        var addAnimal = $.ajax({
            type: 'POST',
            url: 'animal/addAnimal',
            data: {name: name, description: description},
            dataType: 'json'
        });
        $('.loading').html('<div class="preloader-wrapper small active">\n\
<div class="spinner-layer spinner-green-only"><div class="circle-clipper left">\n\
<div class="circle"></div></div><div class="gap-patch"><div class="circle">\n\
</div></div><div class="circle-clipper right"><div class="circle"></div></div></div></div>');
        addAnimal.done(function (data, textStatus, jqXHR) {
            if (data.message === true) {
                window.location.replace('dashboard');
            } else {
                alert('Animal not created');
            }
        });

        addAnimal.fail(function (jqXHR, textStatus, errorThrown) {
            alert("Wrong credentials (" + textStatus + ")." + jqXHR.responseText);
            console.log(textStatus);

            return false;
        });

        return false;
    });

});

