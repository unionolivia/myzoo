$(function () {

    var id = $('#animal-id').val();
    var animalName = $('#animal-name').val();

    $('#reload').on('click', function (e) {
        e.preventDefault();
        location.reload();
    });


    $.post('galleria/galleryList', {id: id}, function (e) {
        if (e == '') {
            $('.gallery-list').html('<div class="row">\n\
<div class="col s12 m12 l12">\n\
<div class="card-panel teal">\n\
<span class="white-text">\n\
No information has been provided about <span class="grey-text text-darken-4">' + animalName + '</span>. This might be provided later.</span>\n\
</div></div></div>');
        } else if (e) {
            for (var i = 0; i < e.length; i++) {

                if (e[i].title === null && e[i].description === null) {
                    $('.gallery-list').append('<div id="blog-post-full">\n\
              <div class="card small">\n\
                    <div class="card-image">\n\
                      <img class="materialboxed" src="public/image/pic/' + e[i].image + '" alt="No Title">\n\
                      <span class="card-title">No Title.</span>\n\
                    </div>\n\
                    <div class="card-content">\n\
                      <p class="ultra-small">' + e[i].date_added + '</p>\n\
                      <p>Description isn\nt available now.</p>\n\
                    </div>\n\
              </div>\n\
          </div>');
                    $('.materialboxed').materialbox();


                } else {
                    $('.gallery-list').append('<div id="blog-post-full">\n\
              <div class="card large">\n\
                    <div class="card-image">\n\
                      <img class="materialboxed activator" src="public/image/pic/' + e[i].image + '" data-caption="' + e[i].title + '">\n\
                      <span class="card-title">' + e[i].title + '</span>\n\
                    </div>\n\
                    <div class="card-content">\n\
                      <p class="ultra-small">' + e[i].date_added + '<i class="activator mdi-navigation-more-vert right"></i></p>\n\
                      <p>' + e[i].description + '</p>\n\
                    </div>\n\
                       <div class="card-reveal">\n\
                        <span class="card-title grey-text text-darken-4">'+ e[i].title +' <i class="mdi-navigation-close right"></i></span>\n\
                        <p>'+ e[i].description +'</p>\n\
                      </div>\n\
              </div>\n\
          </div>');
                     $('.materialboxed').materialbox(); 
                }
                
            }
        }


    }, 'json');


    /* For video */
    $.post('gallery/galleryVideo', {id: id}, function (e) {

        console.log(e);
        if (e == '') {
            $('.display-video').html('<div class="row">\n\
<div class="col s12 m12 l12">\n\
<div class="card-panel teal">\n\
<span class="white-text">\n\
There are currently no videos for <span class="grey-text text-darken-4">' + animalName + '</span>. This might be provided later.</span>\n\
</div></div></div>');
        }

        for (var i = 0; i < e.length; i++) {
            $('.display-video').append('<div class="col s6"><video class="responsive-video" controls>\n\
                <source src="public/image/pic/' + e[i].image + '" type="video/mp4">\n\
                <source src="public/image/pic/' + e[i].image + '" type="video/mkv">\n\
                </video></div>');
        }

    }, 'json');

    /*    /End of Video       */


});
