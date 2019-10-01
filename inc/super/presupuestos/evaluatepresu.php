<?php
if (!isset($_SESSION)) {
    # code...
    session_start();
}

if (@!$_SESSION['user']) {
    echo "<script>alert('no haz iniciado sesion ');</script>";
    header("Location:login.php");
}
else{
    # code.
    if (isset($_GET['module']) && !empty($_GET['module']))
     :
    $module = $_GET['module'];
   

endif;
}
?>




<script>
    document.getElementById("TitleModule").innerHTML = "Evaluar Presupuesto";
</script>
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Datos de Presupuesto</h1>
</div>
<div class="card">
    <div class="card-header">
        <form class="form-inline">
            <div class="mx-auto">
                <a href="main.php?module=listpresu" class="btn btn-success mr-2 ml-2">Aprobar</a>
                <a href="#logoutModal" data-toggle="modal" class="btn btn-warning mr-2 ml-2">Revisión</a>
                <a href="main.php?module=listpresu" class="btn btn-danger mr-2 ml-2">Rechazar</a>
            </div>
        </form>
    </div>
    <div class="card-body">

        <h5 class="heading">Titulo</h5>
        <p>Gastos Operativos de Flota</p>

        <h5 class="heading">Descripcion</h5>
        <p>Gastos Operativos de Flota</p>

        <h5 class="heading">Detalle</h3>

            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">Cod</th>
                        <th scope="col">Detalle</th>
                        <th scope="col">Costo</th>
                        <th scope="col">Rubro</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Vales de Combustible.</td>
                        <td>$3,000</td>
                        <td>Energetico</td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Pagos de Cuotas.</td>
                        <td>$10,000</td>
                        <td>Financiero</td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td>Reparaciones.</td>
                        <td>$1,000</td>
                        <td>Automotriz</td>
                    </tr>
                </tbody>
            </table>
    </div>
</div>

<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Mandar a Revisión</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="inputEmail4">Mejoras Requeridas:</label>
                        <textarea class="form-control" placeholder=""></textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                <a class="btn btn-primary" href="main.php?module=listpresu">Aceptar</a>
            </div>
        </div>
    </div>
</div>