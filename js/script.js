//-------------------------------- INICIO MAGNIFIC POPUP ----------------------------------------

$(document).ready(function() {
    $('.image-link').magnificPopup({type:'image'});
    loadMusic();
});
//-------------------------------- FIM MAGNIFIC POPUP -------------------------------------------


//-------------------------------- INICIO FUNÇÃO REMOVER MAPA ----------------------------------------

// function removeMapa() {

//     var el = document.querySelector("[class='1']");
//     var pa = el ? el.parentNode : null;

//     if (pa) {
//         pa.removeChild(el);
//     }

// };
//-------------------------------- FIM FUNÇÃO REMOVER MAPA ----------------------------------------


//-------------------------------- INICIO CRUD MUSICAS ----------------------------------------

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
//-------------------------------- FIM CRUD MUSICAS ----------------------------------------


//-------------------------------- INICIO CRUD HOBBIES ----------------------------------------

function cadastrarHobbie() {
    
    $.ajax({
        method: "POST",
        url: 'hobbies.php',
        data: {            
            request : 'InsertH',
            nomeHobbie : $('input[name="nomeHobbie"]').val(),
            lottie : $('input[name="lottie"]').val(),
            idHobbie : $('input[name="idHobbie"]').val(),
        },
        dataType: 'json'
    }).always(function(response){
        if(response.status)
        {
            loadHobbie();
        }
        else
        {
            alert(response.message);
        }
    });
}

function deleteHobbie(id) {

    $.ajax({
        method: "POST",
        url: 'hobbies.php',
        data: {            
            request : 'Delete',
            idHobbie : id,
        },
        dataType: 'json'
    }).always(function(response){
        if(response.status)
        {
            loadHobbie();
        }
        else
        {
            alert(response.message);
        }
    });
}

function updateHobbie(id) {

    $.ajax({
        method: "POST",
        url: 'hobbies.php',
        data: {            
            request : 'Update',
            idHobbie : id,
            nomeHobbie : $('input[name="nomeHobbie"]').val(),
            lottie : $('input[name="lottie"]').val(),
        },
        dataType: 'json'
    }).always(function(response){
        if(response.status)
        {
            loadHobbie();
        }
        else
        {
            alert(response.message);
        }
    });
}

function setHobbie(hobbie) {
    $('input[name="nomeHobbie"]').val(hobbie.nomeHobbie);
    $('input[name="lottie"]').val(hobbie.lottie);
    $('input[name="idHobbie"]').val(hobbie.idHobbie);
}

function loadHobbie() {
 
    $.ajax({
        method: "GET",
        url: 'hobbies.php',
        data: {
            request : 'ListH'
        },
        dataType: 'json'
    }).always(function(hobbie)
    {
        let template ='';
        if(hobbie.length > 0) {
            for(i in hobbie) {
                template += '\
                <div class="hobbie">\
                            <h2>'+hobbie[i].nomeHobbie+'</h2>\
                            <iframe src="'+hobbie[i].lottie+'"></iframe>\
                            <div class="container row ">\
                                <button class="btn btn-danger mt-1" onclick="deleteHobbie('+hobbie[i].idHobbie+')">Excluir</button>\
                                <button class="btn btn-secondary mt-1" name="editar" onclick=\'setHobbie('+JSON.stringify(hobbie[i])+')\'>Editar</button>\
                            </div>\
                </div>';
            }
        }
        
        $('#hobbie-content').html(template);
    });
}
//-------------------------------- FIM CRUD HOBBIES ----------------------------------------


//-------------------------------- INICIO PHP MAILER ----------------------------------------

$(document).ready(function() {
    $('#submit').click(function() {
        var assunto = $('#assunto').val();
        var nome = $('#nome').val();
        var telefone = $('#telefone').val();
        var email = $('#email').val();
        var mensagem = $('#mensagem').val();

        $('#alert').html('');
        if (assunto == '') {
            $('#alert').html('Preencher o campo assunto');
            $('#alert').addClass("alert-danger");
            return false;
        }

        $('#alert').html('');
        if (nome == '') {
            $('#alert').html('Preencher o campo nome');
            $('#alert').addClass("alert-danger");
            return false;
        }

        $('#alert').html('');
        if (telefone == '') {
            $('#alert').html('Preencher o campo telefone');
            $('#alert').addClass("alert-danger");
            return false;
        }

        $('#alert').html('');
        if (email == '') {
            $('#alert').html('Preencher o campo email');
            $('#alert').addClass("alert-danger");
            return false;
        }

        $('#alert').html('');
        if (mensagem == '') {
            $('#alert').html('Preencher o campo mensagem');
            $('#alert').addClass("alert-danger");
            return false;
        }

        $('#alert').html('');
        $.ajax({
            url: 'envia_form.php',
            method: 'POST',
            data:{
                assunto:  $('input[name="assunto"]').val(),
                nome: $('#nome').val(),
                telefone: $('input[name="telefone"]').val(),
                email: $('input[name="email"]').val(),
                mensagem: $('#mensagem').val(),
            },
            success: function(result) {
                $('form').trigger('reset');
                $('#alert').addClass('alert-success');
                $('#alert').fadeIn().html(result);
                setTimeout(function() {
                    $('#alert').fadeOut('Slow');
                },4000)
            }
        });
    });
});

//-------------------------------- FIM PHP MAILER ----------------------------------------
