<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Arrays en PHP</title>
</head>
<body>
<h1>Array de Nombres</h1>

<?php
    /* Las dos formas de declarar un array */
    $docente=array(); // array vacio
    $hombres=array("Jose Luis","Monico","Andres","Dani","Juan","Sergio","Raul");
    $mujeres=["Monica","Marina","Tania","Arantxa","Alba","Ana"];
    // con la funcion count mostramos el numero de elementos / longitud del array
    echo "Hombres ->".count($hombres)."<br>";
    echo "Mujeres ->".count($mujeres)."<br>";
    echo "Docente ->".count($docente)."<br>";
    $docente[20]="Irina";
    //var_dump muestra la informacion de una variable
    var_dump($docente);
    $hombres[]="Francisco"; // insserta un nuevo valor en la ultima posicion
    echo "<br>";
    var_dump($hombres);
    for ($i=0;$i<count($mujeres);$i++){
        echo "<br>";
        echo "Mujer con el indice nº $i es $mujeres[$i]";
    }
    echo "<br>";
    $vocales="aeiou"; // los string son como arrar, pero para determinar su longitud utilizamos strlen
    for ($i=0;$i<strlen($vocales);$i++){
        echo "$vocales[$i] - ";
    }

    /* Arrays asociativos clave => valor */

    $alumnoEmpresa=["Apigon"=>"Andres","Elite"=>"Alba","Ikonox"=>"Marina,Tania","CEAT"=>"Dani","Sergio","Getecom"=>"Raul,Jose Luis"];
    $alumnoEmpresa2=["Apigon"=>"Andres","Elite"=>"Alba","Ikonox"=>["Marina","Tania"],"CEAT"=>"Dani","Sergio","Getecom"=>["Raul","Jose Luis","Monico"]];
    echo "<br>";
    var_dump($alumnoEmpresa);
    echo "<br>El alumno de Elite es ".$alumnoEmpresa['Elite'];
    // echo "<br>El alumno de Ikonox es ".$alumnoEmpresa['Ikonox']; -> error, Ikonox es un array

    // para recorrer y si quiero mostrar los valores de un array asociativo, debes usar el bucle foreach
     foreach ($alumnoEmpresa as $valor){
         echo "<br>$valor";
     }

    foreach ($alumnoEmpresa as $clave=>$valor){
        echo "<br>Empresa $clave - Alumno $valor";
    }

    /* Practica: crea un array con los meses del año y la estación a la que corresponde cada uno (aprox)*/
    $estaciones=["Invierno"=>"Enero,Febrero,Marzo","Primavera"=>"Abril,Mayo,Junio","Verano"=>"Julio,Agosto,Septiembre","Otoño"=>"Octubre,Noviembre,Diciembre"];
    foreach ($estaciones as $clave=>$valor){
        echo "<br>Meses de $clave -> $valor";
    }

    // Funciones de Arrays
    /* unset() -> elimina un elemento informando su posicion o si indicas el array, borra el array completo */
    echo "<br>";
    $basura=[1,2,3,4,5,6,7,8,9,10];
    var_dump($basura);
    unset($basura[5]);
    echo "<br>";
    var_dump($basura);
    foreach ($basura as $numero){
        echo "<br> $numero";
    }
    unset($basura); // eliminando el array
    // var_dump($basura); -> da error porque se eliminó el array en la linea anterior
    echo "<br>";
    print_r($hombres); // muestra el contenido del array en formato string sin los datos que te muestra el var dump

    echo "<br>";
    $basura=[1,2,3,4,5,6,7,8,9,10];
    unset($basura[5]);
    print_r($basura);
    echo "<br>";
    $basura2=array_values($basura);
    print_r($basura2);
    // comparar dos arrays y en un tercer array guardar los elementos del primero que no estan en el segundo
    $numeros=[5,10,15,2,8,1];
    $diferenciaArray=array_diff($numeros,$basura);
    echo "<br>";
    print_r($diferenciaArray);
    // rellenar un array con un valor indicado array_fill-> inicio , posiciones , valor
    $docentes=array_fill(0,19,"Docente"); // inicializar
    $docentes[19]="Irina";
    echo "<br>";
    print_r($docentes);
    // buscar un indice en un array -> si existe apigon, indico que la empresa es una imprenta, si no indico que no participa en el dual
    if (array_key_exists("Apigon",$alumnoEmpresa)){ // el metodo devuelve un true o un false, y busca en el array la clve que le solicitas
        echo "<br>Apigon participa en el dual y es una imprenta";
    }else{
        echo "<br>Apigon no participa en el dual";
    }
    // buscar en un array la clave de un valor
    $clave=array_search("Dani",$alumnoEmpresa);
    echo "<br>$clave";
    // ordenar un array por su indice -> sort()
    sort($hombres); // cambia el orden del array y lo ordena alfabeticamente
    sort($mujeres);
    echo "<br>";
    print_r($hombres);
    echo "<br>";
    print_r($mujeres);
    // ordenar un array por sus claves
    ksort($alumnoEmpresa); // ordena ascendente
    echo "<br>";
    print_r($alumnoEmpresa);
    krsort($alumnoEmpresa); // ordena descendente
    echo "<br>";
    print_r($alumnoEmpresa);
    // obtener una parte de un array indicando la posicion
    echo "<br>";
    print_r(array_slice($hombres,3,3));
    // implode y explode
    // implode convierte un array en un string
    $frase=["En","un","lugar","de","la","Mancha"];
    echo "<br>";
    print_r(implode(" ",$frase));
    // explode comvierte un string en un array donde se le indica el elemento separador
    echo "<br>";
    $nombres="Marina,Pedro,Juan,Luis";
    print_r(explode(",",$nombres));

    // Array bidimensional
    // la clave es dani, y su valor el array de dentro, que a su vez tiene dentro otras 2 claves y otros 2 valores
    $agenda=["Dani"=>["Tlfo"=>"612345678","Email"=>"dani@ceatformacion.com"],
        "Sergio"=>["Tlfo"=>"926123456","Email"=>"sergio@ceatformacion.com"],
        "Ana"=>["Tlfo"=>"926123456","Email"=>"ana@ceatformacion.com"]];
    foreach ($agenda as $clave=>$valor){
        echo "<br>Nombre del contacto: $clave<br>";
        foreach ($valor as $clave2=>$valor2){
            echo "$clave2 : $valor | ";
        }
    }















?>

</body>
</html>

<?php
