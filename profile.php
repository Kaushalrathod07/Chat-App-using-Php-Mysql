<?php 
$user_id = isset($_GET['user']) ? $_GET['user'] : md5($_SESSION['id']);
$user_qry = $conn->query("SELECT *,CONCAT(firstname,' ',middlename,' ',lastname) as fullname FROM users where md5(id) = '{$user_id}'");
if($user_qry->num_rows <= 0)
    echo '<script>location.replace("404.html")</script>';
foreach($user_qry->fetch_array() as $k => $v){
    if(!is_numeric($k)){
        $$k=$v;
    }
}
?>
<div class="h-100">
    <div class="row h-100">
        <div class="col-md-4 h-100">
           
            <div class="text-center mt-2"><?php echo $fullname ?></div>
        </div>
        <div class="col-md-8 h-100">
            <div class="card shadow-lg rounded-0">
                <div class="card-header">
                    <div class="card-title">About</div>
                </div>
                <div class="card-body">
                    <div class="container-fluid pb-5">
                        <dl>
                            <dt class="text-muted">Email</dt>
                            <dt class="ps-4"><?php echo $email ?></dt>
                            <dt class="text-muted">Gender</dt>
                            <dt class="ps-4"><?php echo $gender ?></dt>
                           
                            <dt class="text-muted">Contact #</dt>
                            <dt class="ps-4"><?php echo $contact ?></dt>
                        </dl>
                        <?php if($_SESSION['id'] == $id): ?>
                            <a href="./?page=manage_account" class="btn btn-sm btn-primary rounded-0">Edit Account</a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>