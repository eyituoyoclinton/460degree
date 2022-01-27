



        <!--**********************************
            Footer start
        ***********************************-->
        <div class="footer">
            <div class="copyright">
                <p>&copy;
                    <script>
                        document.write(new Date().getFullYear() + " 460degree | All Right Reserved");
                    </script></p>
            </div>
        </div>
        <!--**********************************
            Footer end
        ***********************************-->

		<!--**********************************
           Support ticket button start
        ***********************************-->

        <!--**********************************
           Support ticket button end
        ***********************************-->


    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="<?php echo base_url(); ?>/assets/vendor/global/global.min.js"></script>
	<script src="<?php echo base_url(); ?>/assets/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
	<script src="<?php echo base_url(); ?>/assets/vendor/chart.js/Chart.bundle.min.js"></script>
    <script src="<?php echo base_url(); ?>/assets/js/custom.min.js"></script>
	<script src="<?php echo base_url(); ?>/assets/js/dlabnav-init.js"></script>
	<script src="<?php echo base_url(); ?>/assets/vendor/owl-carousel/owl.carousel.js"></script>
		
	
	<!-- Chart piety plugin files -->
    <script src="<?php echo base_url(); ?>/assets/vendor/peity/jquery.peity.min.js"></script>
	
	<!-- Apex Chart -->
	<script src="<?php echo base_url(); ?>/assets/vendor/apexchart/apexchart.js"></script>
	
	
	<!-- Dashboard 1 -->
    <script src="<?php echo base_url(); ?>/assets/js/dashboard/dashboard-1.js"></script>
    
     <!-- Datatable -->
     <!-- <script src="<?php echo base_url(); ?>/assets/vendor/datatables/js/jquery.dataTables.min.js"></script> -->
    <!-- <script src="<?php echo base_url(); ?>/assets/js/plugins-init/datatables.init.js"></script> -->
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>
    <!-- <script src="<?php echo base_url(); ?>/assets/js/pages/tables/jquery-datatable.js"></script> -->

	
</body>
</html>
<script>
$(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ],
        "pageLength": 50,
    } );
} );
</script>

<script>
   var baseURL = location.origin.indexOf('.com') > -1 ? location.origin : location.origin + '/ntask'
   var msgTimer = null;

   function showError(msg, autoHide = true) {
      if (msgTimer) {
         clearTimeout(msgTimer)
      }
      $('.flash-msg').removeClass('success')
      $('.flash-msg').addClass('error')
      $('.res-msg').text(msg)
      if (autoHide) {
         msgTimer = setTimeout(() => {
            clearMessage()
         }, 6000);
      }
   }

   function showSuccess(msg) {
      if (msgTimer) {
         clearTimeout(msgTimer)
      }
      $('.flash-msg').removeClass('error')
      $('.flash-msg').addClass('success')
      $('.res-msg').text(msg)
      msgTimer = setTimeout(() => {
         clearMessage()
      }, 6000);
   }

   function clearMessage() {
      $('.flash-msg').removeClass('error')
      $('.flash-msg').removeClass('success')
   }

//    $('#example').dataTable( {
//     "pageLength": 50
//     } );
</script>


