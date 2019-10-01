<?php


session_start();
include 'conectar.php';
	$usuario =$_POST["nombre"];
	$pass =$_POST["clave"];
  
///$tsql = mssql_init('login_pre',$conn) ;
$sqlquery = "SELECT 
  a.id_usuario as userid,
  a.nombre as username,
  a.usuario as usernick,
  c.titulo as modulo,
  c.id_modulo as idmodulo,
  a.apellidos as apellidos,
  a.clave as pass
  FROM 
  [presupuesto].[dbo].usuarios a 
  INNER JOIN [presupuesto].[dbo].permisos b ON a.id_usuario = b.id_usuario
  INNER JOIN [presupuesto].[dbo].modulos c ON b.id_modulo = c.id_modulo
  WHERE a.usuario = '$usuario' AND  a.clave = '$pass' 
  ";
echo $sqlquery;
//mssql_bind($tsql, '@user', $usuario,SQLVARCHAR, false, false,255);
//mssql_bind($tsql, '@pass', $usuario,SQLVARCHAR, false, false,255);
//$arrayName = array ( array($usuario),array($pass));
//$stmt = sqlsrv_prepare($conn,$sqlquery,$arrayName)
$result = sqlsrv_query($conn,$sqlquery);
if($result === false){
     die( print_r( sqlsrv_errors(), true));
}

#checks if the search brought some row and if it is one only row
if(sqlsrv_has_rows($result) != 1){
       echo "User/password not found";
}else{

#creates sessions
    while($row = sqlsrv_fetch_array($result)){
       $_SESSION['id'] = $row['userid'];
       $_SESSION['name'] = $row['username'];
       $_SESSION['lastname'] = $row['apellidos'];
       $_SESSION['user'] = $row['usernick'];
       $_SESSION['level'] = $row['idmodulo'];
       $_SESSION['passw'] = $row['pass'];
    }
#redirects user
    if ($_SESSION['level'] == 1) {
    	# code...
    	 header("Location: mainsuper.php?module=index");
    }elseif ($_SESSION['level'] == 2) {
      # code...
      header("Location: mainadmin.php?module=index");
    }elseif ($_SESSION['level'] == 3) {
      # code...
      header("Location: mainoperador.php?module=index");
    }else
    {
      header("Location:login.php");
    }
   
}







?>