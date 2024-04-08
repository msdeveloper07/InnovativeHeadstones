// document.addEventListener("DOMContentLoaded", function(){
//         document.querySelectorAll('.dropdown-menu').forEach(function(element){
//         	element.addEventListener('click', function (e) {
//         		e.stopPropagation();
//         	});
//         })
//     }); 




//     $(document).ready(function () {
// $('.navbar-light .dmenu').hover(function () {
//         $(this).find('.sm-menu').first().stop(true, true).slideDown(150);
//     }, function () {
//         $(this).find('.sm-menu').first().stop(true, true).slideUp(105)
//     });
// }); 

//     $(document).ready(function() {
// 	$(".megamenu").on("click", function(e) {
// 		e.stopPropagation();
// 	});
// });




// $(document).ready(function(){
//     $(".dropdown").hover(function(){
//         var dropdownMenu = $(this).children(".dropdown-menu");
//         if(dropdownMenu.is(":visible")){
//             dropdownMenu.parent().toggleClass("open");
//         }
//     });
// });




function bootnavbar(options) {
  const defaultOption = {
    selector: "main_navbar",
    animation: true,
    animateIn: "animate__fadeIn",
  };

  const bnOptions = { ...defaultOption, ...options };

  init = function () {
    var dropdowns = document
      .getElementById(bnOptions.selector)
      .getElementsByClassName("dropdown");

    Array.prototype.forEach.call(dropdowns, (item) => {
      //add animation
      if (bnOptions.animation) {
        const element = item.querySelector(".dropdown-menu");
        element.classList.add("animate__animated");
        element.classList.add(bnOptions.animateIn);
      }

      //hover effects
      item.addEventListener("mouseover", function () {
        this.classList.add("show");
        const element = this.querySelector(".dropdown-menu");
        element.classList.add("show");
      });

      //click effects
      item.addEventListener("click", function () {
        this.classList.add("show");
        const element = this.querySelector(".dropdown-menu");
        element.classList.add("show");
      });

      item.addEventListener("mouseout", function () {
        this.classList.remove("show");
        const element = this.querySelector(".dropdown-menu");
        element.classList.remove("show");
      });
    });
  };

  init();
}

new bootnavbar();


//  $('#testimonial4').carousel({
//       interval: 6000,
//       wrap: true,
//       keyboard: true
//  });


$(".testimonial-carousel").owlCarousel({
  autoplay: false,
  smartSpeed: 1000,
  center: true,
  dots: true,
  loop: true,
  responsive: {
    0: {
      items: 1
    },
    768: {
      items: 2
    },
    992: {
      items: 3
    }
  }
});



// $(window).scroll(function () {
//   if ($(this).scrollTop() > 300) {
//     $('.back-to-top').fadeIn('slow');
//   } else {
//     $('.back-to-top').fadeOut('slow');
//   }
// });
// $('.back-to-top').click(function () {
//   $('html, body').animate({ scrollTop: 0 }, 1500, 'easeInOutExpo');
//   return false;
// });






// Range Slider
var $range = $(".js-range-slider"),
  $from = $(".from"),
  $to = $(".to"),
  range,
  min = $range.data('min'),
  max = $range.data('max'),
  from,
  to;

var updateValues = function () {
  $from.prop("value", from);
  $to.prop("value", to);
};

$range.ionRangeSlider({
  onChange: function (data) {
    from = data.from;
    to = data.to;
    updateValues();
  }
});

range = $range.data("ionRangeSlider");
var updateRange = function () {
  range.update({
    from: from,
    to: to
  });
};

$from.on("input", function () {
  from = +$(this).prop("value");
  if (from < min) {
    from = min;
  }
  if (from > to) {
    from = to;
  }
  updateValues();
  updateRange();
});

$to.on("input", function () {
  to = +$(this).prop("value");
  if (to > max) {
    to = max;
  }
  if (to < from) {
    to = from;
  }
  updateValues();
  updateRange();
});



// ********** Select Package *********** //

function selectPack(package){
  if (package == 'bp'){
    $('.qr-pack-grid-item.bp').addClass('active');
    $('.qr-pack-grid-item.pp').removeClass('active');
  }else{
    $('.qr-pack-grid-item.bp').removeClass('active');
    $('.qr-pack-grid-item.pp').addClass('active');
  }
}

// ********* LightBox ******************//
baguetteBox.run('.design-result-grid');



// ******** Date Picker *************//
$(function () {
  $('#datepicker').datepicker();
});

// ******* Customization Tabs ********//
// function openTabs(evt, cityName) {
//   var i, tabcontent, tablinks;
//   tabcontent = document.getElementsByClassName("tabcontent");
//   for (i = 0; i < tabcontent.length; i++) {
//     tabcontent[i].style.display = "none";
//   }
//   tablinks = document.getElementsByClassName("tablinks");
//   for (i = 0; i < tablinks.length; i++) {
//     tablinks[i].className = tablinks[i].className.replace(" active", "");
//   }
//   document.getElementById(cityName).style.display = "block";
//   evt.currentTarget.className += " active";
// }

(function ($) {

  var tabs = $(".custom-options-list-li a");

  tabs.click(function () {
    var content = this.hash.replace('/', '');
    tabs.removeClass("active");
    $(this).addClass("active");
    $("#custom-options-content").find('.custom-options-content-div').hide();
    $(content).fadeIn(200);
  });

})(jQuery);