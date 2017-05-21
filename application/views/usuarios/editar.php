<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Corretores</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Alteração de dados dos usuarios </h2>
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
                        echo form_open("usuarios/atualizar", $atributos1); ?>
                        <div class="form-group">
                            <?php
                            $atributos2 = array('class' => 'control-label col-md-3 col-sm-3 col-xs-12');
                            echo form_label("Nome: *", "nome", $atributos2); ?>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <?php
                                echo form_input(array(
                                    "name" => "nome",
                                    "type" => "text",
                                    "id" => "nome",
                                    "class" => "form-control col-md-7 col-xs-12",
                                    "maxlength" => "255",
                                    "value" => $usuario["nome"]
                                ));
                                echo form_error("nome");
                                ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <?php
                            $atributos2 = array('class' => 'control-label col-md-3 col-sm-3 col-xs-12');
                            echo form_label("Email: *", "email", $atributos2); ?>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <?php
                                echo form_input(array(
                                    "name" => "email",
                                    "type" => "text",
                                    "id" => "email",
                                    "class" => "form-control col-md-7 col-xs-12",
                                    "maxlength" => "255",
                                    "value" => $usuario["email"]
                                ));
                                echo form_error("email");
                                ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <?php
                            $atributos4 = array('class' => 'control-label col-md-3 col-sm-3 col-xs-12');
                            echo form_label("Tipo de Perfil *", "perfil", $atributos4); ?>
                            <div class="col-md-3  col-sm-6 col-xs-12">
                                <select name="perfil" id="perfil" class="form-control">
                                    <option></option>
                                    <?php
                                    foreach ($perfis as $perfil) { ?>
                                        <option <?php echo ($usuario["perfil"] == $perfil["nome"]) ? "Selected" : ""; ?>
                                                value=<?= $perfil["id"] ?>><?= $perfil["nome"] ?></option>
                                    <?php }
                                    ?>
                                </select>
                            </div>
                            <div class="col-md-6 col-sm-offset-3 col-sm-6 col-xs-12 ">
                                <?php echo form_error("perfil"); ?>
                            </div>
                        </div>
                        <div class="ln_solid div-linha"></div>
                        <input type="hidden" name="id" value="<?= $usuario['id'] ?>"/>
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <?= anchor('usuarios/gerenciar', 'Cancelar', 'class="btn btn-primary"', 'title="Cancelar"'); ?>
                                <?php
                                echo form_button(array(
                                    "class" => "btn btn-info button-cadastrar",
                                    "content" => "Alterar",
                                    "type" => "submit"
                                ));
                                echo form_close();
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
