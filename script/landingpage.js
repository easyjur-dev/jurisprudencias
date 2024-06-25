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


tippy('#phone', {
  content: 'Entre em contato conosco, estamos à disposição para atendê-lo.',
  placement: 'bottom-end',
  arrow: false,
  animation: 'fade',
  followCursor: 'true'
});

tippy('#instagram', {
  content: 'Clique aqui e acesse nosso Instagram agora mesmo.',
  placement: 'bottom-end',
  arrow: false,
  animation: 'fade',
  followCursor: 'true'
});

tippy('#whatsapp', {
  content: 'Converse conosco imediatamente pelo WhatsApp. Clique aqui para iniciar o chat.',
  placement: 'bottom-end',
  arrow: false,
  animation: 'fade',
  followCursor: 'true'
});

tippy('#youtube', {
  content: 'Clique aqui e acesse já nosso canal no Youtube conheça o EasyJur.',
  placement: 'bottom-end',
  arrow: false,
  animation: 'fade',
  followCursor: 'true'
});

tippy('#legalacademy', {
  content: 'Clique aqui e acesse já a melhor plataforma de treinamento para advogados do Brasil.',
  placement: 'bottom-end',
  arrow: false,
  animation: 'fade',
  followCursor: 'true'
});

tippy('#blog_easyjur', {
  content: 'Clique aqui e fique por dentro de tudo sobre o mundo do direito e seus desafios.',
  placement: 'bottom-end',
  arrow: false,
  animation: 'fade',
  followCursor: 'true'
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
