
<?php
include("header.php");
include("admin/db_connect.php");

$id = $_GET['id']; // Correct syntax to access value of id from $_GET superglobal

$sql = "SELECT * FROM sub_category WHERE main_category_id = $id";
$result = mysqli_query($conn, $sql);
?>
 
            
    <section id="page-title" class="page-title-center">
	<h1>Visiting Card</h1>
		<span>Hundreds of free visiting card designs | Free downloads</span>
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="default.aspx.html">Home</a></li>
			<li class="breadcrumb-item"><a href="free_design_files.php">Free Designs</a></li>
			<li class="breadcrumb-item active" aria-current="page">Visiting Card</li>
		</ol>
	</section>
    <div class="content-wrap" style="padding: 30px 0px;">
        <div class="container clearfix">
            <a href="javascript:void(0)" class="btn btn-info center backButton" onclick="history.go(-1)"><< Back to Sub - Category Listing</a><br>
            <br>
            <div id="ctl00_ContentPlaceHolder1_UpdatePanel1">
	
                    <div class="row">
                        <div class="col-md-3">
                            <div style="margin-top: 17px;" class="btn-group" role="group" aria-label="Basic example">
                                <input type="submit" name="ctl00$ContentPlaceHolder1$btnFirst" value="&lt;&lt; First Page" id="ctl00_ContentPlaceHolder1_btnFirst" disabled="disabled" class="aspNetDisabled btn btn-primary">
                                <input type="submit" name="ctl00$ContentPlaceHolder1$btnPrev" value="&lt; Previous Page" id="ctl00_ContentPlaceHolder1_btnPrev" disabled="disabled" class="aspNetDisabled btn btn-primary">
                                <input type="submit" name="ctl00$ContentPlaceHolder1$btnNext" value="Next Page >" id="ctl00_ContentPlaceHolder1_btnNext" class="btn btn-primary">
                                <input type="submit" name="ctl00$ContentPlaceHolder1$btnLast" value="Last Page >>" id="ctl00_ContentPlaceHolder1_btnLast" class="btn btn-primary">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        
                                </div>
                            <div class="row" style="margin-top: 20px;">
                            <?php
      $i=1;
    while ($row = mysqli_fetch_assoc($result)) {
        $id = $row['main_category_id'];
        $image = $row['image'];
        $cdr_file=$row['cdr_file'];
        $title = $row['title'];
    ?>
                                <div class="center col-lg-3 col-md-3">
                                    <img title="Template Image" alt="Template Image" src='admin/upload/<?php echo $image; ?>'><br>
                                    BB-   <?php echo $i ;?><br>
                                    <a class="downloadButton" onclick="return checkLogin()" href='admin/upload/<?php echo $cdr_file; ?>' download="admin/upload/<?php echo $cdr_file; ?>" target="_blank">Download CDR</a>
                                    <?php $i++; ?>
                                </div>

                             <?php  }?>           
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div style="margin-top: 17px;" class="btn-group" role="group" aria-label="Basic example">
                                <input type="submit" name="ctl00$ContentPlaceHolder1$btnFirstb" value="&lt;&lt; First Page" id="ctl00_ContentPlaceHolder1_btnFirstb" disabled="disabled" class="aspNetDisabled btn btn-primary">
                                <input type="submit" name="ctl00$ContentPlaceHolder1$btnPrevb" value="&lt; Previous Page" id="ctl00_ContentPlaceHolder1_btnPrevb" disabled="disabled" class="aspNetDisabled btn btn-primary">
                                <input type="submit" name="ctl00$ContentPlaceHolder1$btnNextb" value="Next Page >" id="ctl00_ContentPlaceHolder1_btnNextb" class="btn btn-primary">
                                <input type="submit" name="ctl00$ContentPlaceHolder1$btnLastb" value="Last Page >>" id="ctl00_ContentPlaceHolder1_btnLastb" class="btn btn-primary">
                            </div>
                        </div>
                    </div>
                
</div>
        </div>

        
    </div>

          <?php
          include("footer.php");
          ?>