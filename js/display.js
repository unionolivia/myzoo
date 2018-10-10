$(function () {
    $.get('display/getAnimalDetails', function (e) {

        if (e == '') {
            $('.fetch-animals').html('<div class="preloader-wrapper small active">\n\
<div class="spinner-layer spinner-green-only"><div class="circle-clipper left">\n\
<div class="circle"></div></div><div class="gap-patch"><div class="circle">\n\
</div></div><div class="circle-clipper right"><div class="circle"></div></div></div></div><br />\n\
\n\
<a class="btn tooltipped blue lighten-2" data-position="top" data-delay="50" data-tooltip="Hi! We are glad you are here.">Tap me!</a>\n\
<a class="btn tooltipped indigo lighten-2" data-position="bottom" data-delay="50" data-tooltip="This will be available soon.">This is Multimedia Zoo\n\
<a class="btn tooltipped cyan lighten-2" data-position="right" data-delay="50" data-tooltip="Want to check out what we\'ve got? It will be available to you soon.">Want to know more?</a>');
            $('.tooltipped').tooltip({delay: 50});
        } else {
            for (var i = 0; i < e.length; i++) {
                console.log(e)
                if (e[i].cover_photo === null) {
                    $('.fetch-animals').append('<div class="col s4">\n\
<div class="card small">\n\
<div class="card-image waves-effect waves-block waves-light">\n\
<img class="activator" src="public/image/animal.png"></div>\n\
<div class="card-content">\n\
<span class="card-title activator grey-text text-darken-4">' + e[i].name + '<i class="mdi-navigation-more-vert right"></i></span>\n\
<p><a href="" class="linkToAlbum" rel="'+e[i].animal_id+'" data-name="'+e[i].name+'">learn more</a></p>\n\
</div>\n\
<div class="card-reveal">\n\
<span class="card-title grey-text text-darken-4">' + e[i].name + '<i class="mdi-navigation-close right"></i></span>\n\
<p>' + e[i].description + '</p>\n\
</div>\n\
</div>\n\
</div>');
                }
                else{
                $('.fetch-animals').append('<div class="col s4">\n\
<div class="card small">\n\
<div class="card-image waves-effect waves-block waves-light">\n\
<img class="activator" src="public/image/pic/' + e[i].cover_photo + '"></div>\n\
<div class="card-content">\n\
<span class="card-title activator grey-text text-darken-4">' + e[i].name + '<i class="mdi-navigation-more-vert right"></i></span>\n\
<p><a href="" class="linkToAlbum" rel="'+e[i].animal_id+'" data-name="'+e[i].name+'">learn more</a></p>\n\
</div>\n\
<div class="card-reveal">\n\
<span class="card-title grey-text text-darken-4">' + e[i].name + '<i class="mdi-navigation-close right"></i></span>\n\
<p>' + e[i].description + '</p>\n\
</div>\n\
</div>\n\
</div>');
            }
            
            
            
                        // Let's update the user's detail
        $('.linkToAlbum').on('click', function () {
            var linkAlbum = $(this);
            var animalId = $(this).attr('rel');
            var animalName = $(this).data('name');
            
            $.redirect('galleria', {animalId: animalId, animalName: animalName});


            return false;
        });
            
            
        }
    }
    
    
    }, 'json');
});
