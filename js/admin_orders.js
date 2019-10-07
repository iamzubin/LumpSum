$(document).ready(function(){  
    function fetch_data()  
    {  
         return $.ajax({  
              url:"select_orders.php",  
              method:"POST",  
              success:function(data){  
                   $('#live_data').html(data);  
              }  
         });  
    }  
    fetch_data();  

 
    function edit_data(id, text, column_name)  {  
     return $.ajax({  
          url:"edit.php",  
          method:"POST",  
          data:{id:id, text:text, column_name:column_name},  
          dataType:"text",  
          success:function(data){  
               alert(data);  
          }  
     });  
    }

    $(document).on('blur', '.last_name', function(){  
        var id = $(this).data("id2");  
        var last_name = $(this).text();  
        edit_data(id,last_name, "last_name");  
   });

}); 