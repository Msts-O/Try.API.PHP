<?php
//session_start();
//session_regenerate_id(true);
//if(isset($_SESSION['login'])==false)
//{
//    print 'login yet.<br/>';
//    print '<a href="../staff_login/staff_login.html"> To login page.</a>';
//    exit();
//}
//else
//{
//    print $_SESSION['staff_name'];
//    print '  is login now.<br/>';
//    print '<br/>';
//}
//?>
<body>

<?php

//require_once ('../common/common.php');

//$post=sanitize($_POST);
$customer_name  =$_POST['name'];
$customer_pass  =$_POST['pass'];
$customer_pass2 =$_POST['pass2'];
$customer_option=$_POST['option'];var_dump($customer_option);

if($customer_name=='') {
    print 'write down name plz!! <br/>';} else{
    print 'customer_name:';
    print $customer_name;
    print '<br/>';
}

if($customer_pass==''){
    print 'enter your password!<br/>';
}

if ($customer_option == 'Choose from here') {
    print 'you do not your choice<br>';
} else {
    print 'option_value:';
    print  $customer_option ;
    print '<br/>';
}

if($customer_name=='' || $customer_pass=='' || $customer_pass!=$customer_pass2){
    print '<form>';
    print '<input type="button" onclick="history.back()" value="return"> ';
    print '</form>';} else {
    $customer_pass=md5($customer_pass);
    print '<form method="post" action="customer_add_done.php">';
    print '<input type="hidden" name="name" value="'.$customer_name.'">';
    print '<input type="hidden" name="pass" value="'.$customer_pass.'">';
    print '<br/>';
    print '<input type="button" onclick="history.back()" value="return">';
    print '<input type="submit" value="OK">';
    print '</form>';
}
?>
</body>
