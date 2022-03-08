// Add your custom JS here.
// Hide sticky nav on scroll
// var prevScrollpos = window.pageYOffset;
// window.onscroll = function () {
//   var currentScrollPos = window.pageYOffset;
//   if (prevScrollpos > currentScrollPos) {
//     document.getElementById("wrapper-navbar").style.top = "0";
//   } else {
//     document.getElementById("wrapper-navbar").style.top = "-141px";
//   }
//   prevScrollpos = currentScrollPos;
// }

var new_scroll_position = 0;
var last_scroll_position;
var header = document.getElementById("wrapper-navbar");

window.addEventListener('scroll', function(e) {
  last_scroll_position = window.scrollY;

  // Scrolling down
  if (new_scroll_position < last_scroll_position && last_scroll_position > 141) {
    // header.removeClass('slideDown').addClass('slideUp');
    header.classList.remove("slideDown");
    header.classList.add("slideUp");

  // Scrolling up
  } else if (new_scroll_position > last_scroll_position) {
    // header.removeClass('slideUp').addClass('slideDown');
    header.classList.remove("slideUp");
    header.classList.add("slideDown");
  }

  new_scroll_position = last_scroll_position;
});

// Show sticky nav on scroll up
var scrollPosition = window.scrollY;
var logoContainer = document.getElementsByClassName('wrapper-navbar')[0];
window.addEventListener('scroll', function () {
  scrollPosition = window.scrollY;
  if (scrollPosition >= 141) {
    logoContainer.classList.add('logo-shrink');
  } else {
    logoContainer.classList.remove('logo-shrink');
  }
});
jQuery('.footer-logo a').attr('aria-label', 'Go to Hompage');