<?php

/*
 * This unit will have some important and useful procedures/functions that will be required throughout the application.
 *
 * @package   connection
 * @author    Hrushikesh shet 
 */

class connection
{
    
    private $host = 'localhost';
    private $dbname = 'carinventory';
    private $username = 'root';
    private $password = 'root';
    private $port = '3307';
    public $con = '';
    
    function __construct()
    {
        
        $this->connect();
        
    }
    
    function connect()
    {
        try {
            $this->con = new PDO("mysql:host=$this->host;port=$this->port;dbname=$this->dbname", $this->username, $this->password);
            $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
}

class ManufacturerLogic extends connection
{
    
    function AddManufacturer($data)
    {
        $ManufacturerLogic = $this->con->prepare("INSERT INTO manufacturerdet(manfname) VALUES(:manfname);");
        $ManufacturerLogic->execute($data);
    }
    
    function GetManufacturerDet()
    {
        $ManufacturerLogic = $this->con->prepare("select id,manfname from manufacturerdet order by manfname ASC ");
        $ManufacturerLogic->execute();
        $json_output = array();
        $ManufacturerLogic->setFetchMode(PDO::FETCH_ASSOC);
        while ($row = $ManufacturerLogic->fetch()) {
            $json_output[] = $row;
        }
        echo $json_output;
    }
}

class ModelLogic extends connection
{
    
    function AddCarModel($data)
    {
        $ModelLogic = $this->con->prepare("INSERT INTO carmodeldet(manufactid,modelname,modelcolor,modelmanfyear,modelregnum,modelnote) VALUES(:manufactid,:modelname,:modelcolor,:modelmanfyear,:modelregnum,:modelnote);");
        try {
            $this->con->beginTransaction();
            $ModelLogic->execute($data);
            $this->con->commit();
            return $this->con->lastInsertId();
        }
        catch (PDOExecption $e) {
            $this->con->rollback();
            print "Error!: " . $e->getMessage() . "</br>";
        }
    }
    
    function GetModelDet()
    {
        $ModelLogic = $this->con->prepare("SELECT c.id,m.manfname,c.modelname,count(*) as count FROM carmodeldet c,manufacturerdet m where m.id=c.manufactid group by manufactid ");
        $ModelLogic->execute();
        /*$json_output = array(); 
        $ModelLogic->setFetchMode(PDO::FETCH_ASSOC);
        while($row = $ModelLogic->fetch()){
        $json_output[] = $row;   
        }
        echo $json_output;*/
        $output   = '';
        $car_list = $ModelLogic->fetchAll(PDO::FETCH_ASSOC);
        
        $output .= '  
           <table class="table table-bordered table-striped">  
                <tr>  
                     <th width="10%">Sr No.</th>  
                     <th width="35%">Manufacturer Name</th>  
                     <th width="35%">Model Name</th>  
                     <th width="10%">Count</th>  
                     <th width="10%">Delete</th>  
                </tr>  
           ';
        $i = 1;
        foreach ($car_list as $row => $link) {
            $output .= '<tr><td>' . $i++ . '</td><td>' . $link['manfname'] . '</td><td>' . $link['modelname'] . '</td><td>' . $link['count'] . '</td><td><button type="button" name="delete" id="' . $link['id'] . '" class="btn btn-danger btn-xs delete">Delete</button></td></tr>';
        }
        $output .= '</table>';
        return $output;
    }
    
    function upload_file($file, $new_imagename)
    {
        if (isset($file)) {
            $extension   = explode('.', $file["name"]);
            $new_name    = $new_imagename . '.' . $extension[1];
            $destination = './upload/' . $new_name;
            move_uploaded_file($file['tmp_name'], $destination);
            return $new_name;
        }
    }
    
    function AddCarModelImageNameToDb($dataimg)
    {
        $ModelLogic = $this->con->prepare("INSERT INTO carmodelimagedet(carmodelid,imagename) VALUES(:carmodelid,:imagename);");
        $ModelLogic->execute($dataimg);
    }
}