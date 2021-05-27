/*var width = $(window).width(), height = $(window).height();
alert('width : ' +width + 'height : ' + height);*/
"use strict";
$(document).ready(function() {
    var $window = $(window);
    //add id to main menu for mobile menu start
    var getBody = $("body");
    var bodyClass = getBody[0].className;
    $(".main-menu").attr('id', bodyClass);
    //add id to main menu for mobile menu end

    // card js start
    $(".card-header-right .close-card").on('click', function() {
        var $this = $(this);
        $this.parents('.card').animate({
            'opacity': '0',
            '-webkit-transform': 'scale3d(.3, .3, .3)',
            'transform': 'scale3d(.3, .3, .3)'
        });

        setTimeout(function() {
            $this.parents('.card').remove();
        }, 800);
    });
    $(".card-header-right .reload-card").on('click', function() {
        var $this = $(this);

        $this.parents('.card').addClass("card-load");
        $this.parents('.card').append('<div class="card-loader"><i class="icofont icofont-refresh rotate-refresh"></div>');
        setTimeout(function() {
            $this.parents('.card').children(".card-loader").remove();
            $this.parents('.card').removeClass("card-load");
        }, 3000);
    });
    $(".card-header-right .card-option .icofont-simple-left").on('click', function() {
        var $this = $(this);
        if ($this.hasClass('icofont-simple-right')) {
            $this.parents('.card-option').animate({
                'width': '35px',
            });
        } else {
            $this.parents('.card-option').animate({
                'width': '180px',
            });
        }
        $(this).toggleClass("icofont-simple-right").fadeIn('slow');
        // $this.children("li .icofont-simple-left").toggleClass("");
    });

    $(".card-header-right .minimize-card").on('click', function() {
        var $this = $(this);
        var port = $($this.parents('.card'));
        var card = $(port).children('.card-block').slideToggle();
        $(this).toggleClass("icofont-plus").fadeIn('slow');
    });
    $(".card-header-right .full-card").on('click', function() {
        var $this = $(this);
        var port = $($this.parents('.card'));
        port.toggleClass("full-card");
        $(this).toggleClass("icofont-resize");
    });

    $(".card-header-right .icofont-spinner-alt-5").on('mouseenter mouseleave', function() {
        $(this).toggleClass("rotate-refresh").fadeIn('slow');
    });
    $("#more-details").on('click', function() {
        $(".more-details").slideToggle(500);
    });
    $(".mobile-options").on('click', function() {
        $(".navbar-container .nav-right").slideToggle('slow');
    });
    $(".main-search").on('click', function() {
        $("#morphsearch").addClass('open');
    });
    $(".morphsearch-close").on('click', function() {
        $("#morphsearch").removeClass('open');
    });
    // card js end
    $.mCustomScrollbar.defaults.axis = "yx";
    $("#styleSelector .style-cont").mCustomScrollbar({
        setTop: "10px",
        setHeight: "calc(100% - 200px)",
    });
    $(".main-menu").mCustomScrollbar({
        setTop: "10px",
        setHeight: "calc(100% - 80px)",
    });
});
$(document).ready(function() {
    $(function() {
        $('[data-toggle="tooltip"]').tooltip()
    })
    $('.theme-loader').fadeOut('slow', function() {
        $(this).remove();
    });
});

// toggle full screen
function toggleFullScreen() {
    var a = $(window).height() - 10;

    if (!document.fullscreenElement && // alternative standard method
        !document.mozFullScreenElement && !document.webkitFullscreenElement) { // current working methods
        if (document.documentElement.requestFullscreen) {
            document.documentElement.requestFullscreen();
        } else if (document.documentElement.mozRequestFullScreen) {
            document.documentElement.mozRequestFullScreen();
        } else if (document.documentElement.webkitRequestFullscreen) {
            document.documentElement.webkitRequestFullscreen(Element.ALLOW_KEYBOARD_INPUT);
        }
    } else {
        if (document.cancelFullScreen) {
            document.cancelFullScreen();
        } else if (document.mozCancelFullScreen) {
            document.mozCancelFullScreen();
        } else if (document.webkitCancelFullScreen) {
            document.webkitCancelFullScreen();
        }
    }
}

//light box
$(document).on('click', '[data-toggle="lightbox"]', function(event) {
    event.preventDefault();
    $(this).ekkoLightbox();
});


// Upgrade Button
var $window = $(window);
var nav = $('.fixed-button');
    $window.scroll(function(){
        if ($window.scrollTop() >= 200) {
         nav.addClass('active');
     }
     else {
         nav.removeClass('active');
     }
 });


 




$(document).ready(function(){
    $('i#ajout_ligne_details').on('click',function(){
        var ligne ='<tr>'+
        '<td class="p-1">'+ 
            '<input class="form-control" type="text" name="libele_d_activite[]" required>'+
        '</td>'+
        '<td class="p-1">'+
            '<input class="form-control" type="text" name="prix[]" required>'+ 
        '</td>'+
        '<td class="text-center">'+ 
            '<i onclick="$(this).parent().parent().remove();" class="icofont icofont-ui-close btn btn-sm btn-square btn-outline-info"></i>'+ 
        '</td>'+
    '</tr>';
    $('tbody#parent_details').append(ligne);
    });
    
    
});
/**
 * Mon script
 */
 $(document).ready(function(){
    $('i#sSelectionneTout').on('click',function(){
         alert('Biiing');
     });
 });


$(document).ready(function(){
    $('i#addRow').on('click',function(){
        addRow();
    });
function addRow()
        {
var div ='<div class="form-row mt-2  bg-personnel-ws w-100 mx-auto" id="formulaire" >'+
            '<div class="w-100 p-0">'+
                '<i onclick="$(this).parent().parent().remove();" class="icofont icofont-ui-close btn btn-sm btn-square btn-outline-danger  float-end btn-x-ws mb-1"></i>'+
            '</div>'+                                    

                '<!--Bloc gauche-->'+
                '<div class="col-lg-8 col-xs-4 col-md-6 col-sm-10 mx-auto">'+

                    '<!--Noms-->'+
                    '<div class="input-group">'+                      
                        '<input type="text" name="nom[]"  class="form-control form-txt-primary " placeholder="Noms" required>'+
                    '</div>'+
                
                    '<!--Prénoms-->'+
                    '<div class="input-group">'+                       
                        '<input type="text" name="prenom[]"  class="form-control form-txt-primary " placeholder="Prénoms">'+
                    '</div>'+
                
                    '<!--Fonction-->'+
                    '<div class="input-group">'+                        
                        '<input type="text" name="fonction[]"  class="form-control form-txt-primary " placeholder="Fonction" required>'+
                    '</div>'+
                '</div>'+

                '<!--Bloc droite-->'+
                '<div class="col-lg-4 col-xs-4 col-md-6 col-sm-10 mx-auto">'+

                    '<!--Numéro Equipe-->'+
                    '<div class="input-group">'+                       
                        '<input type="text" name="num_equipe[]"  class="form-control form-txt-primary " placeholder="Equipe" required>'+
                    '</div>'+
                
            '       <!--Adresse-->'+
                    '<div class="input-group">'+                       
                        '<input type="text" name="adresse[]"  class="form-control form-txt-primary" placeholder="Adresse" required>'+
                    '</div>'+
                
            '       <!--Téléphone-->'+
                    '<div class="input-group">'+

                        '<input type="text" name="telephone[]"  class="form-control form-txt-primary " placeholder="Téléphone" required>'+
                    '</div>'+
                '</div>'+
                
        '</div>';


            $("#bloc").append(div);
        };

        $("i#remove").on('click',function(){
            
            $(this).parent().parent().remove();
            
                    
        });

        $('.valider').on('click',function(){
            if($('#formulaire').length == 0){
                alert('Veuillez ajouter un formulaire !');
                

            }
        });
});

$(document).ready(function() {
    $('tr#close').hide();
    $('th#action,td#action').hide();
    $('#plus').on('click',function(){
        $('th#action,td#action').toggle(200);
    });
 });
$(document).ready(function(){
    $('i#ajouterligne').on('click',function(){
        var input ='<tr>'+
                        '<td class="p-1">'+
                            '<!--nom de l activité-->'+
                            '<input type="text" name="nom[]" class="form-control" required>'+
                        '</td>'+
                        '<td class="p-1">'+
                            '<!--Montant-->'+
                            '<input type="text" name="montant[]" class="form-control" required>'+
                        '</td>'+
                        '<td class="p-1">'+
                            '<!--Date de virement-->'+
                            '<input type="date" name="date_de_virement[]" class="form-control" required>'+
                        '</td>'+
                        '<td class="text-center">'+
                            '<i class="icofont icofont-ui-close btn btn-sm btn-square btn-outline-info" onclick="$(this).parent().parent().remove();"></i>'+
                        '</td>'+
                    '</tr>';
        $('tbody#tbody').append(input);
    });
    $('i#supprimerligne').on('click',function(){
        $(this).parent().parent().remove();
    });

});
