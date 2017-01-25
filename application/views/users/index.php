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
                        <li><a href="<?php echo base_url('users');?>" style="background: #428bca;color:#fff;">All Users</a></li>
                        <li><a href="<?php echo base_url('users/add');?>">Add New User</a></li>
                    </ul>
                </div>
                <div class="col-sm-9">
                    <h3 class="text-center">List of all Users</h3>
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
                    <table class="table table-hover table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Sr. No.</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>City</th>
                                <th>Country</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1;
                            foreach ($users as $user): ?>
                                <tr>
                                    <td><?php echo $i + $this->uri->segment(2); ?></td>
                                    <td><?php echo $user->FirstName; ?></td>
                                    <td><?php echo $user->LastName; ?></td>
                                    <td><?php echo $user->phone; ?></td>
                                    <td><?php echo $user->address; ?></td>
                                    <td><?php echo $user->city; ?></td>
                                    <td><?php echo $user->country; ?></td>
                                    <td><a href="<?php echo base_url('users/edit/' . $user->id.'/'.$this->uri->segment(2)); ?>">Edit</a> | <a href="<?php echo base_url('users/delete/' . $user->id.'/'.$this->uri->segment(2)); ?>">Delete</a></td>
                                </tr>
                            <?php $i++; endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <div class="col-sm-3"></div>
                <div class="col-sm-9">
                    <ul class="pagination">
                        <?php echo $pagination; ?>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </body>
</html>