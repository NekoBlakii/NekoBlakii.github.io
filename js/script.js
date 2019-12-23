$(function(){
    var isRefresh = false;


    var isAnimated = false;

    if (performance.navigation.type == 1 && ($(window).scrollTop() > 0)) {
        isRefresh = true;
        showNavBar();
        var svgName = document.getElementById('svg-name');
        svgName.classList.remove('hidden');

        var svgJob = document.getElementById('svg-job');
        svgJob.classList.remove('hidden');

        var scrollBtn = document.getElementById('btn-scroll');
        scrollBtn.style.opacity = "1";
    }

    var y_offsetWhenScrollDisabled = 0;

    function disableScrollOnBody(){
        y_offsetWhenScrollDisabled= $(window).scrollTop();
        $('body').addClass('scrollDisabled').css('margin-top', -y_offsetWhenScrollDisabled);
    }

    function enableScrollOnBody(){
        $('body').removeClass('scrollDisabled').css('margin-top', 0);
        $(window).scrollTop(y_offsetWhenScrollDisabled);
    }

    var isFinish = false;
    var isOver = false;
    var isEnded= false;

    if(window.matchMedia("(max-width: 768px)").matches){
        let desktopElements = document.querySelectorAll(".desktop");
        desktopElements.forEach(element => {
            element.classList.remove("desktop");
        });

        isFinish = true;
        isOver = true;
        isEnded= true;
    }

    function showWithoutAnimation(){
        if(window.matchMedia("(max-width: 768px)").matches){


            let desktopElements = document.querySelectorAll(".desktop , #skill-description > div > *, #formations-container > div, #experiences-container > div > div");
            desktopElements.forEach(element => {
                element.classList.remove("desktop");
                element.setAttribute('style','');
            });

            isFinish = true;
            isOver = true;
            isEnded= true;

        }
    }


    function hideNavBar(){
        document.getElementById("navbar-menu").style.top = "-50px";
    }

    function showNavBar(){
        document.getElementById("navbar-menu").style.top = "0px";
    }

    function removeDesktop(){
        let desktopElements = document.querySelectorAll(".desktop");
        desktopElements.forEach(element => {
            element.classList.remove("desktop");
        });
    }

    window.onresize = ( ) => {
        showWithoutAnimation();
    };

    if(!isRefresh)
    {
        $.fn.WheelLoader = function(o) {
            disableScrollOnBody();
            var _this = this[0],
                $this = $(this),
                WheelLoader = {
                    $progress: null,
                    $text: null,

                    init: function() {
                        this.$progress = $this.find("progress");
                        this.$text = $(document.getElementById("loading-txt"));
                        this.reset();
                    },

                    load: function(i) {
                        setTimeout(function() {
                            i += 1;
                            _this.$progress.val(i);
                        if (i == 100)
                        {
                            _this.close();
                        }
                        else
                            _this.load(i);
                        }, 10);
                    },

                    reset: function() {
                        _this.$text.animate({
                            marginTop: "0",
                            opacity: 1
                        }, 300, function() {

                            _this.$progress.val(0).show().animate({
                                width: "100%"
                        }, 500, function() {
                            _this.load(0);
                        });
                    });
                },

                close: function() {
                    _this.$progress.animate({
                        width: "0px"
                    },
                    500, function() {
                        $(this).hide();
                    });

                    _this.$text.animate({
                        opacity: 0
                    },
                    500, function() {
                        _this.$text.hide()
                    });
                },
        };

        _this.WheelLoader = WheelLoader,
            _this = _this.WheelLoader,
            _this.init();
        };

        $(document).ready(function() {
            $(".loading").WheelLoader();
        });

        var svgName = document.getElementById('svg-name');
        svgName.classList.remove('hidden');

        var svgJob = document.getElementById('svg-job');
        svgJob.classList.remove('hidden');

        /* ANIMATION NOM */
        const svgPath = document.querySelectorAll('.path');
        const svgText = anime({
            targets: svgPath,
            strokeDashoffset: [anime.setDashoffset, 0],
            easing: 'easeInOutSine',
            duration: 700,
            delay: (el, i) => { return i * 200 ; }
        });

        /* ANIMATION METIER */
        const svgPath2 = document.querySelectorAll('.path2');
        anime({
                targets: svgPath2,
                strokeDashoffset: [anime.setDashoffset, 0],
                easing: 'easeInOutSine',
                duration: 700,
                delay: (el, i) => { return i * 200 ; },
                complete: function(){
                    var scrollBtn = document.getElementById('btn-scroll');
                    scrollBtn.style.opacity = "1";
                    showNavBar();
                    enableScrollOnBody();
                }
            }
        );
    }


    let navbar = document.getElementById('navbar-menu');
    document.body.setAttribute("data-offset",navbar.offsetHeight + 2);

    $(".navbar a, #btn-scroll").on("click",function(event){
        event.preventDefault();
        var hash = this.hash;
        $("html,body").animate({scrollTop: $(hash).offset().top - navbar.offsetHeight },900,function(){})
    });

    
    $("#portfolio .portfolio-btns a").on("click",function(event){
        let prevSelect = document.getElementsByClassName('btn-selected');
        prevSelect[0].classList.remove('btn-selected');
        this.classList.add('btn-selected');

        switch(this.id)
        {
            case 'portfolio-btn-all':
                console.log("all");
                break;
            case 'portfolio-btn-front':
                console.log("front");
                break;
            case 'portfolio-btn-back':
                console.log("back");
                break;       
        }
    });

    $(window).scroll(function() {

        const isScrolled = function(section)
        {
            var hT = $(section).offset().top;
            var hH = $(section).outerHeight();
            var scroll = $(window).scrollTop();

           var isScrolled = (hT-hH < scroll) && (hT+hH >= scroll);
           return isScrolled;
        };

        if(!window.matchMedia("(max-width: 768px)").matches)
        {
            if(isScrolled('#skill-description') && !isFinish){
                anime({
                    targets: '.front-end > *',
                    translateX: 1500,
                    delay: anime.stagger(500),
                    easing: 'easeInOutSine'
                });
                anime({
                    targets: '.back-end > *',
                    translateX: 1500,
                    delay: anime.stagger(500),
                    easing: 'easeInOutSine'
                });
                anime({
                    targets: '.extra > *',
                    translateX: 1500,
                    delay: anime.stagger(500),
                    easing: 'easeInOutSine'
                });
                isFinish = true
                isAnimated = true;
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
                isAnimated = true;
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
                isAnimated = true;
            }
        }

     });

});
