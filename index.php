<html>
   <head>
      <title>Mini Car Inventory System</title>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
      <style>  
         body  
         {  
         margin:0;  
         padding:0;  
         background-color:#f1f1f1;  
         }  
         .box  
         {  
         width:1270px;  
         padding:20px;  
         background-color:#fff;  
         border:1px solid #ccc;  
         border-radius:5px;  
         margin-top:10px;  
         }  
      </style>
   </head>
   <body>
      <div class="container box">
         <h3 align="center">Available Car(In-stock) Details</h3>
         <br />
         <a href="index.php" class="btn btn-info btn-lg">
         <span class="glyphicon glyphicon-home"></span> Home 
         </a> 				
         <a href="addmanufacturer.php" class="btn btn-info btn-lg">
         <span class="glyphicon glyphicon-plus"></span> Add Manufacturer Details 
         </a> 
         <a href="addmodel.php" class="btn btn-info btn-lg">
         <span class="glyphicon glyphicon-plus"></span> Add Car Model Details
         </a> 
         <br /><br />    
         <br /><br />  
         <div id="user_table" class="table-responsive">  
         </div>
      </div>
   </body>
</html>
<script type="text/javascript">  
   $(document).ready(function(){  
        load_data();   
        function load_data()  
        {  
             var action = "LoadCarDet";  
             $.ajax({  
                  url:"action.php",  
                  method:"POST",  
                  data:{action:action},  
                  success:function(data)  
                  {  
                       $('#user_table').html(data);  
                  }  
             });  
        }    
   });  
</script>