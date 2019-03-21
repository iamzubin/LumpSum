$(document).ready(function(){  
    function fetch_data()  
    {  
         $.ajax({  
              url:"select_menu.php",  
              method:"POST",
              data:{admin:admin},  
              dataType:"text",  
              success:function(data){  
                   $('#live_data').html(data);  
              }  
         });  
    }  
    fetch_data();  
    $(document).on('click', '#btn_add', function(){  
         var id = $('#add_id').text();
         var first_name = $('#add_name').text();  
         var last_name = $('#add_price').text();  
         if(first_name == '')  
         {  
              alert("Enter First Name");  
              return false;  
         }  
         if(last_name == '')  
         {  
              alert("Enter Last Name");  
              return false;  
         }  
         $.ajax({  
              url:"insert.php",  
              method:"POST",  
              data:{id:id, name:first_name, price:last_name},  
              dataType:"text",  
              success:function(data)  
              {  
                   alert(data);  
                   fetch_data();  
              }  
         })  
    });  
    function edit_data(id, text, column_name)  
    {  
         $.ajax({  
              url:"edit.php",  
              method:"POST",  
              data:{id:id, text:text, column_name:column_name},  
              dataType:"text",  
              success:function(data){  
                   alert(data);  
              }  
         });  
    }  
    $(document).on('blur', '.first_name', function(){  
         var id = $(this).data("id1");  
         var first_name = $(this).text();  
         edit_data(id, first_name, "first_name");  
    });  
    $(document).on('blur', '.last_name', function(){  
         var id = $(this).data("id2");  
         var last_name = $(this).text();  
         edit_data(id,last_name, "last_name");  
    });  
    $(document).on('click', '.btn_delete', function(){  
         var id=$(this).data("id3");  
         if(confirm("Are you sure you want to delete this?"))  
         {  
              $.ajax({  
                   url:"delete.php",  
                   method:"POST",  
                   data:{id:id},  
                   dataType:"text",  
                   success:function(data){  
                        alert(data);  
                        fetch_data();  
                   }  
              });  
         }  
    });  
});  