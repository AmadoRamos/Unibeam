<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Facultades</title>
	<link rel="stylesheet" href="<?=asset('assets/css/estilo.css')?>" type="text/css" />
</head>
<body>
	<div>
    	<div id="contenedor">
			<h1>Nueva Facultad</h1>
			<form method="POST" action="<?=action('FacultadController@create')?>">
				<label for="nombre">Nombre</label>
				<input type="text" name="nombre" id="nombre">
				<input type="submit" value="Insertar" id="boton" name="insertar" >
			</form>
        </div>
	</div>
	<table id="vsTable">
		<tbody>
			<tr>
				<td class="title">Codigo</td>
				<td class="title">Facultad</td>
				<td class="title">Opciones</td>
			</tr>
			<?php
				foreach ($facultades as $key => $facultad) 
				{
					?>
					<tr>
						<td>
							<?=$facultad->id_facultades?>
						</td>
						<td>
							<?=$facultad->nom_facultades?>
						</td>
						<td>
							<a id='boton' href="<?=action('FacultadController@editar', ['id' => $facultad->id_facultades] )?>">Editar</a>
							<a id='boton' href="<?=action('FacultadController@eliminar', ['id' => $facultad->id_facultades] )?>" onclick="return confirm('Estas seguro de eliminar este elemento?')">ELiminar</a>
						</td>
					</tr>
					<?php
				}
			?>
		</tbody>
	</table>
	
</body>
</html>