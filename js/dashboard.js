$(function () {

    $.get('dashboard/animalList', function (e) {

//        $.getJSON('dashboard/animalList', function (data) {
//            $.each(data, function (i, f) {
//                $("#listAnimal").append("<li>URL: " + f.name + "</li><li><img src="+f.name+" id=\"image\"/></li><br />");
//
//            });
//        });

//        console.log(e[0].person_id, e[1].firstname);
//[
//    {
//        "animal_id":"1",
//        "name":"Lion",
//        "description":"The king of the animals",
//        "cover_photo":null,
//        "date_added":"2017-11-04 01:59:30"
//    }
//]

        console.log(e);
        if (e == '') {
            $('#listAnimal').append('<blockquote>Hi! to begin, click the + button below to add animals.</blockquote>\n\
 <a class="btn tooltipped indigo lighten-2" data-position="right" data-delay="50" data-tooltip="We are glad seeing you again. You could do a lot on this page. Check out the + button to add animals.">Tap me!</a>');
            $('.tooltipped').tooltip({delay: 50});
        } else if (e) {
            for (var i = 0; i < e.length; i++) {
//             console.log(e[i].cover_photo);
                if(e[i].cover_photo === null){

                $('#listAnimal').append('<li class="collection-item avatar"><img src="public/image/animal.png" alt="" class="circle"><span class="title">' + e[i].name + '</span><p>' + e[i].description + '<br></p><a class="linkToAlbum" data-name="' + e[i].name + '" rel="' + e[i].animal_id + '" href="" class="secondary-content"><i class="mdi-action-open-in-new"></i></a></li>');
            }
            else{
                $('#listAnimal').append('<li class="collection-item avatar"><img src="public/image/pic/'+e[i].cover_photo+'" alt="" class="circle"><span class="title">' + e[i].name + '</span><p>' + e[i].description + '<br></p><a class="linkToAlbum" data-name="' + e[i].name + '" rel="' + e[i].animal_id + '" href="" class="secondary-content"><i class="mdi-action-open-in-new"></i></a></li>');
            }
            }
        } 
//        else {
//            for (var i = 0; i < e.length; i++) {
//                $('#listAnimal').append('<li class="collection-item avatar"><img src="public/image/pic/'+e[i].cover_photo+'" alt="" class="circle"><span class="title">' + e[i].name + '</span><p>' + e[i].description + '<br></p><a class="linkToAlbum" data-name="' + e[i].name + '" rel="' + e[i].animal_id + '" href="" class="secondary-content"><i class="mdi-action-open-in-new"></i></a></li>');
//            }
//        }


        // Let's update the user's detail
        $('.linkToAlbum').on('click', function () {
            var linkAlbum = $(this);
            var animalId = $(this).attr('rel');
            var animalName = $(this).data('name');

            $.redirect('gallery', {animalId: animalId, animalName: animalName});


            return false;
        });

        return false;
    }, 'json');

});

