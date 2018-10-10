
$(function () {

    tinymce.init({
        selector: 'textarea',
        height: 500,
        theme: 'modern',
        plugins: 'print preview fullpage powerpaste searchreplace autolink directionality advcode visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists textcolor wordcount tinymcespellchecker a11ychecker imagetools mediaembed  linkchecker contextmenu colorpicker textpattern help',
        toolbar1: 'formatselect | bold italic strikethrough forecolor backcolor | link | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent  | removeformat',
        image_advtab: true,
        templates: [
            {title: 'Test template 1', content: 'Test 1'},
            {title: 'Test template 2', content: 'Test 2'}
        ],
        content_css: [
            '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
            '//www.tinymce.com/css/codepen.min.css'
        ]
    });

    $('#gallery-pics').css('display', 'none');
    $('#video').css('display', 'none');

    var id = $('#animalId').val();
    var animalName = $('#animal-name').val();


    $('#reload').on('click', function (e) {
        e.preventDefault();
        location.reload();
    });

    $.post('gallery/galleryList', {id: id}, function (e) {

        console.log(e);
//        [
//            {
//                "gallery_id":"1",
//                "animal_id":"1",
//                "title":null,
//                "description":null,
//                "image":"parallax1.jpg",
//                "dimension":"1690x1127",
//                "date_added":"2017-11-06 08:06:56"
//            }
//        ]


        if (e == '') {
            $('.gallery-list').html('<div class="preloader-wrapper small active">\n\
<div class="spinner-layer spinner-green-only"><div class="circle-clipper left">\n\
<div class="circle"></div></div><div class="gap-patch"><div class="circle">\n\
</div></div><div class="circle-clipper right"><div class="circle"></div></div></div></div>\n\
\n\
<a class="btn tooltipped indigo lighten-2" data-position="top" data-delay="50" data-tooltip="Oops! You need to add some gallery for ' + animalName + ' here. Click the black icon on top, to do just that.">Tap me!</a>\n\
<a class="btn tooltipped indigo lighten-2" data-position="right" data-delay="50" data-tooltip="Click the HOME link on top to go back.">Don\'t forget me!</a>');
            $('.tooltipped').tooltip({delay: 50});
        } else if (e) {
            for (var i = 0; i < e.length; i++) {

                if (e[i].title === null && e[i].description === null) {
                    $('.gallery-list').append('<div class="col s4">\n\
<div class="card medium">\n\
<div class="card-image">\n\
<img class="materialboxed" data-caption="No Title." width="250" src="public/image/pic/' + e[i].image + '">\n\
<span class="card-title">No Title</span></div>\n\
<div class="card-content"><p>No description. Click the update button.</p></div>\n\
<div class="card-action">\n\
<a href="" class="add-pic-for-animal" data-image="' + e[i].image + '" data-animal="' + e[i].animal_id + '"><i class="mdi-action-visibility"></i></a>\n\
<a href="" class="add-desc" data-animalid="' + e[i].animal_id + '" data-galleryid="' + e[i].gallery_id + '"><i class="mdi-content-add-box"></i></a>\n\
</div>\n\
</div>\n\
</div>');
//                    $('.gallery-list').append('<video class="responsive-video" width="100%" controls=""><source src="public/image/pic/' + e[i].image + '" type="video/mp4"></video>');


                    $('.materialboxed').materialbox();

                    /********************************/

                    $('.add-desc').on('click', function (e) {
                        e.preventDefault();

                        var gallery_id = $(this).data('galleryid');
                        var animal_id = $(this).data('animalid');

//                alert(gallery_id + 'animal_id:' + animal_id);

                        $('#gallery-detail').openModal();

                        $(document).on('click', '.add-gallery', function (e) {

                            e.preventDefault();

                            var title = $('#title').val();
                            var descp = tinyMCE.get('descp').getContent();

                            var submitGallery = $.ajax({
                                type: 'POST',
                                url: 'gallery/updateEachAnimalDetails',
                                data: {gallery_id: gallery_id, title: title, descp: descp},
                                dataType: 'json'
                            });

                            submitGallery.done(function (data, textStatus, jqXHR) {
                                if (data.message === true) {
                                    location.reload();
                                    return false;
                                }
                                return false;
                            });

                            submitGallery.fail(function (jqXHR, textStatus, errorThrown) {
                                alert("Wrong credentials (" + textStatus + ")." + jqXHR.responseText);
                                console.log(textStatus);

                                return false;
                            });


                        });


                    });

                } else {
                    $('.gallery-list').append('<div class="col s4 love">\n\
<div class="card large">\n\
<div class="card-image">\n\
<img class="materialboxed activator" data-caption="' + e[i].title + '" width="250" src="public/image/pic/' + e[i].image + '">\n\
<span class="card-title">' + e[i].title + '<i class="activator mdi-navigation-more-vert right"></i></span></div>\n\
<div class="card-content"><p>' + e[i].description + '</p></div>\n\
                       <div class="card-reveal">\n\
                        <span class="card-title grey-text text-darken-4">'+ e[i].title +' <i class="mdi-navigation-close right"></i></span>\n\
                        <p>'+ e[i].description +'</p>\n\
                      </div>\n\
<div class="card-action">\n\
<a href="" class="add-pic-for-animal" data-image="' + e[i].image + '" data-animal="' + e[i].animal_id + '"><i class="mdi-action-visibility"></i></a>\n\
<a href="" class="updatee" data-updatedtitle="'+e[i].title+'" data-updateddescription="'+e[i].description+'" data-galleryupdateid="' + e[i].gallery_id + '"><i class="mdi-editor-border-color"></i></a>\n\
</div>\n\
</div>\n\
</div>');
                    $('.materialboxed').materialbox();
                   
                   
                    // Update each gallery for the animals
                    $('.updatee').on('click', function (e) {
                        e.preventDefault();
                        
                        
                        var galleryIdForEachAnimal = $(this).data('galleryupdateid');
                        var updatedTitle = $(this).data('updatedtitle');
                        var updatedDescription = $(this).data('updateddescription');
                        
                        // alert(updatedTitle);
                       
                                $('#update-animal-gallery').html('<div id="gallery-edit-modal" class="modal">\n\
<div class="modal-content">\n\
<h4>Update Description</h4>\n\
<span class="loading"></span>\n\
<div class="row"><form class="col s12"><div class="row">\n\
<div class="input-field col s12">\n\
<input id="galleryupdateId" type="hidden" value="' + galleryIdForEachAnimal + '" class="validate">\n\
<input id="title-update" type="text" value="' + updatedTitle + '" class="validate">\n\
<label for="title-update">Title</label></div></div><div class="row">\n\
<div class="input-field col s12">\n\
<textarea id="descp-update" class="materialize-textarea">' + updatedDescription + '</textarea>\n\
<label for="descp-update"></label></div> </div>\n\
<div class="row"><div class="input-field col s2">\n\
<button class="update-gallery btn waves-effect waves-light" type="submit">update</button>\n\
</div></div></form></div></div></div>');

                                $('#gallery-edit-modal').openModal();
//                                return false;

                                $('.update-gallery').on('click', function (e) {
                                    e.preventDefault();

                                    var galleryupdateId = $('#galleryupdateId').val();
                                    var titleUpdate = $('#title-update').val();
                                    var descUpdate = $('#descp-update').val();
//                                     var descUpdate = tinyMCE.get('descp-update').getContent();
                                    $('#descp-update').trigger('autoresize');

                                    // alert(galleryupdateId);

                                    var updateGallery = $.ajax({
                                        type: 'POST',
                                        url: 'gallery/UpdateEachAnimalInItsGallery',
                                        data: {gallery_id: galleryupdateId, title: titleUpdate, descp: descUpdate},
                                        dataType: 'json'
                                    });

                                    updateGallery.done(function (data, textStatus, jqXHR) {
                                        if (data.message === true) {
                                            location.reload();
                                            return false;
                                        }
                                    });

                                    updateGallery.fail(function (jqXHR, textStatus, errorThrown) {
                                        alert("Wrong credentials (" + textStatus + ")." + jqXHR.responseText);
                                        console.log(textStatus);

                                        return false;
                                    });
                                    
                                     return false;
                                });
                            });

                }
                     
            }

        }

        /*****      Update Animal Profile Image ***/
        $(document).on('click', '.add-pic-for-animal', function (e) {
            e.preventDefault();

            var image = $(this).data('image');
            var animalID = $(this).data('animal');


            $.post('gallery/updateAnimalImage', {image: image, animalID: animalID}, function (e) {
                if (e.message == true) {
                    alert('Profile image successful for ' + animalName);
                }
                return false;

            }, 'json');


        });

        /********                     ****/







//        else {
//            for (var i = 0; i < e.length; i++) {
////                $('.gallery-list').append('<div class="col s4"><img class="materialboxed" data-caption="' + e[i].description + '" width="250" src="public/image/pic/' + e[i].image + '"><a href="#"><i class="mdi-navigation-more-vert"></i></a></div>');
//                $('.gallery-list').append('<div class="col s4">\n\
//<div class="card small">\n\
//<div class="card-image">\n\
//<img class="materialboxed" data-caption="' + e[i].description + '" width="250" src="public/image/pic/' + e[i].image + '">\n\
//<span class="card-title">' + e[i].title + '</span></div>\n\
//<div class="card-content"><p>' + e[i].description + '</p></div>\n\
//<div class="card-action">\n\
//<a ><i class="mdi-action-view-headline"></i></a>\n\
//<a href="" class="add-desc" data-edit="' + e[i].animal_id + '"><i class="mdi-editor-border-color"></i></a>\n\
//</div>\n\
//</div>\n\
//</div>');
//                $('.materialboxed').materialbox();
//            }
//
//
//        }

        return false;
    }, 'json');

    /**************************************************/

    /* For video */
    $.post('gallery/galleryVideo', {id: id}, function (e) {

        console.log(e);
        if (e == '') {
            $('.display-video').html('<div class="row">\n\
<div class="col s12 m12 l12">\n\
<div class="card-panel teal">\n\
<span class="white-text">\n\
There are currently no videos for <span class="grey-text text-darken-4">' + animalName + '</span>. To add videos, click on the video icon above.</span>\n\
</div></div></div>');
        }

        for (var i = 0; i < e.length; i++) {

            $('.display-video').append('<div class="col s6"><video class="responsive-video" controls>\n\
                <source src="public/image/pic/' + e[i].image + '" type="video/mp4">\n\
                <source src="public/image/pic/' + e[i].image + '" type="video/MP4">\n\
                <source src="public/image/pic/' + e[i].image + '" type="video/webm">\n\
                <source src="public/image/pic/' + e[i].image + '" type="video/ogg">\n\
                <source src="public/image/pic/' + e[i].image + '" type="video/mkv">\n\
                </video>\n\
                </div>');

//            var videoID = 'videoclip';
//  var sourceID = 'mp4video';
//  var newmp4 = 'public/image/pic/' + e[i].image ;
//  var newposter = 'public/image/pic/14.jpg';
// 
//  $('#videolink1').click(function(event) {
//    $('#'+videoID).get(0).pause();
//    $('#'+sourceID).attr('src', newmp4);
//    $('#'+videoID).get(0).load();
//     $('#'+videoID).attr('poster', newposter); //Change video poster
//    $('#'+videoID).get(0).play();
//  });

        }

    }, 'json');

    /*    /End of Video       */


    $('#gallery-pics').on('change', function () {
        $('#form-gallery').submit();
    });

    $('#form-gallery').on('submit', function (e) {

        e.preventDefault();
        var gallery = $.ajax({
            url: "gallery/process",
            type: 'post',
            data: new FormData(this),
            contentType: false,
            processData: false,
        });
        gallery.done(function (data, textStatus, jqXHR) {
            // Refresh the page
            location.reload();
            // alert(data);
            // return false;
            //  $('.gallery-list').append('<div class="col s4"><img class="materialboxed" data-caption="' + e[i].description + '" width="250" src="public/image/pic/' + e[i].image + '"></div>');
            // $('.materialboxed').materialbox();
        });
        gallery.fail(function (jqXHR, textStatus, errorThrown) {
            alert("Wrong credentials (" + textStatus + ")." + jqXHR.responseText);
            console.log(textStatus);
            return false;
        });
    });

    // Adding videos to the gallery
    $('#video').on('change', function () {
        $('#video-gallery').submit();
    });

    $('#video-gallery').on('submit', function (e) {
        e.preventDefault();


        var video = $.ajax({
            url: "gallery/processVideo",
            type: 'post',
            data: new FormData(this),
            contentType: false,
            processData: false,
        });
        video.done(function (data, textStatus, jqXHR) {
            // Refresh the page
            location.reload();
//            alert(data);
        });
        video.fail(function (jqXHR, textStatus, errorThrown) {
            alert("Wrong credentials (" + textStatus + ")." + jqXHR.responseText);
            console.log(textStatus);
            return false;
        });
    });

    // End of Video Adding



});

