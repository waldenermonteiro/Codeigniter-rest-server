<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Gentelella Alela! | </title>

    <!-- Bootstrap -->
    <link href=<?= base_url("dist_adm/gentelella/vendors/bootstrap/dist/css/bootstrap.min.css") ?> rel="stylesheet">
    <!-- Font Awesome -->
    <link href=<?= base_url("dist_adm/gentelella/vendors/font-awesome/css/font-awesome.min.css") ?> rel="stylesheet">
    <!-- NProgress -->
    <link href=<?= base_url("dist_adm/gentelella/vendors/nprogress/nprogress.css") ?> rel="stylesheet">
    <!-- Animate.css -->
    <link href=<?= base_url("dist_adm/gentelella/vendors/animate.css/animate.min.css") ?> rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href=<?= base_url("dist_adm/gentelella/build/css/custom.min.css") ?> rel="stylesheet">
    <link href=<?= base_url("dist_adm/style.css") ?> rel="stylesheet">
</head>

<body class="login">

<div>
    <a class="hiddenanchor" id="signup"></a>
    <a class="hiddenanchor" id="signin"></a>

    <div class="login_wrapper">
        <div class="animate form login_form">
            <?php if ($this->session->flashdata("danger"))  : ?>
                <p class="alert alert-danger alert-login"><?= $this->session->flashdata("danger") ?></p>
            <?php endif ?>

            <section class="login_content">
                <h1>Login</h1>
                <?php
                echo form_open("Adm/autenticar", array("class" => "popup-form")); ?>
                <div style="margin-top: 10px">
                    <?php
                    echo form_input(array(
                        "name" => "email",
                        "id" => "email",
                        "placeholder" => "Seu email",
                        "class" => "form-control",
                        "maxlength" => "255",
                    ));
                    ?>
                </div>
                <div>
                    <?php
                    echo form_input(array(
                        "name" => "senha",
                        "id" => "senha",
                        "type" => "password",
                        "placeholder" => "Sua senha",
                        "class" => "form-control",
                        "maxlength" => "255",
                    ));
                    ?>
                </div>
                <div>
                    <?php
                    echo form_button(array(
                        "class" => "btn btn-submit",
                        "content" => "Entrar",
                        "type" => "submit"
                    ));
                    echo form_close();
                    ?>
                </div>
                <div>
                    <div class="clearfix"></div>

                    <div class="separator">


                        <div class="clearfix"></div>
                        <br/>

                        <div>
                            <h1><i class="fa fa-paw"></i> Gentelella Alela!</h1>
                            <p>©2016 All Rights Reserved. Gentelella Alela! is a Bootstrap 3 template. Privacy and
                                Terms</p>
                        </div>
                    </div>
            </section>
        </div>
    </div>
</div>
<script src=<?= base_url("dist_adm/gentelella/vendors/jquery/dist/jquery.min.js") ?>></script>
<script src=<?= base_url("dist_adm/custom-junior.js") ?>></script>
</body>
</html>
