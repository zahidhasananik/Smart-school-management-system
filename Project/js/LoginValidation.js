var flag = 0;
function change(x) 
{
    var format = /[@,#,$,%,!,&,*]/;
    var format1 = /^\d{10}$/;
    var format2 = /^\d{11}$/;
    var format3 = /\S+@\S+\.\S+/;
    var a = x.value;
    
    if(a=="")
    {
        if(x.name=="username"){
            document.getElementById("usernameErr").innerHTML = "Username cannot be empty";
            document.getElementById("usernameErr").style.color = "red";
            document.getElementById("username").style.borderColor = "red";
        }                
        
        else if(x.name=="password"){
            document.getElementById("passwordErr").innerHTML = "Password is required";
            document.getElementById("passwordErr").style.color = "red";
            document.getElementById("password").style.borderColor = "red";
        }            
    }
    else if((a.length < 8) && x.name=="password")
    {
        document.getElementById("passwordErr").innerHTML = "Password must be 8 charecters";
        document.getElementById("passwordErr").style.color = "red";
        document.getElementById("password").style.borderColor = "red";
    }
    else if((!format.test(a)) && x.name=="password")
    {
        document.getElementById("passwordErr").innerHTML = "Password must contain at least one of the special characters (@, #, $, %)";
        document.getElementById("passwordErr").style.color = "red";
        document.getElementById("password").style.borderColor = "red";
    }
   
    else
    {
        if(x.name=="username"){
            document.getElementById("usernameErr").innerHTML = "\u2713";
            document.getElementById("usernameErr").style.color = "green";
            document.getElementById("username").style.borderColor = "";
            flag=1;
        }
       
        else if(x.name=="password"){
            document.getElementById("passwordErr").innerHTML = "\u2713";
            document.getElementById("passwordErr").style.color = "green";
            document.getElementById("password").style.borderColor = "";
            flag=1;
        }
    }
    if(flag==1){
    document.getElementById("submit").disabled = false;
    }
}