<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Busca</title>
</head>
<body>
    <div class="container-fluid">
    <center>
        <h1>Critérios de Pesquisa</h1>
        <br>
        <form action="executaCriteria.php" method="POST">

            <!-- 1º Critério de Busca -->
            <div>
              <label for="">Filtrar por:</label>
              <select class="custom-select" id="cmbCampo1" name="cmbCampo1" required>
                  <option value="id">ID</option>
                  <option value="nome">Nome</option>
                  <option value="idade">Idade</option>
                  <option value="sexo">Sexo</option>
                  <option value="cidade">Cidade</option>
                  <option value="estado">Estado</option>
                  <option value="telefone">Telefone</option>
              </select>
            </div>  
            <br>

            <div>
              <label for="">Operador Relacional:</label>
              <select class="custom-select" id="cmbOperador1" name="cmbOperador1" required>
                  <option value="> ">Maior que</option>
                  <option value="< ">Menor que</option>
                  <option value=">= ">Maior igual</option>
                  <option value="<= ">Menor igual</option>
                  <option value="<> ">Diferente de</option>
                  <option value="NOT ">NOT</option>
                  <option value="LIKE ">LIKE</option>
              </select>
            </div>
            <br>

            <div>  
              <label for="">Valor da Pesquisa:</label>
                  <input class="form-control" type="text" name="txtValor1" id="valor1" placeholder="Ex: Porto Ferreira" required>
            </div>
            <br>
            
            
              <!-- 2º Critério de Busca -->
            <div>
              <label for="">Operador Lógico:</label><br>
              <label for=""><b>“Obrigatório escolher um
                operador para consultas com 2 critérios"</b>
              </label>
            </div>
            <br>

            <div>
              <select class="custom-select" id="cmbOpLogico" name="cmbOpLogico" required>
                  <option value="0" selected hidden>Escolher Operador</option>
                  <option value="AND ">E</option>
                  <option value="OR ">OU</option>
              </select>
            </div>
            <br>

            <div>
              <label for="">Filtrar por:</label>
              <select class="custom-select" id="cmbCampo2" name="cmbCampo2">
                  <option selected hidden >Filtro</option>
                  <option value="id">ID</option>
                  <option value="nome">Nome</option>
                  <option value="idade">Idade</option>
                  <option value="sexo">Sexo</option>
                  <option value="cidade">Cidade</option>
                  <option value="estado">Estado</option>
                  <option value="telefone">Telefone</option>
              </select>
            </div>
            <br>

            <div>
              <label for="">Operador Relacional:</label>
              <select class="custom-select" id="cmbOperador2" name="cmbOperador2">
                  <option selected hidden>Operador</option>
                  <option value="> ">Maior que</option>
                  <option value="< ">Menor que</option>
                  <option value=">= ">Maior igual</option>
                  <option value="<= ">Menor igual</option>
                  <option value="<> ">Diferente de</option>
                  <option value="NOT ">NOT</option>
                  <option value="LIKE ">LIKE</option>
              </select>
            </div>
              <br>

            <div>  
              <label for="">Valor da Pesquisa:</label>
                <input class="form-control" type="text" name="txtValor2" id="valor2" placeholder="Ex: SP">
            </div>  
            <input class="btn btn-outline-success" type="submit" value="Enviar">
        </form>
    </center>
    </div>    

</body>
</html>