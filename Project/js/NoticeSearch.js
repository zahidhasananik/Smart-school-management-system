
function showNotices() {
    var name=  document.getElementById("name").value;
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
  
      if (this.readyState == 4 && this.status == 200) {
          document.getElementById("notices_body").innerHTML = this.responseText;
      }
      else
      {
          document.getElementById("notices_body").innerHTML = this.status;
      }
    };
    xhttp.open("POST", "../../Controller/SearchNotice.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    // , "phone="+phone, "userType="+userType
    xhttp.send("name="+name);
  
  
  }