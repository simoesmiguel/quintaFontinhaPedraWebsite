$(document).ready(function() {
    $('.slick').slick({
      centerMode: true,
      centerPadding: '0px',
      infinite: true,
      autoplay: true,
      slidesToShow: 3,
      slidesToScroll: 1,
      arrows: true,
      dots: true,
      responsive: [
          {
            breakpoint: 992,
            settings: {
              centerMode: true,
              centerPadding: '0px',
			  arrows: false,
              slidesToShow: 1
            }
        },
        {
          breakpoint: 768,
          settings: {
            centerMode: true,
            centerPadding: '0px',
			arrows: false,
            slidesToShow: 1
          }
        },
        {
          breakpoint: 480,
          settings: {
            centerMode: true,
            centerPadding: '0px',
			arrows: false,
            slidesToShow: 1
          }
        }
      ]
    });
});
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        document.querySelector(this.getAttribute('href')).scrollIntoView({
            behavior: 'smooth',
			block: "start"
        });
    });
});
var lastId,
topMenu = $("#mainMenu"),
topMenuHeight = $("#menu").outerHeight()+15,
// All list items
menuItems = topMenu.find("a"),
// Anchors corresponding to menu items
scrollItems = menuItems.map(function(){
    var item = $($(this).attr("href"));
    if (item.length) { return item; }
});
$(window).scroll(function(){
   // Get container scroll position
   var fromTop = $(this).scrollTop()+topMenuHeight;

   // Get id of current scroll item
   var cur = scrollItems.map(function(){
     if ($(this).offset().top < fromTop)
       return this;
   });
   // Get the id of the current element
   cur = cur[cur.length-1];
   var id = cur && cur.length ? cur[0].id : "";

   if (lastId !== id) {
       lastId = id;
       // Set/remove active class
	   $("#mainMenu a").removeClass("active-a");
       menuItems
         .parent().end().filter("[href='#"+id+"']").addClass("active-a");
   }
});
<!-- Global site tag (gtag.js) - Google Analytics -->

window.dataLayer = window.dataLayer || [];
function gtag(){dataLayer.push(arguments);}
gtag('js', new Date());

gtag('config', 'UA-122312998-1');


function sendEmail() {
    document.getElementById('id01').style.display = 'none';
    document.getElementById('id01').submit();
}

function SubForm() {
    $.ajax({
        url: '/Person/Edit/@Model.Id/',
        type: 'post',
        data: $('#myForm').serialize(),
        success: function () {
            alert("worked");
        }
    });
}
