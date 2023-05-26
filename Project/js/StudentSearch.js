
function showuser() {
    var name=  document.getElementById("name").value;
    var phone=  document.getElementById("name").value;
    var userType=  document.getElementById("userType").value;
    if(name.length<1){
      document.getElementById("student_table_body").style.display = "contents";
      document.getElementById("student_search_body").style.display = "none";
    }
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
  
      if (this.readyState == 4 && this.status == 200) {
        if(name.length<1){
          document.getElementById("student_table_body").style.display = "contents";
          // document.getElementById("student_search_body").innerHTML = this.responseText;
        }
        else{
          document.getElementById("student_table_body").style.display = "none";
          document.getElementById("student_search_body").style.display = "contents";
          document.getElementById("student_search_body").innerHTML = this.responseText;
        }
      }
      else
      {
          document.getElementById("student_table_body").style.display = "contents";
          document.getElementById("student_search_body").innerHTML = this.status;
      }
    };
    xhttp.open("POST", "../../Controller/SearchUser.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    // , "phone="+phone, "userType="+userType
    xhttp.send("name="+name+"&phone="+phone+"&userType="+userType);
  
  
  }