(function ($) {
  “use strict”;
    /*========================
        01: Platinum Carousel
    ==========================*/
    function platinum_owlCarousel( $scope, $ ) {
          $scope.find(“.platinum-carousel”).owlCarousel({
          autoplay: true,
          autoplaySpeed: 500,
          slideTransition: ‘linear’,
          loop: true,
          items: 5,
          margin: 10,
          center: false,
          width: ‘auto’,
          nav: false,
          dots: false,
        });
    }
     /*========================
        02: Magnipic Use in Gallery
       ==========================*/
    function magnific_gallery ($scope, $){
      $scope.find(“.gallery-image-wrapper”).magnificPopup({
      delegate: “a”,
      type: “image”,
      gallery:{
      enabled:true,
      }
       });
    }
    let elementJSCallback = {
          ‘sponsers-slider.default’ : platinum_owlCarousel,
          ‘latest-gallery.default’ : magnific_gallery
        }
    $(window).on(‘elementor/frontend/init’, function () {
        let $EF = elementorFrontend;
          $.each( elementJSCallback, function( widgetName, fuHandler ) {
               $EF.hooks.addAction(‘frontend/element_ready/’+widgetName, fuHandler );
          } )
    });
})(jQuery);









