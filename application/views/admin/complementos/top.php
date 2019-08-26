 <div id="page-wrapper" class="gray-bg dashbard-1">
        <div class="row border-bottom">
        <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>

        </div>
            <ul class="nav navbar-top-links navbar-right">
                <li>
                    <span class="m-r-sm text-muted welcome-message">Bienvenido a la administración del portal web <b>Iglesia Misionera Casa de Oración Para todas las Naciones </b></span>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                        <i class="fa fa-envelope"></i>  <span class="label label-warning">1</span>
                    </a>
                   
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                        <i class="fa fa-bell"></i>  <span class="label label-primary">1</span>
                    </a>
                  
                </li>


                <li>
                    <a href="<?php echo base_url("admin/Login/logout"); ?>">
                        <i class="fa fa-sign-out"></i> Cerrar Sesion
                    </a>
                </li>
                
            </ul>

        </nav>
        </div>
        

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2><?php echo $titulo ?></h2>
        <ol class="breadcrumb">
            <li>
                <a href="<?php echo base_url("admin/dashboard/"); ?>">Inicio</a>
            </li>
            <li class="active">
                <strong><?php echo $titulo ?></strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">

    </div>
</div>

        <div class="row">
            <div class="col-lg-12">
                <div class="wrapper wrapper-content">
                        <div class="row">