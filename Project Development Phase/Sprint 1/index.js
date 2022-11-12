function validation()
{
    var firstname = document.getElementById("firstname").value;
    var lastname = document.getElementById("lastname").value;
    if (firstname==null || firstname=="")
    {  
        alert("FirstName can't be blank");  
        return false;
    }
    else if(lastname==null || lastname=="")
    {
        alert("LastName can't be blank");
        return false;
    }
    
    var email = document.getElementById("email").value;
    var emailformat = /^(?:\w+\.?)*\w+@(?:\w+\.)+\w+$/;
    if (email!= "")
    {        
        var matchArray = email.match(emailformat);
        if (matchArray == null)
        {
            alert("Please Enter Email Address in Correct Format..");
            return false;
        }
    }

    var mobile = document.getElementById("mobile").value;
    var mobileformat =/^[7-9]\d{9}$/;
    if(mobile!="")
    {
        var matchArray = mobile.match(mobileformat)
        if(matchArray == null)
        {
            alert("Please Enter Mobile Number in Correct Format..")
            return false;
        }
    }

    var password = document.getElementById("password").value;
    var confrimpassword = document.getElementById("confrimpassword").value;
	if(password==confrimpassword)
	{
		return true;
	}
	else
	{
		alert("Password Must Be Same");
		return false;
	}
}