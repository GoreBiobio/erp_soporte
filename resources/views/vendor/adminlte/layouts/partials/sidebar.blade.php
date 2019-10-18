<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        @if(! Auth::guest())

        @endif
        <ul class="sidebar-menu">
            <li class="header">PANEL GENERAL</li>
            <li><a href="/"><i class='fa fa-dashboard'></i> <span>Panel General</span></a></li>
            <li class="header">ALERTAS</li>
            <li>
                <a href="/Mensajeria">
                    <i class="fa fa-warning"></i> <span>Alertas</span>
                    <span class="pull-right-container">
                    <small class="label pull-right bg-yellow">12</small>
                    </span>
                </a>
            </li>
            <li class="treeview">
                <a href="#"><i class='fa fa-info'></i> <span>Incidencias</span> <i
                            class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="/Incidencia/Nuevo">Gestión Incidencia</a></li>
                </ul>
            </li>
            <li class="header">SISTEMA</li>
            <!-- Optionally, you can add icons to the links -->
            <li class="active"><a href="{{ url('home') }}"><i class='fa fa-home'></i> <span>Inicio</span></a></li>
            <li class="treeview">
                <a href="#"><i class='fa fa-users'></i> <span>Recursos Humanos</span> <i
                            class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="/Funcionarios/Nuevo">Gestión Funcionarios</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#"><i class='fa fa-archive'></i> <span>Inventario Informática</span> <i
                            class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="/Inventarios/Hardware">Gestión Hardware</a></li>
                    <li><a href="/Inventarios/Auditar">Auditar Inventario</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#"><i class='fa fa-random'></i> <span>Comodatos Internos</span> <i
                            class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="/Comodatos/EnlazarHard">Enlazar Hardware / Persona</a></li>
                    <li><a href="/Comodatos/Auditar">Auditar Comodatos</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#"><i class='fa fa-server'></i> <span>Soporte Hardware</span> <i
                            class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    @if(Auth::user()->level == 1)
                        <li><a href="/Soporte/JefaturaSW">Gestión Jefatura</a></li>
                    @endif
                    <li><a href="/Soporte/Gestion">Gestionar Soportes Hardware</a></li>
                    <li><a href="/Soporte/ArchivoHW">Archivos Soporte Hardware</a></li>

                </ul>
            </li>
            <li class="treeview">
                <a href="#"><i class='fa fa-laptop'></i> <span>Soporte Software</span> <i
                            class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    @if(Auth::user()->level == 1)
                        <li><a href="/Soporte/JefaturaHW">Gestión Jefatura</a></li>
                    @endif
                    <li><a href="/Soporte/GestionServicios">Gestionar Soportes Servicios</a></li>
                    <li><a href="/Soporte/ArchivoSW">Archivos Soporte Software</a></li>

                </ul>
            </li>

            <li class="header">GENERAL</li>
            <li class="treeview">
                <a href="#"><i class='fa fa-gears'></i> <span>Configuraciones</span> <i
                            class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="/Proximamente">General</a></li>
                </ul>
            </li>
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
