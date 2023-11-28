<!DOCTYPE html>
<html lang="en">
    <!-- HEAD -->
    @include('site.components.head-default')
    <!-- END HEAD -->

    <body>
        <div class="page-wrapper">
            <!-- HEADER -->
            @include('site.components.header')
            <!-- END HEADER -->

            <!-- CONTENT -->
            @yield('content')
            <!-- END CONTENT -->

            <!-- FOOTER -->
            @include('site.components.footer')
            <!-- FOOTER -->
        </div>
    </body>

</html>
