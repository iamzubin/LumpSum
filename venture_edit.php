<?php
session_start();
?>
<html>  
      <head>  
           <title>Menu Editor</title>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
		<link rel="stylesheet" href="assets/css/main.css" />
		<link rel="shortcut icon" type="image/png" href="img/3d5f84e1-4ee4-df9f-9478-b8bb866bf2f4.webPlatform.png"/>
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script> 
      </head>  
      <body style="padding: 5%;">
          <div align="center" style="margin: 25px;">
              <a href="delivery.php"><button>See Orders</button></a>
          </div>
           <div class="container">
                <div class="table-responsive">  
                     <h3 align="center" id="title"></h3><br />  
                     <div id="live_data"></div>                 
                </div>  
           </div>  
          <div align="center" style="margin: 25px;">
          </div>
      </body>  
 </html>  
 <script>
 var venture = "<?=$_SESSION["venture"]?>";  
 var txt = "Menu for " + venture;
 $('#title').text(txt);
 $(document).ready(function(){  
      function fetch_data()  
      {  
           $.ajax({  
                url:"venture_select_menu.php",  
                method:"POST",
                data:{venture:venture,},  
                dataType:"text",  
                success:function(data){  
                     $('#live_data').html(data)  ;  
                }  
           });  
      }  
      fetch_data();  
      $(document).on('click', '#btn_add', function(){  
           var name = $('#add_name').text();  
           var price = $('#add_price').text();  
           var id = $('#add_id').text();
           
           if(name == '')  
           {  
                alert("Enter Name");  
                return false;  
           }  
           if(price == '')  
           {  
                alert("Enter price Name");  
                return false;  
           }  
           $.ajax({  
                url:"venture_insert.php",  
                method:"POST",  
                data:{name:name, price:price,venture:venture},  
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
                url:"venture.php",  
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
                     url:"venture_delete.php",  
                     method:"POST",  
                     data:{id:id,venture:venture},  
                     dataType:"text",  
                     success:function(data){  
                          alert(data);  
                          fetch_data();  
                     }  
                });  
           }  
      });  
 });  
 </script>





                            <div class="table-responsive">
                                <table class="table table-hover dashboard-task-infos">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Task</th>
                                            <th>Status</th>
                                            <th>Manager</th>
                                            <!-- <th>Progress</th> -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Task A</td>
                                            <td><a href="javascript:void(0);"><span class="label bg-green">Doing</span></a></td>
                                            <td>John Doe</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>