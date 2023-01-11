<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Envío de correos automático</title>
        <!-- Fuente -->
        <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i|Roboto+Mono:300,400,700|Roboto+Slab:300,400,700" rel="stylesheet">

        <!-- Íconos -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">

         <!--FontAwesome-->
        <script src="https://kit.fontawesome.com/94b9c956da.js" crossorigin="anonymous"></script>

        <!--Bootstrap 5-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

        <!--DataTables-->
        <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>

        <!--Jquery-->
        <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    </head>
    <body>
        <div class="container mt-5">
            <h3 class="text-center mb-5 text-primary" style="font-weight: 800; font-size: 35px">
                Deuda Pendientes
                <hr>
            </h3>

            <form action="" method="">
                <div class="row mb-5">
                    <div class="col-4">
                        <input type="checkbox" onclick="marcarCheckbox(this);" />
                        <label id="marcas">Marcar todos</label>
                    </div>
                    <div class="col-4">
                        <p id="resp">

                        </p>
                    </div>
                    <div class="col-4">
                        <div class="btn-group">
                            <button type="button" class="btn btn-primary">Enviar correo(s)</button>
                            <button type="button" class="btn btn-sm btn-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">    
                            </button>
                            <ul class="dropdown-menu">
                                <li>
                                    <a type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        Programar Horario
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Elegir Fecha y Hora</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                        <button type="button" class="btn btn-primary">Enviar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="table-responsive mb-5">
                    <table class="table  table-hover table-bordered" id="table">
                        <thead class="thead-dark">
                            <tr>
                                <th> # </th>
                                <th>Cliente</th>
                                <th>Email</th>
                                <th>Estatus de Notificación</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <input type="checkbox" name="correo[]" class="CheckedAK" correo="" value="" />
                                </td>
                                <td></td>
                                <td></td>
                                <td>
                                    <i class="zmdi zmdi-check-all zmdi-hc-2x green"></i>
                                    <i class="zmdi zmdi-check zmdi-hc-2x black"></i>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </form>
        </div>
    </body>
</html>
