$(function(){
    
    var $mainMenuItems = $("#main_menu ul").children("li");
    var totalMainMenuItems = $mainMenuItems.length;
    var openedIndex = 2; //Menu ouvert sur l'index 2
    
    /* INITIALISATION */
    var init = function(){
        $("#main_menu p").hide();
        bindEvents();
        if(validIndex(openedIndex)){
            animateItem($mainMenuItems.eq(openedIndex), true, 700);
        }
    };
    
    /* EVENEMENTS */
    var bindEvents = function(){
        
        /* Cliquer sur une image */
        $mainMenuItems.children(".images").click(function(){
          var newIndex = $(this).parent().index(); // L'index de l'élément parent sur l'image qu'on a cliqué (donc l'index du li de l'image)
          checkAndAnimateItem(newIndex);
        });  
        
        /* Passer sur un bouton */
        $(".button").hover(
        function(){
            $(this).addClass("hovered");
        },
        function(){
            $(this).removeClass("hovered");
        }
        );
        
        /* Cliquer sur un bouton */
        $(".button").click(function(){
            var newIndex = $(this).index(); // index du bouton = index image
            checkAndAnimateItem(newIndex);
        });
    };
    
    /* L'index est-il valide ? */
    var validIndex = function(indexToCheck){
        
        return ((indexToCheck >= 0) && (indexToCheck < totalMainMenuItems));
    };
    
    /* ANIMATION */
    var animateItem = function($item, toOpen, speed){
          var $colorImage = $item.find(".color"); //div avec la classe color
          var itemParam = toOpen ? {width:"420px"}: {width:"140px"};
          var colorImageParam = toOpen ? {left:"0px"}: {left:"140px"};
          $colorImage.animate(colorImageParam,speed); 
          $item.animate(itemParam,speed);
          var $para = $item.find("p");         
          $para.first().show("slow",function(){
                $para.eq("1").show("slow",function(){
                    $para.eq("2").show("slow");
                });
              });
    };
    
    /* */
    var checkAndAnimateItem = function(indexToCheckAndAnimate){
         if(openedIndex === indexToCheckAndAnimate){ 
            animateItem($mainMenuItems.eq(indexToCheckAndAnimate), false, 250);
            openedIndex = -1;
          }
          else{
              if(validIndex(indexToCheckAndAnimate)){
                  animateItem($mainMenuItems.eq(openedIndex), false, 250); // on ferme  l'ancien ouvert
                  openedIndex = indexToCheckAndAnimate;
                  animateItem($mainMenuItems.eq(openedIndex), true, 250);
              }
          }
        var para = $mainMenuItems.eq(openedIndex).find(".description");

        
    };
    
    
    init();
    
});