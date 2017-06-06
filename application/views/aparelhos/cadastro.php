<!-- page content -->
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
                        <h2>Cadastro de Planos </h2>
                        <!--     <ul class="nav navbar-right panel_toolbox">
                              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                              </li>
                              <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                <ul class="dropdown-menu" role="menu">
                                  <li><a href="#">Settings 1</a>
                                  </li>
                                  <li><a href="#">Settings 2</a>
                                  </li>
                                </ul>
                              </li>
                              <li><a class="close-link"><i class="fa fa-close"></i></a>
                              </li>
                          </ul> -->

                          <div class="clearfix"></div>
                      </div>
                      <div class="x_content">
                        <?php if ($this->session->flashdata("success"))  : ?>
                            <p class="alert alert-success alert-custom"><?= $this->session->flashdata("success") ?></p>
                        <?php endif ?>
                        <?php if ($this->session->flashdata("danger"))  : ?>
                            <p class="alert alert-danger alert-custom"><?= $this->session->flashdata("danger") ?></p>
                        <?php endif ?>
                    </p>
                    <br/>
                    <?php
                    $atributos1 = array('class' => 'form-horizontal form-label-left', 'id' => 'demo-form2');
                    echo form_open_multipart("aparelhos/inserir", $atributos1); ?>
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
                                "value" => set_value("nome", "")
                                ));
                            echo form_error("nome");
                            ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <?=  form_label("Fotos *", "userfile", array("class" => "control-label col-md-offset-1 col-md-2 col-sm-3 col-xs-4")); ?>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <div class="form-group">
                            <input name="userfile[]" id="userfile" multiple="multiple"  type="file" class="file" data-allowed-file-extensions='["jpg", "jpeg","png"]'> 
                        </div>
                        <? echo form_error("userfile[]");?>
                    </div>
                </div>

                <div class="ln_solid div-linha"></div>
                <div class="form-group">
                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                        <button class="btn btn-primary" type="button">Cancel</button>
                        <button class="btn btn-primary" type="reset">Reset</button>
                        <?php
                        // echo form_button(array(
                        //     "class" => "btn btn-info button-cadastrar",
                        //     "content" => "Cadastrar",
                        //     "type" => "submit"
                        //     ));
                        echo form_close();
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
