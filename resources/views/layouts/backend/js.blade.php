<!-- jQuery  -->
<script src="{{ asset('backend') }}/js/jquery.min.js"></script>
<script src="{{ asset('backend') }}/js/tether.min.js"></script><!-- Tether for Bootstrap -->
<script src="{{ asset('backend') }}/js/bootstrap.min.js"></script>
<script src="{{ asset('backend') }}/js/metisMenu.min.js"></script>
<script src="{{ asset('backend') }}/js/waves.js"></script>
<script src="{{ asset('backend') }}/js/jquery.slimscroll.js"></script>

<script src="{{ asset('backend') }}/js/ok.js"></script>
<!-- Counter js  -->
<script src="{{ asset('backend') }}/plugins/waypoints/jquery.waypoints.min.js"></script>
<script src="{{ asset('backend') }}/plugins/counterup/jquery.counterup.min.js"></script>

<!--C3 Chart-->
<script type="text/javascript" src="{{ asset('backend') }}/plugins/d3/d3.min.js"></script>
<script type="text/javascript" src="{{ asset('backend') }}/plugins/c3/c3.min.js"></script>

<!-- Required datatable js -->
<script src="{{ asset('backend') }}/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{ asset('backend') }}/plugins/datatables/dataTables.bootstrap4.min.js"></script>
<!-- Buttons examples -->

@yield('script')

<!--Echart Chart-->
<script src="{{ asset('backend') }}/plugins/echart/echarts-all.js"></script>

<!-- Dashboard init -->
<script src="{{ asset('backend') }}/pages/jquery.dashboard.js"></script>

<!-- App js -->
<script src="{{ asset('backend') }}/js/jquery.core.js"></script>
<script src="{{ asset('backend') }}/js/jquery.app.js"></script>
<script src="{{ asset('js/toastr.min.js') }}"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#datatable').DataTable();

        //Buttons examples
        var table = $('#datatable-buttons').DataTable({
            lengthChange: false,
            buttons: ['copy', 'excel', 'pdf', 'colvis']
        });

        table.buttons().container()
                .appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');
    } );

</script>
<script type="text/javascript">
    @if (session('message'))
        var alert = "{{ session('type') }}";
        var message = "{{ session('message') }}";
        switch (alert) {
          case "error":
            toastr.error(message)
            break;
          case "warning":
            toastr.warning(message)
            break;
          case "info":
            toastr.info(message)
            break;
          default:
            toastr.success(message)
            break;
        }
    @endif

  </script>


