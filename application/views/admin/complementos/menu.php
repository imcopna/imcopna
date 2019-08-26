<?php //var_debug($this->user) ?>
<nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav metismenu" id="side-menu">
                    <li class="nav-header">
                        <div class="dropdown profile-element"> <span>
                            <img alt="image" class="img-circle" src="<?php echo base_url('assets/admin/img/usuario.jpg')?>" />
                             </span>
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold"><?php  echo $this->conf->Nombre." ".$this->conf->Paterno." ".$this->conf->Materno ; ?></strong>
                             </span> <span class="text-muted text-xs block"><?php echo $this->tipo_persona->Nombre ?> <b class="caret"></b></span> </span> </a>
                            <ul class="dropdown-menu animated fadeInRight m-t-xs">
                                <li><a href="profile.html">Mi Perfil</a></li>
                                <li><a href="mailbox.html">Buzón</a></li>
                                <li class="divider"></li>
                                <li><a href="login.html">Cerrar Sesion</a></li>
                            </ul>
                        </div>
                        <div class="logo-element">
                            IN+
                        </div>
                    </li>
                    <!-- class="active" data-toggle="tooltip" data-placement="right"-->
                      <li >
                        <a href="<?php echo base_url("admin/slide"); ?>"><i class="fa fa-picture-o"></i> <span class="nav-label">Gestor de Slider</span></a>
                      
                    </li>
                    <li >
                        <a href="<?php echo base_url("admin/eventos"); ?>"><i class="fa fa-calendar"></i> <span class="nav-label">Gestor de Eventos</span></a>
                       
                    </li>
                    <li>
                        <a href="<?php echo base_url("admin/parametros");?>"><i class="fa fa-gear"></i> <span class="nav-label">Gestor de Parámetros</span> </a>
                      
                    </li>
                     <li>
                        <a href="<?php echo base_url("admin/usuario"); ?>"><i class="fa fa-users"></i> <span class="nav-label">Gestor de Usuarios</span></a>   
                    </li>
                     <li>
                        <a href="index.html"><i class="fa fa-th-large"></i> <span class="nav-label">Chat</span> </a>
                     
                    </li>
                  
                   
                </ul>

            </div>
        </nav>