var roles = ['Voleur','Cupidon','Montreur d\'Ours','Ancien','Chasseur','Chevalier','Petite Fille',
             'Enfant Sauvage','Salvateur','Loup Garou','Loup Garou Infecté','Loup Garou Blanc',
             'Voyante','Sorcière','Serveur','Corbeau'];
             
var gameContainer = null;

$(function(){
    gameContainer = document.getElementById('game-container');   
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
        gameContainer.innerHTML = "";
        initRoles();
    }

}

function initRoles()
{
    players.forEach(element => {
        let _str =  
        '<div class="player">' +
            '<div class="input-group-prepend">' +
                '<span class="input-group-text" id="inputGroup-sizing-lg">'+ element.name +'</span>' +
                '<select class="role-select">' +
                "<option value=''> Role </option>";
        roles.forEach((e) => _str += "<option value='" + e + "'>" + e + "</option>")
        _str +=
                '</select>' +
            '</div>' +
        '</div>';
        gameContainer.innerHTML += _str;
    });

    gameContainer.innerHTML += '<button type="button" class="btn btn-success" onclick="startGame()">Play</button>'
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
        gameContainer.innerHTML = "";
        launchGame();
    }
}

function launchGame()
{
    console.log("YES");
    roles.forEach(element => {
        gameContainer.innerHTML +=
            '<div class="role ' + element +'"> ' +
                '<div class="input-group-prepend">' +
                    '<span class="input-group-text" id="inputGroup-sizing-lg">'+ element +'</span>' +
                '</div>' +
            '</div>'
        ;
    });
}