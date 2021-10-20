<?php
include_once 'bd_connection.php';
if(isset($_POST['btn-update']))
{
	$id = $_GET['edit_id'];
	$title = $_POST['post_title'];
	$photo = $_POST['post_image'];
	$descrip = $_POST['post_abstract'];	
	if($crud->update($id,$title,$photo,$descrip))
	{
		$msg = "<div class='alert alert-info'>
				<strong>WOW!</strong> Record was updated successfully <a href='index.php'>HOME</a>!
				</div>";
	}
	else
	{
		$msg = "<div class='alert alert-warning'>
				<strong>SORRY!</strong> ERROR while updating record !
				</div>";
	}
}

if(isset($_GET['edit_id']))
{
	$id = $_GET['edit_id'];
	extract($crud->getID($id));	
}

?>
<?php include_once 'header.php'; ?>

<div class="clearfix"></div>

<div class="container">
<?php
if(isset($msg))
{
	echo $msg;
}
?>
</div>

<div class="clearfix"></div><br />

<div class="container">
	 
     <form method='post'>
 
    <table class='table table-bordered'>
 
        <tr>
            <td>Titulo noticia</td>
            <td><input type='text' name='post_title' class='form-control' value="<?php echo $post_title; ?>" required></td>
        </tr>
 
        <tr>
            <td>descripcion</td>
            <td><input type='text' name='post_abstract' class='form-control' value="<?php echo $post_abstract; ?>" required></td>
        </tr>
 
        <tr>
            <td>Imagen</td>
            <td><input type='file' name='post_image' class='form-control' value="<?php echo $post_image; ?>" required></td>
        </tr>
 
        <tr>
            <td colspan="2">
                <button type="submit" class="btn btn-primary" name="btn-update">
    			<span class="glyphicon glyphicon-edit"></span>  Update this Record
				</button>
                <a href="index.php" class="btn btn-large btn-success"><i class="glyphicon glyphicon-backward"></i> &nbsp; CANCEL</a>
            </td>
        </tr>
 
    </table>
</form>
     
     
</div>

<?php include_once 'footer.php'; ?>