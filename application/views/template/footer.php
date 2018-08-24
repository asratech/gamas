		<footer class="page-footer white">
			<div class="footer-copyright blue darken-2">
				<div class="container center">
					G.A Management System (GAMAS) v.1.0 - Copyright &copy; <a class="white-text text-lighten-3" href="mailto:sopian.ahmad@suzuki-mobil.co.id">IT SBT Group</a>
				</div>
			</div>
		</footer>
		<div class="fixed-action-btn horizontal">
    		<a class="btn-floating btn-large red tooltipped" data-position="top" data-tooltip="User Menu">
      			<i class="material-icons">menu</i>
    		</a>
				<ul>
					<li><a class="btn-floating red tooltipped" data-position="top" data-tooltip="Logout" href="<?php echo base_url('auth/logout'); ?>"><i class="material-icons">exit_to_app</i></a></li>
					<li><a class="btn-floating green tooltipped" data-position="top" data-tooltip="Ganti Password" href="<?php echo base_url('profile#password-tab'); ?>"><i class="material-icons">verified_user</i></a></li>
					<li><a class="btn-floating blue tooltipped" data-position="top" data-tooltip="User Profile" href="<?php echo base_url('profile'); ?>"><i class="material-icons">face</i></a></li>
				<ul>
		</div>
		<!--  Scripts-->
		<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
		<script src="<?php echo base_url('assets/plugins/tinymce/tinymce.min.js'); ?>"></script>
		<script src="<?php echo base_url('assets/materialize/js/materialize.js'); ?>"></script>
		<script src="<?php echo base_url('assets/js/kcdev.js'); ?>"></script>
		<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-lite/1.1.0/material.min.css">
		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.material.min.css">
		<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
		<script type="text/javascript">
			$(document).ready(function() {
    		$('#data-table').DataTable( {
        	columnDefs: [
            	{
                targets: [ 0, 1, 2 ],
                className: 'mdl-data-table__cell--non-numeric'
            	}
        	]
    			} );
			} );
		</script>
  	</body>
</html>
