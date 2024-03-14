<?php
session_start();
include("db_connect.php");
$user_profile=$_SESSION['user_name'];
if($user_profile==true){

}else{
    header('location:index.php');
}
?>
<?php include("includes/header.php")?>
<?php include("includes/sidebar.php")?>
                
                  <div class="app-main__outer">
                    <div class="app-main__inner">
                        <div class="app-page-title">
                            <div class="page-title-wrapper">
                                <div class="page-title-heading">
                                    <div class="page-title-icon">
                                        <i class="pe-7s-car icon-gradient bg-mean-fruit">
                                        </i>
                                    </div>
                                    <div>Admin Dashboard
                                        <!-- <div class="page-title-subheading">This is an example dashboard created using build-in elements and components.
                                        </div> -->
                                    </div>
                                </div>
                                   </div>
                        </div>            
                        <!--changes  -->
                        <style>
      .car-table {
         width: 1000px;
      }
   </style>            
                     <div class="row">
                            <div class="col-md-12">
                                <div class="main-card mb-3 card">
                                    <div class="card-header">Contact Us
                                       
                                    </div>
                                    <div class="table-responsive">
                                    <div class = "car-table">
     
                                        <table id = "car" class="align-middle mb-0 table table-borderless table-striped table-hover">
                                            <thead>
                                            <tr>
                                                <th class="text-center">id</th>
                                                <th class="text-center">Name</th>
                                                <th class="text-center">Email</th>
                                                <th class="text-center">Message</th>
                                                <th class="text-center">Actions</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                        
                                        <?php
    $i=1;
                                            include("db_connect.php");
                                            $sql="select * from contact";
                                            $result=mysqli_query($conn,$sql);
                                            if($result){
                                                while($row=mysqli_fetch_assoc($result)){
                                                    $id=$row['id'];
                                                    $name=$row['name'];
                                                    $email=$row['email'];
                                                    $message=$row['message'];
                                               
                                             
echo'
                                            <tr>
                                                <td class="text-center text-muted">'.$i.'</td>
                                                <td class="text-center">'.$name.'</td>
                                                
                                                <td class="text-center">'.$email.'</td>
                                                <td class="text-center">'.$message.'</td>

                                                <td class="text-center">
                                                    <button type="button" id="PopoverCustomT-1" class=" btn-sm"><a href="update.php?update_id='.$id.'"><input type="submit" value="Update"></a></button>
                                                      <button type="button" id="PopoverCustomT-1" class=" btn-sm"><a href="delete.php?delete_id='.$id.'">Delete</a></button>
                                                </td>

                                            </tr>';
                                            $i++;
                                        }
                                    }
                                           
                                            ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                  
                                </div>
                            </div>
                        </div>
                       


                    </div>
                    
               

        <?php 
            include("includes/footer.php");
                 ?>