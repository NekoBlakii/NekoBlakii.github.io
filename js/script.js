$(function(){

    let navbar = document.getElementById('navbar-menu');
    document.body.setAttribute("data-offset",navbar.offsetHeight + 2);

    $(".navbar a").on("click",function(event){
        event.preventDefault();
        var hash = this.hash;
        $("html,body").animate({scrollTop: $(hash).offset().top - navbar.offsetHeight },900,function(){})
    });


var isFinish = false;
var isOver = false;

    $(window).scroll(function() {

        if(isScrolled('#skillDescription') && !isFinish){
            anime({
                targets: '.logo-front',
                translateX: 1500,
                delay: anime.stagger(500, {easing: 'easeOutQuad'}),
            });
            anime({
                targets: '.logo-back',
                translateX: 1500,
                delay: anime.stagger(800, {easing: 'easeOutQuad'}),
            });
            anime({
                targets: '.logo-extra',
                translateX: 1500,
                delay: anime.stagger(800, {easing: 'easeOutQuad'}),
            });
            isFinish = true
        } else {
            
        }

        if(isScrolled('#formations-container') && !isOver)
        {
            anime({
                targets: '.formation1',
                translateX: 1500,
                delay: anime.stagger(500, {easing: 'easeOutQuad'}),
            });
            anime({
                targets: '.formation2',
                translateY: 1500,
                delay: anime.stagger(500, {easing: 'easeOutQuad'}),
            });
            anime({
                targets: '.formation3',
                translateX: -2000,
                delay: anime.stagger(500, {easing: 'easeOutQuad'}),
            });
            isOver = true
        }
        else{

        }


     });

     const isScrolled = function(section)
     {
         var hT = $(section).offset().top,
                 hH = $(section).outerHeight(),
                 wH = $(window).height(),
                 wS = $(this).scrollTop();
        var isScrolled = ((wS > (hT+hH-wH) && (hT > wS) && (wS+wH > hT+hH)));
        return isScrolled;
     };
});
