<?php include 'includeadmin/header.php'; 
 ?>
<aside class="main-sidebar">
    <?php include 'includeadmin/aside.php' ?>
</aside>
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12"></div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <?php
            if (isset($_SESSION['errorMessage'])) {
            ?>
            <div class="alert alert-danger">
                <strong>Action Denied! </strong> <?php echo $_SESSION['errorMessage']; ?>
            </div>
            <?php
                unset($_SESSION['errorMessage']);
            }
            ?>
            <?php
            if (isset($_SESSION['SuccessMessage'])) {
            ?>
            <div class="alert alert-success">
                <strong>Action Accepted! </strong> <?php echo $_SESSION['SuccessMessage']; ?>
            </div>
            <?php
                unset($_SESSION['SuccessMessage']);
            }
            ?>
        </div>
    </div>
    <section class="content-header">
        <h1>Manager Pravicy
            <small>Pravicy Policy</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="../admin/index.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active"><a href="../admin/pages_pravicy_policy.php">privacy Policy</a></li>
        </ol>
    </section>
    <?php   
        $term_fetech = "SELECT * FROM `term_codition`  where `term_codition_status`= '1'";
        $term_query = mysqli_query($con, $term_fetech);
        $term_list = mysqli_fetch_array($term_query);   
    ?>
    <div class="container col-md-12">
        <div class="box box-primary" style="margin-top:25px;">
            <form role="form" action="" method="POST">
                <div class="box-body">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="username">Welcome text </label>
                                    <input type="text" class="form-control" id="" name="term_pravicy_title"
                                        placeholder="Enter The Welcome Text"  value="<?php echo $term_list['term_pravicy_title'];?>" required >
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="about university"> privacy Description </label>
                                    <textarea name="term_pravicy_description" id="about_university"
                                        placeholder="About university" class="form-control"><?php echo $term_list['term_pravicy_description'];?></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="box-footer"> 
                        <button type="submit" class="btn btn-primary"
                            style="padding:10px 50px;" id="course" name="update_pravicy">Update</button>
                    
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php include 'includeadmin/footer.php' ?>
</script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>
<script>
</script>
<script src="https://ckeditor.com/latest/ckeditor.js"></script>
<script>
CKEDITOR.replace('about_university');
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
<script>
$(document).ready(function() {
    $('#Table').DataTable();
});
</script>
      <?php
        if(isset($_POST['update_pravicy'])){
            $pravicy_id = $_GET['pravicy_id'];
            $term_pravicy_title = $_POST['term_pravicy_title'];
            $term_pravicy_description = $_POST['term_pravicy_description'];
            $term_codition_status = 1;
            $term_codition_datetime = date('d-m-y h:i:sa');
            $update_pravicy_run ="UPDATE `term_codition` SET `term_pravicy_description`='$term_pravicy_description',`term_pravicy_title`='$term_pravicy_title',`term_codition_status`='$term_codition_status',`term_codition_datetime`='$term_codition_datetime' WHERE `term_codition_id`='$pravicy_id'";
            $update_query = mysqli_query($con, $update_pravicy_run);
            if ($update_query){
        
                $_SESSION['SuccessMessage'] = "Pravicy Updated Successfully  ";
                ?>
                    <script>
                        location.replace("pages_pravicy_policy.php");
                    </script>
                <?php
            } 
            
            else{
                $_SESSION['errorMessage'] = "Pravicy Not Updated ";
                ?>
                    <script>
                        location.replace("pages_pravicy_policy.php");
                    </script>
                <?php
            }
        }
        
    ?>