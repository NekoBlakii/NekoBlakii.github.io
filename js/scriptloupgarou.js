$(function(){

    let roles = ['Voleur','Cupidon','Montreur d\'Ours'];
    var inputRoles = document.getElementById("input-roles");

    roles.forEach(element => {
        inputRoles.innerHTML +=
            '<div class="role ' + element +'"> ' +
                '<div class="input-group-prepend">' +
                    '<span class="input-group-text" id="inputGroup-sizing-lg">'+ element +'</span>' +
                '</div>' +
            '</div>'
        ;
    });

    
});

function addPlayers()
{
    console.log("Coucou");
    let nbPlayers = document.getElementById('nb-players').value;
    let inputPlayers = document.getElementById('input-players');

    for(let i = 1; i<=nbPlayers;i++)
    {
        inputPlayers.innerHTML +=
            '<div class="player player'+ i +'"> ' +
                '<div class="input-group-prepend">' +
                    '<span class="input-group-text" id="inputGroup-sizing-lg"> Joueur '+ i +'</span>' +
                '</div>' +
                '<input type="text" class="form-control" aria-label="Large" aria-describedby="inputGroup-sizing-sm"></input>' +
            '</div>'
        ;
    }
}

function reload()
{
    document.location.reload(true);
}