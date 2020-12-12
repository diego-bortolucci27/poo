<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Busca</title>
</head>
<body>
    <div class="main">
    <center>
        <h1>Critérios de Pesquisa</h1>
        <br>
        <form action="executa_criteria.php" method="POST">

            <!-- 1º Critério de Busca -->

            <label for="">Filtrar por:</label>
            <select id="cmbCampo1" name="cmbCampo1" required>
                <option selected hidden >Filtro</option>
                <option value="id">ID</option>
                <option value="nome">Nome</option>
                <option value="idade">Idade</option>
                <option value="sexo">Sexo</option>
                <option value="cidade">Cidade</option>
                <option value="estado">Estado</option>
                <option value="telefone">Telefone</option>
              </select>

              <br><br>

            <label for="">Operador Relacionais:</label>
            <select id="cmbOperador1" name="cmbOperador1" required>
                <option selected hidden>Operador</option>
                <option value="> ">Maior que</option>
                <option value="< ">Menor que</option>
                <option value=">= ">Maior igual</option>
                <option value="<= ">Menor igual</option>
                <option value="<>">Diferente de</option>
                <option value="NOT ">NOT</option>
                <option value="LIKE ">LIKE</option>
              </select>

              <br><br>

            <label for="">Valor da Pesquisa:</label>
                <input type="text" name="valor1" id="valor1" placeholder="Ex: Porto Ferreira" required>

            <br><br>


            
            
              <!-- 2º Critério de Busca -->

            <label for="">Operador Lógico:</label><br>
            <label for="">“Obrigatório escolher um
                operador para consultas com 2 critérios"
            </label>

            <br>

            <select id="cmbOpLogico" name="cmbOpLogico">
                <option value="0" selected hidden>Escolher Operador</option>
                <option value="AND ">E</option>
                <option value="OR ">OU</option>
            </select>
            <br><br>

            <label for="">Filtrar por:</label>
            <select id="cmbCampo2" name="cmbCampo2">
                <option selected hidden >Filtro</option>
                <option value="id">ID</option>
                <option value="nome">Nome</option>
                <option value="idade">Idade</option>
                <option value="sexo">Sexo</option>
                <option value="cidade">Cidade</option>
                <option value="estado">Estado</option>
                <option value="telefone">Telefone</option>
              </select>

              <br><br>

            <label for="">Operador Relacionais:</label>
            <select id="cmbOperador2" name="cmbOperador2">
                <option selected hidden>Operador</option>
                <option value="> ">Maior que</option>
                <option value="< ">Menor que</option>
                <option value=">= ">Maior igual</option>
                <option value="<= ">Menor igual</option>
                <option value="<>">Diferente de</option>
                <option value="NOT ">NOT</option>
                <option value="LIKE ">LIKE</option>
              </select>

              <br><br>

            <label for="">Valor da Pesquisa:</label>
                <input type="text" name="valor2" id="valor2" placeholder="Ex: Porto Ferreira">

            <input type="submit" value="Enviar">
        </form>
    </center>
    </div>    

</body>
</html>