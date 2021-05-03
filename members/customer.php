

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
    <p><font color="red">What do you want ? </font></span></p>
    <br/>
    <select name="option">
        <option value="">Choose from here</option>
        <option value="Share your progress about your programming.">Share your progress about your programming.</option>
        <option value="Question about your error in programming.">Question about your error in programming.</option>
        <option value="Share your progress about your English.">Share your progress about your English.</option>
        <option value="Share your progress about your Speaking English.">Share your progress about your Speaking English.</option>
        <option value="Share your progress about your Writing.">Share your progress about your Writing.</option>
        <option value="Others">Others.</option>
    </select>
    <br/>
    <br/>
    <input type="submit" value="OK">
    <input type="button" onclick="history.back()" value="return">
</form>
</body>
</html>



