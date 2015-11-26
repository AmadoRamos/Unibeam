<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Programas</title>
	<link rel="stylesheet" href="<?=asset('assets/css/estilo.css')?>" type="text/css" />
</head>
<body>
	<div>
    	<div id="contenedor">
			<h1>Nuevo programa</h1>
			<form method="POST" action="<?=action('ProgramaController@create')?>">
				<label for="nombre">Nombre</label><br>
				<input type="text" name="nombre" id="nombre"><br>
				<label for="facultad">Facultad</label><br>
				<select name="id_facultades">
					<?php foreach ($facultades as $facultad) : ?>
						<option value="<?=$facultad->id_facultades?>"> <?=$facultad->nom_facultades?> </option>
					<?php endforeach ?>
				</select>
				<input type="submit" value="Insertar" id="boton" name="insertar" >
			</form>
        </div>
	</div>
	<table id="vsTable">
		<tbody>
			<tr>
				<td class="title">Codigo</td>
				<td class="title">Programa</td>
				<td class="title">Facultad</td>
				<td class="title">Opciones</td>
			</tr>
			<?php
				foreach ($entities as $key => $entity) 
				{
					?>
					<tr>
						<td>
							<?=$entity->id_programas?>
						</td>
						<td>
							<?=$entity->nom_programas?>
						</td>
						<td>
							<?=$entity->facultad()->nom_facultades?>
						</td>
						<td>
							<a id='boton' href="<?=action('ProgramaController@editar', ['id' => $entity->id_programas] )?>">Editar</a>
							<a id='boton' href="<?=action('ProgramaController@eliminar', ['id' => $entity->id_programas] )?>" onclick="return confirm('Estas seguro de eliminar este elemento?')">ELiminar</a>
						</td>
					</tr>
					<?php
				}
			?>
		</tbody>
	</table>
	
</body>
</html>