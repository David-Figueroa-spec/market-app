<?php
//step 1. Get database connection
require('../config/database.php');
//step 2. Get form-data
$f_name = $_POST['fname'];
$l_name = $_POST['lname'];
$m_number = $_POST['mnumber'];
$id_number = $_POST['idnumber'];
$e_mail = $_POST['email'];
$p_wd = $_POST['passwd'];
//step 3. create query to insert into
$query="
insert into users(
firstname, lastname, mobile_number, 
ide_number, email, password
) 
values(
'$f_name', '$l_name', '$m_number', '$id_number', 
'$e_mail', '$p_wd'
)
";
//step 4. Execute query
$res = pg_query($conn, $query);

//step 5. Validate result

if($res){
    echo "User has been created successfully !!!";
}else{
    echo "something wrong!";
}
?>