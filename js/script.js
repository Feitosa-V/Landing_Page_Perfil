$(document).ready(function() {
    $('.image-link').magnificPopup({type:'image'});
    loadMusic();
});

function removeMapa() {

    var el = document.querySelector("[class='1']");
    var pa = el ? el.parentNode : null;

    if (pa) {
        pa.removeChild(el);
    }

};

function cadastrarMusica() {
    

    $.ajax({
        method: "POST",
        url: 'musicas.php',
        data: {            
            request : 'Insert',
            imagem : $('input[name="imagem"]').val(),
            nome : $('input[name="nome"]').val(),
            iframe : $('input[name="iframe"]').val(),
        },
        dataType: 'json'
    }).always(function(response){
        if(response.status)
        {
            loadMusic();
        }
        else
        {
            alert(response.message);
        }
    });
}


function deleteMusic(id) {
    

    $.ajax({
        method: "POST",
        url: 'musicas.php',
        data: {            
            request : 'Delete',
            id : id,
        },
        dataType: 'json'
    }).always(function(response){
        if(response.status)
        {
            loadMusic();
        }
        else
        {
            alert(response.message);
        }
    });
}

function updateMusic(id) {
    

    $.ajax({
        method: "POST",
        url: 'musicas.php',
        data: {            
            request : 'update',
            id : id,
            imagem : $('input[name="imagem"]').val(),
            nome : $('input[name="nome"]').val(),
            iframe : $('input[name="iframe"]').val(),
        },
        dataType: 'json'
    }).always(function(response){
        if(response.status)
        {
            loadMusic();
        }
        else
        {
            alert(response.message);
        }
    });
}
function setMusic(music) {
    
    $('input[name="imagem"]').val(music.imagem);
    $('input[name="nome"]').val(music.nome);
    $('input[name="iframe"]').val(music.iframe);

}


function loadMusic() {
 
    $.ajax({
        method: "GET",
        url: 'musicas.php',
        data: {
            request : 'List'
        },
        dataType: 'json'
    }).always(function(musics)
    {
        let template ='';
        if(musics.length > 0) {
            for(i in musics) {
                template += '\
        <div class="music">\
                        <img src="'+musics[i].imagem+'" alt="">\
                        <p>'+musics[i].nome+'</p>\
                        <audio class="mb-2 " src="audio/night.mp3" controls></audio>\
                        <div class="modal fade" id="modal-mensagem2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">\
                              <div class="modal-dialog">\
                                    <div class="modal-content">\
                                          <div class="modal-body">\
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>\
                                                </button>\
                                                <div>\
                                                      <iframe width="100%" height="350" src="'+musics[i].iframe+'" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>\
                                                      </iframe>\
                                                </div>\
                                          </div>\
                                    </div>\
                              </div>\
                        </div>\
                        <div class="container row ">\
                              <button type="button" class="btn btn-danger m-auto btnmusic mt-1" data-bs-toggle="modal" data-bs-target="#modal-mensagem2">Acessar pelo Youtube</button>\
                              <button class="btn btn-primary mt-1" onclick="deleteMusic('+musics[i].id+')">Excluir</button>\
                              <button class="btn btn-secondary mt-1" onclick=\'setMusic('+JSON.stringify(musics[i])+')\'>Editar</button>\
                                                      </div>\
                  </div>';
            }
        }
        
        $('#music-content').html(template);
    });
}

