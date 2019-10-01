<script>
    document.getElementById("TitleModule").innerHTML = "Lista de Presupuestos";
</script>
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Listado</h1>
</div>


<table class="table">
    <thead class="thead-light">
        <tr>
            <th scope="col">Cod</th>
            <th scope="col">Titulo</th>
            <th scope="col">Descripcion</th>
            <th scope="col">Fecha Publicación</th>
            <th scope="col">Opciones</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <th scope="row">1</th>
            <td>Gastos Operativos de Flota</td>
            <td>Cubres gastos de cumbustible y mantenimiento.</td>
            <td>13/09/2019</td>
            <td>
                <a href="mainoperador.php?module=detailpresu" class="btn btn-sm btn-dark">Ver detalle</a>
            </td>
        </tr>
    </tbody>
</table>