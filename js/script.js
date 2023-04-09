$(function(){
    var isRefresh = false;
    var isFinish = false;
    var isOver = false;
    var isEnded= false;
    var y_offsetWhenScrollDisabled = 0;

    // Si on on a deja scroll un peu alors on ne refait pas l animation du debut
    if(($(window).scrollTop() > 0)) {
        console.log("COUCOU");
        isRefresh = true;
        showNavBar();
        var svgName = document.getElementById('svg-name');
        svgName.classList.remove('hidden');

        var svgJob = document.getElementById('svg-job');
        svgJob.classList.remove('hidden');

        var scrollBtn = document.getElementById('btn-scroll');
        scrollBtn.style.opacity = "1";
    }

    // AU START - Si on est en dessous de 768px on va enlever les classes desktop et desactiver les animations
    if(window.matchMedia("(max-width: 768px)").matches){
        enableScrollOnBody();
        showWithoutAnimation();
    }

    // Si la taille de la fenetre change
    window.onresize = ( ) => {
        if(window.matchMedia("(max-width: 768px)").matches){
            showWithoutAnimation();
        }
    };

    // Si on ne refresh pas la page alors on lance l animation du loading

    if(!isRefresh)
    {
        animationLoading();

        var svgName = document.getElementById('svg-name');
        svgName.classList.remove('hidden');

        var svgJob = document.getElementById('svg-job');
        svgJob.classList.remove('hidden');

        animationNom();
        animationMetier();
    }

    let navbar = document.getElementById('navbar-menu');
    document.body.setAttribute("data-offset",navbar.offsetHeight + 2);

    $(".navbar a, #btn-scroll").on("click",function(event){
        event.preventDefault();
        var hash = this.hash;
        $("html,body").animate({scrollTop: $(hash).offset().top - navbar.offsetHeight },900,function(){})
    });

    /* CLICK BUTTON SELECTION TYPE DE PROJETS */
    $("#portfolio .portfolio-btns a").on("click",function(event){
        let prevSelect = document.getElementsByClassName('btn-selected');
        prevSelect[0].classList.remove('btn-selected');
        this.classList.add('btn-selected');

        switch(this.id)
        {
            case 'portfolio-btn-all':
                removeBySkills('all');
                break;
            case 'portfolio-btn-pro':
                removeBySkills('pro');
                break;
            case 'portfolio-btn-perso':
                removeBySkills('perso');
                break;
        }
    });

        // ANIMATION DES COMPETENCES
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
                        targets: '.framework > *',
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
                        translateY: 2000,
                        delay: anime.stagger(100),
                        easing: 'easeInOutSine'
                    });
                    anime({
                        targets: '.formation4',
                        translateX: -2000,
                        delay: anime.stagger(100),
                        easing: 'easeInOutSine'
                    });
                    anime({
                        targets: '.formation5',
                        translateX: -1800,
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

    /* ON RECUPERE LES DONNEES DE NOTRE JSON */
    var urlJSON = "https://nekoblakii.github.io/json/portfolio.json";
    var request = new XMLHttpRequest();
    request.open('GET', urlJSON);
    request.responseType = 'json';
    request.send();

    /* CLIC SUR UN PROJET */
    $(".project").on("click",function(event){
        // On recupere l element HTML de notre modal
        let modal = document.getElementById('modal');

        // On initialise le titre de la modal par le text du projet clique
        modal.querySelector('.modal-title').innerHTML = this.innerText;

        // On recupere le nom du projet sur lequel on a clique
        name = this.id;
        // On recupere notre JSON
        var json = request.response;

        let body = modal.querySelector('.modal-body');

        // Creation du GIF du projet
        body.innerHTML = '<div class="modal-screenshots"><img class="modal-mainscreenshot" src="' + json[name].screenshots[0] + '" alt="..."></div>';

        // Creation des tags
        var tags ='';
        json[name].tags.forEach(tag => {
            tags += '<div class="modal-tag">' + tag + '</div>';
        });
        body.innerHTML += '<div class="modal-tags">' + tags + '</div>';

        body.innerHTML += '<div class="modal-description">' + json[name].description + '</div>';

        // Creation des fonctionnalites
        body.innerHTML += '<h4>Fonctionnalités:</h4>';
        var features ='';
        json[name].features.forEach(feature => {
            features += '<li class="modal-feature">' + feature + '</li>';
        });
        body.innerHTML += '<ul class="modal-features">' + features +'</ul>';

        // Affichage du modal une fois les info completees
        $('#modal').modal('show');
    });

    // ------------ FONCTIONS ----------------

    function animationLoading()
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
    }

    function animationNom()
    {
        /* ANIMATION NOM */
        const svgPath = document.querySelectorAll('.path');
        const svgText = anime({
            targets: svgPath,
            strokeDashoffset: [anime.setDashoffset, 0],
            easing: 'easeInOutSine',
            duration: 700,
            delay: (el, i) => { return i * 200 ; }
        });
    }

    function animationMetier()
    {
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

    // Desactive la possibilite de scroll
    function disableScrollOnBody(){
        y_offsetWhenScrollDisabled= $(window).scrollTop();
        $('body').addClass('scrollDisabled').css('margin-top', -y_offsetWhenScrollDisabled);
    }

    // Active la possibilite de scroll
    function enableScrollOnBody(){
        $('body').removeClass('scrollDisabled').css('margin-top', 0);
        $(window).scrollTop(y_offsetWhenScrollDisabled);
    }

    // Enleve les classes desktop et desactiver les animations
    function showWithoutAnimation(){
            let desktopElements = document.querySelectorAll(".desktop , #skill-description > div > *, #formations-container > div, #experiences-container > div > div");
            desktopElements.forEach(element => {
                element.classList.remove("desktop");
                element.setAttribute('style','');
            });

            isFinish = true;
            isOver = true;
            isEnded= true;
    }

    // Affichage de la navbar
    function showNavBar(){
        document.getElementById("navbar-menu").style.top = "0px";
    }

    function removeBySkills(skills)
    {
        let projects = document.querySelectorAll(".project");

        projects.forEach(project => {

                $(project).animate({
                    opacity: 0,
                    height: '0%'
                }, 500, function() {
                    project.classList.add('hidden');
                    // Animation complete
                    addBySkills(project,skills);
                });
        });
    }

    function addBySkills(project,skills)
    {
        if(project.classList.contains(skills))
        {
            project.classList.remove('hidden');

            $(project).show().animate({
                opacity: 1,
                height: '100%'
                }, 500, function() {
                // Animation complete
            });
        }
    }



});
