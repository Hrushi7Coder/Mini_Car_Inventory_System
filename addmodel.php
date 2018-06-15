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
      <script src="lib/year-select.js"></script>
      <script type="text/javascript">
         $(document).ready(function(e) {
             $('.yrselectasc').yearselect({order: 'asc'});
         });
      </script>
      <script type="text/javascript">  
         $(document).ready(function(){
         $('#action').val("Load");
         $.ajax({
           url:"action.php",  
           method:"POST", 
         data: "{}",			 
          dataType: 'json',
          success:function(response){
         alert(response);
              var len = response.length;
         
              $("#manufacturer").empty();
              for( var i = 0; i<len; i++){
                  var id = response[i]['id'];
                  var name = response[i]['manfname'];
                  
                  $("#manufacturer").append("<option value='"+id+"'>"+name+"</option>");
         
              }
          }
         });
         
         });  
      </script> 
   </head>
   <body>
      <div class="container box">
         <h3 align="center">Add Car Model Details</h3>
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
            <div class="input-group">
               <label>Select Manufacturer</label>  
               <select id="manufacturer"></select>
               <br />					 
               <label>Enter Model Name</label>  
               <input type="text" name="model_name" id="model_name" class="form-control" />   
               <br /> 
            </div>
            <label>Enter Model Color</label>  
            <input type="text" name="model_name" id="model_color" class="form-control" />   
            <br /> 
            <label>Enter Manufacturing Year</label>
            <select class="yrselectasc form-control" name="model_year" id="model_year"></select>
            <br /> 
            <label>Enter Registration Number</label>  
            <input type="text" name="first_name" id="model_number" class="form-control" />   
            <br /> 
            <label>Enter Note</label> 
            <textarea class="form-control" rows="5" id="model_note"></textarea>
            <br /> 
            <label>Select Model Image</label>  
            <input type="file" name="user_image" id="model_image" />  
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
        $('#action').val("InsertMoDeldetails");  
        $('#user_form').on('submit', function(event){  
             event.preventDefault();  
             var firstName = $('#model_name').val();  
             var lastName = $('#model_number').val();  
             var extension = $('#model_image').val().split('.').pop().toLowerCase();  
             if(extension != '')  
             {  
                  if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)  
                  {  
                       alert("Invalid Image File");  
                       $('#model_image').val('');  
                       return false;  
                  }  
             }  
             if(firstName != '' && lastName != '')  
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
                  alert("Both Fields are Required");  
             }  
        });  
   });  
</script>