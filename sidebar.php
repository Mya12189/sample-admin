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
<nav class="main-menu">
    <ul>
        <li class="navbar-top kenkanri-nav">
            <div class="logo">
                <img src="../../images/company_logo/logo_1.png" class="logo-img" alt="">
            </div>

            <div class="nav-close-button">
                <button class="left-collpse-close-btn">
                    <span class="close-wrapper"><i class="fas fa-arrow-left"></i></span>
                </button>
            </div>
        </li>

        <li>
            <a href="../1_dashboard/dashboard.php">
            <i class="fa fa-th-large fa-2x"></i>
            <span class="nav-text">ダッシュボード</span>
            </a>
        </li>

        <li class="has-subnav">
            <a href="../2_customer_company/2-2_customer_company_list.php">
            <i class="fa fa-building fa-2x"></i>
            <span class="nav-text">利用会社</span>
            </a>
        </li>
        
        <li class="has-subnav">
            <a href="../3_admin/3-3_admin_list.php">
            <i class="fa fa-users fa-2x"></i>
            <span class="nav-text">ユーザー</span>
            </a>
        </li>

        <li class="has-subnav">
            <a href="../4_access_log/access_log_list.php">
            <i class="fa fa-eye fa-2x"></i>
            <span class="nav-text">アクセスログ</span>
            </a>
        </li>

        <li class="has-subnav">
            <a class="admin-setting" style="cursor:pointer">
            <i class="fa fa-cog fa-2x"></i>
            <span class="nav-text">管理設定</span>
            </a>
        </li>

    </ul>

    <ul class="logout">
      <li>
        <a href="#">
          <i class="fa profile-image"><img src="../../images/admin_profile/admin_logo.jpg" alt="" class='img-profile'></i>
          <span class="nav-text"><?php echo(isset($username))?$username." ".$user_short_name:''; ?></span>
        </a>
      </li>
    </ul>
  </nav>