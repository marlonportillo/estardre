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
    document.getElementById("TitleModule").innerHTML = "Crear Presupuesto";
</script>
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Complete la siguiente información</h1>
</div>
<form method="POST" action="mainsuper.php?module=insertpresu">
    <div class="form-row">
        <div class="form-group col-md-8">
            <label>Titulo:</label>
            <input type="text" class="form-control" name="Titulo" placeholder="">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-8">
            <label for="inputEmail4">Descripción:</label>
            <textarea class="form-control" placeholder="" name="Descripción"></textarea>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-4">
            <label for="inputEmail4">Inicio:</label>
           <input type="Date" class="form-control" name="desde" placeholder="">
        </div>
        <div class="form-group col-md-4">
            <label for="inputEmail4">Fin:</label>
            <input type="Date" class="form-control" name="hasta" placeholder="">
        </div>
    </div>

    
    <button type="submit" class="btn btn-primary"> Registrar Presupuesto</button>
</form>