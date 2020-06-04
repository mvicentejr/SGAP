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
