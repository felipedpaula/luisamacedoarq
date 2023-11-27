<!DOCTYPE html>
<html lang="en">
    <!-- HEAD -->
    @include('site.components.head-default')
    <!-- END HEAD -->

    <body>
        <!-- HEADER -->
        @include('site.components.header')
        <!-- END HEADER -->

        <!-- CONTENT -->
        @yield('content')
        <!-- END CONTENT -->

        <!-- FOOTER -->
        @include('site.components.footer')
        <!-- FOOTER -->
    </body>

</html>
