<html>
    <head>
        <title>Menu</title>
        <style type="text/css">

            * {
                margin:0px;
                padding:0px;
            }

            #header {
                margin:auto;
                width:500px;
                font-family:Arial, Helvetica, sans-serif;
            }

            ul, ol {
                list-style:none;
            }

            .nav > li {
                float:left;
            }

            .nav li a {
                background-color:#000;
                color:#fff;
                text-decoration:none;
                padding:10px 12px;
                display:block;
            }

            .nav li a:hover {
                background-color:#434343;
            }

            .nav li ul {
                display:none;
                position:absolute;
                min-width:140px;
            }

            .nav li:hover > ul {
                display:block;
            }

            .nav li ul li {
                position:relative;
            }

            .nav li ul li ul {
                right:-140px;
                top:0px;
            }

        </style>
    </head>
    <body>
        <?= $this->getContent() ?>
        <div id="header">
            <ul class="nav">
                <li><a href="#">Mantenimientos</a>
                    <ul>
                        <li><?= $this->tag->linkTo(['cargo/index', 'Cargos']) ?></li>
                        <li><?= $this->tag->linkTo(['tipocodigo/index', 'Tipo de Codigo']) ?></li>
                        <li><?= $this->tag->linkTo(['persona/index', 'Persona']) ?></li>
                        <li><?= $this->tag->linkTo(['usuario/index', 'Usuario']) ?></li>
                        <li><?= $this->tag->linkTo(['modulo/index', 'Modulo']) ?></li>
                    </ul>
                </li>
                <li><a href="">Codigos</a>
                    <ul>
                        <li><?= $this->tag->linkTo(['catalogo_codigo/index/', 'Mantenimiento de Codigos']) ?></li>
                    </ul>
                </li>
                <li><a href="">Reportes</a>
                    <ul>
                        <li><a href="">Por Tipo de Codigo</a></li>
                    </ul>
                </li>
                <li><a href="">Contacto</a></li>
            </ul>
        </div>
                <?php
                    if ($this->session->has("Usuario")) {
                        $usuario = $this->session->get("Usuario");
                        $username=$usuario['userName'];
                        echo "Cerrar sesión para  $username ";
                ?>
        <a href="<?= $this->url->get('index/logout') ?>">Cerrar Sesión</a>
                <?php
                    }
                ?>
        <table                   
            <tr>

                <td align="left">
                </td>
            </tr>  
        </table>

        <script type="text/javascript">
        </script>
    </body>
</html