
<form method="post" action=""  onsubmit="return checkform();">
<p><span style="width:180px">Username: </span><input type="text" name="Username" id='un'></p>
<p><span style="width:180px">Password: </span><input type="password" name="Password" id='pw'></p>
<input type="submit" value="SUBMIT" />
</form>

<script language="javascript">
    var coll = document.getElementsByClassName("collapsible");
    var i;

    for (i = 0; i < coll.length; i++) {
      coll[i].addEventListener("click", function() {
        this.classList.toggle("active");
        var content = this.nextElementSibling;
        if (content.style.display === "block") {
          content.style.display = "none";
        } else {
          content.style.display = "block";
        }
      });
    }

               function checkform(){
    if(document.getElementById("un").value == 'you_found_me' && document.getElementById("pw").value == 'you_found_me' ){
        alert("Congratulations Challenge 1 Completed!");
        setTimeout(function() {window.location = "home.html" });
    }
    else{
        alert("Access denied.");
    }
}
</script>
