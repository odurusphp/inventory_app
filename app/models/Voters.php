<?php


class Voters extends tableDataObject
{
   const TABLENAME = 'voters';

    public static function getRegions(){
        global $connectedDb;
        $query = "select * from voters group by region";
        $connectedDb->prepare($query);
        return $connectedDb->resultSet();
    }

    public static function getConstituencies(){
        global $connectedDb;
        $query = "select * from voters group by constituency";
        $connectedDb->prepare($query);
        return $connectedDb->resultSet();
    }

    public static function getPollingStations(){
        global $connectedDb;
        $query = "select * from voters  group by pollingcode order by pollingstation asc";
        $connectedDb->prepare($query);
        return $connectedDb->resultSet();
    }

    public static function getByPollingstationBYConstituency($constituency){
        global $connectedDb;
        $query = "select * from voters where constituency = '$constituency' group by pollingcode";
        $connectedDb->prepare($query);
        return $connectedDb->resultSet();
    }

    public static function getVotersByPollingCode($code){
        global $connectedDb;
        $query = "select * from voters where pollingcode like '%$code%' order by name asc ";
        $connectedDb->prepare($query);
        return $connectedDb->resultSet();
    }
}