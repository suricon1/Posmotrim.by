(function ($) {
	"use Strict";
/*---------------------------------
     Mean Menu Active
-----------------------------------*/
jQuery('.header-menu nav').meanmenu({
    meanMenuContainer: '.mobile-menu',
    meanScreenWidth: "991"
});
/*---------------------------
    Mini Cart Hover Active
----------------------------*/
$('.cart-dropdown').hide();
    $('.mini-cart').hover(
      function() {
        if( $(this).children('div').size() > 0 && $(this).children().hasClass('cart-dropdown') ) {
            $(this).children().stop().slideDown(400);
        }
      }, function() {
        $(this).children('.cart-dropdown').stop().slideUp(300);
      }
    );
/*---------------------------------
	 Header Search Toggle Active 
-----------------------------------*/
$( '.search-box > a' ).on('click', function(e) {
    e.preventDefault();
    if($(this).hasClass('active')) {
        $(this).removeClass('active').siblings('.search-dropdown').slideUp();
    } else {
        $(this).addClass('active').siblings('.search-dropdown').slideDown();
    }
});
/*----------
    Product Slider Active
------------------------------*/
$('.product-slider-active').slick({
		slidesToShow: 4,
		autoplay: true,
		arrows: false,
        dots: true,
        infinite: false,
        responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 3,
          }
        },
        {
          breakpoint: 768,
          settings: {
            slidesToShow: 2,
          }
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 1,
          }
        }
      ]
});
/*----------
    Store Slider Active
------------------------------*/
$('.store-slider-active').slick({
		slidesToShow: 3,
		arrows: false,
        dots: true,
        infinite: false,
        responsive: [
        // {
        //   breakpoint: 1024,
        //   settings: {
        //     slidesToShow: 3,
        //   }
        // },
        {
          breakpoint: 1200,
          settings: {
            slidesToShow: 2,
          }
        },
        {
          breakpoint: 550,
          settings: {
            slidesToShow: 1,
          }
        }
      ]
});
/*----------
    Product Offer Active
------------------------------*/
$('.product-offer-active').slick({
		slidesToShow: 1,
		arrows: false,
        dots: true,
        infinite: false,
        responsive: [
        {
          breakpoint: 992,
          settings: {
            slidesToShow: 1,
          }
        },
        {
          breakpoint: 768,
          settings: {
            slidesToShow: 1,
          }
        }
      ]
});
/*----------
    Sidebar Product Active
------------------------------*/
$('.sidebar-product-active').slick({
		slidesToShow: 1,
		arrows: false,
        dots: true,
        infinite: false,
        responsive: [
        {
          breakpoint: 992,
          settings: {
            slidesToShow: 1,
          }
        },
        {
          breakpoint: 768,
          settings: {
            slidesToShow: 1,
          }
        }
      ]
});
/*----------
    Indoor Product Active
------------------------------*/
$('.indoor-product-active').slick({
		slidesToShow: 5,
		arrows: false,
        dots: true,
        infinite: false,
        responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 3,
          }
        },
        {
          breakpoint: 768,
          settings: {
            slidesToShow: 2,
          }
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 1,
          }
        }
      ]
});
/*----------
    Product List Slider Active
------------------------------*/
$('.product-list-slider-active').slick({
		slidesToShow: 3,
		arrows: false,
        dots: true,
        infinite: false,
        responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 2,
          }
        },
        {
          breakpoint: 768,
          settings: {
            slidesToShow: 1,
          }
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 1,
          }
        }
      ]
});
/*----------
    Product List Slider Active 2
------------------------------*/
$('.product-list-slider-active2').slick({
		slidesToShow: 2,
		arrows: false,
        dots: true,
        infinite: false,
        responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 2,
          }
        },
        {
          breakpoint: 768,
          settings: {
            slidesToShow: 1,
          }
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 1,
          }
        }
      ]
});
/*----------
    Blog Slider Active
------------------------------*/
$('.blog-slider-active').slick({
		autoplay: true,
		slidesToShow: 3,
		arrows: false,
        dots: true,
        infinite: false,
        responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 2,
          }
        },
        {
          breakpoint: 768,
          settings: {
            slidesToShow: 1,
          }
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 1,
          }
        }
      ]
});  
/*----------
    banner Slider Active
------------------------------*/
$('.banner-slider-active').slick({
		slidesToShow: 3,
		arrows: false,
        dots: true,
        infinite: false,
        responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 3,
          }
        },
        {
          breakpoint: 768,
          settings: {
            slidesToShow: 2,
          }
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 1,
          }
        }
      ]
});
/*----------
    Blog List Slider Active
------------------------------*/
$('.blog-list-slider-active').slick({
		slidesToShow: 3,
		arrows: false,
        dots: true,
        infinite: false,
        vertical: true,
        responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 3,
          }
        },
        {
          breakpoint: 600,
          settings: {
            slidesToShow: 2,
          }
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 1,
          }
        }
      ]
});
/*----------------------------------- 
    Single Product Slide Menu Active 
--------------------------------------*/  
$('.product-tab-menu').slick({
		prevArrow: '<i class="fa fa-angle-left"></i>',
		nextArrow: '<i class="fa fa-angle-right slick-next-btn"></i>',
        slidesToShow: 4,
        responsive: [
            {
              breakpoint: 1200,
              settings: {
                slidesToShow: 3,
                slidesToScroll: 3
              }
            },
            {
              breakpoint: 992,
              settings: {
                slidesToShow: 4,
                slidesToScroll: 4
              }
            },
            {
              breakpoint: 480,
              settings: {
                slidesToShow: 3,
                slidesToScroll: 3
              }
            }
          ]
	});   
$('.product-tab-menu a').on('click',function(e){
      e.preventDefault();
     
      var $href = $(this).attr('href');
     
      $('.product-tab-menu a').removeClass('active');
      $(this).addClass('active');
     
      $('.single-product-img .tab-pane').removeClass('active show');
      $('.single-product-img '+ $href ).addClass('active show');
     
  });
/*----------------------------------
    ScrollUp Active
-----------------------------------*/
$.scrollUp({
    scrollText: '<i class="fa fa-angle-up"></i>',
    easingType: 'linear',
    scrollSpeed: 900,
    animation: 'fade'
});    
/*---------------------------------
     Sticky Menu Active
-----------------------------------*/
$(window).on('scroll', function() {
if ($(this).scrollTop() >100){  
    $('.header-sticky').addClass("is-sticky");
	$('body').addClass("is-body-sticky");
  }
  else{
    $('.header-sticky').removeClass("is-sticky");
    $('body').removeClass("is-body-sticky");
  }
});     
/*--------------------------
	 Category Menu Active
---------------------------- */
 $('.rx-parent').on('click', function(){
    $('.rx-child').slideToggle();
    $(this).toggleClass('rx-change');
});
//    category heading
$('.category-heading').on('click', function(){
    $('.category-menu-list').slideToggle(300);
});	

/*-- Category Menu Toggles --*/
function categorySubMenuToggle() {
    var screenSize = $(window).width();
    if ( screenSize <= 991) {
        $('#cate-toggle .right-menu > a').prepend('<i class="expand menu-expand"></i>');
        $('.category-menu .right-menu ul').slideUp();
//        $('.category-menu .menu-item-has-children i').on('click', function(e){
//            e.preventDefault();
//            $(this).toggleClass('expand');
//            $(this).siblings('ul').css('transition', 'none').slideToggle();
//        })
    } else {
        $('.category-menu .right-menu > a i').remove();
        $('.category-menu .right-menu ul').slideDown();
    }
}
categorySubMenuToggle();
$(window).resize(categorySubMenuToggle);

/*-- Category Sub Menu --*/
$('.category-menu-list').on('click', 'li a, li a .menu-expand', function(e) {
    var $a = $(this).hasClass('menu-expand') ? $(this).parent() : $(this);
    if ($a.parent().hasClass('right-menu')) {
        if ($a.attr('href') === '#' || $(this).hasClass('menu-expand')) {
            if ($a.siblings('ul:visible').length > 0) $a.siblings('ul').slideUp();
            else {
                $(this).parents('li').siblings('li').find('ul:visible').slideUp();
                $a.siblings('ul').slideDown();
            }
        }
    }
    if ($(this).hasClass('menu-expand') || $a.attr('href') === '#') {
        e.preventDefault();
        return false;
    }
});
 /*------------------------------
    Toggle Function Active
---------------------------------*/   
/*--- showlogin toggle function ----*/
    $('#showlogin').on('click', function() {
        $('#checkout-login').slideToggle(900);
    });

 /*--- showlogin toggle function ----*/
    $('#showcoupon').on('click', function() {
        $('#checkout_coupon').slideToggle(900);
    });
/*--- showlogin toggle function ----*/
    $('#cbox').on('click', function() {
        $('#cbox-info').slideToggle(900);
    });

 /*--- showlogin toggle function ----*/
    $('#ship-box').on('click', function() {
        $('#ship-box-info').slideToggle(1000);
    });
/* --------------------------------------------------------
    FAQ Accordion Active
* -------------------------------------------------------*/ 
  $('.card-header a').on('click', function() {
    $('.card').removeClass('actives');
    $(this).parents('.card').addClass('actives');
  });
})(jQuery);