$(function(){
    //$(window).scrollTop(0);
    
    var isFinish = false;
    var isOver = false;
    var isEnded= false;
    
    if(window.matchMedia("(max-width: 768px)").matches)
    {
        let desktopElements = document.querySelectorAll(".desktop");
        desktopElements.forEach(element => {
            element.classList.remove("desktop");
        });
        isFinish = true;
        isOver = true;
        isEnded= true;
    }

        const svgPath = document.querySelectorAll('.path');
    
        anime({
            targets: svgPath,
            strokeDashoffset: [anime.setDashoffset, 0],
            easing: 'easeInOutSine',
            duration: 700,
            delay: (el, i) => { return i * 200 ; }
            
        });
    
        const svgPath2 = document.querySelectorAll('.path2');
    
    anime(
        {
            targets: svgPath2,
            strokeDashoffset: [anime.setDashoffset, 0],
            easing: 'easeInOutSine',
            duration: 700,
            delay: (el, i) => { return i * 200 ; },
            complete: function(){
                var scrollBtn = document.getElementById('btn-scroll');
                scrollBtn.classList.remove('hidden');
            }
        }
    );


    

    let navbar = document.getElementById('navbar-menu');
    document.body.setAttribute("data-offset",navbar.offsetHeight + 2);

    $(".navbar a, #btn-scroll").on("click",function(event){
        event.preventDefault();
        var hash = this.hash;
        $("html,body").animate({scrollTop: $(hash).offset().top - navbar.offsetHeight },900,function(){})
    });

    anime({
        targets: '#triangle-left',
        easing: 'easeInOutSine',
        duration: 2000,
        translateX: 1151,
        scale: {
            value: 3,
            easing: 'easeInOutQuart'
        }
    });


    anime({
        targets: '#triangle-right',
        easing: 'easeInOutSine',
        duration: 2000,
        translateX: -1351,
        scale: {
            value: 3,
            easing: 'easeInOutQuart'
        }
    });


    $(window).scroll(function() {

        const isScrolled = function(section)
        {
           var hT = $(section).offset().top,
                    hH = $(section).outerHeight(),
                    wH = $(window).height(),
                    wS = $(this).scrollTop();
   
            var scroll = $(window).scrollTop();

           var isScrolled = (hT-hH < scroll) && (hT+hH >= scroll);
           return isScrolled;
        };

        if(!window.matchMedia("(max-width: 768px)").matches)
        {
            if(isScrolled('#skillDescription') && !isFinish){
                anime({
                    targets: '.logo-front',
                    translateX: 1500,
                    delay: anime.stagger(500),
                    easing: 'easeInOutSine'
                });
                anime({
                    targets: '.logo-back',
                    translateX: 1500,
                    delay: anime.stagger(500),
                    easing: 'easeInOutSine'
                });
                anime({
                    targets: '.logo-extra',
                    translateX: 1500,
                    delay: anime.stagger(500),
                    easing: 'easeInOutSine'
                });
                isFinish = true
            } 
    
            if(isScrolled('#formations-container') && !isOver)
            {
                anime({
                    targets: '.formation1',
                    translateX: 1500,
                    delay: anime.stagger(100),
                    easing: 'easeInOutSine'
                });
                anime({
                    targets: '.formation2',
                    translateY: 1500,
                    delay: anime.stagger(100),
                    easing: 'easeInOutSine'
                });
                anime({
                    targets: '.formation3',
                    translateX: -2000,
                    delay: anime.stagger(100),
                    easing: 'easeInOutSine'
                });
                isOver = true
            }
    
            if(isScrolled('#experiences-container') && !isEnded)
            {
                anime({
                    targets: '.col-left',
                    translateX: 1500,
                    delay: anime.stagger(300),
                    easing: 'easeInOutSine'
                });
                anime({
                    targets: '.col-right',
                    translateX: -2000,
                    delay: anime.stagger(300),
                    easing: 'easeInOutSine'
                });
                isEnded = true
            }
        }

     });

});
