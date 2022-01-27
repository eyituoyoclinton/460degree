<?php
$useractivity = @$data['usertransaction'];

?>


        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid goTopSmall">
                <div class="page-titles">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
						<li class="breadcrumb-item active"><a href="javascript:void(0)">All Activities </a></li>
					</ol>
                </div>
                <!-- row -->


                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Activities List</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example" class="display min-w850">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Transaction</th>
                                                <th>Date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php if (@$useractivity) {
    foreach ($useractivity as $key) {
        ?>
                                            <tr>
                                                <td><?php echo @$_SESSION['fullname']; ?></td>
                                                <td><?php echo @$key->transaction; ?></td>
                                                <td><?php echo @$key->created; ?> </td>
                                                <td>
													<div class="d-flex">
                                                        <a href="#" id="delete<?php echo @$key->id; ?>" data-id="<?php echo @$key->id; ?>"
                                                        data-name="<?php echo @$_SESSION['fullname']; ?>" class="btn btn-primary shadow btn-sm delete_click">Delete</a>
													</div>												
												</td>
                                            </tr>
                                            <?php
    }
} ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
				</div>
            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->

        

        <script src="<?php echo base_url(); ?>/assets/app-js/add_account.js"></script>