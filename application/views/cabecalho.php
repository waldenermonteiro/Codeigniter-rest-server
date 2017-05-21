<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Dashboard | Redação 1000 - Curso de Redação </title>

    <!-- Bootstrap -->
    <link href=<?= base_url("dist_adm/gentelella/vendors/bootstrap/dist/css/bootstrap.min.css") ?> rel="stylesheet">
    <!-- Font Awesome -->
    <link href=<?= base_url("dist_adm/gentelella/vendors/font-awesome/css/font-awesome.min.css") ?> rel="stylesheet">
    <!-- NProgress -->
    <link href=<?= base_url("dist_adm/gentelella/vendors/nprogress/nprogress.css") ?> rel="stylesheet">

    <link href=<?= base_url("dist_adm/gentelella/vendors/iCheck/skins/flat/green.css") ?>  rel="stylesheet">
    <!-- bootstrap-wysiwyg -->
    <link href=<?= base_url("dist_adm/gentelella/vendors/google-code-prettify/bin/prettify.min.css") ?>  rel="stylesheet">
    <!-- Select2 -->
    <link href=<?= base_url("dist_adm/gentelella/vendors/select2/dist/css/select2.min.css") ?>  rel="stylesheet">
    <!-- Switchery -->
    <link href=<?= base_url("dist_adm/gentelella/vendors/switchery/dist/switchery.min.css") ?>  rel="stylesheet">
    <!-- starrr -->
    <link href=<?= base_url("dist_adm/gentelella/vendors/starrr/dist/starrr.css") ?>  rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link href=<?= base_url("dist_adm/gentelella/vendors/bootstrap-daterangepicker/daterangepicker.css") ?>  rel="stylesheet">


    <link href=<?= base_url("dist_adm/gentelella/vendors/dropzone/dist/min/dropzone.min.css") ?>  rel="stylesheet">

    <!-- Table Dynamic -->
    <link href=<?= base_url("dist_adm/gentelella/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css") ?> rel="stylesheet">
    <link href=<?= base_url("dist_adm/gentelella/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css") ?> rel="stylesheet">
    <link href=<?= base_url("dist_adm/gentelella/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css") ?> rel="stylesheet">
    <link href=<?= base_url("dist_adm/gentelella/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css") ?> rel="stylesheet">
    <link href=<?= base_url("dist_adm/gentelella/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css") ?> rel="stylesheet">
    <!-- Boostrap file input Style -->
    <link href=<?= base_url("dist_adm/input/css/fileinput.min.css") ?> media="all" rel="stylesheet" type="text/css"/>
    <!-- Modal  Style -->

    <!-- Custom Theme Style -->
    <link href=<?= base_url("dist_adm/gentelella/build/css/custom.min.css") ?> rel="stylesheet">
    <link href=<?= base_url("dist_adm/style.css") ?> rel="stylesheet">
</head>


<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">
                    <div class="navbar nav_title" style="border: 0;">
                        <a href="http://localhost/redacao/dashboard/" class="site_title"><i class="fa fa-paw"></i> <span>Gentelella Alela!</span></a>
                    </div>
                    <?php $nome = nomeUsuario($this->session->adm_logado["nome"]); ?>

                    <div class="clearfix"></div>

                    <!-- menu profile quick info -->
                    <div class="profile clearfix">
                        <div class="profile_pic">
                            <?php $foto = $this->session->adm_logado["foto"]; ?>
                            <img src=<?= base_url("uploads/perfil/$foto") ?> alt="..."
                            class="img-circle profile_img">
                        </div>
                        <div class="profile_info">
                            <span>Bem Vindo,</span>
                            <h2><?= $nome ?></h2>

                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <!-- /menu profile quick info -->
                    <br/>
                    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                        <div class="menu_section">
                            <h3>General</h3>
                            <ul class="nav side-menu">
                               
                               
                                <li><a><i class="fa fa-trophy"></i> Aparelhos <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><?= anchor('aparelhos/cadastro', 'Cadastro de Aparelhos', 'title="News title"'); ?>
                                        </li>
                                        <li><?= anchor('aparelhos/gerenciar', 'Gerenciamento de Aparelhos', 'title="News title"'); ?></li>
                                    </ul>
                                </li>
                               <!--  <li><a><i class="fa fa-globe"></i>Temas<span
                                    class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><?= anchor('temas/cadastro', 'Cadastro de Temas', 'title="News title"'); ?></li>
                                        <li><?= anchor('temas/gerenciar', 'Gerenciamento de Temas', 'title="News title"'); ?></li>
                                    </ul>
                                </li>
                                <li><a><i class="fa fa-video-camera"></i>Video Aulas<span
                                    class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><?= anchor('videos/cadastro', 'Cadastro de Video Aulas', 'title="News title"'); ?></li>
                                        <li><?= anchor('videos/gerenciar', 'Gerenciamento de Video Aulas', 'title="News title"'); ?></li>
                                    </ul>
                                </li> -->
                                <li><a><i class="fa fa-user"></i>Usuários<span
                                    class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><?= anchor('usuarios/cadastro', 'Cadastro de Usuários', 'title="News title"'); ?></li>
                                        <li><?= anchor('usuarios/gerenciar', 'Gerenciamento de Usuários', 'title="News title"'); ?></li>
                                    </ul>
                                </li>
                                
                            </div>

                        </div>

                    </div>
                </div>

                <!-- top navigation -->
                <div class="top_nav">
                    <div class="nav_menu">
                        <nav>
                            <div class="nav toggle">
                                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                            </div>

                            <ul class="nav navbar-nav navbar-right">
                                <li class="">
                                    <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown"
                                    aria-expanded="false">
                                    <img src=<?= base_url("uploads/perfil/$foto") ?> alt="..."><span
                                    class="menu-cabecalho"><?= $nome ?></span>
                                    <span class=" fa fa-angle-down"></span>
                                </a>
                                <ul class="dropdown-menu dropdown-usermenu pull-right">
                                    <li class="menu-cabecalho">
                                        <?= anchor("perfis/formulario", "<span class='glyphicon glyphicon-cog'></span> Editar meus dados"); ?>
                                    </li>
                                    <li class="menu-cabecalho">
                                        <?= anchor('login/logout', "<span class='glyphicon glyphicon-log-out'></span> Sair", array("class" => "")); ?>
                                    </li>
                                </ul>
                            </li>

                            <li role="presentation" class="dropdown">
                                <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown"
                                aria-expanded="false">
                                <i class="fa fa-envelope-o"></i>
                                <span class="badge bg-green">6</span>
                            </a>
                            <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                                <li>
                                    <a>
                                        <span class="image"><img
                                            src=<?= base_url("uploads/perfil/$foto") ?> alt="Profile
                                            Image" /></span>
                                            <span>
                                              <span>John Smith</span>
                                              <span class="time">3 mins ago</span>
                                          </span>
                                          <span class="message">
                                              Film festivals used to be do-or-die moments for movie makers. They were where...
                                          </span>
                                      </a>
                                  </li>


                              </ul>
                          </li>
                      </ul>
                  </nav>
              </div>
          </div>
          <!-- /top navigation -->

