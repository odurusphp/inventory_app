<?php  require ("includes/customernav.php"); ?>
<?php  require ("includes/header.php"); ?>

    <style>

        .table-responsive {
            display: block;
        }

    </style>

    <div class="clearfix"></div>
    <div class="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumb-->
        <div class="row pt-2 pb-2">
            <div class="col-sm-8">
                <h4 class="page-title"><?php echo $data['voterdata'][0]->pollingstation .' : '. count($data['voterdata']) ?></h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javaScript:void();">Stations</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Electoral Polling Stations</li>
                </ol>
            </div>
            <div class="col-sm-4">
                <a href="/pages/csv/<?php echo  trim($data['voterdata'][0]->pollingcode);  ?>" class="btn btn-danger pull-right">Download</a>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <table class="table table-striped apptables display " width="100%" >
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Voter ID</th>
                                <th scope="col">Age</th>
                                <th scope="col">Sex</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php  foreach ($data['voterdata'] as $key=>$get):   ?>
                                <tr>
                                    <td width="1%"><?php  echo $key+1 ?></td>
                                    <td><?php echo $get->name  ?></td>
                                    <td><?php echo $get->votersid ?></td>
                                    <td><?php echo $get->age  ?></td>
                                    <td><?php echo $get->sex  ?></td>
                                </tr>
                            <?php  endforeach;  ?>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>

        </div>
    </div>


<?php  require ("includes/footer.php"); ?>