var roles = ['Voleur','Cupidon','Montreur d Ours','Ancien','Chasseur','Chevalier','Petite Fille',
             'Enfant Sauvage','Salvateur','Loup Garou','Loup Garou Infecté','Loup Garou Blanc',
             'Voyante','Sorcière','Serveur','Corbeau'];
             
var rowContainer = null;

$(function(){
    rowContainer = document.getElementById('row-game');   
});

function addPlayers()
{
    let nbPlayers = document.getElementById('nb-players').value;
    let inputPlayers = document.getElementById('input-players');
    let buttonsAction = document.getElementById('button-actions');
    if(nbPlayers > 0)
    {
        for(let i = 1; i<=nbPlayers;i++)
        {
            inputPlayers.innerHTML +=
                '<div class="player player'+ i +'"> ' +
                    '<div class="input-group-prepend">' +
                        '<span class="input-group-text" id="inputGroup-sizing-lg"> Joueur '+ i +'</span>' +
                    '</div>' +
                    '<input type="text" class="form-control player-name" aria-label="Large" aria-describedby="inputGroup-sizing-sm" value="" placeholder="Nom du joueur"></input>' +
                '</div>'
            ;
        }
    
        buttonsAction.innerHTML +='<button type="button" class="btn btn-success" onclick="play()">Play Party</button>';
    
        let addPlayerButton = document.getElementById('add-player-button');
        addPlayerButton.remove();
    }
}

function reload()
{
    document.location.reload(true);
}

var players = [];


class player
{
    constructor(name)
    {
        this.name = name;
        this.role = "";
        this.isAlive = true;
        this.isInLove = false;
        this.isProtected = false;
        this.isDrunk = false;
        this.isCorbeauted = false;
        this.isLeader = false;
        this.isModel = false;
    }

    resetRoles()
    {
        this.role= "";
    }
}

function play()
{
    let playersName = document.querySelectorAll('.player-name');
    let hasFailed = false;

    playersName.forEach(element => {
        if(element.value.trim() == "")
        {
            hasFailed = true;
            players = [];
        }
        if(hasFailed)
        {
            return;
        }
        players.push(new player(element.value));
    });

    if(!hasFailed)
    {
        rowContainer.innerHTML = "";
        initRoles();
    }


}

function initRoles()
{
    rowContainer.innerHTML += '<div id="game-container">'
    let gameContainer = document.getElementById('game-container');
    players.forEach(element => {
        let content =  
        '<div class="player">' +
            '<div class="input-group-prepend">' +
                '<span class="input-group-text" id="inputGroup-sizing-lg">'+ element.name +'</span>' +
                '<select class="role-select">' +
                "<option value=''> Role </option>";
        roles.forEach((e) => content += "<option value='" + e + "'>" + e + "</option>")
        content +=
                '</select>' +
            '</div>' +
        '</div>';
        gameContainer.innerHTML += content;
    });

    gameContainer.innerHTML += '<button type="button" class="btn btn-success" onclick="startGame()">Play</button>'
    gameContainer.innerHTML += '</div>'
}

function startGame()
{
    let selectRoles = document.querySelectorAll('.role-select');
    let hasError = false;
    for(let i = 0; i <selectRoles.length;i++)
    {
        let currentRole = selectRoles[i].options[selectRoles[i].selectedIndex].value;
        if(currentRole == "")
        {
            hasError = true;
            players.forEach(e => e.roles = "");
            break;
        }
        players[i].role = currentRole;
    }

    if(!hasError)
    {
        rowContainer.innerHTML = "";
        launchGame();
    }
}

function launchGame()
{
    // COLONNEROLES
    let rowGame = document.getElementById('row-game');
    rowGame.innerHTML += '<div id="col-roles" class="col-sm-6"><h1>Liste des roles :</h1>';
    let colRoles = document.getElementById('col-roles');
    roles.forEach(element => {
        var namePlayer = [];
        var content = "";
        
        players.forEach(player =>{
            if(player.role == element)
            {
                namePlayer.push(player.name);
            }
        });
        content +=
            '<div class="role ' + element +'"> ' +
                '<div class="input-group-prepend">' +
                    '<span class="input-group-text" id="inputGroup-sizing-lg">'+ element +'</span>';

        if(namePlayer.length > 0)
        {
            content += '<span class="input-group-text bg-warning" id="inputGroup-sizing-lg">'+ namePlayer +'</span>';
        }

        content += 
                '</div>' +
            '</div>';
        ;

        colRoles.innerHTML += content;
    });
    rowGame.innerHTML += '</div>';

    //COLONNEPLAYERS
    rowGame.innerHTML += '<div id="col-players" class="col-sm-6"><h1>Liste des joueurs :</h1>';
    let colPlayers = document.getElementById('col-players');
    players.forEach(player =>{
        colPlayers.innerHTML += 
            '<div class="player ' + player.role +'"> ' +
                '<div class="input-group-prepend">' +
                    '<span class="input-group-text bg-warning">'+ player.name +'</span>'+
                    '<div class="input-group-text">'+
                        'Couple <input type="radio">'+
                        'Salvaté <input type="checkbox"">'+
                        'Cible <input type="checkbox">'+
                        'Infecté <input type="checkbox">'+
                        'Servi <input type="checkbox">'+
                        'Corbeauté <input type="checkbox">'+
                        'Mort <input type="radio">'+
                    '</div>'+
                '</div>' +
            '</div>';
    });
    colPlayers.innerHTML += 
        '<button type="button" class="btn btn-success" onclick="reStartGame()">Restart</button>';
    rowGame.innerHTML += '</div>';

}

function reStartGame()
{
    let rowGame = document.getElementById('row-game');
    rowGame.innerHTML = "";

    players.forEach(player => {
        player.resetRoles();
    });

    initRoles();

}