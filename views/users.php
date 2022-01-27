<?php
$savings = @$data['users'];
// $totalPages = @$data['totalPages'];

?>


        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid goTopSmall">
                <div class="page-titles">
                    <div class="row">
                    <div class="col-6 col-sm-6 col-md-6 col-lg-9">
                    <ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
						<li class="breadcrumb-item active"><a href="javascript:void(0)">Users </a></li>
					</ol>
                    </div>
                    <div class="col-6 col-sm-6 col-md-6 col-lg-3">
                        <a href="<?php echo base_url(); ?>/users/add" class="btn btn-primary shadow btn-sm">Add User</a>
                    </div>
                    </div>
					
                    
                </div>
                <!-- row -->


                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">User</h4>  
                            </div>
                            
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example" class="display min-w850">
                                        <thead>
                                            <tr>
                                                <th>Fullname</th>
                                                <th>Username</th>
                                                <th>Role</th>
                                                <th>Created</th>
                                                <?php if ($_SESSION['role'] === 'Super seller') { ?>
                                                <th>Update</th>
                                                <?php } ?>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php if (@$savings) {
    foreach ($savings as $key) {
        ?>
                                            <tr>
                                                <td><?php echo @$key->fullname; ?></td>
                                                <td><?php echo @$key->username; ?></td>
                                                <td><?php echo @$key->role; ?></td>
                                                <td><?php echo @$key->created; ?></td>
                                                <?php if ($_SESSION['role'] === 'Super seller') { ?>
                                                <td>
													<div class="d-flex">
                                                        <a href="<?php echo base_url(); ?>/users/update/<?php echo @$key->slug; ?>" class="btn btn-primary shadow btn-sm">Update</a>
													</div>												
												</td>
                                                <?php } ?>
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

        
        <script src="<?php echo base_url(); ?>/assets/app-js/deactivate_account.js"></script>
