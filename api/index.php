<?php
session_start();

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require '../vendor/autoload.php';
require "db.php";

$app = new \Slim\App;


$app->get('/mybookings', function (Request $request, Response $response, array $args) {

    $useremail = $_SESSION['login'];
    $sql = "SELECT tblvehicles.Vimage1 as Vimage1,tblvehicles.VehiclesTitle,tblvehicles.id as vid,tblbrands.BrandName,tblbooking.FromDate,tblbooking.ToDate,tblbooking.message,tblbooking.Status  from tblbooking join tblvehicles on tblbooking.VehicleId=tblvehicles.id join tblbrands on tblbrands.id=tblvehicles.VehiclesBrand where tblbooking.userEmail=:useremail";

    try {
        // Get DB Objectqw
        $db = new db();
        // Connect
        $db = $db->connect();

        $query = $db->prepare($sql);
        $query->bindParam(':useremail', $useremail, PDO::PARAM_STR);
        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_OBJ);

        // $stmt = $db->query($sql);
        // $user = $stmt->fetchAll(PDO::FETCH_OBJ);
        // $db = null;
        echo json_encode($results);
    } catch (PDOException $e) {
        $data = array("status" => "fail");
        echo json_encode($data);
    }
});

$app->get('/listing', function (Request $request, Response $response, array $args) {




    $sql = "SELECT tblvehicles.VehiclesTitle,tblbrands.BrandName,tblvehicles.PricePerDay,tblvehicles.FuelType,tblvehicles.ModelYear,tblvehicles.id,tblvehicles.SeatingCapacity,tblvehicles.VehiclesOverview,tblvehicles.Vimage1 from tblvehicles join tblbrands on tblbrands.id=tblvehicles.VehiclesBrand";

    try {
        // Get DB Objectqw
        $db = new db();
        // Connect
        $db = $db->connect();

        $query = $db->prepare($sql);
        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_OBJ);

        echo json_encode($results);
    } catch (PDOException $e) {
        $data = array("status" => "fail");
        echo json_encode($data);
    }
});

$app->get('/brands', function (Request $request, Response $response, array $args) {




    $sql = "SELECT * from  tblbrands ";

    try {
        // Get DB Objectqw
        $db = new db();
        // Connect
        $db = $db->connect();

        $query = $db->prepare($sql);
        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_OBJ);

        echo json_encode($results);
    } catch (PDOException $e) {
        $data = array("status" => "fail");
        echo json_encode($data);
    }
});

$app->post('/createBrand', function (Request $request, Response $response, array $args) {

    $BrandName = $_POST['BrandName'];



    try {
        $sql = "INSERT INTO tblbrands (BrandName) VALUES
			               (:BrandName)";
        $db = new db();
        // Connect
        $db = $db->connect();
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':BrandName', $BrandName);


        $stmt->execute();
        $count = $stmt->rowCount();
        $db = null;

        $data = array("status" => "success", "rowcount" => $count);
        echo json_encode($data);
    } catch (PDOException $e) {
        $data = array("status" => "fail");
        echo json_encode($data);
        echo json_encode($e);
    }
});

$app->get('/regusers', function (Request $request, Response $response, array $args) {


    $sql = "SELECT * FROM tblusers";

    try {
        // Get DB Objectqw
        $db = new db();
        // Connect
        $db = $db->connect();

        $stmt = $db->query($sql);
        $user = $stmt->fetchAll(PDO::FETCH_OBJ);
        $db = null;
        echo json_encode($user);
    } catch (PDOException $e) {
        $data = array("status" => "fail");
        echo json_encode($data);
    }
});

$app->get('/managebookings', function (Request $request, Response $response, array $args) {


    $sql = "SELECT tblusers.FullName,tblbrands.BrandName,tblvehicles.VehiclesTitle,tblbooking.FromDate,tblbooking.ToDate,tblbooking.message,tblbooking.VehicleId as vid,tblbooking.Status,tblbooking.PostingDate,tblbooking.id  from tblbooking join tblvehicles on tblvehicles.id=tblbooking.VehicleId join tblusers on tblusers.EmailId=tblbooking.userEmail join tblbrands on tblvehicles.VehiclesBrand=tblbrands.id  ";


    try {
        // Get DB Objectqw
        $db = new db();
        // Connect
        $db = $db->connect();

        $stmt = $db->query($sql);
        $user = $stmt->fetchAll(PDO::FETCH_OBJ);
        $db = null;
        echo json_encode($user);
    } catch (PDOException $e) {
        $data = array("status" => "fail");
        echo json_encode($data);
    }
});

$app->get('/vehicles', function (Request $request, Response $response, array $args) {


    $sql = "SELECT tblvehicles.VehiclesTitle,tblbrands.BrandName,tblvehicles.PricePerDay,tblvehicles.FuelType,tblvehicles.ModelYear,tblvehicles.id from tblvehicles join tblbrands on tblbrands.id=tblvehicles.VehiclesBrand";


    try {
        // Get DB Objectqw
        $db = new db();
        // Connect
        $db = $db->connect();

        $stmt = $db->query($sql);
        $user = $stmt->fetchAll(PDO::FETCH_OBJ);
        $db = null;
        echo json_encode($user);
    } catch (PDOException $e) {
        $data = array("status" => "fail");
        echo json_encode($data);
    }
});

$app->post('/vehicle', function (Request $request, Response $response, array $args) {

    $vehicletitle = $_POST['vehicletitle'];
    $brand = $_POST['brandname'];
    $vehicleoverview = $_POST['vehicalorcview'];
    $priceperday = $_POST['priceperday'];
    $fueltype = $_POST['fueltype'];
    $modelyear = $_POST['modelyear'];
    $seatingcapacity = $_POST['seatingcapacity'];
    $vimage1 = $_FILES["img1"]["name"];
    $vimage2 = $_FILES["img2"]["name"];
    $vimage3 = $_FILES["img3"]["name"];
    $vimage4 = $_FILES["img4"]["name"];
    $vimage5 = $_FILES["img5"]["name"];
    $airconditioner = $_POST['airconditioner'];
    $powerdoorlocks = $_POST['powerdoorlocks'];
    $antilockbrakingsys = $_POST['antilockbrakingsys'];
    $brakeassist = $_POST['brakeassist'];
    $powersteering = $_POST['powersteering'];
    $driverairbag = $_POST['driverairbag'];
    $passengerairbag = $_POST['passengerairbag'];
    $powerwindow = $_POST['powerwindow'];
    $cdplayer = $_POST['cdplayer'];
    $centrallocking = $_POST['centrallocking'];
    $crashcensor = $_POST['crashcensor'];
    $leatherseats = $_POST['leatherseats'];
    move_uploaded_file($_FILES["img1"]["tmp_name"], "img/vehicleimages/" . $_FILES["img1"]["name"]);
    move_uploaded_file($_FILES["img2"]["tmp_name"], "img/vehicleimages/" . $_FILES["img2"]["name"]);
    move_uploaded_file($_FILES["img3"]["tmp_name"], "img/vehicleimages/" . $_FILES["img3"]["name"]);
    move_uploaded_file($_FILES["img4"]["tmp_name"], "img/vehicleimages/" . $_FILES["img4"]["name"]);
    move_uploaded_file($_FILES["img5"]["tmp_name"], "img/vehicleimages/" . $_FILES["img5"]["name"]);

    try {

        $sql = "INSERT INTO tblvehicles(VehiclesTitle,VehiclesBrand,VehiclesOverview,PricePerDay,FuelType,ModelYear,SeatingCapacity,Vimage1,Vimage2,Vimage3,Vimage4,Vimage5,AirConditioner,PowerDoorLocks,AntiLockBrakingSystem,BrakeAssist,PowerSteering,DriverAirbag,PassengerAirbag,PowerWindows,CDPlayer,CentralLocking,CrashSensor,LeatherSeats) VALUES(:vehicletitle,:brand,:vehicleoverview,:priceperday,:fueltype,:modelyear,:seatingcapacity,:vimage1,:vimage2,:vimage3,:vimage4,:vimage5,:airconditioner,:powerdoorlocks,:antilockbrakingsys,:brakeassist,:powersteering,:driverairbag,:passengerairbag,:powerwindow,:cdplayer,:centrallocking,:crashcensor,:leatherseats)";
        // Get DB Objectqw
        $db = new db();
        // Connect
        $db = $db->connect();
        $query = $db->prepare($sql);
        $query->bindParam(':vehicletitle', $vehicletitle, PDO::PARAM_STR);
        $query->bindParam(':brand', $brand, PDO::PARAM_STR);
        $query->bindParam(':vehicleoverview', $vehicleoverview, PDO::PARAM_STR);
        $query->bindParam(':priceperday', $priceperday, PDO::PARAM_STR);
        $query->bindParam(':fueltype', $fueltype, PDO::PARAM_STR);
        $query->bindParam(':modelyear', $modelyear, PDO::PARAM_STR);
        $query->bindParam(':seatingcapacity', $seatingcapacity, PDO::PARAM_STR);
        $query->bindParam(':vimage1', $vimage1, PDO::PARAM_STR);
        $query->bindParam(':vimage2', $vimage2, PDO::PARAM_STR);
        $query->bindParam(':vimage3', $vimage3, PDO::PARAM_STR);
        $query->bindParam(':vimage4', $vimage4, PDO::PARAM_STR);
        $query->bindParam(':vimage5', $vimage5, PDO::PARAM_STR);
        $query->bindParam(':airconditioner', $airconditioner, PDO::PARAM_STR);
        $query->bindParam(':powerdoorlocks', $powerdoorlocks, PDO::PARAM_STR);
        $query->bindParam(':antilockbrakingsys', $antilockbrakingsys, PDO::PARAM_STR);
        $query->bindParam(':brakeassist', $brakeassist, PDO::PARAM_STR);
        $query->bindParam(':powersteering', $powersteering, PDO::PARAM_STR);
        $query->bindParam(':driverairbag', $driverairbag, PDO::PARAM_STR);
        $query->bindParam(':passengerairbag', $passengerairbag, PDO::PARAM_STR);
        $query->bindParam(':powerwindow', $powerwindow, PDO::PARAM_STR);
        $query->bindParam(':cdplayer', $cdplayer, PDO::PARAM_STR);
        $query->bindParam(':centrallocking', $centrallocking, PDO::PARAM_STR);
        $query->bindParam(':crashcensor', $crashcensor, PDO::PARAM_STR);
        $query->bindParam(':leatherseats', $leatherseats, PDO::PARAM_STR);
        $query->execute();
        $lastInsertId = $db->lastInsertId();
        $db = null;
        $count = $query->rowCount();
        $data = array("status" => "success", "rowcount" => $count);
        echo json_encode($data);
    } catch (PDOException $e) {
        $data = array("status" => "fail");
        echo json_encode($data);
        echo json_encode($e);
    }
});


$app->put('/brand/{brand_id}', function (Request $request, Response $response, array $args) {
    $id = $args['brand_id'];


    $brandname = $_POST["brandname"];



    try {
        $sql = "UPDATE tblbid SET brandname= :brandname Where id=$id";
        $db = new db();
        // Connect
        $db = $db->connect();
        $stmt = $db->prepare($sql);

        $stmt->bindValue(':brandname', $brandname);


        $stmt->execute();
        $count = $stmt->rowCount();
        $db = null;

        $data = array("status" => "success", "rowcount" => $count);
        echo json_encode($data);
    } catch (PDOException $e) {
        $data = array("status" => "fail");
        echo json_encode($data);
        echo json_encode($e);
    }
});


$app->delete('/brand/{brand_id}', function (Request $request, Response $response, array $args) {
    $id = $args['brand_id'];

    try {
        $sql = "DELETE FROM tblbrand Where id=$id";
        $db = new db();
        // Connect
        $db = $db->connect();
        $stmt = $db->prepare($sql);


        $stmt->execute();
        $count = $stmt->rowCount();
        $db = null;

        $data = array("status" => "success", "rowcount" => $count);
        echo json_encode($data);
    } catch (PDOException $e) {
        $data = array("status" => "fail");
        echo json_encode($data);
        echo json_encode($e);
    }
});




$app->run();
