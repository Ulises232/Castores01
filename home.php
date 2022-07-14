<?php include('db_connect.php') ?>
<?php
$twhere = "";
if ($_SESSION['login_type'] != 1)
    $twhere = "  ";
?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-warning ">
                <div class="panel-body">
                    <div class="list-group">
                        <?php
                        $qry = $conn->query("SELECT * FROM noticias where status = 1  order by id_noticia asc");
                        while ($row = $qry->fetch_assoc()) :
                            $desc = str_replace(array("<li>", "</li>"), array("", ", "), html_entity_decode($row['descripcion']));
                        ?>
                        <div class="list-group-item">
                            <h3 class="text-justify"><?php echo ucwords($row['titulo'])?></h3>
                            <p class="text-justify"><?php echo ($desc) ?></p>
                            <p class="truncate"> <b class="truncate"><?php echo date("M d, Y", strtotime($row['fecha_publicacion'])) ?></b> Por <?php echo  mysqli_este("select concat(lastname,' ',firstname) as nombre_completo from users where id = '" . $row['usuario_creacion'] . "'", "nombre_completo") ?></p>
                            <span role="button"  onclick="abrirModal('<?php echo $row['id_noticia']?>')" class='badge badge-info'>Comentarios</span>
                        </div>
                            
                        <?php endwhile; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>

    function abrirModal(id){
		uni_modal("Comentarios","<?php echo SERVERURL ?>noticia/noticia_comentarios.php?id="+id,'large')

    }
</script>
