/* Slide Animation */
$(function(){
  $('a[href^=#]').click(function() {
    var speed = 600;
    var href= $(this).attr("href");
    var target = $(href == "#" || href == "" ? 'html' : href);
    var position = target.offset().top;
    $('body,html').animate({scrollTop:position}, speed, 'swing');
    return false;
  });
});

/* Click Animation */
var humbergerUl = document.getElementById("humberger");
var humbergerLi = humbergerUl.children;

for (var i = 0; i < 1; i++){
  addListener01(humbergerUl);
  addListener02(humbergerUl);
}

var headerUl = document.getElementById("header"),
headerLi = headerUl.children;

for (var i = 0; i < headerLi.length - 1; i++){
  addListener01(headerLi[i]);
  addListener02(headerLi[i]);
}

function addListener01(elem) {
  elem.addEventListener("click", function() {
    for (var i = 0; i < humbergerLi.length; i++){
      if(window.innerWidth <= 1091) {
        humbergerLi[i].classList.toggle("open");
      }
    }
  }, true);
}

function addListener02(elem) {
  elem.addEventListener("click", function() {
    if(window.innerWidth <= 1091) {
      $(".header__nav--right").animate({width: "toggle"}, 300);
    }
  }, true);
};

function resize() {
  var res = window.innerWidth;
  var right = document.querySelector(".header__nav--right");
  if (res >= 1092) {
    if(document.defaultView.getComputedStyle(document.querySelector(".header__nav--right"), null).display == "none" || document.defaultView.getComputedStyle(document.querySelector(".header__nav--right"), null).display == "block") {
      right.style.display = "flex";
    }
    for(var i = 0; i < humbergerLi.length; i++) {
      if (humbergerLi[i].classList.contains("open") == true) {
        humbergerLi[i].classList.remove("open");
      }
    }
  } else {
    if(document.defaultView.getComputedStyle(document.querySelector(".header__nav--right"), null).display == "flex") {
      right.style.display = "none";
    }
  }
}

window.onresize = resize;

var jp = document.querySelectorAll(".jp");
var en = document.querySelectorAll(".en");

for (var i = 0; i < en.length; i++){
  en[i].style.display = "none";
}

document.getElementById("toggle__btn").addEventListener("click", function() {
  this.classList.toggle("active");
  if(this.classList.contains("active") == true) {
    this.setAttribute("data-content", "EN");
    for (var i = 0; i < jp.length; i++){
      jp[i].style.display = "none";
    }
    $('.en').fadeIn("600");
  } else {
    this.setAttribute("data-content", "JP");
    for (var i = 0; i < en.length; i++){
      en[i].style.display = "none";
    }
    $('.jp').fadeIn("600");
  }
}, true);
