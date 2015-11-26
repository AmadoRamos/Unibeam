<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Editar Facultad</title>
	<link rel="stylesheet" href="<?=asset('assets/css/estilo.css')?>" type="text/css" />
</head>
<body>
	<div>
    	<div id="contenedor"> 
			<h1>Editar Facultad <?=$facultad->nom_facultades?></h1>
			<form method="POST" action="<?=action('FacultadController@actualizar', ['id' => $facultad->id_facultades])?>">
				<label for="nombre">Nombre</label>
				<input type="text" name="nombre" id="nombre" value="<?=$facultad->nom_facultades?>">
				<input type="submit" value="Editar" id="boton" name="insertar" >
			</form>
        </div>
	</div>
</body>
</html>