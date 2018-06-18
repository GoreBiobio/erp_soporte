<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        @if (! Auth::guest())
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="{{ Gravatar::get($user->email) }}" class="img-circle" alt="User Image"/>
                </div>
                <div class="pull-left info">
                    <p><small><small>{{ Auth::user()->name }}</small></small></p>
                    <!-- Status -->
                    <a href="#"><i class="fa fa-circle text-success"></i> Habilitado
                    </a>
                </div>
            </div>
    @endif

    <!-- search form (Optional) -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control"
                       placeholder="{{ trans('adminlte_lang::message.search') }}..."/>
                <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i
                            class="fa fa-search"></i></button>
              </span>
            </div>
        </form>
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header">ALERTAS</li>

            <li>
                <a href="/Mensajeria">
                    <i class="fa fa-envelope-o"></i> <span>Mensajería</span>
                    <span class="pull-right-container">
                    <small class="label pull-right bg-yellow">12</small>
                    </span>
                </a>
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
                <a href="#"><i class='fa fa-archive'></i> <span>Inventario</span> <i
                            class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="/Inventarios/Hardware">Gestión Hardware</a></li>
                    <li><a href="/Inventarios/Software">Gestión Software</a></li>
                    <li><a href="/Inventarios/Auditar">Auditar Inventario</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#"><i class='fa fa-random'></i> <span>Comodatos</span> <i
                            class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="/Comodatos/EnlazarHard">Enlazar Hardware / Persona</a></li>
                    <li><a href="/Comodatos/EnlazarSoft">Enlazar Software / Persona</a></li>
                    <li><a href="/Comodatos/Auditar">Auditar Comodatos</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#"><i class='fa fa-user'></i> <span>Soporte</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="/Soporte/Nuevo">Nuevo Soporte</a></li>
                    <li><a href="/Soporte/Gestion">Gestionar Soportes</a></li>
                    <li><a href="/Soporte/Archivo">Archivo Soportes</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#"><i class='fa fa-wrench'></i> <span>Mantenciones</span> <i
                            class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="/Mantencion/Nuevo">Nueva Mantención</a></li>
                    <li><a href="/Mantencion/Gestion">Gestionar Mantenciones</a></li>
                    <li><a href="/Mantencion/Archivo">Archivo Mantenciones</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#"><i class='fa fa-user-secret'></i> <span>Jefatura</span> <i
                            class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="#">Archivo</a></li>
                    <li><a href="#">Reportes</a></li>
                </ul>
            </li>
            <li class="header">GENERAL</li>
            <li class="treeview">
                <a href="#"><i class='fa fa-gears'></i> <span>Configuraciones</span> <i
                            class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="#">General</a></li>
                </ul>
            </li>
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
