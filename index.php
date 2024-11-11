<?php
include 'header.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tio Du Pets</title>
    <link rel="stylesheet" href="assets/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
</head>

<body>



<div style="height: 12vh;"></div>

<main>

    <div id="carouselExample" class="carousel slide">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="assets/images/carousel/carousel1.jpg" class="d-flex w-100" alt="carousel-image" />
            <div class="carousel-caption d-none d-md-block">
            </div>
          </div>
          <div class="carousel-item">
            <img src="assets/images/carousel/carousel2.jpg" class="d-flex w-100" alt="carousel-image" />
            <div class="carousel-caption d-none d-md-block">
            </div>
          </div>
          <div class="carousel-item">
            <img src="assets/images/carousel/carousel3.webp" class="d-flex w-100" alt="carousel-image"/>
            <div class="carousel-caption d-none d-md-block">
            </div>
          </div>
        </div>
        <button
          class="carousel-control-prev"
          type="button"
          data-bs-target="#carouselExample"
          data-bs-slide="prev"
        >
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button
          class="carousel-control-next"
          type="button"
          data-bs-target="#carouselExample"
          data-bs-slide="next"
        >
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden" id="sobre-nos">Next</span>
        </button >
      </div >

      <div style="height: 4vh;"></div>


        <section class="container-fluid">
            <div class="box">

                <div class="texto" >
                    <h1>Bem-vindo ao Tio Du Pets</h1>
                    <h2>O Melhor Cuidado para o Seu Pet!</h2>
                    <p>Aqui no <strong>Tio Du Pets</strong>, acreditamos que seu pet merece o melhor. Oferecemos um ambiente seguro, confortável e cheio de carinho para garantir que seu animal de estimação se sinta em casa, seja para uma estadia no nosso hotel, um dia de diversão na creche ou para o serviço personalizado de pet sitter.</p>
                    
                </div>

                <div class="cards-panel">
                    <div class="card">
                        <img src="assets/images/ambiente-seguro.jpg" alt="Ambiente confortável">
                        <div class="image-label">Ambiente confortável</div>
                    </div>
                    <div class="card">
                        <img src="assets/images/atividades.jpg" alt="Diversas atividades">
                        <div class="image-label">Diversas atividades</div>
                    </div>
                    <div class="card">
                        <img src="assets/images/equipe.jpg" alt="Equipe qualificada">
                        <div class="image-label">Equipe qualificada</div>
                    </div>
                </div>
            </div>

        </section>

        <div style="height: 4vh;"></div>

        <section class="container-fluid">
            <div class="box">
            <div class="texto" id="servicos">
                <h1>Serviços e comodidades</h1>
                <h2>Aqui no Tio Du Pets, seu pet receberá todo carinho que merece"</h2>
                <h4 style="letter-spacing: 3px;">Nós oferecemos:</h4>
                <ul style="list-style:none; padding-left: 0;">
                    <li>&#129505; Serviço de Hotelaria Pet &#129505;</li>
                    <li>&#11088; Creche Animal &#11088;</li>
                    <li>&#9925; Pet Sitter &#9925;</li>
                </ul>
            </div>

            <div style="height: 2vh;"></div>

            <div class="row justify-content-md-around text-center">
                <div class="col col-lg-2" >
                  <img src="assets/images/hotel_pet.jpg" alt="hotel_pet" class="img-fluid rounded-circle" width="200" height="200">
                  <h2>Hotel</h2>
                  <p>Um lar longe de casa, com todo o conforto e cuidado que seu pet merece!</p>
                </div>
                <div class="col col-lg-2">
                  <img src="assets/images/creche_pet.jpg" alt="creche_pet" class="img-fluid rounded-circle" width="200" height="200">
                  <h2>Creche</h2>
                  <p>Diversão garantida enquanto você cuida da sua rotina!</p>
                </div>
                <div class="col col-lg-2">
                  <img src="assets/images/petsitter_pet.jpg" alt="petsitter_pet" class="img-fluid rounded-circle" width="200" height="200">
                  <h2>Pet Sitter</h2>
                  <p>Cuidado personalizado no conforto da sua casa!</p>
                </div>
            </div>
        </div>
    </section>

    <div style="height: 4vh;"></div>

    <section class="container-fluid">
            
            <div class="box">

                <div class="texto" id="acomodacoes">
                    <h1>Acomodações</h1>
                    <h4 style="letter-spacing: 3px;">O lar perfeito para o seu pet enquanto você está fora!</h4>
                </div>

                <div class="cards-panel">
                    <div class="card">
                        <img src="assets/images/acomodacao1.jpg" alt="acomodacao1">
                        <div class="image-label">Carinho</div>
                    </div>
                    <div class="card">
                        <img src="assets/images/acomodacao2.jpg" alt="acomodacao2">
                        <div class="image-label">Amor</div>
                    </div>
                    <div class="card">
                        <img src="assets/images/acomodacao3.jpg" alt="acomodacao3">
                        <div class="image-label">Conforto</div>
                    </div>
                </div>
            </div>

        </section>

    <div style="height: 4vh;"></div>

    <section class="container-fluid">
            
            <div class="box">
        
                    <div class="texto" id="localizacao">
                        <h2>Nossa Localização</h2>
                    </div>
        
            
                     <element class="mapa">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14705.551338323445!2d-47.0990599!3d-22.8621273!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94c8c701b143b069%3A0x590087383e5521b4!2sFatec%20Campinas%20-%20Faculdade%20de%20Tecnologia%20de%20Campinas!5e0!3m2!1spt-BR!2sbr!4v1726487989244!5m2!1spt-BR!2sbr" width="600" height="450" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                     </element>
        
            </div>
        
        </section>

    <div style="height: 4vh;"></div>

    <section class="container-fluid">
    <div class="box">
        <div class="texto" id="avaliacoes">
            <h1>Avaliações</h1>
            <h2>O que nossos clientes dizem:</h2>

            <!-- Carousel -->
            <div id="carouselAvaliacoes" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
                <div class="carousel-inner">
                    <?php
                    // Conexão ao banco de dados
                    $servername = "localhost";
                    $username = "u386416527_tiodupet";
                    $password = "M30%paramore";
                    $dbname = "u386416527_tiodupet";

                    // Cria a conexão
                    $conn = new mysqli($servername, $username, $password, $dbname);

                    // Verifica se há erros na conexão
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }

                    // Consulta para obter as 5 últimas avaliações
                    $sql = "SELECT nome_avaliador, estrelas, descricao FROM avaliacao_aprovadas ORDER BY id DESC LIMIT 5";
                    $result = $conn->query($sql);

                    // Verifica se há resultados
                    if ($result->num_rows > 0) {
                        $active = true; // Para ativar o primeiro item no carrossel
                        while ($row = $result->fetch_assoc()) {
                            echo '<div class="carousel-item' . ($active ? ' active' : '') . '">';
                            echo '<div class="card text-center">';
                            echo '<div class="card-body">';
                            echo '<h5 class="card-title">' . htmlspecialchars($row["nome_avaliador"]) . '</h5>';
                            echo '<div class="stars">';
                            for ($i = 0; $i < 5; $i++) {
                                echo $i < $row["estrelas"] ? '<i class="fa fa-star text-warning"></i>' : '<i class="fa fa-star text-muted"></i>';
                            }
                            echo '</div>';
                            echo '<p class="card-text">' . htmlspecialchars($row["descricao"]) . '</p>';
                            echo '</div>';
                            echo '</div>';
                            echo '</div>';
                            $active = false; // Apenas o primeiro item é ativo
                        }
                    } else {
                        echo '<div class="carousel-item active">';
                        echo '<p class="text-center">Ainda não há avaliações.</p>';
                        echo '</div>';
                    }

                    // Fecha a conexão
                    $conn->close();
                    ?>
                </div>

                <!-- Controles do carrossel -->
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselAvaliacoes" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Anterior</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselAvaliacoes" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Próximo</span>
                </button>
            </div>

            <a href="solicitarAvaliacao.php">Quer fazer uma avaliação?</a>
        </div>
    </div>
    
    
</section>

<section class="container-fluid">
            
            <div class="text-center my-4">
    <!-- Botão para Agendamento -->
    <a href="agendamento.php" class="btn-custom btn-agendamento mx-2">Clique aqui para solicitar seu agendamento</a>
    
    <!-- Botão para Contato pelo WhatsApp -->
    <a href="https://wa.me/5599999999999" target="_blank" class="btn-custom btn-whatsapp mx-2">
        Entre em contato pelo WhatsApp
    </a>
</div>
            </div>

        </section>


<div class="footer">
<footer class="text-center py-3 mt-4">
    <div class="container">
        <div class="row align-items-center">
            <!-- Frase principal -->
            <div class="col-md-8 text-dark fw-bold">
                © Tio Du Pet Service - 2024 | Todos os Direitos reservados. <br>
                Orgulhosamente desenvolvido com AMOR por © M.F.F Consultoria.
            </div>

            <!-- Botão de login -->
            <div class="col-md-4 text-md-end">
                <a href="office/login.php" class="btn btn-dark px-4 py-2 rounded-pill">Logar</a>
            </div>
        </div>
    </div>
</footer>

<!-- Estilos adicionais -->
<style>
    footer {
        background-color: #f0f001;
        box-shadow: 0 -4px 8px rgba(0, 0, 0, 0.2);
    }
    footer .btn {
        font-weight: bold;
        transition: background-color 0.3s ease;
    }
    footer .btn:hover {
        background-color: #333;
        color: #fff;
        
    }


/* Controles do carrossel */
.carousel-control-prev,
.carousel-control-next {
    width: 5%;
}

.carousel-control-prev-icon,
.carousel-control-next-icon {
    background-color: #666;
    border-radius: 50%;
    width: 30px;
    height: 30px;
}

/* Link para realizar a avaliação */
#avaliacoes a {
    display: inline-block;
    margin-top: 20px;
    padding: 10px 20px;
    font-size: 0.9rem;
    color: #fff;
    background-color: #28a745;
    text-decoration: none;
    border-radius: 4px;
    transition: background-color 0.3s ease;
}

#avaliacoes a:hover {
    background-color: #218838;
}


/* Link para realizar a avaliação */
#avaliacoes a {
    display: inline-block;
    margin-top: 20px;
    padding: 10px 20px;
    font-size: 0.9rem;
    color: #000;
    background-color: #f0f001;
    text-decoration: none;
    border-radius: 4px;
    transition: background-color 0.3s ease;
}

#avaliacoes a:hover {
    background-color: #218838;
}

 body {
        background-color: #ffd5d5; /* Cor de fundo rosa */
    }
    
    /* Estilos personalizados para os botões */
    .btn-custom {
        display: inline-block;
        width: 250px; /* Largura fixa para ambos os botões */
        padding: 10px 20px;
        font-size: 1.1em;
        font-weight: bold;
        border-radius: 8px;
        color: white;
        text-decoration: none;
        transition: transform 0.2s ease, box-shadow 0.2s ease;
        margin: 10px; /* Margem para espaçamento */
    }

    .btn-custom:hover {
        transform: scale(1.05);
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
    }

    .btn-agendamento {
        background-color: #fe6c6c; /* Cor azul */
    }

    .btn-agendamento:hover {
        background-color: #ff5959; /* Azul escuro para hover */
    }

    .btn-whatsapp {
        background-color: #25d366; /* Verde WhatsApp */
    }

    .btn-whatsapp:hover {
        background-color: #1ebe57; /* Verde mais escuro para hover */
    }

</style>

</div>


</main>

<script src="assets/mobile-navbar.js"></script>
<script src="assets/agendamento.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>


</body>
</style>
</html>