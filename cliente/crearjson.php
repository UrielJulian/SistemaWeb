<?php
        
    $query = "SELECT * FROM clientes";
    
    $result = mysqli_query($mysqli, $query);    
      
    $cliente= mysql_JSON($result);   
    //Creamos el JSON   
    $json_string = json_encode($cliente, JSON_UNESCAPED_UNICODE);
    //echo $json_string;

    
    $nombreArch="cliente.json";
    $archivo = fopen($nombreArch,"w+");
    fwrite($archivo,$json_string);
    fclose($archivo);
    
    echo '<script language="javascript">';
    echo 'alert("Archivo creado exitósamente");';
    echo 'window.location="cliente.php";';
    echo '</script>';
    
    function mysql_JSON($result)
    {
        $cliente = array(); //creamos un array
        while($row = mysqli_fetch_array($result)) 
        { 	
            $Id_Cliente=$row['Id_Cliente'];
            $nombres=$row['nombres'];
            $apellidos=$row['apellidos'];            
            $telefono= $row['telefono'] ;
            $calle=$row['calle'];  
            $numero=$row['numero'];            
            $colonia= $row['colonia'] ;
            $Municipo=$row['Municipio'];                      
            $cliente[] = array('Id_Cliente'=> $Id_Cliente, 'nombres'=> $nombres, 'apellidos'=> $apellidos, 'telefono'=> $telefono,
                                'calle'=> $calle,'numero'=> $numero,'colonia'=> $colonia,'Municipio'=> $Municipo);

        }
        return $cliente;	
    }    
?>



