<!DOCTYPE html>
<html lang="en">

    @include('cms.components.head-default')

    <body id="page-top">
        <!-- Page Wrapper -->
        <div id="wrapper">

            @include('cms.components.sidebar')

            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">
                <!-- Main Content -->
                <div id="content">

                    @include('cms.components.topbar')

                    <!-- Begin Page Content -->
                    <div class="container-fluid">

                        @include('cms.components.page-heading')

                        <!-- CONTEUDO DA PÁGINA -->
                        @yield('content')
                        <!-- FIM DO CONTEUDO DA PÁGINA -->

                    </div>
                    <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->

                <!-- Footer -->
                @include('cms.components.footer')

            </div>
            <!-- End of Content Wrapper -->

        </div>
        <!-- End of Page Wrapper -->


    </body>

</html>
