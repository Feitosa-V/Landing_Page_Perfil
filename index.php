<?php

      session_start();

?>

<!DOCTYPE html>
<html lang="pt-br">
      <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="icon" href="img/logo.ico">
            <link rel="stylesheet" href="css/style.css">
            <script src="https://kit.fontawesome.com/ad93a013eb.js" crossorigin="anonymous"></script>

            <!-- BOOTSTRAP -->
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
            <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script> -->
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js"></script>
            <!-- FIM BOOTSTRAP -->

            <link rel="stylesheet" href="css/magnific-popup.css">

            <script src="js/jquery.min.js"></script>
            <script src="js/magnific-popup.js"></script>
            <script src="js/script.js"></script>

            <title>DESAFIO 5 - Landing Page</title>
      </head>
      <body>

            <!-- Inicio Header -->
            <header>
                  <nav class="navbar navbar-expand-lg pt-4 fixed-top ">
                        
                        <ul>
                              <li>
                                    <a href="#ap">Apresentação</a>
                              </li>
                        </ul>
      
                        <ul>
                              <li>
                                    <a href="#mu">Músicas</a>
                              </li>
                        </ul>
      
                        <ul>
                              <li>
                                    <a href="#ho">Hobbies</a>
                              </li>
                        </ul>
      
                        <ul>
                              <li>
                                    <a href="#lu">Lugares</a>
                              </li>
                        </ul>
      
                        <ul>
                              <li>
                                    <a href="#co">Contato</a>
                              </li>
                        </ul>

                  </nav>

            </header>
            <!-- Fim Header -->

            <!-- Inicio Apresentação -->
            <div id="ap" >
                  <br>
            </div>
            <section id="apresentacao">

                  <div class="container">
                        <h1 >Apresentação</h1>
                  </div>
                 

                  <div class="apresentation">
                        <p>Me chamo Vinícius Feitosa Franco Silva, tenho 19 anos e comecei a estudar programação em 2020 e desde então venho criando um gosto enorme pela área. Atualmente estou cursando o 4° período em Sistemas de Informação na Fagammon. Sou apaixonado por música, nos momentos livres gosto de tocar um violão.
                        </p>
                  </div>

                  <div class="apresentation">
                        <iframe src="https://embed.lottiefiles.com/animation/20942"></iframe>
                  </div>

            </section>
            <!-- Fim Apresentação -->

            <!-- Inicio Musicas -->
            <div id="mu">
                  <br>
            </div>
            <section id="musicas">
                  <h1>Músicas Favoritas</h1>

                  <form id="cadastraMusica" method="POST" >

                  <input type="hidden"  name="id" >
                        <div class="form-group">
                              <label for="imagem">Imagem</label>
                              <input class="form-control w-25" type="text" placeholder="Insira a url da imagem" name="imagem" maxlength="150">

                        </div>
                        
                        <div class="form-group">
                              <label for="nome" class="mt-2">Nome</label>
                              <input class="form-control w-25"type="text" placeholder="Insira o nome da Música" name="nome" maxlength="50">
                        </div>

                        <div>
                              <label for="iframe" class="mt-2">Iframe</label>
                              <input class="form-control w-25" type="text" placeholder="Insira a url incorporada" name="iframe" maxlength="200">
                        </div>

                        <input class="btn btn-success mt-2 mb-3" id="teste" type="button" onclick="cadastrarMusica()" value="Inserir">

                  </form>

                  <!-- <img src="https://images-na.ssl-images-amazon.com/images/I/715%2BoHIdRTL._AC_SX425_.jpg" alt=""> -->

                  <div id="music-content" class="music">
                       
                  </div>

                  <!-- FIM QUINTA MÚSICA -->

           </section>
           <!-- Fim Musicas -->

           <!-- Inicio Hobbies -->
           <div id="ho">
                  <br>
           </div>

           <section id="hobbies">
                  <h1>Hobbies</h1>

                  <form id="" method="POST" >

                  <input type="hidden"  name="idHobbie" >
                        <div class="form-group">
                              <label for="nomeHobbie">Nome do  Hobbie</label>
                              <input class="form-control w-25" type="text" placeholder="Insira o nome do Hobbie" name="nomeHobbie" maxlength="150">

                        </div>
                        
                        <div class="form-group">
                              <label for="lottie" class="mt-2">Lottie Animations</label>
                              <input class="form-control w-25"type="text" placeholder="Insira o iframe do lottie" name="lottie" maxlength="50">
                        </div>

                        <input class="btn btn-success mt-2 mb-3" id="teste" type="button" onclick="" value="Inserir">

                  </form>

                  <!-- <div class="hobbie">
                        <h2>Tocar Violão/Guitarra</h2>
                        <iframe src="https://embed.lottiefiles.com/animation/31399"></iframe>
                  </div>
                  
                  <div class="hobbie">
                        <h2>Assistir Séries</h2>
                        <iframe src="https://embed.lottiefiles.com/animation/72235"></iframe>
                  </div>

                  <div class="hobbie">
                        <h2>Sair com os amigos</h2>
                        <iframe src="https://embed.lottiefiles.com/animation/29774"></iframe>
                  </div>

                  <div class="hobbie">
                        <h2>Codar</h2>
                        <iframe src="https://embed.lottiefiles.com/animation/8306"></iframe>
                  </div> -->

                  <div id="hobbie-content" class="hobbie">
                       
                  </div>

           </section>
           <!-- Fim Hobbies -->
            
           <!-- Inicio Lugares -->
           <div id="lu">
                  <br>
           </div>
           <section id="lugares">
                  <h1>Lugares</h1>

                  <div class="places">
                       <a class="image-link" href="img/recife.jpg">
                              <img src="img/recife.jpg" alt="">
                       </a>
                       <h2>Recife</h2>
                  </div>

                  <div class="places">
                        <a class="image-link" href="img/ny.jpg">
                              <img src="img/ny.jpg" alt="">
                        </a>
                        <h2>Nova York</h2>
                  </div>

                  <div class="places">
                        <a class="image-link" href="img/vancouver.jpg">
                              <img src="img/vancouver.jpg" alt="">
                        </a>
                        <h2>Vancouver</h2>
                  </div>

                  <div class="places">
                        <a class="image-link" href="img/ubatuba.jpg">
                              <img src="img/ubatuba.jpg" alt="">
                        </a>
                        <h2>Ubatuba</h2>
                  </div>

           </section>
           <!-- Fim Lugares -->

           <!-- <section>
                  <h1>Endereço</h1>
                  <iframe class="1" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d59495.54560239745!2d-45.03337001051831!3d-21.252792039420914!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9ffd8039b103f9%3A0x39e3fcfba35cb1f3!2sLavras%2C%20MG%2C%2037200-000!5e0!3m2!1spt-BR!2sbr!4v1630338967981!5m2!1spt-BR!2sbr" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                  <button id="remove" class="btn btn-danger" onclick="removeMapa()">Remover Mapa</button>
           </section> -->

           <!-- Inicio Contato -->
           <div id="co">
                  <br>
           </div>
           <section id="contato">
                 <h1>Contato</h1>

                 <iframe src="https://embed.lottiefiles.com/animation/60968"></iframe>

                 <div class="container_social">
                        <div class="social">
                              <a href="https://api.whatsapp.com/send?phone=5535999026945" target="_blank"><img src="img/whatsapp.png" alt="icone whatsapp"></a>
                              <p>WHATSAPP</p>
                        </div>

                        <div class="social">
                              <a href="https://www.instagram.com/feitosa.vinicius/" target="_blank"><img src="img/instagram.png" alt="icone instagram"></a>
                              <p>INSTAGRAM</p>
                        </div>

                        <div class="social">
                              <a href="https://github.com/Feitosa-V" target="_blank"><img src="img/github.png" alt="icone github"></a>
                              <p>GITHUB</p>
                        </div>

                        <form  method="post" name="form">
                              <div class="form-group">
                                    <label for="assunto" class="mt-4">Assunto</label>
                                    <input  class="form-control w-50" type="text" placeholder="Insira o assunto" name="assunto" id="assunto" >
                              </div>

                              <div class="form-group">
                                    <label for="nome" class="mt-2">Nome</label>
                                    <input  class="form-control w-50" type="text" placeholder="Insira seu nome " name="nome" id="nome" >
                              </div>

                              <div class="form-group">
                                    <label for="telefone" class="mt-2">Telefone</label>
                                    <input class="form-control w-50" type="tel" placeholder="Insira seu telefone" name="telefone" id="telefone" >
                              </div>

                              <div class="form-group">
                                    <label for="email" class="mt-2">E-mail</label>
                                    <input class="form-control w-50" type="email" placeholder="Insira seu e-mail" name="email" id="email" >
                              </div>
                              
                              <div class="form-group">
                                    <label for="mensagem" class="mt-2">Mensagem</label>
                                    <textarea class="form-control w-50" id="mensagem" name="mensagem" placeholder="Insira alguma mensagem" cols="29" rows="4"></textarea>
                              </div>
                              
                              <br>
                              
                              <input type="button" class="btn btn-primary" id="submit" name="submit" value="Enviar" >
                        </form>

                        <div class="alert" id="alert" role="alert"></div>
                 </div>

           </section>
           <!-- Fim contato -->

           <!-- Inicio Footer -->
           <footer>
                  <p>&copy; Copyright - Desenvolvido por Vinícius Feitosa</p>
           </footer>
           <!-- Fim Footer -->

      </body>
</html> 