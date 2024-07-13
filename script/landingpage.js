$(document).ready(function () {
  new WOW().init();
  AOS.init();


  $('.testimonial-three-tabs .owl-carousel').owlCarousel({
    items: 1,
    loop: true,
    margin: 20,
    startPosition: 'URLHash'
  });

  $('.testimonial-three-btn li').on('click', function () {
    $('.testimonial-three-btn li').removeClass('active');
    $(this).addClass('active');
  });

  $('.package-four-slider').owlCarousel({
    items: 2,
    loop: true,
    dots: true,
    autoplay: true,
    autoplayTimeout: 5000,
    slideTransition: 'linear',
    smartSpeed: 500,
    responsive: {
      0: {
        autoHeight: true,
        items: 1,
      },
      768: {
        items: 1,
      },
      992: {
        items: 2,
      },
      1199: {
        items: 2,
      }
    }
  });
});

function removeActive() {
  $('#hamburger').removeClass('active');
}
hbspt.forms.create({
  region: "na1",
  portalId: "44225969",
  formId: "81c21e13-3e2e-4036-a549-611535b34226",
  target: "#hubspot-form"
});
hbspt.forms.create({
  region: "na1",
  portalId: "44225969",
  formId: "206d5bd5-fb77-40d4-bf91-4602fe59a335",
  target: "#whatsApp-form"
});


tippy('#top3_1', {
  content: 'Selo TOP3 Melhor escritório pequeno porte. B2B AWARDS 2024',
  placement: 'bottom',
  arrow: false,
  animation: 'fade',
  followCursor: 'true'
});

tippy('#top3_2', {
  content: 'Selo TOP3 Gestão de escritórios e departamento jurídico. B2B AWARDS 2024',
  placement: 'bottom',
  arrow: false,
  animation: 'fade',
  followCursor: 'true'
});

tippy('#top3_3', {
  content: 'Selo TOP10 legal 2019.  ',
  placement: 'bottom',
  arrow: false,
  animation: 'fade',
  followCursor: 'true'
});

tippy('#lottie-container', {
  content: 'Clique aqui para falar com especialista',
  placement: 'top-start',
  arrow: false,
  animation: 'fade',
  followCursor: 'true'
});


const navbar = $('#navbar');

function handleScroll() {
  if (window.scrollY > 0) {
    $('#navbar').addClass('fixed-nav');
    $('#navbar').removeClass('container');
  } else {
    $('#navbar').removeClass('fixed-nav');
    $('#navbar').addClass('container');
  }
}

window.addEventListener('scroll', handleScroll);

var animation = lottie.loadAnimation({
  container: document.getElementById('lottie-container'),
  renderer: 'svg',
  loop: true,
  autoplay: true,
  path: 'assets/lottie/whatsapp.json'
});