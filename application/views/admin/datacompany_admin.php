

       

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Company Tables</h1>
                    

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
                                            <th>Company</th>
                                            <th>Address</th>
                                            <th>Start Date</th>    
                                            <th>Action</th>                                      
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No.</th>
                                            <th>Company</th>
                                            <th>Address</th>
                                            <th>Start Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php 
                                            $no=0;
                                            foreach ($company->result() as $data):
                                            $no++;
                                        ?>
                                        <tr>
                                            <td><?php echo $no?></td>
                                            <td><?php echo $data->company_name?></td>
                                            <td><?php echo $data->address?></td>
                                            <td><?php echo $data->start_date?></td>
                                            <td>
                                                <li><a href="" data-toggle="modal" data-target="#ModalEdit1<?php echo $data->id_company;?>"><span class="btn btn-success btn-circle btn-sm"><i class="fas fa-edit"></i></span></a></li>
                                                <li><a href="" data-toggle="modal" data-target="#ModalDelete<?php echo $data->id_company;?>"><span class="btn btn-danger btn-circle btn-sm"><i class="fas fa-trash"></i></span></a></li>          
                                            </td>
                                        </tr>
                                        <div class="modal fade" id="ModalEdit1<?php echo $data->id_company; ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
                                            aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Edit Data Company</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                
                                                    <div class="modal-body">
                                                        <form action="<?php echo base_url().'Admin/update_company';?>" method="POST">
                                                                <input type="hidden" class="form-control" readonly value="<?=$data->id_company?>" name="id_company">
                                                            <div class="form-group">
                                                                <label for="exampleFormControlInput1">Company</label>
                                                                <input type="text" class="form-control" value="<?=$data->company_name?>" name="company_name">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleFormControlInput1">Address</label>
                                                                <input type="text" class="form-control" value="<?=$data->address?>" name="address">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleFormControlInput1">Start Date</label>
                                                                <input type="date" class="form-control" value="<?=$data->start_date?>" name="start_date">
                                                            </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="modal fade" id="ModalDelete<?php echo $data->id_company;?>" tabindex="-1" aria-labelledby="exampleModalLabel"
                                            aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Delete Data Company</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                
                                                    <div class="modal-body">
                                                    <form action="<?php echo base_url().'Admin/delete_company';?>" method="POST">
                                                        <strong>Do you want to remove this company?</strong>
                                                        <div class="form-group">
                                                            <input type="hidden" value="<?php echo $data->id_company;?>" name="id_company" class="form-control" placeholder="" required>
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
                                    <h5 class="modal-title" id="exampleModalLabel">Add Data Company</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                               
                                <div class="modal-body">
                                    <form action="<?php echo base_url().'Admin/add_company';?>" method="POST">
                                            <input type="hidden" class="form-control" name="id_company">
                                        <div class="form-group">
                                            <label for="exampleFormControlInput1">Company</label>
                                            <input type="text" class="form-control" name="company_name">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlInput1">Address</label>
                                            <input type="text" class="form-control" name="address">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlInput1">Start Date</label>
                                            <input type="date" class="form-control" name="start_date">
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

           