/*--------font size change---------*/
var $affectedElements = $('p, h1, h2, h3, h4, h5, h6, span, a');

$affectedElements.each(function () {
  var $this = $(this);
  $this.data('orig-size', $this.css('font-size'));
});

$('#btn-increase').click(function () {
  changeFontSize(1);
});

$('#btn-decrease').click(function () {
  changeFontSize(-1);
});

$('#btn-orig').click(function () {
  $affectedElements.each(function () {
    var $this = $(this);
    $this.css('font-size', $this.data('orig-size'));
  });
});

function changeFontSize(direction) {
  $affectedElements.each(function () {
    var $this = $(this);
    $this.css('font-size', parseInt($this.css('font-size')) + direction);
  });
}
/*--------font size change end---------*/
/*--------font size change end---------*/

function addDarkmodeWidget() {
  new Darkmode(options).showWidget();
}
window.addEventListener('load', addDarkmodeWidget);
const options = {
  bottom: '15px', // default: '32px'
  right: '15px', // default: '32px'
  left: 'unset', // default: 'unset'
  time: '0.5s', // default: '0.3s'
  mixColor: '#fff', // default: '#fff'
  backgroundColor: '#fff', // default: '#fff'
  buttonColorDark: '#100f2c', // default: '#100f2c'
  buttonColorLight: '#fff', // default: '#fff'
  saveInCookies: false, // default: true,
  label: '', // default: ''
  autoMatchOsTheme: true, // default: true
};
/*--------font size change end---------*/

/*--------usefull carousel---------*/
var owl = $('.owl-carousel');
owl.owlCarousel({
  loop: true,
  nav: true,
  navText: [$('.usefull .wrapper .prev'), $('.usefull .wrapper .next')],
  margin: 10,
  responsiveClass: true,
  autoplay: true,
  autoplayTimeout: 2000,
  autoplayHoverPause: true,
  dots: false,
  responsive: {
    0: {
      items: 1,
      nav: true,
    },
    700: {
      items: 2,
    },
    1000: {
      items: 3,
    },
    1200: {
      items: 4,
    },
    1200: {
      items: 5,
    },
  },
});
/*--------usefull carousel end---------*/

/*--------videos---------*/
$('.video-thumb').click(function () {
  $('.video-thumb').removeClass('active');
  $(this).addClass('active');
});
$('div.video-thumb').click(function () {
  $('.video-iframe iframe').attr(
    'src',
    $(this).children('iframe').attr('src').replace('iframe')
  );
});
/*--------videos end---------*/

/*--------go-top---------*/
$(window).on('scroll', function () {
  if (this.scrollY > 200) {
    $('.goTop').addClass('show');
    // $('.header__navigation').addClass('sticky');
    // $('.menu').addClass('sticky');
  } else {
    $('.goTop').removeClass('show');
    // $('.header__navigation').removeClass('sticky');
    // $('.menu').removeClass('sticky');
  }
});
$('.goTop').click(function () {
  scroll(0, 0);
});
/*--------go-top end---------*/

/*--------preloader end---------*/
window.onload = function () {
  let prl = document.getElementById('preloader');
  prl.style.display = 'none';
};
/*--------preloader end---------*/

/*--------accordion---------*/
$('.accordion_title').click(function () {
  $(this).parent().toggleClass('active').siblings().removeClass('active');
  $(this).parent().children('.accordion_content').slideToggle();
  $(this).parent().siblings().children('.accordion_content').slideUp();
});
/*--------accordion end---------*/
/* Demo Scripts for Bootstrap Carousel and Animate.css article
 * on SitePoint by Maria Antonietta Perna
 */
(function ($) {
  //Function to animate slider captions
  function doAnimations(elems) {
    //Cache the animationend event in a variable
    var animEndEv = 'webkitAnimationEnd animationend';

    elems.each(function () {
      var $this = $(this),
        $animationType = $this.data('animation');
      $this.addClass($animationType).one(animEndEv, function () {
        $this.removeClass($animationType);
      });
    });
  }

  //Variables on page load
  var $myCarousel = $('#carouselExampleIndicators'),
    $firstAnimatingElems = $myCarousel
      .find('.carousel-item:first')
      .find("[data-animation ^= 'animated']");

  //Initialize carousel
  $myCarousel.carousel();

  //Animate captions in first slide on page load
  doAnimations($firstAnimatingElems);

  //Other slides to be animated on carousel slide event
  $myCarousel.on('slide.bs.carousel', function (e) {
    var $animatingElems = $(e.relatedTarget).find(
      "[data-animation ^= 'animated']"
    );
    doAnimations($animatingElems);
  });
})(jQuery);
