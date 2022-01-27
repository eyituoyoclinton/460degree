<?php
$resellers = @$data['reseller'];

?>


        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid goTopSmall">
                <div class="page-titles">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
						<li class="breadcrumb-item active"><a href="javascript:void(0)">All Resellers </a></li>
					</ol>
                </div>
                <!-- row -->


                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Resellers</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example" class="display min-w850">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Username</th>
                                                <th>Join</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php if (@$resellers) {
    foreach ($resellers as $key) {
        ?>
                                            <tr>
                                                <td><?php echo @$key->fullname; ?></td>
                                                <td><?php echo @$key->email; ?></td>
                                                <td><?php echo @$key->username; ?></td>
                                                <td><?php echo @$key->created; ?> </td>
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