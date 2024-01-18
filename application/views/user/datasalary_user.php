

       

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Employees Salary Tables</h1>
                    

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Tables</h6><br>
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
                                        </tr>
                                        <?php endforeach;?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

           