$(function () {
    $('.mobile_menu').sideNav();
// Picture Menu
    //  $('.profile').sideNav('show');
    $('.profile').sideNav({
        menuWidth: 300,
        edge: 'right',
        closeOnClick: true
    });
    $('.collapsible').collapsible();
//
    $('.modal-login').leanModal();
    $('.modal-signup').leanModal();
    $('.slider').slider();
//    $('.slider').slider({full_width: true});

// Search on the site
    $('#searchbox').on('keyup', function () {
        var searchString = $(this).val();
        if (searchString === '') {
            $('.searchres').html('');
        } else {

            $.post('dashboard/searchOnTheSite', {string: searchString}, function (e) {

                console.log(e);
                if (e == '') {
                    $('.searchres').html('<span>Sorry! no result found.</span>');
                }
                else{
                for (var i = 0; i < e.length; i++) {
                    if(e[i].cover_photo == null){

                    $('.searchres').html('<a class="search-click" data-animalid="'+e[i].animal_id+'" href=""><div class="col s12 m8 offset-m2 l6 offset-l3 liveo"><div class="card-panel grey lighten-5 z-depth-1"><div class="row valign-wrapper"><div class="col s2"><img src="public/image/animal.png" alt="" class="circle responsive-img"></div><div class="col s10"><span class="black-text">' + e[i].description + '</span></div> </div></div></div></a>');
                }
                else{
                    $('.searchres').html('<a class="search-click" data-animalid="'+e[i].animal_id+'" href=""><div class="col s12 m8 offset-m2 l6 offset-l3 liveo"><div class="card-panel grey lighten-5 z-depth-1"><div class="row valign-wrapper"><div class="col s2"><img src="public/image/pic/'+e[i].cover_photo +'" alt="" class="circle responsive-img"></div><div class="col s10"><span class="black-text">' + e[i].description + '</span></div> </div></div></div></a>');
                }
               
                }
                
                $('.search-click').on('click', function(e){
                    e.preventDefault();
                   var animalId = $(this).data('animalid');
                                
                  $.redirect('search', {animalId: animalId});
                  
                  return false;
                   
                });
            }

            },'json');
        }
    });
});