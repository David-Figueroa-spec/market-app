<?php
//step 1. Get database connection
require('../config/database.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marketapp - list_users</title>
</head>
<body>
    <table border="1" align="Center";>
     <tr>
        <th>Full name</th>
        <th>E-mail</th>
        <th>Ide. number</th>
        <th>Phone number</th>
        <th>Status</th>
        <th>Options</th>
        
</tr>
<?php
    $sql_users = "
    select 
    u.firstname ||' '|| u.lastname as full_name, 
    u.email, 
    u.ide_number, 
    u.mobile_number, 
    case when u.status = true then 'Active' else 'Inactive' end as status 
    from  users as u ";
    $result = pg_query($conn_supa, $sql_users);
    if (!$result){
        die("Error: ". pg_last_error());
    }
    while ($row = pg_fetch_assoc($result)){
        echo "
            <tr>
                <td>".$row['full_name'] ."</td>
                <td>".$row['ide_number'] ."</td>
                <td>".$row['mobile_number'] ."</td>
                <td>".$row['status'] ."</td>
                <td>".$row['email'] ."</td>
        <td>
            <a href='#'><img src='icons/lupa.png' width='20'></a>
            <a href='#'><img src='icons/lapiz.png' width='20'></a>
            <a href='#'><img src='icons/papelera.png' width='20'></a>
        </td>
        
        </tr>
        ";
    }
?>

    </table>    
</body>
</html>