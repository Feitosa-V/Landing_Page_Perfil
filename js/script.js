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
            id : $('input[name="id"]').val(),
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
            request : 'Update',
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
    $('input[name="id"]').val(music.id);
    //$('#teste').val('Atualizar');

    

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
                        <img src="'+musics[i].imagem+'" alt="" style="display:block;margin-left: auto;margin-right: auto">\
                        <p>'+musics[i].nome+'</p>\
                        <audio id="audioMusic" class="mb-2 " src="audio/night.mp3" controls style="display:block;margin-left: auto;margin-right: auto"></audio>\
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
                              <button class="btn btn-secondary mt-1" name="editar" onclick=\'setMusic('+JSON.stringify(musics[i])+')\'>Editar</button>\
                                                      </div>\
                  </div>';
            }
        }
        
        $('#music-content').html(template);
    });
}


function enviarFormulario()
{
 
    //dados a enviar, vai buscar os valores dos campos que queremos enviar para a BD
    var dadosajax = {
        'assunto' : $('input[name="assunto"]').val(),
        //'campo2' : $("#campo2").val()
    };
    pageurl = 'envia_form.php';
    //para consultar mais opcoes possiveis numa chamada ajax
    //http://api.jquery.com/jQuery.ajax/
    $.ajax({
 
        //url da pagina
        url: pageurl,
        //parametros a passar
        data: dadosajax,
        //tipo: POST ou GET
        type: 'POST',
        //cache
        cache: false,
        //se ocorrer um erro na chamada ajax, retorna este alerta
        //possiveis erros: pagina nao existe, erro de codigo na pagina, falha de comunicacao/internet, etc etc etc
        error: function(){
            alert('Erro: Inserir Registo!!');
        },
        //retorna o resultado da pagina para onde enviamos os dados
        success: function(result)
        { 
            //se foi inserido com sucesso
            if($.trim(result) == '1')
            {
				alert("O seu registo foi inserido com sucesso!");
            }
            //se foi um erro
            else
            {
                alert("Ocorreu um erro ao inserir o seu registo!");
            }
 
        }
    });
}

