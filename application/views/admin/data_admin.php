

       

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Admin Tables</h1>
                    

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Tables</h6><br>
                            <li><a href="" data-toggle="modal" data-target="#ModalAdd"><span class="btn btn-warning btn-circle btn-sm"><i class="fas fa-plus"></i></span></a></li>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Username</th>
                                            <th>Name</th>
                                            <th>Email</th> 
                                            <th>Phone Number</th>
                                            <th>Action</th>                                      
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No.</th>
                                            <th>Username</th>
                                            <th>Name</th>
                                            <th>Email</th> 
                                            <th>Phone Number</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php 
                                            $no=0;
                                            foreach ($admin->result() as $data):
                                            $no++;
                                        ?>
                                        <tr>
                                            <td><?php echo $no?></td>
                                            <td><?php echo $data->username?></td>
                                            <td><?php echo $data->name?></td>
                                            <td><?php echo $data->email?></td>
                                            <td><?php echo $data->phone_number?></td>
                                            <td>
                                                <li><a href="" data-toggle="modal" data-target="#ModalEdit1<?php echo $data->id_user;?>"><span class="btn btn-success btn-circle btn-sm"><i class="fas fa-edit"></i></span></a></li>
                                                <li><a href="" data-toggle="modal" data-target="#ModalDelete<?php echo $data->id_user;?>"><span class="btn btn-danger btn-circle btn-sm"><i class="fas fa-trash"></i></span></a></li>          
                                            </td>
                                        </tr>
                                        <div class="modal fade" id="ModalEdit1<?php echo $data->id_user; ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
                                            aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Edit Data Admin</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                
                                                    <div class="modal-body">
                                                        <form action="<?php echo base_url().'Admin/update_admin';?>" method="POST">
                                                                <input type="hidden" class="form-control" readonly value="<?=$data->id_user?>" name="id_user">
                                                            <div class="form-group">
                                                                <label for="exampleFormControlInput1">Username</label>
                                                                <input type="text" class="form-control" value="<?=$data->username?>" name="username">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleFormControlInput1">Name</label>
                                                                <input type="text" class="form-control" value="<?=$data->name?>" name="name">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleFormControlInput1">Email</label>
                                                                <input type="email" class="form-control" value="<?=$data->email?>" name="email">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleFormControlInput1">Phone Number</label>
                                                                <input type="text" class="form-control" value="<?=$data->phone_number?>" name="phone_number">
                                                            </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="modal fade" id="ModalDelete<?php echo $data->id_user;?>" tabindex="-1" aria-labelledby="exampleModalLabel"
                                            aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Delete Data Admin</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                
                                                    <div class="modal-body">
                                                    <form action="<?php echo base_url().'Admin/delete_admin';?>" method="POST">
                                                        <strong>Do you want to remove this admin user?</strong>
                                                        <div class="form-group">
                                                            <input type="hidden" value="<?php echo $data->id_user;?>" name="id_user" class="form-control" placeholder="" required>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                                        <button type="submit" class="btn btn-danger">Delete</button>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                        <?php endforeach;?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    


                    <div class="modal fade" id="ModalAdd" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Add Data Admin</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                               
                                <div class="modal-body">
                                    <form action="<?php echo base_url().'Admin/add_admin';?>" method="POST">
                                            <input type="hidden" class="form-control" name="id_user">
                                        <div class="form-group">
                                            <label for="exampleFormControlInput1">Username</label>
                                            <input type="text" class="form-control" name="username">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlInput1">Name</label>
                                            <input type="text" class="form-control" name="name">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlInput1">Email</label>
                                            <input type="email" class="form-control" name="email">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlInput1">Phone Number</label>
                                            <input type="text" class="form-control" name="phone_number">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlInput1">Password</label>
                                            <input type="password" class="form-control" name="password">
                                        </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Insert</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>

                   
                    

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

           