<?php  require ("includes/customernav.php"); ?>
<?php  require ("includes/header.php"); ?>

<div class="clearfix"></div>
<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumb-->
        <div class="row pt-2 pb-2">
            <div class="col-sm-12">
                <h4 class="page-title">Profile Pictures of Famous People</h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javaScript:void();">Group 3</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Famouns People</li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-striped apptables">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Picture</th>
                                <th scope="col">Donwload</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php  foreach ($data as $key=>$get):   ?>
                            <tr>
                                <th scope="row"><?php echo $key + 1  ?></th>
                                <td><?php  echo $get->name ?></td>
                                <td><img class="img-circle" src="<?php  echo $get->url ?>" height="100" width="100" /></td>
                                <td><a href="<?php  echo $get->url ?>">Download</a></td>
                            </tr>
                            <?php  endforeach  ?>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>

        </div>
    </div>


    <?php  require ("includes/footer.php"); ?>
