<?php
    
    include("session.php");
    //$arch = $_GET['arch'];
    include("config.php");
    
    $query = "SELECT * FROM cliente";
    $result = mysqli_query($mysqli, $query);
    $archXML= mysql_XML($result);
     
    $nombreArch="cliente.xml";
    $archivo = fopen($nombreArch,"w+");
    fwrite($archivo,$archXML);
    fclose($archivo);
    
    echo '<script language="javascript">';
    echo 'alert("Archivo creado exitósamente");';
    echo 'window.location="cliente.php";';
    echo '</script>';

    function mysql_XML($resultado)
    {
        // creamos el documento XML			
        $contenido  = '<?xml version="1.0" encoding="utf8" ?>';	
        $contenido .= '<informacion>';
        while ($row = mysqli_fetch_array($resultado)) {
            $contenido.="<cliente>";
            $contenido.="<Id_Cliente>".$row['Id_Cliente']."</Id_Cliente>";
            $contenido.="<nombres>".$row['nombres']."</nombres>";
            $contenido.="<apellidos>".$row['apellidos'] ."</apellidos>";
            $contenido.="<telefono>".$row['telefono']."</telefono>";
            $contenido.="<calle>".$row['calle']."</calle>";
            $contenido.="<numero>".$row['numero'] ."</numero>";
            $contenido.="<colonia>".$row['colonia']."</colonia>";
            $contenido.="<Municipio>".$row['Municipio']."</Municipio>";
            $contenido.="</cliente>";		
        }
        $contenido.='</informacion>';				
        return $contenido;
    }    
?>