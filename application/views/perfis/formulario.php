 <!-- page content -->
 <div class="right_col" role="main">
  <div class="page-title">
    <div class="title_left">
      <h3>Perfil</h3>
    </div>
  </div>

  <div class="clearfix"></div>

  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Atualização de perfil</h2>

          <div class="clearfix"></div>
        </div>
        <div class="x_content">
         <?php if ($this->session->flashdata("success"))  : ?>
          <p class="alert alert-success alert-custom"><?= $this->session->flashdata("success") ?></p>
        <?php endif ?>
        <?php if ($this->session->flashdata("danger"))  : ?>
          <p class="alert alert-danger alert-custom"><?= $this->session->flashdata("danger") ?></p>
        <?php endif ?>
        <div class="col-md-3 col-sm-3 col-xs-12 profile_left">
          <div class="profile_img">
            <div id="crop-avatar">
              <!-- Current avatar -->
              <?php if($usuario['foto']){ ?>
              <img class="img-responsive avatar-view" src="<?=base_url("uploads/perfil/{$usuario['foto']}")?>" alt="Avatar" title="Change the avatar">
              <?php }else { ?>
              <img class="img-responsive avatar-view" src="<?=base_url("dist_adm/images/user.png")?>" alt="Avatar" title="Change the avatar">
              <?php } ?>
            </div>
          </div>


        </div>
        <div class="col-md-9 col-sm-9 col-xs-12">

          <?= form_open_multipart("perfis/atualiza" , array("class" => "form-horizontal form-label-left")); ?>
          <div class="col-md-12 col-xs-12 text-center" >
            <h2>Atualizar Perfil</h2>
          </div>

          <div class="form-group">
            <?= form_label("Email", "email", array("class" => "control-label col-md-2 col-sm-3 col-xs-12")); ?>
            <div class="col-md-9 col-sm-9 col-xs-12">
              <?php echo form_input(array(
                "name"  => "email",
                "class" => "form-control",
                "readonly" => "readonly",
                "id"    => "email",
                "type"  => "text",
                "value" => $usuario['email']

                ));
              echo form_error("email");
              ?>
            </div>
          </div>

          <div class="form-group">
            <?= form_label("Nova Senha", "senha", array("class" => "control-label col-md-2 col-sm-3 col-xs-12")); ?>
            <div class="col-md-9 col-sm-9 col-xs-12">
              <?php echo form_input(array(
                "name"  => "senha",
                "class" => "form-control",
                "id"    => "senha",
                "type"  => "text",
                "senha" => set_value("senha")

                ));
              echo form_error("senha");
              ?>
            </div>
          </div>

          <div class="form-group">
            <?=  form_label("Foto Perfil", "userfile", array("class" => "control-label col-md-2 col-sm-3 col-xs-4")); ?>
            <div class="col-md-9 col-sm-9 col-xs-12">
              <div class="form-group">
                <input name="userfile[]" id="userfile" type="file" class="file" multiple data-allowed-file-extensions='["jpg", "jpeg","png"]'> 
              </div>
              <? echo form_error("titulo");?>
            </div>
          </div>

          <div class="form-group">
            <?php 
            echo form_input(array(
              "name"  => "id",
              "class" => "form-control",
              "id"  => "id",
              "type"  => "hidden",
              "value" => $this->session->usuario_logado['id']

              ));
              ?>
            </div>


            <div class="ln_solid"></div>
            <div class="form-group">
              <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                <?php

                echo anchor("dashboard", "Voltar", array("class" => "btn btn-default"));

                echo form_button(array(
                  "class"   => "btn btn-success",
                  "content" => "Atualizar",
                  "type"    => "submit"
                  )); 
                  ?>
                </div>
              </div>



              <?= form_close()?>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script src=<?= base_url("dist_adm/gentelella/vendors/jquery/dist/jquery.min.js") ?>></script>
<script type="text/javascript">
  $("#userfile").click(function(){

    $(".fileinput-upload").remove();
  });

</script>