<!DOCTYPE html>
<!--
Consumimos un servicio creado en Java Rest http://localhost:8080/EjemploGF/app/ServicioDatos/2
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        //datos a enviar
        //$data = array("a" => "a");
        //url contra la que atacamos
        $ch = curl_init("http://localhost:8080/EjemploGF/app/ServicioDatos"); //Servicio creado en JSP.
        //$ch = curl_init("http://localhost:8080/EjemploGF/app/ServicioDatos/2"); //Servicio creado en JSP.
        //$ch = curl_init("http://localhost:8080/EjemploGF/app/ServicioDatos/otro?id=3");
        //$ch = curl_init("http://localhost/DAW2_19_20/ServiciosWEB/ServicioPHP/"); //--> Este servicio lo sirve PHP.
        //http://localhost/DAW2_19_20/ServiciosWEB/ServicioPHP/index.php
        //a true, obtendremos una respuesta de la url, en otro caso, 
        //true si es correcto, false si no lo es
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        //establecemos el verbo http que queremos utilizar para la petición
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
        //enviamos el array data
        //curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        //obtenemos la respuesta
        $response = curl_exec($ch);
        // Se cierra el recurso CURL y se liberan los recursos del sistema
        curl_close($ch);
        if (!$response) {
            return false;
        } else {
            echo '<br>';
            var_dump($response);

            // Read JSON file
            //$readjson = file_get_contents('employees.json');

            //Decode JSON
            $data = json_decode($response, true);

            //Print data
            echo '<br>';
            print_r($data);
            echo "<br/><br/> Datos obtenidos del servicio Java: <br/>";

            //Parse the employee name
            foreach ($data as $emp) {
                echo $emp['num'] .' '.$emp['texto']. "<br/>";
            }
        }
        ?>
    </body>
</html>
