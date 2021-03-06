<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Usuarios</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Cadastro de Usuarios </h2>
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
                        echo form_open("usuarios/inserir", $atributos1); ?>
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
                                    "value" => set_value("nome", "")
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
                                    "value" => set_value("email", "")
                                ));
                                echo form_error("email");
                                ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <?php
                            $atributos2 = array('class' => 'control-label col-md-3 col-sm-3 col-xs-12');
                            echo form_label("Senha: *", "senha", $atributos2); ?>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <?php
                                echo form_input(array(
                                    "name" => "senha",
                                    "type" => "password",
                                    "id" => "senha",
                                    "class" => "form-control col-md-7 col-xs-12",
                                    "maxlength" => "255",
                                    "value" => set_value("senha", "")
                                ));
                                echo form_error("senha");
                                ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <?php
                            $atributos2 = array('class' => 'control-label col-md-3 col-sm-3 col-xs-12');
                            echo form_label("Confirme sua senha: *", "senha2", $atributos2); ?>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <?php
                                echo form_input(array(
                                    "name" => "senha2",
                                    "type" => "password",
                                    "id" => "senha2",
                                    "class" => "form-control col-md-7 col-xs-12",
                                    "maxlength" => "255",
                                    "value" => set_value("senha2", "")
                                ));
                                echo form_error("senha2");
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
                                        <option value=<?= $perfil["id"] ?>><?= $perfil["nome"] ?></option>
                                    <?php }
                                    ?>
                                </select>
                            </div>
                            <div class="col-md-6 col-sm-offset-3 col-sm-6 col-xs-12 ">
                                <?php echo form_error("perfil"); ?>
                            </div>
                        </div>
                        <div class="ln_solid div-linha"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <button class="btn btn-primary" type="button">Cancel</button>
                                <button class="btn btn-primary" type="reset">Reset</button>
                                <?php
                                echo form_button(array(
                                    "class" => "btn btn-info button-cadastrar",
                                    "content" => "Cadastrar",
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
