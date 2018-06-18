  
   /* var $carouselCaptions = $carousel.find('.item .carousel-caption');
    
    var carouselTimeout;
    
    $carousel.on('slid', function () {
        var $item = $carousel.find('.item.active');
        carouselTimeout = setTimeout(function() { // start the delay
            carouselTimeout = false;
            $('.carousel-caption', $item).animate({'opacity': 1}, 500);
            $('img', $item).animate({'opacity': 0.2}, 500);
        }, 2000);
    }).on('slide', function () {
        if(carouselTimeout) { // Carousel is sliding, stop pending animation if any
            clearTimeout(carouselTimeout);
            carouselTimeout = false;
        }
        // Reset styles
        $carouselCaptions.animate({'opacity': 0}, 500);
        $carouselImages.animate({'opacity': 1}, 500);
    });;*/
    
 $(function(){
    $('#sl1').slider({
          formater: function(value) {
            return 'Current value: '+value;
          }
    });
    $('#sl2').slider({
          formater: function(value) {
            return 'Current value: '+value;
          }
    });
    $('#sl3').slider({
          formater: function(value) {
            return 'Current value: '+value;
          }
    });
    $("#getVal").click(function() {
          console.log("Value 1 = "+$("#sl1").data('slider').getValue());
          console.log("Value 2 = "+$("#sl2").data('slider').getValue());
          console.log("Value 3 = "+$("#sl3").data('slider').getValue());    
    });
 });

 

})