//$('#carousel').carousel();


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












