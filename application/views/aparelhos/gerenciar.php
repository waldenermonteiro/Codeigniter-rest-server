<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Aparelhos</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Gerenciamento de Aparelhos </h2>
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
                                    <th>Alterar</th>
                                    <th>Excluir</th>
                                    <th>Visualizar Aparelho</th>
                                    <th>Visualizar Modo de Operação</th>


                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($aparelhos as $aparelho):?>

                                <tr>
                                    <td>
                                        <?= html_escape($aparelho["nome"]) ?>
                                    </td>

                                    <td>
                                        <?= anchor("aparelhos/editar/{$aparelho['id']}", "<span class='glyphicon glyphicon-pencil'></span> Alterar", array("class" => "btn btn-primary")); ?>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-danger" data-toggle="modal"
                                        data-target=".bs-example-modal-sm<?= $aparelho['id'] ?>"><span
                                        class='glyphicon glyphicon-trash'></span> Excluir
                                    </button>

                                    <div class="modal fade bs-example-modal-sm<?= $aparelho['id'] ?>" tabindex="-1"
                                     role="dialog" aria-hidden="true">
                                     <div class="modal-dialog modal-sm">
                                        <div class="modal-content">

                                            <div class="modal-header" style="border: none;">
                                                <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close"><span aria-hidden="true">×</span>
                                            </button>
                                            <h4 class="modal-title" id="myModalLabel2"
                                            style="text-align: center;">Você tem certeza?</h4>
                                        </div>
                                        <div class="modal-footer" style="border: none;">
                                            <div class="" style="text-align: center;">
                                                <?= anchor("aparelhos/excluir/{$aparelho['id']}", "Sim", array("class" => "btn btn-success")); ?>
                                                <button type="button" class="btn btn-default" id="cancelar"
                                                data-dismiss="modal">Não
                                            </button>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </td>
                    <td>
                      <a href="" data-toggle="modal"
                      data-target=".bs-example-modal-lg<?= $aparelho['id'].'a'?>"><i
                      class="fa fa-eye"></i></a>


                      <div class="modal fade bs-example-modal-lg<?= $aparelho['id'].'a'?>" id="modal"
                       tabindex="-1" role="dialog" aria-hidden="true">
                       <div class="modal-dialog modal-lg">

                        <div class="modal-content">
                            <button type="button" class="close" data-dismiss="modal"><i
                                class="fa fa-times fa-lg" aria-hidden="true"></i></button>
                                <div class="modal-header" style="border: none;">

                                    <img class="img-responsive" style="width: 100%; display: block;"
                                    data-toggle="modal"
                                    data-target=".bs-example-modal-lg<?= $aparelho['id'].'a'?>"
                                    src=<?= base_url('uploads/aparelhos/' . $aparelho["imagem"]) ?>>
                                </div>

                                <div class="modal-footer" style="border: none;">


                                </div>

                            </div>
                        </div>
                    </div>

                </td>
                <td>
                  <a href="" data-toggle="modal"
                  data-target=".bs-example-modal-lg<?= $aparelho['id'] + 1 ?>"><i
                  class="fa fa-eye"></i></a>


                  <div class="modal fade bs-example-modal-lg<?= $aparelho['id'] + 1 ?>" id="modal"
                   tabindex="-1" role="dialog" aria-hidden="true">
                   <div class="modal-dialog modal-lg">

                    <div class="modal-content">
                        <button type="button" class="close" data-dismiss="modal"><i
                            class="fa fa-times fa-lg" aria-hidden="true"></i></button>
                            <div class="modal-header" style="border: none;">

                                <img class="img-responsive" style="width: 100%; display: block;"
                                data-toggle="modal"
                                data-target=".bs-example-modal-lg<?= $aparelho['id'] + 1 ?>"
                                src=<?= base_url('uploads/aparelhos/' . $aparelho["modo_operacao"]) ?>>
                            </div>

                            <div class="modal-footer" style="border: none;">


                            </div>

                        </div>
                    </div>
                </div>

            </td>

        </tr>
        <?php
        endforeach;
        ?>
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
