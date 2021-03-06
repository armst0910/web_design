<?php
    include("assets/db.php");
    $db = new Database();
    $db->createDB();
    $gradeQ = "select gd_id from tbl_grade order by gd_id";
    $seriesQ = "select sr_id from tbl_series order by sr_id";
    $gradeR = mysql_query($gradeQ);
    $seriesR = mysql_query($seriesQ);
?>    

<div class="page-header">
        <h1>ADD GRADE</h1>
    </div>
    <div class="addGrade"></div>
    <form role="form" class="form-horizontal" id="addGrade" method="post" action="add_grade.php" enctype="multipart/form-data">
        <div class="form-group">
            <label class="control-label col-md-2" for="gd_id">Grade ID :</label>
            <div class="col-md-9">    
                <input type="text" class="form-control"  name="gd_id">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-2" for="gd_dtail">Grade Detail :</label>
            <div class="col-md-9">    
                <input type="text" class="form-control"  name="gd_dtail">
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-offset-2 col-md-10">
                <button type="submit" class="btn btn-primary pull-left" id="add_grade">Add Grade</button>
            </div>
        </div>
    </form>
    <div class="page-header">
        <h1>ADD SERIES</h1>
    </div>
    <div class="addSeries"></div>
    <form role="form" class="form-horizontal" id="addSeries" method="post" action="add_series.php" enctype="multipart/form-data">
        <div class="form-group">
            <label class="control-label col-md-2" for="sr_id">Series ID :</label>
            <div class="col-md-9">
                <input type="text" class="form-control" name="sr_id">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-2" for="sr_name">Series Name :</label>
            <div class="col-md-9">
	           <input type="text" class="form-control" name="sr_name">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-2" for="sr_detail">Series Detail :</label>
            <div class="col-md-9">
	           <input type="text" class="form-control" name="sr_detail">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-2" for="gd_id">Model Grade :</label>
            <div class="col-md-9">
	           <select class="form-control" name="gd_id">
                    <?php
                        while($row = mysql_fetch_array($gradeR)){
                            echo "<option value='".$row['gd_id']."'>".$row['gd_id']."</option>";
                        }
                   ?>
                </select>
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-offset-2 col-md-10">
                <button type="submit" class="btn btn-primary pull-left" id="add_series">Add Series</button>
            </div>
        </div>
	</form>
	<div class="page-header">
        <h1>ADD PRODUCT</h1>
    </div>
    <div class="addProduct"></div>
    <form name="form" class="form-horizontal" id="Product" method="post" action="manage_product/add_product.php" enctype="multipart/form-data">
	   <div class="form-group">
            <label class="control-label col-md-2" for="pd_id">Product ID :</label>
            <div class="col-md-9">
	           <input type="text" class="form-control" name="pd_id">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-2" for="pd_name">Product Name :</label>
            <div class="col-md-9">
	           <input type="text" class="form-control" name="pd_name">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-2" for="pd_price">Product Price :</label>
            <div class="col-md-9">
	           <input type="number" class="form-control" name="pd_price" min="1" style="width:120px;">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-2" for="pd_qty">Product Qty :</label>
            <div class="col-md-9">
	           <input type="number" class="form-control" name="pd_qty" min="1" style="width:70px;">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-2" for="pd_desc">Product Description :</label>
            <div class="col-md-9">
	           <textarea class="form-control" rows="4" name="pd_desc"></textarea>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-2" for="sr_id">Series ID :</label>
            <div class="col-md-9">
	           <select class="form-control" name="sr_id">
                    <?php
                        while($row = mysql_fetch_array($seriesR)){
                            echo "<option value='".$row['sr_id']."'>".$row['sr_id']."</option>";
                        }
                   ?>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-2" for="fileUpload">Picture :</label>
            <div class="col-md-9">
	           <input type="file" name="fileUpload">
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-offset-2 col-md-10">
                <button type="submit" class="btn btn-primary pull-left" id="add_product">Add Product</button>
            </div>
        </div>
	</form>
<?php $db->closeDB(); ?>
<script>
    $(document).ready(function (){
        $('form#addGrade').on('click','#add_grade',function(event){
            event.preventDefault();
            $.ajax({
                type: 'POST',
                url: 'manage_product/add_grade.php',
                data: $('#addGrade').serialize(),
                success: function(response){
                    $('div.addGrade').html(response).slideDown();
                }
            });
        });
        
        $('form#addSeries').on('click','#add_series',function(event){
            event.preventDefault();
            $.ajax({
                type: 'POST',
                url: 'manage_product/add_series.php',
                data: $('#addSeries').serialize(),
                success: function(response){
                    $('div.addSeries').html(response).slideDown();
                }
            });
        });
        $('#Product').ajaxForm(function(response) { 
                $('div.addProduct').html(response).slideDown();
            }); 
    });
</script>