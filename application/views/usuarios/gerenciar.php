<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Planos</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Gerenciamento de Usuarios </h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <?php if ($this->session->flashdata("success"))  : ?>
                            <p class="alert alert-success alert-custom"><?= $this->session->flashdata("success") ?></p>
                        <?php endif ?>
                        <?php if ($this->session->flashdata("danger"))  : ?>
                            <p class="alert alert-danger alert-custom"><?= $this->session->flashdata("danger") ?></p>
                        <?php endif ?>
                        <br/>

                        <table id="datatable" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Email</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($usuarios as $usuario) { ?>
                                <tr>
                                    <td>
                                        <?= html_escape($usuario["nome"]) ?>
                                    </td>
                                    <td>
                                        <?= html_escape($usuario["email"]) ?>
                                    </td>
                                  
                                </tr>
                            <?php } ?>

                            </tbody>
                        </table>


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src=<?= base_url("dist_adm/gentelella/vendors/jquery/dist/jquery.min.js") ?>></script>
<script>
    $(document).ready(function () {

        $('#datatable').dataTable({
            "language": {
                "sEmptyTable": "Nenhum registro encontrado",
                "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
                "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
                "sInfoFiltered": "(Filtrados de _MAX_ registros)",
                "sInfoPostFix": "",
                "sInfoThousands": ".",
                "sLengthMenu": "_MENU_ Resultados por página",
                "sLoadingRecords": "Carregando...",
                "sProcessing": "Processando...",
                "sZeroRecords": "Nenhum registro encontrado",
                "sSearch": "Pesquisar",
                "oPaginate": {
                    "sNext": "Próximo",
                    "sPrevious": "Anterior",
                    "sFirst": "Primeiro",
                    "sLast": "Último"
                },
                "oAria": {
                    "sSortAscending": ": Ordenar colunas de forma ascendente",
                    "sSortDescending": ": Ordenar colunas de forma descendente"
                }
            }

        })
    });
</script>