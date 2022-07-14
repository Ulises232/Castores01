<?php


?>
<div class="col-lg-12">
	<div class="card">
		<div class="card-body">
			<form action="" id="manage_noticia">
			<input type="hidden" name="id_noticia" value="<?php echo isset($id_noticia) ? $id_noticia : '' ?>">
				<div class="row">
					<div class="col-md-8 border-right">
						<div class="form-group">
							<label for="" class="control-label">Titulo</label>
							<input type="text"  name="titulo" class="form-control form-control-sm" value="<?php echo isset($titulo) ? $titulo : '' ?>">
						</div>
					</div>
					<div class="col-md-4 border-right">
						<div class="form-group">
							<label for="" class="control-label">Fecha de Publicacion</label>
							<input type="date"  name="fecha_publicacion" class="form-control form-control-sm" value="<?php echo isset($fecha_publicacion) ? date("Y-m-d",strtotime($fecha_publicacion)) : date("Y-m-d") ?>">
						</div>
					</div>
					<div class="col-md-12">
						<div class="form-group">
							<label for="" class="control-label">Descripcion</label>
							<textarea name="descripcion" id="" cols="30" rows="3" class="summernote form-control"><?php echo isset($descripcion) ? $descripcion : '' ?></textarea>
						</div>
					</div>

				</div>
				<hr>
				<div class="col-lg-12 text-right justify-content-center d-flex">
					<button class="btn btn-primary mr-2">Guardar</button>
					<button class="btn btn-secondary" type="button" onclick="location.href = '<?php echo SERVERURL ?>noticia/lista/'">Cancelar</button>
				</div>
			</form>
		</div>
	</div>

</div>

<style>
	input[type=number]::-webkit-inner-spin-button,
	input[type=number]::-webkit-outer-spin-button {
		-webkit-appearance: none;
		margin: 0;
	}

	input[type=number] {
		-moz-appearance: textfield;
	}
</style>

<script>
	$('#manage_noticia').submit(function(e) {
		e.preventDefault()
		$('input').removeClass("border-danger")
		start_load()
		$('#msg').html('')
		$.ajax({
			url: '<?php echo SERVERURL ?>ajax.php?action=noticia_guardar',
			data: new FormData($(this)[0]),
			cache: false,
			contentType: false,
			processData: false,
			method: 'POST',
			type: 'POST',
			success: function(resp) {
				if (resp == 1) {
					alert_toast('Noticia guardada.', "success");
					setTimeout(function() {
						location.replace('<?php echo SERVERURL ?>noticia/lista/')
					}, 750)
				}else if (resp == "error") {
					alert_toast('Noticia no guardada.', "success");
					setTimeout(function() {
						end_load();
					}, 750)
				}
			}
		})
	})
</script>
