<?php
if(isset($_SESSION['id'])){

  $login_email = $_SESSION['email'];

  $conn = new mysqli("localhost","root","","kenkanri_admin_panel","3306");

  if($conn->connect_error){
    echo "Connection Error".$conn->connect_error;
  } 

  $login_sql = "SELECT id,admin_name,admin_short_name FROM admin_tb WHERE email='$login_email'";
  $login_result=$conn->query($login_sql);

    if($login_result->num_rows > 0){
        while($login_row = $login_result->fetch_assoc()){
            $login_user_id = $login_row['id'];
            $username = $login_row['admin_name'];
            $user_short_name = $login_row['admin_short_name'];

        }
    }
}

?>

<div class="top-menu" >
    <div class="top-close-button">
        <button class="left-collpse-btn" style="display: inline-block;">
            <span class="button-wrapper"><i class="fas fa-bars"></i></span>
        </button>
    </div>

    <div class="top-profile" id="top-profile" >
        <div class="img-row row-flex" role="button">
            <figure>
                <img src="../../images/admin_profile/admin_logo.jpg" alt="" class="top-img-profile">
            </figure>
            <span class="top-profile-name"><?php echo(isset($username))?$username." ".$user_short_name:''; ?></span>
        </div>

        <div class="profile-dropdown-row" style="display: none;">
        <span class="mobile_content m_u_name" style="color:#000;font-size:15px;padding-left:20px;font-weight:bold;border-bottom:1px solid gainsboro;">
        <?php echo(isset($username))?$username." ".$user_short_name:''; ?></span>
            <ul class="display-list">
                <li><a class="admin-profile-details"><i class="fas fa-user-cog"></i><span class="list-menu">ユーザー設定</span></a></li>
                <li><a class="admin-setting"><i class="fas fa-cog"></i><span class="list-menu">設定</span></a></li>
                <li><a href="../0_auth/logout.php"><i class="fas fa-power-off"></i><span class="list-menu">ログアウト</span></a></li>
            </ul>
        </div>
    </div>
</div>