   <!-- jQuery -->
   <script src="../../assets/plugins/jquery/jquery.min.js"></script>
   <!-- jQuery UI 1.11.4 -->
   <script src="../../assets/plugins/jquery-ui/jquery-ui.min.js"></script>
   <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
   <script>
       $.widget.bridge('uibutton', $.ui.button)
   </script>
   <!-- Bootstrap 4 -->
   <script src="../../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
   <!-- Sparkline -->
   <script src="../../assets/plugins/sparklines/sparkline.js"></script>
   <!--   Core JS Files   -->
   <script src="../../assets/js/core/popper.min.js"></script>
   <script src="../../assets/js/core/bootstrap.min.js"></script>
   <script src="../../assets/js/plugins/perfect-scrollbar.min.js"></script>
   <script src="../../assets/js/plugins/smooth-scrollbar.min.js"></script>
   <script src="../../assets/js/plugins/chartjs.min.js"></script>
   <script src="../../assets/js/plugins/swiper-bundle.min.js" type="text/javascript"></script>
   <!-- Github buttons -->
   <script async defer src="https://buttons.github.io/buttons.js"></script>
   <!-- Control Center for Corporate UI Dashboard: parallax effects, scripts for the example pages etc -->
   <script src="../../assets/js/corporate-ui-dashboard.min.js?v=1.0.0"></script>
   <!--   Core JS Files   -->
   <script src="../../assets/js/core/popper.min.js"></script>
   <script src="../../assets/js/core/bootstrap.min.js"></script>
   <script src="../../assets/js/plugins/perfect-scrollbar.min.js"></script>
   <script src="../../assets/js/plugins/smooth-scrollbar.min.js"></script>
   <script src="../../assets/js/plugins/chartjs.min.js"></script>
   <script src="../../assets/js/plugins/swiper-bundle.min.js" type="text/javascript"></script>
   <!-- SweetAlert2 -->
   <script src="../../assets/plugins/sweetalert2/sweetalert2.min.js"></script>
   <!-- Toastr -->
   <script src="../../assets/plugins/toastr/toastr.min.js"></script>
   <?php @session_start();
    if ($_SESSION['level'] == 'admin') { ?>

       <!-- DataTables  & Plugins -->
       <script src="../../assets/plugins/datatables/jquery.dataTables.min.js"></script>
       <script src="../../assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
       <script src="../../assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
       <script src="../../assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
       <script src="../../assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
       <script src="../../assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
       <script src="../../assets/plugins/jszip/jszip.min.js"></script>
       <script src="../../assets/plugins/pdfmake/pdfmake.min.js"></script>
       <script src="../../assets/plugins/pdfmake/vfs_fonts.js"></script>
       <script src="../../assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
       <script src="../../assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
       <script src="../../assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

       <script>
           $(function() {
               $("#dataTablesNya").DataTable({
                   "responsive": true,
                   "lengthChange": false,
                   "autoWidth": false,
                   "buttons": ["excel", "pdf", "print"]
               }).buttons().container().appendTo('#dataTablesNya_wrapper .col-md-6:eq(0)');
               $('#example2').DataTable({
                   "paging": true,
                   "lengthChange": false,
                   "searching": false,
                   "ordering": true,
                   "info": true,
                   "autoWidth": false,
                   "responsive": true,
               });
           });
       </script>
   <?php } ?>