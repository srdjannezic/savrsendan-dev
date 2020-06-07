

// ////////////////////////////////
// MOBILE MENU
// ////////////////////////////////


$(document).ready(function () {
    // When tab-header is clicked
    $('.product-list-navigation li').on('click', function () {

        // Add active class to the clicked element, and remove from other tab-headings
        $(this).addClass('active').siblings().removeClass('active');

        // Get the target element show it and hide other tab-contents
        $('#product-' + $(this).data('pr')).show().siblings().hide();
    });
});

$('.product-slider__wrapper').slick({
	infinite: true,
	slidesToShow: 3,
	slidesToScroll: 3,
    responsive: [
        {
          breakpoint: 767,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        }
    ]
});

// if($(window).width() < 768) {
    $('.display-list-wrapper').slick({
         responsive: [
            {
                breakpoint: 2560,
                settings: "unslick"
            },
            {
                breakpoint: 767,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                }
            }
        ]
    });
// }

$('.ham-icon').click(function(){
    $('.header__nav').toggleClass('openMenu');
    $('.ham-icon .open, .ham-icon .close').toggle('slow');
});

//--APPEND input 

$(".add-ingredient").click(function () {
  $(".ingredient__list").append('<div class="input-wrapper"><input name="sastojci[]" type="text"></div>');
});



