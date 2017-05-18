<?php 
    include 'menu.php';
    include_once 'utils.php';
    include_once '../conf/config.php';
    include_once '../conf/database.php'; 
 ?>
<!--Alert Top Cheio de Viadagem mais e Top--> 
<script src="../sweetalert-master/dist/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="../sweetalert-master/dist/sweetalert.css"> 
    
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Cursos</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Tabela de entrega de sistema de Faturas
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>Cliente</th>
                                <th>Entrega</th>
                                <th>Status</th>
                                <th>Operadora</th>                                
                                <th>Op</th>
                            </tr>
                        </thead>
                        <tbody> 
                            <?php 
                                try{
                                    //$resultado = listar("SELECT *, case when Ativo = 0 then 'Inativo' else 'Ativo' end Situacao FROM ");
                                    $resultado = listar("SELECT * FROM sistema where Ativo != 0");
                                    if ($resultado ==  !null) {
                                    if ($resultado && $resultado->num_rows > 0) {
                                        while($row = $resultado->fetch_assoc()){   
                                            $id = $row["id"];
                                            $cliente = $row["nome"];
                                            $duracao = $row["prazo"];
                                            $situacao = $row["status"];
                                            
                        				?>
                                        <tr class="odd gradeX">
                                            <td> <?php echo $cliente; ?> </td>
                                            <td> <?php echo $duracao; ?> </td>
                                            <td> <?php if ($situacao == 1) {
                                                echo "OK";
                                                } else  {
                                                    echo "Pendente";
                                                } ?> </td>
                                            
                                            <td>
                                                <form action=<?php echo "\"fatura-excluir.php\" method=\"post\">"; ?>
                                                    <?php 
                                                        echo "<input type=\"hidden\" name=\"id\" value=\"".$id."\">";

                                                        echo "<button class=\"btn btn-default info\" type=\"button\" title=\"Detalhes\" onclick=\"javascript: location.href='fatura-detalhes.php?id=".$id."';\"><i class=\"glyphicon glyphicon-file\" title=\"Detalhes\"></i></button>&nbsp&nbsp&nbsp;"; 

                                                        echo "<button class=\"btn btn-primary edit\" type=\"button\" title=\"Editar\" onclick=\"javascript: location.href='fatura-cadastro.php?id=".$id."&cliente=".$cliente."&duracao=".$duracao."';\"><i class=\"glyphicon glyphicon-edit\" title=\"Editar\"></i></button>&nbsp&nbsp&nbsp;";

                                                        echo "<button class=\"btn btn-danger delete\" type=\"submit\" name=\"btn-excluir-curso\" title=\"Excluir\"><i class=\"glyphicon glyphicon-trash\" title=\"Excluir\"></i></button>&nbsp;" 
                                                    ?> 
                                                </form>
                                            </td>
                                        </tr>
                                		 <?php 
                                        } 
                                    }
                                                             }
                                                             
                                                             elseif ($resultado == null) { ?>
                                                                                     <h1><?php echo("Nao Existe Clientes Cadastrados ");?></h1>
                                                                                     
                                                                                     <script>
                                                                                     sweetAlert("Oops...", "Nao Existe Clientes Cadastrados", "error");
                                                                                     </script><?php
                                                                                 }
                                } catch (Exception $e) {
                                    echo $e->getMessage();
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.panel-body -->
            </div>            
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-6 -->
    </div>
    <!-- /.row -->
</div>
<!-- /#page-wrapper -->

<!-- jQuery -->
<script src="../vendor/jquery/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="../vendor/metisMenu/metisMenu.min.js"></script>

<!-- DataTables JavaScript -->
<script src="../vendor/datatables/js/jquery.dataTables.min.js"></script>
<script src="../vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
<script src="../vendor/datatables-responsive/dataTables.responsive.js"></script>

<!-- Custom Theme JavaScript -->
<script src="../dist/js/sb-admin-2.js"></script>

<!-- Page-Level Demo Scripts - Tables - Use for reference -->
<script>
	$(document).ready(function() {
	    $('#dataTables-example').DataTable({
	        responsive: true,
            "language":{
               "url":"../js/Portuguese-Brasil.json"
            }
	    });
	});

    /*$('button[name="remove_levels"]').on('click', function (e) {
        var $form = $(this).closest('form');
        e.preventDefault();
        $('#confirm').modal({
            backdrop: 'static',
            keyboard: false
        })
          .one('click', '#btn-confirmar-exclusao', function (e) {
              $form.trigger('submit');
          });
    });*/

    $('button[name="btn-excluir-curso"]').on('click', function (e) {
        var $form = $(this).closest('form');
        e.preventDefault();
        //$('#confirm').modal({
        //    backdrop: 'static',
        //    keyboard: false
        //})
        //  .one('click', '#btn-confirmar-exclusao', function (e) {
        //      $form.trigger('submit');
        //  });

        swal({
              title: "Deseja excluir o curso?",
              text: "Clique em Excluir para confirmar ou em Cancelar para cancelar!",
              type: "warning",
              showCancelButton: true,
              confirmButtonColor: "#DD6B55",
              confirmButtonText: "Excluir",
              cancelButtonText: "Cancelar",
              closeOnConfirm: false
            },
            function(){
                $form.trigger('submit');
            });
    });

</script>


<?php include_once "../pages/modal-confirmar-exclusao.php";