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

         <!-- FontAwesome-->
        <script src="https://kit.fontawesome.com/94b9c956da.js" crossorigin="anonymous"></script>

        <!-- Bootstrap 5-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

        <!-- DataTables-->
        <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>

        <!-- Jquery-->
        <script src="https://code.jquery.com/jquery-3.4.1.js"></script>

        <script src="/js/checkbox.js"></script>
    </head>
    <body>
        <div class="container mt-5">
            <h3 class="text-center mb-5 text-primary" style="font-weight: 800; font-size: 35px">
                Deuda Pendientes
                <hr>
            </h3>

            <form action="{{ route('sendMails') }}" method="POST">
                @csrf
                @if (session('success'))
                   <p>{{ session('success') }}</p>
                @endif
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
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#enviarAhora">Enviar correo(s)</button>
                            <button type="button" class="btn btn-sm btn-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">    
                            </button>
                            <ul class="dropdown-menu">
                                <li>
                                    <a type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#programarEnvio">
                                        Programar Horario
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <!-- Modal para programar envíos -->
                        <div class="modal fade" id="programarEnvio" tabindex="-1" aria-labelledby="programarEnvioLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">

                                        <div class="modal-header">
                                            <h5 class="modal-title" id="programarEnvioLabel">Elegir Fecha y Hora</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <label for="asuntoF" class="form-label">Asunto:</label>
                                            <input name="asuntoF" type="text" class="form-control" id="asuntoF" placeholder="Escriba el asunto de su correo"/>
                                            <label for="contenidoF" class="form-label">Contenido:</label>
                                            <textarea name="contenidoF" class="form-control" id="contenidoF" rows="5" placeholder="Escriba el contenido del correo"></textarea>
                                            <label for="fecha" class="form-label">Fecha:</label>
                                            <input name="fecha" type="date" class="form-control" id="fecha" placeholder="Escriba la fecha de envío"/>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                            <button type="submit" class="btn btn-primary">Enviar</button>
                                        </div>

                                </div>
                            </div>
                        </div>
                        <!-- Modal para enviar ahora-->
                        <div class="modal fade" id="enviarAhora" tabindex="-1" aria-labelledby="enviarAhoraLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">

                                        <div class="modal-header">
                                            <h5 class="modal-title" id="enviarAhoraLabel">Elegir Fecha y Hora</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <label for="asunto" class="form-label">Asunto:</label>
                                            <input name="asunto" type="text" class="form-control" id="asunto" placeholder="Escriba el asunto de su correo"/>
                                            <label for="contenido" class="form-label">Contenido:</label>
                                            <textarea name="contenido" class="form-control" id="contenido" rows="5" placeholder="Escriba el contenido del correo"></textarea>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                            <button type="submit" class="btn btn-primary">Enviar</button>
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
                                <th>Seleccionar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($clientes as $cliente)                                
                                <tr>
                                    <td>{{ $cliente->id }}</td>
                                    <td>{{ $cliente->cliente }}</td>
                                    <td>{{ $cliente->correo }}</td>
                                    <td>
                                        @if ($cliente->notificacion)
                                            <i class="zmdi zmdi-check-all zmdi-hc-2x green"></i>
                                        @else
                                            <i class="zmdi zmdi-check zmdi-hc-2x black"></i>
                                        @endif
                                    </td>
                                    <td>
                                        <input type="checkbox" name="correos[{{ $cliente->id }}]" class="CheckedAK" value="{{ $cliente->correo }}" />
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </form>
        </div>
    </body>
</html>
