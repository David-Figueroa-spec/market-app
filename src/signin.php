<?php     
//step 1. Get database connection
require('../config/database.php');
//step 2. Get form-data
$e_mail = trim($_POST['email']);
$p_wd = trim($_POST['passwd']);
//$ecn_pass = password_hash($p_wd, PASSWORD_DEFAULT );
$ecn_pass = md5($p_wd);
//Step 3. Query to validate data
$sql_check_user=" select 
                    u.email,
                    u.password
                from
                    users u
                where
                    u.email='$e_mail' and
                    u.password = '$git ecn_pass'
                limit 1
";
//Step 4. Execute query
$res_check = pg_query($conn_supa, $sql_check_user);

if(pg_num_rows($res_check) > 0){
   // echo "User exist. Go to main page!!";
    header('refresh:0;url=main.php');

} 
else{ 
    echo "Verify data";
}