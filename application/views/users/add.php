<!DOCTYPE html>
<html>
    <head>
        <title>ci3school.com</title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-sm-3 sidebar">
                    <h3>&nbsp;</h3>
                    <ul class="nav nav-sidebar">
                        <li><a href="<?php echo base_url('users');?>">All Users</a></li>
                        <li><a href="<?php echo base_url('users/add');?>" style="background: #428bca;color:#fff;">Add New User</a></li>
                    </ul>
                </div>
                <div class="col-sm-6">
                    <h3 class="text-center">Add New User</h3>
                    <form action="" method="POST">
                        <?php if ($this->session->flashdata('msg')): ?>
                            <div class="alert alert-success alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <?php echo $this->session->flashdata('msg'); ?>
                            </div>
                        <?php endif; ?>
                        <?php if ($this->session->flashdata('error')): ?>
                            <div class="alert alert-danger alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <?php echo $this->session->flashdata('error'); ?>
                            </div>
                        <?php endif; ?>
                        <?php if(validation_errors()): ?>
                        <div class="alert alert-danger">
                            <ol><?php echo validation_errors('<li>', '</li>');?></ol>
                        </div>
                        <?php endif; ?>
                        <div class="form-group">
                            <label for="FirstName">First Name</label>
                            <input type="text" class="form-control" name="FirstName" id="FirstName" placeholder="Enter First Name" value="<?php echo set_value('FirstName'); ?>" />
                        </div>
                        <div class="form-group">
                            <label for="LastName">Last Name</label>
                            <input type="text" class="form-control" name="LastName" id="LastName" placeholder="Enter Last Name" value="<?php echo set_value('LastName'); ?>" />
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="text" class="form-control" name="phone" id="FirstName" placeholder="Enter Phone" value="<?php echo set_value('phone'); ?>" />
                        </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <textarea class="form-control" name="address" id="address" placeholder="Enter Address" rows="5"><?php echo set_value('address'); ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="city">City</label>
                            <input type="text" class="form-control" name="city" id="city" placeholder="Enter City" value="<?php echo set_value('city'); ?>" />
                        </div>
                        <div class="form-group">
                            <label for="country">Country</label>
                            <input type="text" class="form-control" name="country" id="country" placeholder="Enter Country" value="<?php echo set_value('country'); ?>" />
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" name="submit" value="Save" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </body>
</html>