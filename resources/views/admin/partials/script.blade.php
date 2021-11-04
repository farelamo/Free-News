<!-- Javascripts -->
<script src="{{ asset('admin/assets/plugins/jquery/jquery-3.4.1.min.js') }}"></script>
<script src="{{ asset('admin/assets/plugins/bootstrap/popper.min.js') }}"></script>
<script src="{{ asset('admin/assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('admin/assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
<script src="{{ asset('admin/assets/plugins/select2/js/select2.full.min.js') }}"></script>
<script src="{{ asset('admin/assets/js/connect.min.js') }}"></script>
<script src="{{ asset('admin/assets/js/pages/select2.js') }}"></script>
<script src="{{ asset('admin/assets/plugins/DataTables/datatables.min.js') }}"></script>
<script src="{{ asset('admin/assets/js/pages/datatables.js') }}"></script>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
  $(document).ready(function () {
    $('#myTable').DataTable({
      "aLengthMenu": [[5, 10, 15, -1], [5, 10, 15, "All Pages"]],
      "pageLength": 5
    });
  });
  </script>