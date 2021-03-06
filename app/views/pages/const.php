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
            <div class="col-sm-12">
                <h4 class="page-title">REGIONS</h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javaScript:void();">Regions</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Electoral Regions</li>
                </ol>
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
                                <th scope="col">Constituency</th>
                                <th scope="col">Region</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php  foreach ($data['condata'] as $key=>$get):   ?>
                                <tr>
                                    <td width="1%"><?php  echo $key+1 ?></td>
                                    <td><?php echo $get->constituency  ?></td>
                                    <td><?php echo $get->region  ?></td>
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