<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script>
    window.jQuery || document.write('<script src="assets/src/js/vendor/jquery-3.3.1.min.js"><\/script>')
</script>
<script src="{{asset('assets/plugins/popper.js/dist/umd/popper.min.js')}}"></script>
<script src="{{asset('assets/plugins/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/plugins/perfect-scrollbar/dist/perfect-scrollbar.min.js')}}"></script>
<script src="{{asset('assets/plugins/screenfull/dist/screenfull.js')}}"></script>
<script src="{{asset('assets/plugins/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/plugins/jvectormap/jquery-jvectormap.min.js')}}"></script>
<script src="{{asset('assets/plugins/jvectormap/tests/assets/jquery-jvectormap-world-mill-en.js')}}"></script>
<script src="{{asset('assets/plugins/moment/moment.js')}}"></script>
<script src="{{asset('assets/plugins/tempusdominus-bootstrap-4/build/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<script src="{{asset('assets/plugins/d3/dist/d3.min.js')}}"></script>
<script src="{{asset('assets/plugins/c3/c3.min.js')}}"></script>
@yield('js')
<script src="{{asset('assets/js/tables.js')}}"></script>
<script src="{{asset('assets/js/widgets.js')}}"></script>
<script src="{{asset('assets/js/charts.js')}}"></script>
<script src="{{asset('assets/dist/js/theme.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
<script>
    (function(b, o, i, l, e, r) {
        b.GoogleAnalyticsObject = l;
        b[l] || (b[l] =
            function() {
                (b[l].q = b[l].q || []).push(arguments)
            });
        b[l].l = +new Date;
        e = o.createElement(i);
        r = o.getElementsByTagName(i)[0];
        e.src = 'https://www.google-analytics.com/analytics.js';
        r.parentNode.insertBefore(e, r)
    }(window, document, 'script', 'ga'));
    ga('create', 'UA-XXXXX-X', 'auto');
    ga('send', 'pageview');
</script>
</body>

</html>
