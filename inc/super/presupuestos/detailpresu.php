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
    include 'conectar.php';
    $idp = $_GET['id'];
     $sqlquery = "SELECT 
id_presupuesto,
titulo,
descripcion,
fecha_publicacion
from 
[presupuesto].[dbo].presupuesto
WHERE id_presupuesto = $idp
";
$result = sqlsrv_query($conn,$sqlquery);
 while($row = sqlsrv_fetch_array($result)){

      $_SESSION['titu'] = $row['titulo'];
       $_SESSION['desc'] = $row['descripcion'];
       $_SESSION['idpre'] = $row['id_presupuesto'];

     
 }
    if (isset($_GET['module']) && !empty($_GET['module']))
     :
    $module = $_GET['module'];
   

endif;
}
?>
<script>
    document.getElementById("TitleModule").innerHTML = "Ver Presupuesto";
</script>
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Datos de Presupuesto</h1>
</div>
<div class="card">
    <div class="card-body">
        <h5 class="heading">Titulo</h5>
        <p><?php echo $_SESSION['titu'] ?></p>

        <h5 class="heading">Descripcion</h5>
        <p><?php echo $_SESSION['desc'] ?></p>

        <h5 class="heading">Detalle</h3>



        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th scope="col">Cod</th>
                    <th scope="col">Detalle</th>
                    <th scope="col">Costo</th>
                    <th scope="col">Rubro</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Vales de Combustible.</td>
                    <td>$3,000</td>
                    <td>Energetico</td>
                    <td> <a href="mainadmin.php?module=updatepresu" class="btn btn-sm btn-warning">Modificar</a></td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Pagos de Cuotas.</td>
                    <td>$10,000</td>
                    <td>Financiero</td>
                    <td> <a href="mainadmin.php?module=updatepresu" class="btn btn-sm btn-warning">Modificar</a></td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td>Reparaciones.</td>
                    <td>$1,000</td>
                    <td>Automotriz</td>
                    <td> <a href="mainadmin.php?module=updatepresu" class="btn btn-sm btn-warning">Modificar</a></td>
                </tr>
                <tr>
                    <?php include 'conectar.php';
                     $idp = $_GET['id'];
                        $sqlquery = "SELECT a.id_detalle,a.detalle,a.costo_estimado,b.descripcion from 
                                    [presupuesto].[dbo].detalle a
                                    join [presupuesto].[dbo].rubro b on a.id_rubro = b.id_rubro
                                    where a.id_presupuesto = $idp ";
                                    $result = sqlsrv_query($conn,$sqlquery);
                                    while($row = sqlsrv_fetch_array($result)){

                         ?>
                         <th scope="row"><?php echo $row['id_detalle']?></th>
                         <td><?php echo $row['detalle']?></td>
                         <td><?php echo $row['costo_estimado']?></td>
                         <td><?php echo $row['descripcion']?></td>
                         <td> <a href="mainsuper.php?module=updtdet&iddt=<?php echo $row['id_detalle']?>" class="btn btn-sm btn-warning">Modificar</a></td>

                </tr>
                <?php } ?>
                <tr>
                    <td></td>
                    <td></td>
                    <td scope="row"><a href="mainsuper.php?module=creardetal&id=<?php echo $_SESSION['idpre']?>" target="_blank" onClick="window.open(this.href, this.target, 'width=600,height=600'); return false;" class="btn btn-primary">Add+</a></td>
                    <td></td>
                    <td></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>