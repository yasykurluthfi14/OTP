

       

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Employees Tables</h1>
                    

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
                                            <th>Username</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone Number</th>
                                            <th>Status</th>                           
                                        </tr>
                                    </thead>
                                   
                                    <tbody>
                                        <?php 
                                            $no=0;
                                            foreach ($user->result() as $datas):
                                            $no++;
                                        ?>
                                        <tr>
                                            <td><?php echo $datas->username ?></td>
                                            <td><?php echo $datas->name ?></td>
                                            <td><?php echo $datas->email ?></td>
                                            <td><?php echo $datas->phone_number?></td>
                                            <td><?php echo $datas->role?></td>
                                        </tr>
                                        <?php endforeach;?>
                                    </tbody>
                                </table>
                                <br>
                                <br>
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
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php 
                                            $no=0;
                                            foreach ($employees->result() as $data):
                                            $no++;
                                        ?>
                                        <tr>
                                            <td><?php echo $data->name?></td>
                                        <?php if (!empty($data->position)) {
                                            echo '<td>'.$data->position.'</td>';
                                        }else {
                                            echo '<td> # </td>';
                                        } ?>
                                        <?php if (!empty($data->office)) {
                                            echo '<td>'.$data->office.'</td>';
                                        }else {
                                            echo '<td> # </td>';
                                        } ?>
                                        <?php if (!empty($data->division)) {
                                            echo '<td>'.$data->division.'</td>';
                                        }else {
                                            echo '<td> # </td>';
                                        } ?>
                                        <?php if (!empty($data->age)) {
                                            echo '<td>'.$data->age.'</td>';
                                        }else {
                                            echo '<td> # </td>';
                                        } ?>
                                        <?php if (!empty($data->start_date)) {
                                            echo '<td>'.$data->start_date.'</td>';
                                        }else {
                                            echo '<td> # </td>';
                                        } ?>
                                        <?php if (!empty($data->status)) {
                                            echo '<td>'.$data->status.'</td>';
                                        }else {
                                            echo '<td> # </td>';
                                        } ?>
                                        <?php if (!empty($data->cuti)) {
                                            echo '<td>'.$data->cuti.'</td>';
                                        }else {
                                            echo '<td> # </td>';
                                        } ?>
                                        </tr>
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
                                    <h5 class="modal-title" id="exampleModalLabel">Add Data Employees</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div> 
                               
                                <div class="modal-body">
                                    <form action="<?php echo base_url().'User/add_employee';?>" method="POST">
                                            <input type="hidden" class="form-control" name="id_employee">
                                        <div class="form-group">
                                            <label for="exampleFormControlInput1">Name</label>
                                            <input type="text" class="form-control" readonly value="<?php echo $datas->name ?>" name="name">
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

           