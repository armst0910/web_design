
<?php
    if(move_uploaded_file($_FILES["fileUpload"]["tmp_name"],"../pic/".$_FILES["fileUpload"]["name"])){
	//*** Insert Record ***//
		$objConnect = mysql_connect("127.0.0.1","armst0910","armsozk38") or die("Error Connect to Database");
		$objDB = mysql_select_db("gunpla_ecommerce");
		$query = "insert into tbl_product(pd_id,pd_name,pd_price,pd_qty,pd_desc,sr_id,pd_image)
                    values( '".$_POST['pd_id']."',
                            '".$_POST['pd_name']."',
                            ".$_POST['pd_price'].",
                            ".$_POST['pd_qty'].",
                            '".$_POST['pd_desc']."',
                            '".$_POST['sr_id']."',
                            '".$_FILES["fileUpload"]["name"]."')";
		mysql_query($query) or die("cannot query");		
    }
?>
<div class="panel panel-default">
    <div class="panel-body">
        <?php echo "Add ".$_POST['pd_id']." ".$_POST['pd_name']." ".$_POST['pd_qty']." to Database.";?>
    </div>
</div>
