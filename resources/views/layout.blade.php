<!DOCTYPE html>
<html>

    <head>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.5/css/bulma.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    </head>
    <body>
        <header>
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <a class="navbar-brand" href="#">SGAP</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#conteudoNavbarSuportado" aria-controls="conteudoNavbarSuportado" aria-expanded="false" aria-label="Alterna navegação">
                  <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="conteudoNavbarSuportado">
                  <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Home</a>
                    </li>
                    <!--Cadastros-->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Cadastros
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">Clientes</a>
                            <a class="dropdown-item" href="#">Fornecedores</a>
                            <a class="dropdown-item" href="{{route('funcionarios.index')}}">Funcionários</a>
                            <a class="dropdown-item" href="#">Produtos</a>
                        </div>
                    </li>
                    <!--Movimentos-->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Movimentos
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">Compras</a>
                            <a class="dropdown-item" href="#">Vendas</a>
                            <a class="dropdown-item" href="">Pagamentos</a>
                            <a class="dropdown-item" href="#">Recebimentos</a>
                            <a class="dropdown-item" href="#">Situação Clientes</a>
                        </div>
                    </li>
                    <!--Relatórios-->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Relatórios
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                          <a class="dropdown-item" href="#">Clientes</a>
                          <a class="dropdown-item" href="#">Fornecedores</a>
                          <a class="dropdown-item" href="">Funcionários</a>
                          <a class="dropdown-item" href="#">Produtos</a>
                          <a class="dropdown-item" href="#">Compras</a>
                          <a class="dropdown-item" href="#">Vendas</a>
                          <a class="dropdown-item" href="">Pagamentos</a>
                          <a class="dropdown-item" href="#">Recebimentos</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Sobre</span></a>
                    </li>
                      </ul>
                  </div>
              </nav>
        </header>
        <div class="jumbotron">
            <div class="container">
                <h1><center>Sistema de Gestão de AutoPeças</center></h1>
            </div>
            <br><br>
            @yield('content')
        </div>
    </body>
    <footer>
        <?php date_default_timezone_set('America/Sao_Paulo') ?>
        <center>Desenvolvido por Marcelo Jr -
        {{strftime('%d-%m-%Y %H:%M', (strtotime('now')))}}</center>
        <br>
    </footer>

    <script>
    $('#delete').on('show.bs.modal', function (e) {
        var button = $(event.relatedTarget)
        var func_id = button.data('id')
        var modal = $(this)

        modal.find('.modal-body #func_id').val(cat_id);
      })
    </script>

</html>
