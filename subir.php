<?php 

//echo 

// var_dump($_FILES);

$mensaje = "";

$ruta = 'fotos/';

foreach ( $_FILES as $key) 
{

	if($key['error'] == UPLOAD_ERR_OK)
	{
		$nombreOriginal = $key["name"];
		$temporal = $key["tmp_name"];
		$destino = $ruta.$nombreOriginal;

		$subir = move_uploaded_file($temporal, $destino);

		if($subir)
		{
			$mensaje .=  "El archivo <b>".$nombreOriginal.'</b> se ha subido correctamente <br>';
		}
		else
		{
			$mensaje .= "No se pudo subir el archivo <b>".$nombreOriginal."</b><br>";
		}


	}
	else
	{
		if($key['error']== "")
		{
			$mensaje .=  "El archivo <b>".$nombreOriginal.'</b> se ha cargado correctamente <br>';
		}
		if($key['error']!= "")
		{
			$mensaje .= "No se pudo cargar el archivo <b>".$nombreOriginal."</b> debido al siguiente Error: \n".$key['error']."<br>";
		}
	}	

}

echo $mensaje;

// $archivoTemp = $_FILES["file"]['tmp_name'];
// $nombre_archivo = $_FILES["file"]['name'];


//echo $archivoTemp." __________ ";

//echo $nombre_archivo;

//$ifp = fopen($output_file, "wb"); 


// $subir =  move_uploaded_file($archivoTemp, $ruta.$nombre_archivo);


// if($subir)
// {
// 	echo "El archivo se subio con éxito";
// }
// else
// {
// 	echo "Error al subir el archivo";
// }