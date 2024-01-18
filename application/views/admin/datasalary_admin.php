

       

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Employees Salary Tables</h1>
                    

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
                                            <th>Name</th>
                                            <th>Position</th>
                                            <th>Office</th>
                                            <th>Division</th>
                                            <th>Age</th>
                                            <th>Start date</th>
                                            <th>Status</th>
                                            <th>Cuti</th>
                                            <th>Salary</th>
                                            <th>Action</th>                                           
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Name</th>
                                            <th>Position</th>
                                            <th>Office</th>
                                            <th>Division</th>
                                            <th>Age</th>
                                            <th>Start date</th>
                                            <th>Status</th>
                                            <th>Cuti</th>
                                            <th>Salary</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php 
                                            $no=0;
                                            foreach ($salary->result() as $data):
                                            $no++;
                                        ?>
                                        <tr>
                                            <td><?php echo $data->name?></td>
                                            <td><?php echo $data->position?></td>
                                            <td><?php echo $data->office?></td>
                                            <td><?php echo $data->division?></td>
                                            <td><?php echo $data->age?></td>
                                            <td><?php echo $data->start_date?></td>
                                            <td><?php echo $data->status?></td>
                                            <td><?php echo $data->cuti?></td>
                                            <td><?php echo $data->salary?></td>
                                            <td>
                                                <li><a href="" data-toggle="modal" data-target="#ModalEdit1<?php echo $data->id_employee;?>"><span class="btn btn-success btn-circle btn-sm"><i class="fas fa-edit"></i></span></a></li>
                                                <li><a href="" data-toggle="modal" data-target="#ModalDelete<?php echo $data->id_employee;?>"><span class="btn btn-danger btn-circle btn-sm"><i class="fas fa-trash"></i></span></a></li>          
                                            </td>
                                        </tr>
                                        <div class="modal fade" id="ModalEdit1<?php echo $data->id_employee; ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
                                            aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Edit Data Employees Salary</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                
                                                    <div class="modal-body">
                                                        <form action="<?php echo base_url().'Admin/update_salary';?>" method="POST">
                                                                <input type="hidden" class="form-control" readonly value="<?=$data->id_employee?>" name="id_employee">
                                                            <div class="form-group">
                                                                <label for="exampleFormControlInput1">Name</label>
                                                                <input type="text" class="form-control" value="<?=$data->name?>" name="name">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleFormControlInput1">Position</label>
                                                                <input type="text" class="form-control" value="<?=$data->position?>" name="position">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleFormControlInput1">Office</label>
                                                                <input type="text" class="form-control" value="<?=$data->office?>" name="office">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleFormControlInput1">Division</label>
                                                                <input type="text" class="form-control" value="<?=$data->division?>" name="division">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleFormControlInput1">Age</label>
                                                                <input type="text" class="form-control" value="<?=$data->age?>" name="age">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleFormControlInput1">Start Date</label>
                                                                <input type="date" class="form-control" value="<?=$data->start_date?>" name="start_date">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleFormControlInput1">Status</label>
                                                                <input type="text" class="form-control" value="<?=$data->status?>" name="status">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleFormControlInput1">Cuti</label>
                                                                <input type="text" class="form-control" value="<?=$data->cuti?>" name="cuti">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleFormControlInput1">Salary</label>
                                                                <input type="text" class="form-control" value="<?=$data->salary?>" name="salary">
                                                            </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="modal fade" id="ModalDelete<?php echo $data->id_employee;?>" tabindex="-1" aria-labelledby="exampleModalLabel"
                                            aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Delete Data Employees Salary</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                
                                                    <div class="modal-body">
                                                    <form action="<?php echo base_url().'Admin/delete_salary';?>" method="POST">
                                                        <strong>Do you want to remove this employee salary?</strong>
                                                        <div class="form-group">
                                                            <input type="hidden" value="<?php echo $data->id_employee;?>" name="id_employee" class="form-control" placeholder="" required>
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
                                    <h5 class="modal-title" id="exampleModalLabel">Add Data Employees Salary</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                               
                                <div class="modal-body">
                                    <form action="<?php echo base_url().'Admin/add_salary';?>" method="POST">
                                            <input type="hidden" class="form-control" name="id_employee">
                                        <div class="form-group">
                                            <label for="exampleFormControlInput1">Name</label>
                                            <input type="text" class="form-control" name="name">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlInput1">Position</label>
                                            <input type="text" class="form-control" name="position">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlInput1">Office</label>
                                            <input type="text" class="form-control" name="office">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlInput1">Division</label>
                                            <input type="text" class="form-control" name="division">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlInput1">Age</label>
                                            <input type="text" class="form-control" name="age">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlInput1">Start Date</label>
                                            <input type="date" class="form-control" name="start_date">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlInput1">Status</label>
                                            <input type="text" class="form-control" name="status">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlInput1">Cuti</label>
                                            <input type="text" class="form-control" name="cuti">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlInput1">Salary</label>
                                            <input type="text" class="form-control" name="salary">
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

           