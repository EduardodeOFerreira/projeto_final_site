<?php
include 'login_activity.php';
include 'office_header.php';
?>

<head>
</head>
<body>
    
        <div class="container-fluid">
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        
    </nav>
    
    <div class="box-search">
        <input type="search" class="form-control w-25" placeholder="Pesquisar Pet" id="pesquisar">
        <button onclick="searchData()" class="btn btn-primary">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
            </svg>
        </button>
    </div>
    <div class="m-5">
        <table class="table text-white table-bg">
            <form method="post" action="/projeto_final/office/contatos.php">
                <label for="data">Data:</label>
                <input type="date" name="data" value="" required>
                <br></br>
                <label for="horario">Horário:</label>
                <input type="time" name="horario" required>
                <br></br>
                <label for="tipo_servico">Tipo de Serviço:</label>
                
                <select name="tipo_servico">
                    <option value="Hotel">Hotel</option>
                    <option value="Creche">Creche</option>
                    <option value="Passeio">Passeio</option>
                </select>
                <br></br>
                <br></br>
                <input type="submit" value="Agendar Contato">
                <a href="/projeto_final/office/calendar.php">
                <br></br>
				<h1 class="reserva" href="">Reservar</h1></a>
					<div style="clear: both;"></div>
            </form>
            </thead>
            <tbody>
                <?php 
                function getPet() {
                    // Conecta ao banco de dados
                    $conn = getDbConnection();
                    // Prepara a consulta SQL usando prepared statements
                    $stmt = $conn->prepare("SELECT name, type FROM pets ORDER BY name");
                    // Executa a consulta
                    $stmt->execute();
                    // Obtém os resultados
                    $result = $stmt->get_result();
                    // Armazena os resultados em um array
                    $pets = [];
                    while ($row = $result->fetch_assoc()) {
                        $pets[] = $row;
                        echo "<tr>";
                        echo "<td>".$pets['id']."</td>";
                        echo "<td>".$pets['nome_pet']."</td>";
                        echo "<td>".$pets['idade']."</td>";
                        echo "<td>".$$pets['sexo']."</td>";
                        echo "<td>".$$pets['raca']."</td>";
                        echo "<td>".$$pets['porte']."</td>";
                        echo "<td>".$$pets['nome_tutor']."</td>";
                        echo "<td>".$pets['telefone']."</td>";
                        echo "<td>".$pets['email']."</td>";
                        echo "<td>".$pets['endereco']."</td>";
                        echo "<td>".$pets['bairro']."</td>";
                        echo "<td>".$pets['cidade']."</td>";
                        echo "<td>
                        <a class='btn btn-sm btn-primary' href='edit.php?id=$pets[id]' title='Editar'>
                            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil' viewBox='0 0 16 16'>
                                <path d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z'/>
                            </svg>
                            </a> 
                            <a class='btn btn-sm btn-danger' href='delete.php?id=$pets[id]' title='Deletar'>
                                <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash-fill' viewBox='0 0 16 16'>
                                    <path d='M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z'/>
                                </svg>
                            </a>
                            </td>";
                        echo "</tr>";
                    }
                }
                    ?>
            </tbody>
        </table>
    </div>
</body>
<script>
    var search = document.getElementById('pesquisar');

    search.addEventListener("keydown", function(event) {
        if (event.key === "Enter") 
        {
            searchData();
        }
    });

    function searchData()
    {
        window.location = '/projeto_final/office/pet_listar.php?search='+search.value;
    }
</script>

    <?php
include 'footer.php';
?>
    </html>

