<?php
$userRole = @$data['userrole'];
$record = @$data['record'][0];
            // var_dump(@$record->role);
// die(var_dump($userRole[0]->role));

?>


        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid goTopSmall">
                <div class="page-titles">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
						<li class="breadcrumb-item active"><a href="javascript:void(0)">Add user </a></li>
					</ol>
                </div>
                <!-- row -->


                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Add User</h4>                            
                            </div>
                            
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-6 col-sm-6 col-12">
                                        <div id="lerror_login" style="width:100%; color:white; text-align: center; margin: 5px"></div>
                                        <form>
                                            <div class="form-group">
                                                <label for="fullname">Fullname</label>
                                                <input type="text" class="form-control" id="fullname" value="<?php echo @$record->fullname; ?>" placeholder="John Doe">
                                            </div>
                                            <div class="form-group">
                                                <label for="username">Username</label>
                                                <input type="text" class="form-control" id="username" disabled value="<?php echo @$record->username; ?>" placeholder="John">
                                            </div>
                                            <div class="form-group">
                                                <label for="email">Email</label>
                                                <input type="email" class="form-control" id="email" value="<?php echo @$record->email; ?>" placeholder="john@dow.com">
                                            </div>
                                            <div class="form-group">
                                                <label for="password">Password</label>
                                                <input type="password" class="form-control" id="password" placeholder="xxxxxxx">
                                            </div>
                                            <div class="form-group">
                                                <label for="role">Role</label>
                                                <select class="form-control" id="role">
                                             

<?php if (@$userRole) {
    foreach (@$userRole as $key) {
        if (@$record->role === $key->role) {
            ?>
		                              <option selected value="<?php echo $key->role; ?>"><?php echo $key->role; ?> </option>
		                              <?php
        } else {
            ?>
		                              <option value="<?php echo $key->role; ?>"><?php echo $key->role; ?></option>
		                              <?php
        }
    }
} ?>
                                                </select>
                                            </div>
                                            <button type="submit" class="btn btn-primary btn-lg update_account_click">Update Profile</button>
                                        </form>
                                    </div>
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
