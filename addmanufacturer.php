<?php  
   //index.php  
   ?>  
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
         <h3 align="center">Add Manufacturer Details</h3>
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
         <form method="post" id="user_form">
            <label>Enter Manufacturer Name</label>  
            <input type="text" name="first_name" id="first_name" class="form-control" />   
            <br />  
            <div align="center">  
               <input type="hidden" name="action" id="action" />  
               <input type="submit" name="button_action" id="button_action" class="btn btn-success" value="Insert" />  
            </div>
         </form>
         <br /><br />  
         <div id="user_table" class="table-responsive">  
         </div>
      </div>
   </body>
</html>
<script type="text/javascript">
   $(document).ready(function(){  
   	$('#action').val("InsertManfDet");  
             $('#user_form').on('submit', function(event){  
                  event.preventDefault();  
                  var firstName = $('#first_name').val();  
                  if(firstName != '')  
                  {  
                       $.ajax({  
                            url:"action.php",  
                            method:"POST",  
                            data:new FormData(this),  
                            contentType:false,  
                            processData:false,  
                            success:function(data)  
                            {  
                                 alert(data);  
                                 $('#user_form')[0].reset();  
                                 load_data();  
                            }  
                       })  
                  }  
                  else  
                  {  
                       alert("Manufacturer Name is Required");  
                  }  
             });  
        });  
</script>