$(function(){

    let navbar = document.getElementById('navbar-menu');
    document.body.setAttribute("data-offset",navbar.offsetHeight + 2);

    $(".navbar a").on("click",function(event){
        event.preventDefault();
        var hash = this.hash;
        $("html,body").animate({scrollTop: $(hash).offset().top - navbar.offsetHeight },900,function(){})
    });


var isFinish = false;

    $(window).scroll(function() {
        var hT = $('#skillDescription').offset().top,
            hH = $('#skillDescription').outerHeight(),
            wH = $(window).height(),
            wS = $(this).scrollTop();

            if ((wS > (hT+hH-wH) && (hT > wS) && (wS+wH > hT+hH)) && !isFinish){
                anime({
                    targets: '.logo-front',
                    translateX: 1550,
                    delay: anime.stagger(500, {easing: 'easeOutQuad'}),
                });
                anime({
                    targets: '.logo-back',
                    translateX: 1550,
                    delay: anime.stagger(800, {easing: 'easeOutQuad'}),
                });
                anime({
                    targets: '.logo-extra',
                    translateX: 1550,
                    delay: anime.stagger(800, {easing: 'easeOutQuad'}),
                });
            isFinish = true
        } else {
            
        }
     });

});