<?php include 'db_connect.php' ?>
<div class="col-lg-12">
	<div class="card card-outline card-success">
		<div class="card-header">
			<div class="card-tools">
				<a class="btn btn-block btn-sm btn-default btn-flat border-primary" href="<?php echo SERVERURL ?>noticia/nueva/"><i class="fa fa-plus"></i>Agregar Noticia</a>
			</div>
		</div>
		<div class="card-body">
			<table class="table tabe-hover table-bordered" id="list">
				<thead>
					<tr>
						<th width="15%">ID</th>
						<th width="70%">Descripcion</th>
						<th width="70%">Fecha Publicacion</th>
						<th width="70%">Usuario Creación</th>
						<th width="10%">Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$validacion_usuario = "";
					if ($_SESSION['login_type'] == 1) {

						$validacion_usuario = "";
					} elseif ($_SESSION['login_type'] == 2) {

						$validacion_usuario = "and usuario_creacion='".$_SESSION['login_id']."'";
					}
					$qry = $conn->query("SELECT * FROM noticias where status = 1 $validacion_usuario order by id_noticia asc");
					while ($row = $qry->fetch_assoc()) :
						$trans = get_html_translation_table(HTML_ENTITIES, ENT_QUOTES);
						unset($trans["\""], $trans["<"], $trans[">"], $trans["<h2"]);
						$desc = strtr(html_entity_decode($row['descripcion']), $trans);
						$desc = str_replace(array("<li>", "</li>"), array("", ", "), $desc);
					?>
						<tr>
							<td><b><?php echo $row['id_noticia'] ?></b></td>
							<td>
								<p><b><?php echo ucwords($row['titulo']) ?></b></p>
								<p class="truncate"><?php echo strip_tags($desc) ?></p>
							</td>
							<td><b><?php echo date("M d, Y", strtotime($row['fecha_publicacion'])) ?></b></td>
							<td><b><?php echo  mysqli_este("select concat(lastname,' ',firstname) as nombre_completo from users where id = '" . $row['usuario_creacion'] . "'", "nombre_completo") ?></b></td>
							<td class="text-center">
								<button type="button" class="btn btn-default btn-sm btn-flat border-info wave-effect text-info dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
									Action
								</button>
								<div class="dropdown-menu">
									<a class="dropdown-item" href="<?php echo SERVERURL ?>noticia/editar/<?php echo $row['id_noticia'] ?>">Editar</a>
									<div class="dropdown-divider"></div>
									<a class="dropdown-item" onclick="accionPaginas('Archivar Noticia?','archivar',[<?php echo $row['id_noticia'] ?>,'noticia'])">Archivar</a>
								</div>
							</td>
						</tr>
					<?php endwhile; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<script>
	$(document).ready(function() {
		$('#list').dataTable()

	})
</script>