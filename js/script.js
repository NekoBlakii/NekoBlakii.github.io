$(function(){

    var y_offsetWhenScrollDisabled=0;

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

    function hideNavBar()
    {
        document.getElementById("navbar-menu").style.top = "-50px";
    }

    function showNavBar()
    {
        document.getElementById("navbar-menu").style.top = "0px";
    }


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

    function animeText()
    {
        var svgName = document.getElementById('svg-name');
        svgName.classList.remove('hidden');

        var svgJob = document.getElementById('svg-job');
        svgJob.classList.remove('hidden');

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
                    scrollBtn.style.opacity = "1";
                    showNavBar();
                    enableScrollOnBody();
                }
            }
        );
    }

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
                animeText();

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

    let navbar = document.getElementById('navbar-menu');
    document.body.setAttribute("data-offset",navbar.offsetHeight + 2);

    $(".navbar a, #btn-scroll").on("click",function(event){
        event.preventDefault();
        var hash = this.hash;
        $("html,body").animate({scrollTop: $(hash).offset().top - navbar.offsetHeight },900,function(){})
    });

/*    anime({
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
    });*/


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
