

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Find People</title>
</head>
<body>
Add your personal infomation ! <br/>
<form method="post" action="customer_add_check.php">
    Write down user name. <br/>
    <input type="text" name="name" style="width:220px"><br/>
    Enter your Password. <br/>
    <input type="password" name="pass" style="width: 110px"><br/>
    Enter your Password again.<br/>
    <input type="password" name="pass2" style="width: 110px"><br/>
    <br/>
    <font color="red">What do you want ? <br/></font>
    <br/>
    <select name="What do you want ?">
        <option value="">Choose from here</option>
        <option value="Programming">Share your progress about your programming.</option>
        <option value="Programming">Question about your error in programming.</option>
        <option value="English">Share your progress about your English.</option>
        <option value="English">Share your progress about your Speaking English.</option>
        <option value="English">Share your progress about your Writing.</option>
        <option value="else">Others.</option>
    </select>
    <br/>
    <br/>
    <input type="submit" value="OK">
    <input type="button" onclick="history.back()" value="return">
</form>
</body>
</html>

