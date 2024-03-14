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
                                    <div class="card-header">Category Products
                                        <div class="btn-actions-pane-right">
                                            <div role="group" class="btn-group-sm btn-group">
                                            <a href="add_product.php">
                                                <button class="active btn btn-focus">Add</button>
                                                </a>
                                             
                                                                             
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
                                                <th class="text-center">Total Image</th>
                                                <th class="text-center">Product Name</th>
                                                 
                                                <th class="text-center">Actions</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                                $i=1;
include("db_connect.php");
                                            $sql = "select * from product ";
                                            $result=mysqli_query($conn,$sql);
                                            if($result){
                                                while($row=mysqli_fetch_assoc($result)){
                                                    $id=$row['product_id'];

                                                    $image=$row['image'];
                                                   $title=$row['title'];
                                                                                                                                 
echo'
                                            <tr>
                                                <td class="text-center text-muted">'.$i.'</td>
                                               
                                                <td class="text-center">
                                                <img src="upload/product_img/'.$image.'" width="150px";> 
                                                </td>
                                                <td class="text-center">'.$title.'</td>
                                                

                                                <td class="text-center">
                                                    <button type="button" id="PopoverCustomT-1" class=" btn-sm"><a href="update_product.php?update_id='.$id.'"><input type="submit" value="Update"></a></button>
                                                      <button type="button" id="PopoverCustomT-1" class=" btn-sm"><a href="delete_product.php?delete_id='.$id.'">Delete</a></button>
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