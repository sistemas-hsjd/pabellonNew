<!DOCTYPE html>
<html lang="es-cl">
<!-- For RTL verison -->
<!-- <html lang="en" dir="rtl"> -->
    @include('modulos.header')
  <body class="layout-fixed">
    <div class="wrapper">
        @include('modulos.navbar')
        @include('modulos.sidebar')
        <!-- Main content -->
        <main class="content-wrapper" id="app">
                {{-- <div class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                        <div class="col-sm-6">
                            <div class="fs-3">Indicadores de Gestión - Protocolos Pendientes</div>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-end">
                                <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                            </ol>
                        </div>
                        </div>
                    </div>
                </div> --}}

                <div class="content">
                    <div class="container-fluid">
                        <!-- Small boxes (Stat box) -->
                  
                        <!-- /.row -->
                        <!-- Main row -->
                        <div class="row">
                            <div class="col-md-12">
                                @yield('contenido')
                            </div>
                        </div>
                        <!-- /.row (main row) -->
                    </div>
                </div>
        </main>
        <!-- /.content-wrapper -->

      @include('modulos.footer')

    </div>
    <!--  ./wrapper -->
    <!-- AdminLTE App -->
    <script src="js/bootstrap.bundle.min.js"></script>
    @vite(['resources/assets/js/adminlte.js', 'resources/js/app.js'])
 

    <!-- OPTIONAL SCRIPTS -->
    <script>
        const SELECTOR_SIDEBAR = '.sidebar'
        const Default = {
            scrollbarTheme: 'os-theme-light',
            scrollbarAutoHide: 'leave'
        }
        document.addEventListener("DOMContentLoaded", function() {
            if (typeof OverlayScrollbars !== 'undefined') {
                OverlayScrollbars(document.querySelectorAll(SELECTOR_SIDEBAR), {
                    className: Default.scrollbarTheme,
                    sizeAutoCapable: true,
                    scrollbars: {
                    autoHide: Default.scrollbarAutoHide,
                    clickScrolling: true
                    }
                })
            }
        })
 
    </script>
 
  </body>
</html>
