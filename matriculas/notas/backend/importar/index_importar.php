<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <title>Importar Registros</title>
</head>

<body style="background-color: #FFFFFF">
    <div class="container-fluid">
        <center>
            <h2><u>Importar Registros</u></h2>
        </center>
        <br>
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <div class="panel panel-primary">
                    <div class="panel-heading">Importador de datos</div>
                    <div class="panel-body">
                        <div class="form-group">
                            <form id="form_import" method="post" enctype="multipart/form-data" action="importar_calificaciones.php">
                                <input type="file" class="form-control" name="archivo" id="archivo" accept=".csv" />
                            </form>
                            <div id="imgImport">
                                <br>
                                <center>
                                    <img src="../../vendor/images/icon-home.png" alt="" width="10%">
                                </center>
                            </div>
                            <br>
                            <div class="table table-responsive">
                                <table id='my_file_output' border="" class="table table-bordered table-condensed table-striped"></table>
                            </div>
                            <button form="form_import" type="submit" class="btn btn-info" id="registrarBoton">Registrar Datos</button>

                            <a href="../../frontend/index.php" class="btn btn-default ">Cancelar</a>
                            <p id="respuesta">

                            </p>
                            <p id="contador">

                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-1"></div>
        </div>
    </div>
    <script src="../../frontend/assets/js/importar_index.js?v=1"></script>
</body>

</html>