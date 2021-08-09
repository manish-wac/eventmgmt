        @include('user.layouts.header')

        <!-- BEGIN: Content Dynamically -->
        @yield('content')
        <!-- END: Content -->

        <script type="text/javascript" src="{{asset('assets/theme/build/scripts/mandatory.js')}}"></script>
		<script type="text/javascript" src="{{asset('assets/theme/build/scripts/core.js')}}"></script>
		<script type="text/javascript" src="{{asset('assets/theme/build/scripts/vendor.js')}}"></script>
		<script type="text/javascript" src="{{asset('assets/js/main.js')}}"></script>

        <script type="text/javascript" src="{{asset('assets/js/validator-additional-methods.js')}}"></script>


        <!-- begin::Custom Js files include -->
        @stack('js')
        <!-- END: Custom Js files include -->
    </body>
</html>
