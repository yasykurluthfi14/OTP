

       

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Company Tables</h1>
                    

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
                                            <th>No.</th>
                                            <th>Company</th>
                                            <th>Address</th>
                                            <th>Start Date</th>    
                                                                                  
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No.</th>
                                            <th>Company</th>
                                            <th>Address</th>
                                            <th>Start Date</th>
                                           
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

           