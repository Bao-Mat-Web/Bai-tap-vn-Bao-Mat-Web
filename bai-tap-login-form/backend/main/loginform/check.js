function check()
{
    var allow = /^([a-zA-Z0-9_\-])+$/;
    var n1 = document.getElementById("username").value;
    var n2 = document.getElementById("password").value;
    if (n1 == "" || n2 == "")
    {
        alert("Khong duoc de trong");
        return false;
    }
    else if (n1.match(allow))
    {
        alert("Ten dang nhap hop le");
        return true;
    }
    else
    {
        alert("Ten dang nhap khong hop le");
        return false;
    }
}