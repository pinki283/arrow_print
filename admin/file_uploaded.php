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
                                     
                                    </div>
                                </div>
                                <div class="page-title-actions">
                                    
                                    <div class="d-inline-block dropdown">
                                       
                                       
                                    </div>
                                </div>    </div>
                        </div>            
                        <!--changes  -->
                        
                        <div class="row">
                            <div class="col-md-12">
                                <div class="main-card mb-3 card">
                                    <div class="card-header">Order Details
                                        <div class="btn-actions-pane-right">
                                            <div role="group" class="btn-group-sm btn-group">
                                            <!-- <a href="add_product.php">
                                                <button class="active btn btn-focus">Add</button>
                                                </a> -->
                                             
                                                                             
                                           <!-- <button type="submit" value="logout">Logout</button> -->
                                           
                                                                               
                                           </div>
                                        </div>
                                    </div>
                                    <style>
      .car-table {
         width: 1000px;
      }
   </style>
                                    <div class="table-responsive">
                                
                                    <div class = "car-table">
                                        <table id="car" class="align-middle mb-0 table table-borderless table-striped table-hover">
                                            <thead>
                                            <tr>
                                                <th class="text-center">id</th>
                                                <th class="text-center"> Order Id</th>
                                                <th class="text-center">DATE</th>
                                                <th class="text-center">ORDER NAME</th>
                                                <th class="text-center">Product Name</th>
                                                <th class="text-center">Total Cost</th>
                                                <th class="text-center">CURRENT STATUS</th>
                                              
                                                 <th class="text-center">Actions</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                                $i=1;
include("db_connect.php");
                                            $sql = "select * from production ";
                                            $result=mysqli_query($conn,$sql);
                              
                                                while($row=mysqli_fetch_assoc($result)){
                                                    $id=$row['order_id'];
                                                    $date=$row['updated_at'];
                                                    $order_name=$row['order_name'];
                                              $order_amount=$row['order_amount'];
                      $product_name = $row['product_name'];
                      $status=$row['status'];
                      // Display order details
                      if ($status == 2) {                                              
echo'
                                            <tr>
                                                <td class="text-center text-muted">'.$i.'</td>
                                                <td class="text-center text-muted">'.$id.'</td>
                                                <td class="text-center text-muted">'.$date.'</td>
                                                <td class="text-center">'.$order_name.'</td>
                                                <td class="text-center text-muted">'.$product_name.'</td>
                                                <td class="text-center">'.$order_amount.'</td>
                                               
                                                <td class="text-center">';

                                                
                          if ($status == 0) {
                            echo "Cancelled";
                        } elseif ($status == 1) {
                            echo "Order booked";
                        } elseif ($status == 2) {
                            echo "File Uploaded";
                        } elseif ($status == 3) {
                            echo "Under Process";
                        } elseif ($status == 4) {
                            echo "Dispatched";
                        } elseif ($status == 5) {
                            echo "Delivered";
                        } else {
                            echo "Unknown"; 
                        }
                                            
                                                echo '</td>
                                            
                                            
                                                
                                                <td class="text-center">
                                                <button type="button" id="PopoverCustomT-1" class=" btn-sm"><a href="update_file_upload.php?update_id='.$id.'"><input type="submit" value="Update"></a></button>
                                                  <button type="button" id="PopoverCustomT-1" class=" btn-sm"><a href="delete_file_uploaded.php?delete_id='.$id.'">Delete</a></button>
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