<?php

class Pages extends Controller{


    public function dashboard(){
        new Guard();
        $today  = date('Y-m-d');
        $allproducts = Invoices::getpurchasestoday();
        $productcount = Product::getProductCount();
        $outofstock = Product::getoutofstockcount();
        $totalpayments = Payments::getTotalPayments();
        $totalpaymentstoday = Payments::getTotalPaymentstoday();

        $totalrefundtoday = Refund::getTotalByInvoiceRefundToday();
        $totaltoday = $totalpaymentstoday - $totalrefundtoday;

        $outofstockdata = Product::listoutofstockcount();
        $paymentstoday = Payments::listAllPaymentstoday();
        //$refundtoday  = Payments::listAllPaymentstoday();

        $paymentstodaytotal  = $totalpaymentstoday -  $totalrefundtoday;


        $data = ['products'=>$allproducts,  'productcount'=>$productcount, 'outofstock'=>$outofstock,
                 'totalpayments'=>$totalpayments, 'totalpaymentstoday'=>$paymentstodaytotal,
                 'outofstockdata'=>$outofstockdata, 'paymentstoday'=>$paymentstoday
                 ];

        $this->view( 'pages/index', $data);
    }


    public function regions(){
        $catdata =  Voters::getRegions();
        $data = [ 'regiondata'=>$catdata ];
        $this->view('pages/regions', $data );
    }

    public function constituency(){
        $catdata =  Voters::getConstituencies();
        $data = [ 'condata'=>$catdata ];
        $this->view('pages/const', $data );
    }

    public function stations(){
        $catdata =  Voters::getPollingStations();
        $data = [ 'stationdata'=>$catdata ];
        $this->view('pages/station', $data );
    }

    public function records($code){
        $catdata =  Voters::getVotersByPollingCode($code);
        $data = [ 'voterdata'=>$catdata ];
        $this->view('pages/voterecords', $data );
    }

    public function csv($code){
        $voterdata =  Voters::getVotersByPollingCode($code);
        $filename = $code.'.csv';
        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename='.$filename);
        $csvheader = array('Name', 'Voters ID', 'Age', 'Sex',  'Region', 'Constituency', 'Polling Station', 'Polling Code');
        $output = fopen('php://output', 'w');
        fputcsv($output, $csvheader );

        foreach ($voterdata as $get){
            $customerdata = [$get->name, $get->votersid, $get->age, $get->sex,  $get->region,
                $get->constituency, $get->pollingstation, $get->pollingcode];
            fputcsv($output,  $customerdata);
        }
    }


    public function users(){
        new Guard();
        new RoleGuard('Create User');
        $users = User::listAll();
        $data = ['users'=>$users];
        $this->view( 'pages/users', $data);
    }



    public function index(){
        $this->view( 'pages/login');
    }


    public function logout(){
        session_unset($_SESSION['userid']);
        header('Location:'.URLROOT.'/pages');
    }

    public function edituser($uid){

        new Guard();
        new RoleGuard('Configure User');
        $userdata  = new User($uid);
        $userdata  = $userdata->recordObject;
        $roledata  = Roles::getGroupedRoles();
        $userrolesdata = User::getRolesByuid($uid);
        $udata = ['userdata'=>$userdata, 'roledata'=>$roledata, 'userroledata'=>$userrolesdata];
        $this->view('pages/edituser', $udata);

    }


}



?>
