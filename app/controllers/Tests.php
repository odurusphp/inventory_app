<?php
/**
 * Created by PhpStorm.
 * User: bryan
 * Date: 12/7/2017
 * Time: 3:03 PM
 */



class Tests extends Controller {


    public function  voters($page){
        $string = file_get_contents(URLROOT."convertedjsonnew/".$page.".json");
        $json = json_decode($string,true);
        echo '<pre>';
      // print_r($json);
        //$pagesdata = $json['pages'];
        echo count($json);
        foreach($json as $key=>$value){

           $votersid = $key;
           //print_r($value);
           $name = $value['name'];
           $region = $value['region'];
           $polllingname = $value['ps_name'];
           $pollingcode = $value['ps_code'];
           $age = $value['Age'];
           $sex = $value['sex'];


            $vt = new Voters();
            $vt->recordObject->name = $name;
            $vt->recordObject->sex = $sex;
            $vt->recordObject->age = $age;
            $vt->recordObject->votersid = $votersid;
            $vt->recordObject->region = $region;
            $vt->recordObject->pollingcode = $pollingcode;
            $vt->recordObject->constituency = 'ASUOGYAMAN';
            $vt->recordObject->pollingstation = $polllingname;
            $vt->store();

        }





        //print_r($voteriddata);
    }

}
