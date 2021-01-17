<!DOCTYPE html>
<html>

    @include('layouts.header_scripts')
    

<body class="">

    <div id="wrapper">

        @include('layouts.side_nav')


        <div id="page-wrapper" class="gray-bg">
            @include('layouts.top_bar')

            @include('layouts.breadcrum')

            <div class="wrapper wrapper-content">
                @yield('content')
            </div>

            
            <div class="footer">
                {{-- <div class="float-right">
                    10GB of <strong>250GB</strong> Free.
                </div> --}}
                <div>
                    Copyrights <strong>2020</strong>
                </div>
            </div>

        </div>
        </div>

        @include('layouts.footer_scripts')

        @stack('footer_scripts')
        <div id="modal-div"></div>

</body>

</html>
