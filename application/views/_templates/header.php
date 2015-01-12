<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>AdminLTE | Dashboard</title>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="http://code.jquery.com/ui/1.11.1/jquery-ui.min.js" type="text/javascript"></script>

        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="http://code.ionicframework.com/ionicons/1.5.2/css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- Morris chart -->
        <link href="<?=PATH_PUBLIC?>css/morris/morris.css" rel="stylesheet" type="text/css" />
        <!-- jvectormap -->
        <link href="<?=PATH_PUBLIC?>css/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
        <!-- Date Picker -->
        <link href="<?=PATH_PUBLIC?>css/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
        <!-- Daterange picker -->
        <link href="<?=PATH_PUBLIC?>css/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
        <!-- bootstrap wysihtml5 - text editor -->
        <link href="<?=PATH_PUBLIC?>css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="<?=PATH_PUBLIC?>css/AdminLTE.css" rel="stylesheet" type="text/css" />
        
        <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
        
        <link href="<?=PATH_PUBLIC?>css/timepicker/bootstrap-timepicker.min.css" rel="stylesheet"/>

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
<style>
.input_container ul {
        width: 100%;
	border: 1px solid #eaeaea;
	position: absolute;
	z-index: 9;
	background: #f3f3f3;
	list-style: none;
}
.input_container ul li {
	padding: 2px;
        
}
.input_container ul li:hover {
	background: #eaeaea;
}
#country_list_id {
	display: none;
}
    
</style>
    </head>
    <body class="skin-blue">
        <!-- header logo: style can be found in header.less -->
        <header class="header">
            <a href="<?=URL?>" class="logo">
                <!-- Add the class icon to your logo image or logo icon to add the margining -->
                SIEST
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <div class="navbar-right">
                    <ul class="nav navbar-nav">                      
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="glyphicon glyphicon-user"></i>
                                <span><?=$_SESSION['usuario_nome']?><i class="caret"></i></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header bg-light-blue">
                                    <p>
                                        <?php echo $_SESSION['usuario_nome'] . ' - ' . $_SESSION['tipo_user'] ?>
                                    </p>
                                </li>
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="#" class="btn btn-default btn-flat">Perfil</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="<?=URL?>/login/logout" class="btn btn-default btn-flat">Sair</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="left-side sidebar-offcanvas">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="pull-left image">
                            <img src="img/avatar3.png" class="img-circle" alt="User Image" />
                        </div>
                        <div class="pull-left info">
                            <p>Olá, Márcio</p>

                            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                        </div>
                    </div>
                    <!-- search form -->
                    <form action="#" method="get" class="sidebar-form">
                        <div class="input-group">
                            <input type="text" name="q" class="form-control" placeholder="Search..."/>
                            <span class="input-group-btn">
                                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                            </span>
                        </div>
                    </form>
                    <!-- /.search form -->
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
                        <li class="active">
                            <a href="index.html">
                                <i class="fa fa-dashboard"></i> <span>Painel de controle</span>
                            </a>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-archive"></i>
                                <span>Estágios</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="<?=URL?>estagios"><i class="fa fa-angle-double-right"></i> Listar</a></li>
                                <li><a href="<?=URL?>estagios/add"><i class="fa fa-angle-double-right"></i> Cadastrado</a></li>
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-book"></i>
                                <span>Professores</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="<?=URL?>professores"><i class="fa fa-angle-double-right"></i> Listar</a></li>
                                <li><a href="<?=URL?>professores/add"><i class="fa fa-angle-double-right"></i> Cadastrar</a></li>
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-users"></i> <span>Alunos</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="<?=URL?>alunos"><i class="fa fa-angle-double-right"></i>Listar</a></li>
                                <li><a href="<?=URL?>alunos/add"><i class="fa fa-angle-double-right"></i>Cadastrar</a></li>
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-building-o"></i> <span>Instituições</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="<?=URL?>instituicoes"><i class="fa fa-angle-double-right"></i> Listar</a></li>
                                <li><a href="<?=URL?>instituicoes/add"><i class="fa fa-angle-double-right"></i> Cadastrar</a></li>
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-building-o"></i> <span>Supervisores Técnicos</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="<?=URL?>supervtecnicos"><i class="fa fa-angle-double-right"></i> Listar</a></li>
                                <li><a href="<?=URL?>supervtecnicos/add"><i class="fa fa-angle-double-right"></i> Cadastrar</a></li>
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-certificate"></i> <span>Cursos</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="<?=URL?>cursos"><i class="fa fa-angle-double-right"></i> Listar</a></li>
                                <li><a href="<?=URL?>cursos/add"><i class="fa fa-angle-double-right"></i> Cadastrar</a></li>
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-certificate"></i> <span>Usuários</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="<?=URL?>usuarios/"><i class="fa fa-angle-double-right"></i> Listar</a></li>
                                <li><a href="<?=URL?>usuarios/add"><i class="fa fa-angle-double-right"></i> Cadastrar</a></li>
                            </ul>
                        </li>
                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>
            
            <!-- INICIO DO CABEÇALHO DO CONTEÚDO-->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <?php $this->getFlash() ?>
                    <h1>
                                            
                    </h1>
                    <!--<ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="#">Forms</a></li>
                        <li class="active">Alunos</li>
                    </ol>-->
                </section>
            