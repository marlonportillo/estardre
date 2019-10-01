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
    document.getElementById("TitleModule").innerHTML = "Lista de Presupuestos";
</script>
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Listado de presupuestos por evaluar</h1>
</div>
<div class="form-group">
    <a href="mainsuper.php?module=createpresu" class="btn btn-primary">Nuevo Presupuesto</a>
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
       
        <?php
        include 'conectar.php';
        $sqlquery = "SELECT 
id_presupuesto,
titulo,
descripcion,
fecha_publicacion
from 
[presupuesto].[dbo].presupuesto";
$result = sqlsrv_query($conn,$sqlquery);
 while($row = sqlsrv_fetch_array($result)){
    ?>
   <tr>
  <th scope="row"> <?php echo $row['id_presupuesto'];?> </th>
  <td> <?php echo $row['titulo'];?> </td>
  <td> <?php echo $row['descripcion'];?> </td>
  <td> <?php echo   $row['fecha_publicacion']->format('d/m/Y');?> </td>
  <td>
                <a href="mainsuper.php?module=detailpresu&id=<?php echo $row['id_presupuesto'];?> " class="btn btn-sm btn-dark">Ver detalle</a>
                <a href="mainsuper.php?module=evaluatepresu&id=<?php echo $row['id_presupuesto'];?> " class="btn btn-sm btn-success">Evaluar</a>
                <a href="mainsuper.php?module=updatepresu&id=<?php echo $row['id_presupuesto'];?> " class="btn btn-sm btn-warning">Modificar</a>
                
</td>
  </tr>


<?php }

        ?>


    </tbody>
</table>