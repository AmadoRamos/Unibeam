<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Editar programa</title>
	<link rel="stylesheet" href="<?=asset('assets/css/estilo.css')?>" type="text/css" />
</head>
<body>
	<div>
    	<div id="contenedor"> 
			<h1>Editar programa <?=$entity->nom_programas?></h1>
			<form method="POST" action="<?=action('ProgramaController@actualizar', ['id' => $entity->id_programas])?>">
				<label for="nombre">Nombre</label><br>
				<input type="text" name="nombre" id="nombre" value="<?=$entity->nom_programas?>"><br>
				<label for="facultad">Facultad</label><br>
				<select name="id_facultades">
					<?php foreach ($facultades as $facultad) : ?>
						<option value="<?=$facultad->id_facultades?>" <?php if( $facultad->id_facultades == $entity->id_facultades ) : ?>selected='selected'<?php endif ?> > <?=$facultad->nom_facultades?> </option>
					<?php endforeach ?>
				</select>
				<input type="submit" value="Editar" id="boton" name="insertar" >
			</form>
        </div>
	</div>
</body>
</html>