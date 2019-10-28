window.onload = function(){ // Quand la fenêtre s'affcihe on fait le canvas
    var canvasWidth = 900;
    var canvasHeight = 600;
    var blocksize = 30;
    var ctx;
    var delay = 100; // 1000 = 1sec
    var snakee;
    var applee;
    var widthInBlocks = canvasWidth/blocksize; // largeur en mesure block
    var heightInBlocks = canvasHeight/blocksize;
    var score;
    var timeout;
    
    init();
    
    function init(){
        var canvas = document.createElement('canvas');
        canvas.width = canvasWidth;
        canvas.height = canvasHeight;
        canvas.style.border = "30px solid gray";
        canvas.style.display = "block";
        canvas.style.margin = "50px auto";
        canvas.style.backgroundColor = "#ddd";
        document.body.appendChild(canvas); // on attache à notre body du html le tag canvas
        ctx = canvas.getContext('2d');
        snakee = new Snake([[6,4], [5,4], [4,4] ,[3,4], [2,4]], "right");
        applee = new Apple([10,10]);
        score = 0;
        refreshCanvas(); // On décide de dessiner en 2D dans le canvas
 
    }
    
    function refreshCanvas(){ 
        snakee.advance();
        
        if(snakee.checkCollision())
        {
              gameOver(); 
        }
        else
        {
            if(snakee.isEatingApple(applee))
            {
                score++;
                snakee.ateApple = true;
                do
                {
                    applee.setNewPosition();
                }
                while(applee.isOnSnake(snakee)); // on change la position de la pomme tant qu'elle n'est pas sur le corps du serpent
            }
            ctx.clearRect(0,0,canvasWidth,canvasHeight);
            drawScore();
            snakee.draw();
            applee.draw();
            timeout = setTimeout(refreshCanvas,delay); //A chaque fois que ce delay est passé on réexécute la fonction      
        }

    }
    
    function gameOver(){
        ctx.save();
        ctx.font = "bold 70px sans-serif";
        ctx.fillStyle = "#000";
        ctx.textAlign = "center";
        ctx.textBaseline ="middle";
        ctx.strokeStyle = "white";
        ctx.lineWidth = 5;
        var centreX = canvasWidth/2;
        var centreY = canvasHeight/2;
        ctx.strokeText("Game Over",centreX,centreY-180);
        ctx.fillText("Game Over",centreX,centreY-180);
        ctx.font = "bold 30px sans-serif";
        ctx.strokeText("Appuyer sur la touche Espace pour rejouer",centreX,centreY -120);
        ctx.fillText("Appuyer sur la touche Espace pour rejouer",centreX,centreY-120);
        ctx.restore();
    }
    
    function restart(){
        snakee = new Snake([[6,4], [5,4], [4,4] ,[3,4], [2,4]], "right");
        applee = new Apple([10,10]);
        score = 0;
        clearTimeout(timeout);
        refreshCanvas(); // On décide de dessiner en 2D dans le canvas
    }
    
    function drawScore()
    {
        ctx.save();
        ctx.font = "bold 200px sans-serif";
        ctx.fillStyle = "gray";
        ctx.textAlign = "center";
        ctx.textBaseline ="middle";
        var centreX = canvasWidth/2;
        var centreY = canvasHeight/2;
        ctx.fillText(score.toString(),centreX, centreY);
        ctx.restore();  
    }
    
    function drawBlock(ctx,position){
        var x = position[0] * blocksize; // la position avec la taille du block en pixel
        var y = position[1] * blocksize;
        ctx.fillRect(x, y, blocksize, blocksize);
    }
    
    function Snake(body, direction){
        this.body = body;
        this.direction = direction;
        this.ateApple = false; // Pour faire ou non grandir notre serpent
        this.draw = function() // on crée la méthode dessiner le serpent 
        {
            ctx.save(); // on sauvegarde ce qu'il y avait avant
            ctx.fillStyle = "#ff0000";
            for(var i=0; i < this.body.length; i++)
            {
                drawBlock(ctx,this.body[i]);    
            }
            ctx.restore();
        };
        
        this.advance = function(){ // on crée la méthode le serpent avance
            var nextPosition = this.body[0].slice();
            switch(this.direction)
                {
                    case "left":
                        nextPosition[0]--;
                        break;
                    case "right":
                        nextPosition[0]++;
                        break;
                    case "down":
                        nextPosition[1]++;
                        break;
                    case "up":
                        nextPosition[1]--;
                        break;
                    default:
                        throw("Invalid Direction");
                }
            this.body.unshift(nextPosition); // ajouter à la premiere place d'un tableau
            if(!this.ateApple) // si il n'a pas mangé de pomme
            {
                this.body.pop(); // supprime le dernier élément du tableau
            }   
            else // si il a mangé une pomme on enleve pas le dernier block et on remet
            {
                this.ateApple = false;
            }
        };
        
        this.setDirection = function(newDirection){
            var allowedDirections;
            switch(this.direction)
            {
                    case "left":
                    case "right":
                        allowedDirections = ["up","down"];
                        break;
                    case "down":
                    case "up":
                        allowedDirections = ["left","right"];
                        break;       
                    default:
                        throw("Invalid Direction");
            }
            if(allowedDirections.indexOf(newDirection) > -1)
            {
                 this.direction = newDirection;   
            }
        };
        
        this.checkCollision = function(){
            var wallCollision = false;
            var snakeCollision = false;
            
            var head = this.body[0];
            var rest = this.body.slice(1); // on copie tout sauf la valeur 0
            
            var snakeX = head[0];
            var snakeY = head[1];
            var minX = 0;
            var minY = 0;
            var maxX = widthInBlocks-1;
            var maxY = heightInBlocks-1;
            var isNotBetweenHorizontalWalls = snakeX < minX || snakeX > maxX;
            var isNotBetweenVerticalWalls = snakeY < minY || snakeY > maxY;
            
            if(isNotBetweenHorizontalWalls || isNotBetweenVerticalWalls)
            {
                wallCollision = true;
            }
            
            for(var i=0; i< rest.length; i++)
            {
                if(snakeX == rest[i][0] && snakeY == rest[i][1])
                    {
                        snakeCollision = true;
                    }
            }
            
            return wallCollision || snakeCollision;
            
        };
        
        this.isEatingApple = function(appleToEat){
            var head = this.body[0];
            if(head[0] === appleToEat.position[0] && head[1] === appleToEat.position[1])
            {
                return true;
            }
            else
            {
                return false;
            }
            
        };
    }
    
    
    function Apple(position){
        this.position = position;
        this.draw = function()
        {
            ctx.save();
            ctx.fillStyle = "#33cc33";
            ctx.beginPath();
            var radius = blocksize/2;
            var x = this.position[0] * blocksize + radius;
            var y = this.position[1] * blocksize + radius;
            ctx.arc(x,y,radius,0,Math.PI*2,true);
            ctx.fill();
            ctx.restore();
        };
        
        this.setNewPosition = function()
        {
            var newX = Math.round(Math.random() * (widthInBlocks-1)); // entre 0 et 29
            var newY = Math.round(Math.random() * (heightInBlocks-1));
            this.position = [newX,newY];
        };
        
        this.isOnSnake = function(snakeToCheck)
        {
            var isOnSnake = false;
            
            for(var i =0; i< snakeToCheck.body.length; i++)
            {
                  if(this.position[0] === snakeToCheck.body[i][0] && this.position[1] === snakeToCheck.body[i][1])  
                  {
                      isOnSnake = true;
                  }
            }
            return isOnSnake;
        };
    }
    
    
    document.onkeydown = function handleKeyDown(e){
        var key = e.keyCode;
        var newDirection;
        switch(key)
            {
                case 37:
                    newDirection= "left";
                    break;
                case 38:
                    newDirection="up";
                    break;
                case 39:
                    newDirection="right";
                    break;
                case 40:
                    newDirection="down";
                    break;
                case 32: // touche espace
                    restart();
                    return;
                default:
                    return;
            }
        snakee.setDirection(newDirection);
    }
    
}



