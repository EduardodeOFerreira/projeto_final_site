<?php
include 'header.php';
?>



<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Formulário de Avaliação</title>
    <link rel="stylesheet" href="assets/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #ffd5d5;
        }
        .form-container {
            background-color: white;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            margin-bottom: 20px;
            text-align: center;
        }
        .star-rating {
            direction: rtl;
            display: flex;
            justify-content: center;
        }
        .star-rating input {
            display: none;
        }
        .star-rating label {
            font-size: 2rem;
            cursor: pointer;
            color: #ddd; /* Cor das estrelas não selecionadas */
        }
        .star-rating input:checked ~ label {
            color: #ffcc00; /* Cor das estrelas selecionadas */
        }
        .star-rating label:hover,
        .star-rating label:hover ~ label {
            color: #ffcc00; /* Cor ao passar o mouse */
        }
    </style>
</head>
<body>
    
    
<div style="height: 15vh;"></div>
    <div class="container">
        <div class="form-container">
            <h2>Formulário de Avaliação</h2>
            <form action="processa_avaliacao.php" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="nome_avaliador" class="form-label">Nome do Avaliador:</label>
                    <input type="text" id="nome_avaliador" name="nome_avaliador" class="form-control" maxlength="50" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Estrelas:</label>
                    <div class="star-rating">
                        <input type="radio" id="star5" name="estrelas" value="5" required>
                        <label for="star5" class="fa fa-star"></label>
                        <input type="radio" id="star4" name="estrelas" value="4">
                        <label for="star4" class="fa fa-star"></label>
                        <input type="radio" id="star3" name="estrelas" value="3">
                        <label for="star3" class="fa fa-star"></label>
                        <input type="radio" id="star2" name="estrelas" value="2">
                        <label for="star2" class="fa fa-star"></label>
                        <input type="radio" id="star1" name="estrelas" value="1">
                        <label for="star1" class="fa fa-star"></label>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="descricao" class="form-label">Descrição:</label>
                    <textarea id="descricao" name="descricao" rows="4" class="form-control" required></textarea>
                </div>

            

                <button type="submit" class="btn btn-primary">Enviar Avaliação</button>
            </form>
        </div>
    </div>
    
    <div style="height: 16vh;"></div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
<div style="height: 5vh;"></div>
<div class="footer">
<footer class="text-center py-3 mt-4">
    <div class="container">
        <div class="row align-items-center">
            <!-- Frase principal -->
            <div class="col-md-8 text-dark fw-bold">
                © Tio Du Pet Service - 2024 | Todos os Direitos reservados. <br>
                Orgulhosamente desenvolvido com AMOR por © M.F.F Consultoria.
            </div>

     
        </div>
    </div>
</footer>

<style>
    footer {
        background-color: #f0f001;
        box-shadow: 0 -4px 8px rgba(0, 0, 0, 0.2);
        position: fixed;
        bottom:0;
    }
    footer .btn {
        font-weight: bold;
        transition: background-color 0.3s ease;
    }
    footer .btn:hover {
        background-color: #333;
        color: #fff;
        
    }
</style>
</html>