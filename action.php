<?php
include 'dbclass.php';
$con  = new connection();
$info = new ManufacturerLogic($con);
$car  = new ModelLogic($con);

if (isset($_POST["action"])) {
    if ($_POST["action"] == "InsertManfDet") {
        $manfname = $_POST["first_name"];
        $data     = array(
            "manfname" => $manfname
        );
        $info->AddManufacturer($data);
        echo 'Manufacturer Added';
    }
    
    if ($_POST["action"] == "Load") {
        echo $info->GetManufacturerDet();
    }
    
    if ($_POST["action"] == "LoadCarDet") {
        echo $car->GetModelDet();
    }
    
    if ($_POST["action"] == "InsertModelDetails") {
        $data           = array(
            "manufactid" => $_POST["manufactid"],
            "modelname" => $_POST["model_name"],
            "modelcolor" => $_POST["model_color"],
            "modelmanfyear" => $_POST["model_year"],
            "modelregnum" => $_POST["model_number"],
            "modelnote" => $_POST["model_note"]
        );
        $NewCarId       = $car->AddCarModel($data);
        // New Image name
        $new_imagename  = $_POST["model_name"] . '_' . $NewCarId;
        //logic to move images to a location on server
        $FinalimageName = $car->upload_file($_FILES["user_image"], $new_imagename);
        
        //logic to addimage paths to db	
        $dataimg  = array(
            "carmodelid" => $NewCarId,
            "imagename" => $FinalimageName
        );
        $NewCarId = $car->AddCarModelImageNameToDb($dataimg);
        echo 'Car Added';
    }
}
?>  