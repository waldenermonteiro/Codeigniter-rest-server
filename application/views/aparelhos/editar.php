<!-- page content -->
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
                        <h2>Alteração de Aparelhos </h2>
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
                        <?php
                        $atributos1 = array('class' => 'form-horizontal form-label-left', 'id' => 'demo-form2');
                        echo form_open_multipart("aparelhos/atualizar", $atributos1); ?>
                        <div class="form-group">
                            <?php
                            $atributos2 = array('class' => 'control-label col-md-3 col-sm-3 col-xs-12');
                            echo form_label("Nome do Aparelho *", "nome", $atributos2); ?>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <?php
                                echo form_input(array(
                                    "name" => "nome",
                                    "type" => "text",
                                    "id" => "nome",
                                    "class" => "form-control col-md-7 col-xs-12",
                                    "maxlength" => "255",
                                    "value" => $aparelho["nome"]
                                    ));
                                echo form_error("nome");
                                ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <?php
                            $atributos3 = array('class' => 'control-label col-md-3 col-sm-3 col-xs-12');
                            echo form_label("Descricao *", "descricao", $atributos3); ?>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <?php
                                echo form_input(array(
                                    "name" => "descricao",
                                    "type" => "text",
                                    "id" => "descricao",
                                    "class" => "form-control col-md-7 col-xs-12",
                                    "maxlength" => "255",
                                    "value" => $aparelho["descricao"]
                                    ));
                                echo form_error("descricao");
                                ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <?=  form_label("Foto *", "userfile", array("class" => "control-label col-md-offset-1 col-md-2 col-sm-3 col-xs-4")); ?>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <div class="form-group">
                                <input name="userfile[]" id="userfile"  type="file" class="file" data-allowed-file-extensions='["jpg", "jpeg","png"]'> 
                            </div>
                            <? echo form_error("userfile[]");?>
                        </div>
                    </div>


                    <input type="hidden" name="id" value="<?= $aparelho['id'] ?>"/>
                    <div class="ln_solid div-linha"></div>
                    <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <?= anchor('aparelhos/gerenciar', 'Cancelar', 'class="text-center btn btn-primary"', 'title="Cancelar"'); ?>
                            <?php
                            echo form_close();
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
