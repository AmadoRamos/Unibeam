<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Inicio</title>
	<link rel="stylesheet" href="<?=asset('assets/css/estilo.css')?>" type="text/css" />
</head>
<body>
	<table id="vsTable">
		<tbody>
			<tr>
				<td class="title">Elemento</td>
			</tr>
			<tr>
				<td>
					<a href="<?=action('HolaController@index')?>">INICIO</a>
				</td>
			</tr>
			<tr>
				<td>
					<a href="<?=action('FacultadController@index')?>">Facultades</a>
				</td>
			</tr>
			<tr>
				<td>
					<a href="<?=action('ProgramaController@index')?>">Programas</a>
				</td>
			</tr>
		</tbody>
	</table>
</body>
</html>
