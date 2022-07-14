<?php
include '../db_connect.php';
include '../libreria.lib.php';
include "../public/config.php";

$id = $_GET['id'];
$qry = $conn->query("SELECT * FROM noticias where id_noticia = " . $id)->fetch_array();
foreach ($qry as $k => $v) {
	$$k = $v;
}
$desc = str_replace(array("<li>", "</li>"), array("", ", "), html_entity_decode($descripcion));

?>

<div class="list-group-item">
	<h3 class="text-justify"><?php echo ucwords($titulo) ?></h3>
	<p class="text-justify"><?php echo ($desc) ?></p>
	<p class="truncate"> <b class="truncate"><?php echo date("M d, Y", strtotime($fecha_publicacion)) ?></b> Por <?php echo  mysqli_este("select concat(lastname,' ',firstname) as nombre_completo from users where id = '$usuario_creacion'", "nombre_completo") ?></p>
	<span role="button" onclick="cometario('comentar')" class='badge badge-info'>Comentar</span>
	<div id="comentar" class="d-none">
		<form action="" id="manage_comentario">
			<input type="hidden" name="id_noticia" value="<?php echo $id_noticia ?>">
			<div class="row">
				<div class="col-md-12">
					<div class="form-group">
						<label for="" class="control-label">Comentario</label>
						<textarea name="descripcion" id="" cols="30" rows="3" class="summernote form-control"></textarea>
					</div>
				</div>

			</div>
			<hr>
			<div class="col-lg-12 text-right justify-content-center d-flex">
				<button class="btn btn-primary mr-2">Guardar</button>
				<button class="btn btn-secondary" type="button" onclick="cometario('comentar')">Cancelar</button>
			</div>
		</form>
	</div>
</div>
<div class="overflow-auto p-3 mb-3 mb-md-0 mr-md-3 bg-light" style="max-height: 500px;">
	<?php
	$qry = $conn->query("SELECT * FROM comentarios where status = 1 and id_noticia='$id_noticia' order by id_comentario asc");
	while ($row = $qry->fetch_assoc()) :
		$desc = str_replace(array("<li>", "</li>"), array("", ", "), html_entity_decode($row['descripcion']));
	?>
		<div class="list-group-item">
			<p class="text-justify"><?php echo ($desc) ?></p>
			<p class="truncate">
				<b class="truncate"><?php echo date("M d, Y h:i A", strtotime($row['fecha_creacion'])) ?></b>
				Por <?php echo  mysqli_este("select concat(lastname,' ',firstname) as nombre_completo from users where id = '" . $row['usuario_creacion'] . "'", "nombre_completo") ?>
				<?php
					if (mysqli_este("select * from users where id = '" . $row['usuario_creacion'] . "'", "type") == 1) {
						echo "- Administrador";
					}elseif (mysqli_este("select * from users where id = '" . $row['usuario_creacion'] . "'", "type") == 2) {
						echo "- Interno";
					}elseif (mysqli_este("select * from users where id = '" . $row['usuario_creacion'] . "'", "type") == 3) {
						echo "- Externo";
					}
				?>
			</p>
			<span role="button" onclick="cometario('sub_comentar_<?php echo ($row['id_comentario']) ?>')" class='badge badge-info'>Comentar</span>
		</div>
		<div id="sub_comentar_<?php echo ($row['id_comentario']) ?>" class="d-none">
			<form action="" id="manage_sub_comentario_<?php echo ($row['id_comentario']) ?>">
				<input type="hidden" name="id_comentario" value="<?php echo $row['id_comentario'] ?>">
				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<label for="" class="control-label">Comentario</label>
							<textarea name="descripcion" id="" cols="30" rows="3" class="summernote form-control"></textarea>
						</div>
					</div>

				</div>
				<hr>
				<div class="col-lg-12 text-right justify-content-center d-flex">
					<input class="btn btn-primary mr-2" type="button" onclick="guardarSubComentario('manage_sub_comentario_<?php echo ($row['id_comentario']) ?>')" value="Guardar">
					<button class="btn btn-secondary" type="button" onclick="cometario('sub_comentar_<?php echo ($row['id_comentario']) ?>')">Cancelar</button>
				</div>
			</form>
		</div>
		<div class="overflow-auto p-3 mb-3 mb-md-0 mr-md-3 bg-light" style="max-height: 500px;">
			<?php
			$qryS = $conn->query("SELECT * FROM sub_comentarios where status = 1 and id_comentario='" . $row['id_comentario'] . "' order by id_sub_comentario asc");
			while ($rowS = $qryS->fetch_assoc()) :
				$desc = str_replace(array("<li>", "</li>"), array("", ", "), html_entity_decode($rowS['descripcion']));
			?>
				<div class="list-group-item">
					<p class="text-justify"><?php echo ($desc) ?></p>
					<p class="truncate"> 
						<b class="truncate"><?php echo date("M d, Y h:i A", strtotime($rowS['fecha_creacion'])) ?></b> 
						Por <?php echo  mysqli_este("select concat(lastname,' ',firstname) as nombre_completo from users where id = '" . $rowS['usuario_creacion'] . "'", "nombre_completo") ?>
						<?php
					if (mysqli_este("select * from users where id = '" . $rowS['usuario_creacion'] . "'", "type") == 1) {
						echo "- Administrador";
					}elseif (mysqli_este("select * from users where id = '" . $rowS['usuario_creacion'] . "'", "type") == 2) {
						echo "- Interno";
					}elseif (mysqli_este("select * from users where id = '" . $rowS['usuario_creacion'] . "'", "type") == 3) {
						echo "- Externo";
					}
				?>
					</p>
				</div>


			<?php endwhile; ?>
		</div>

	<?php endwhile; ?>
</div>


<script>
	function cometario(id) {
		var div = $('#' + id);
		if (div.hasClass('d-none')) {
			div.removeClass('d-none');
		} else {
			div.addClass('d-none');

		}
	}

	$('#manage_comentario').submit(function(e) {
		e.preventDefault();
		start_load()
		$.ajax({
			url: '<?php echo SERVERURL ?>ajax.php?action=comentario_guardar',
			data: new FormData($(this)[0]),
			cache: false,
			contentType: false,
			processData: false,
			method: 'POST',
			type: 'POST',
			success: function(resp) {
				if (resp == 1) {
					alert_toast('Comentario Guardado.', "success");
					setTimeout(function() {
						end_load();
					}, 750)
				} else if (resp == "error") {
					alert_toast('Comentario no guardado.', "success");
					setTimeout(function() {
						end_load();
					}, 750)
				}
			}
		})
	})
	$(document).ready(function() {
		$('form').on('submit', function(e) {
			e.preventDefault();
		});
	});

	function guardarSubComentario(id) {
		start_load()
		$.ajax({
			url: '<?php echo SERVERURL ?>ajax.php?action=sub_comentario_guardar',
			data: new FormData($('#' + id)[0]),
			cache: false,
			contentType: false,
			processData: false,
			method: 'POST',
			type: 'POST',
			success: function(resp) {
				if (resp == 1) {
					alert_toast('Comentario Guardado.', "success");
					setTimeout(function() {
						end_load();
					}, 750)
				} else if (resp == "error") {
					alert_toast('Comentario no guardado.', "success");
					setTimeout(function() {
						end_load();
					}, 750)
				}
			}
		})

	}
</script>