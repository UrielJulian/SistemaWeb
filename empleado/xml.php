<?php
        $dbHost = "localhost";
        $dbUser = "root";
        $dbPassword = "";
        $dbName = "nissaya";
        $dbTable = "empleado";
        
        $MySqli = mysqli_connect($dbHost, $dbUser, $dbPassword, $dbName);
        if($MySqli -> connect_errno)
        echo "No se pudo conectar a base de datos MySql: " .$MySqli -> connect_errno;
        
        $consulta = "Select * From empleado" ;
        $resultado = $MySqli -> query($consulta);
        
        if($resultado)
        {
           

        echo "<?xml version=\"1.0\"?>\n";
        echo "<venta><br/>";
        while ($fila = $resultado->fetch_assoc())
        {
            echo "<empleado><br/>";
            echo "<Id_Empleado>". $fila['Id_Empleado'] . "</Id_Empleado>";
            echo "<curp>" . $fila['curp'] . "</curp>";
            echo "<nombres>" . $fila['nombres'] . "</nombres><br/>";
            echo "<apellidos>" . $fila['apellidos'] . "</apellidos><br/>";
            echo "<Telefono>" . $fila['Telefono'] . "</Telefono><br/>";
            echo "</empleado><br/>";
        }
        echo "</empleado>";
    }
?>