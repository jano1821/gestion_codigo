<html>
    <head>
        <title>Menu</title>
        <style type="text/css">

            body,html{
                height: 100%;
            }

            nav.sidebar, .main{
                -webkit-transition: margin 200ms ease-out;
                -moz-transition: margin 200ms ease-out;
                -o-transition: margin 200ms ease-out;
                transition: margin 200ms ease-out;
            }

            .main{
                padding: 10px 10px 0 10px;
            }

            @media (min-width: 765px) {

                .main{
                    position: absolute;
                    width: calc(100% - 40px); 
                    margin-left: 40px;
                    float: right;
                }

                nav.sidebar:hover + .main{
                    margin-left: 200px;
                }

                nav.sidebar.navbar.sidebar>.container .navbar-brand, .navbar>.container-fluid .navbar-brand {
                    margin-left: 0px;
                }

                nav.sidebar .navbar-brand, nav.sidebar .navbar-header{
                    text-align: center;
                    width: 100%;
                    margin-left: 0px;
                }

                nav.sidebar a{
                    padding-right: 13px;
                }

                nav.sidebar .navbar-nav > li:first-child{
                    border-top: 1px #e5e5e5 solid;
                }

                nav.sidebar .navbar-nav > li{
                    border-bottom: 1px #e5e5e5 solid;
                }

                nav.sidebar .navbar-nav .open .dropdown-menu {
                    position: static;
                    float: none;
                    width: auto;
                    margin-top: 0;
                    background-color: transparent;
                    border: 0;
                    -webkit-box-shadow: none;
                    box-shadow: none;
                }

                nav.sidebar .navbar-collapse, nav.sidebar .container-fluid{
                    padding: 0 0px 0 0px;
                }

                .navbar-inverse .navbar-nav .open .dropdown-menu>li>a {
                    color: #777;
                }

                nav.sidebar{
                    width: 200px;
                    height: 100%;
                    margin-left: -160px;
                    float: left;
                    margin-bottom: 0px;
                }

                nav.sidebar li {
                    width: 100%;
                }

                nav.sidebar:hover{
                    margin-left: 0px;
                }

                .forAnimate{
                    opacity: 0;
                }
            }

            @media (min-width: 1330px) {

                .main{
                    width: calc(100% - 200px);
                    margin-left: 200px;
                }

                nav.sidebar{
                    margin-left: 0px;
                    float: left;
                }

                nav.sidebar .forAnimate{
                    opacity: 1;
                }
            }

            nav.sidebar .navbar-nav .open .dropdown-menu>li>a:hover, nav.sidebar .navbar-nav .open .dropdown-menu>li>a:focus {
                color: #CCC;
                background-color: transparent;
            }

            nav:hover .forAnimate{
                opacity: 1;
            }
            section{
                padding-left: 15px;
            }

            .navbar-custom {
                background-color: #192f42;
                color:#ffffff;
                border-radius:0;
                min-height:auto;
            }

        </style>
    </head>
    <body>
        <?= $this->getContent() ?>

        <?php
        $username = "";
        if ($this->session->has("Usuario")) {
            $usuario = $this->session->get("Usuario");
            $username=$usuario['userName'];
        }
                ?>

        <nav class="navbar navbar-default" style="background-color: #e3f2fd;">
            <div class="navbar-header">
                <button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="#" class="navbar-brand"><?php echo $username;?></a>
            </div>
            <div id="navbarCollapse" class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">Mantenimientos <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><?= $this->tag->linkTo(['cargo/index', 'Cargos']) ?></li>
                            <li><?= $this->tag->linkTo(['tipocodigo/index', 'Tipo de Codigo']) ?></li>
                            <li><?= $this->tag->linkTo(['persona/index', 'Persona']) ?></li>
                            <li><?= $this->tag->linkTo(['usuario/index', 'Usuario']) ?></li>
                            <li><?= $this->tag->linkTo(['modulo/index', 'Modulo']) ?></li>
                            <li><?= $this->tag->linkTo(['tipocodigo_modulo/index', 'Tipo Codigo Modulo']) ?></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">Códigos <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><?= $this->tag->linkTo(['catalogo_codigo/index/', 'Codigos']) ?></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">Reportes <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="">Por Tipo de Codigo</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">Datos <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="">Importar</a></li>
                            <li><a href="">Exportar</a></li>
                        </ul>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">Sesión <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><?= $this->tag->linkTo(['index/logout', 'Cerrar Sesión']) ?></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>


        <nav class="navbar navbar-default sidebar" role="navigation">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-sidebar-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>      
                </div>
                <div class="collapse navbar-collapse" id="bs-sidebar-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Mantenimientos <span class="caret"></span><span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-fire"></span></a>
                            <ul class="dropdown-menu forAnimate" role="menu">
                                <li><?= $this->tag->linkTo(['cargo/index', 'Cargos']) ?></li>
                                <li><?= $this->tag->linkTo(['tipocodigo/index', 'Tipo de Codigo']) ?></li>
                                <li><?= $this->tag->linkTo(['persona/index', 'Persona']) ?></li>
                                <li><?= $this->tag->linkTo(['usuario/index', 'Usuario']) ?></li>
                                <li><?= $this->tag->linkTo(['modulo/index', 'Modulo']) ?></li>
                                <li><?= $this->tag->linkTo(['tipocodigo_modulo/index', 'Tipo Codigo Modulo']) ?></li>
                            </ul>
                        </li> 
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Codigos <span class="caret"></span><span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-eye-open"></span></a>
                            <ul class="dropdown-menu forAnimate" role="menu">
                                <li><?= $this->tag->linkTo(['catalogo_codigo/index/', 'Codigos']) ?></li>
                            </ul>
                        </li> 
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Reportes <span class="caret"></span><span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-tasks"></span></a>
                            <ul class="dropdown-menu forAnimate" role="menu">
                                <li><a href="">Por Tipo de Codigo</a></li>
                            </ul>
                        </li> 
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Contacto <span class="caret"></span><span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-earphone"></span></a>
                            <ul class="dropdown-menu forAnimate" role="menu">
                                <li><a href="">Contactanos</a></li>
                            </ul>
                        </li> 

                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Sesion <span class="caret"></span><span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-log-out"></span></a>
                            <ul class="dropdown-menu forAnimate" role="menu">
                                <li><?= $this->tag->linkTo(['index/logout', 'Cerrar Sesión']) ?></li>
                            </ul>
                        </li> 
                    </ul>
                </div>
            </div>
        </nav>

        <table>                   
            <tr>
                <td align="left">
                </td>
            </tr>  
        </table>

        <script type="text/javascript">
        </script>
    </body>
</html