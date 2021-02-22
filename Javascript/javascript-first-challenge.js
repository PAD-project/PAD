
<form method="post" action=""  onsubmit="return checkform();">
<p><span style="width:180px">Username: </span><input type="text" name="Username" id='un'></p>
<p><span style="width:180px">Password: </span><input type="password" name="Password" id='pw'></p>
<input type="submit" value="SUBMIT" />
</form>

<script language="javascript">
               function checkform(){
    if(document.getElementById("un").value == 'test' && document.getElementById("pw").value == 'test' ){
        alert("Login Successful");
        setTimeout(function() {window.location = "home.html" });
    }
    else{
        alert("Access denied. Valid username and password is required.");
    }
}
</script>
