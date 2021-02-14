function ShowMessage()
{
    var email = document.getElementById("email").value;
    var message = document.getElementById("message").value;
    var pattern = /^([\w]+)@([\w]+)\.([\w]+)$/;
    var result = email.match(pattern);
    if(email == null || email == "" || message == null || message == "")
    {
        alert("Please fill out the required information!");
    }
    else if(result == null)
    {
        alert("Invalid email address!");
    }
    else if(message.length < 10)
    {
        alert("Your message must contain at least 10 characters.")
    }
    else
    {
        alert("Your message has been delivered!");
        window.location.reload();
    }
}