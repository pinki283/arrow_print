<?php
include("header.php");
include("admin/db_connect.php");

$sql = "select * from main_category";
$result = mysqli_query($conn, $sql);


?>   
            
    <section id="page-title" class="page-title-center">
			            <h1>Free Designs</h1>
				            <span>We are happy to help printing press / advertising agencies</span>
				            <ol class="breadcrumb">
					            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
					            <li class="breadcrumb-item active" aria-current="page">Free Design Templates</li>
				            </ol>
		                </section>
    <div class="content-wrap" style="padding:30px 0px">
        <div class="container clearfix">
            
      
          
                            <div class="row" style="margin-top:20px;">
                            <?php
    $i = 1;

    while ($row = mysqli_fetch_assoc($result)) {
        $id = $row['main_category_id'];
        $image = $row['image'];
        $title = $row['title'];

        // Fetch the total number of subcategory items for the current main category
        $subCategoryCountQuery = "SELECT COUNT(*) AS subCategoryCount FROM sub_category WHERE main_category_id = $id";
        $subCategoryCountResult = mysqli_query($conn, $subCategoryCountQuery);

        if ($subCategoryCountResult) {
            $subCategoryCountRow = mysqli_fetch_assoc($subCategoryCountResult);
            $subCategoryCount = $subCategoryCountRow['subCategoryCount'];
        } else {
            $subCategoryCount = 0;
        }
        ?>
                       
                        <div class="center col-lg-3 col-md-3" >
                        <a href="view_category_items.php?id=<?php echo $id; ?>">
                            <img title='Hundreds of free visiting card designs | Free downloads' alt='Hundreds of free visiting card designs | Free downloads' src='admin/upload/<?php echo $image; ?>'><br>
                            <span style="font-size:20px;font-weight:bold"><?php echo $title; ?></span>
                            <div style="color:orange;margin-top:-5px;">Free Designs Available : <b><?php echo $subCategoryCount;?></b></div><br>
                        </a>
                        </div>
                        
                        <?php $i++; ?>
                        <?php
                                    }
                                    ?>
                            </div>
                                                   
        </div>
    </div>
    

            <!-- #content end -->
        <?php
        include("footer.php");
        ?>