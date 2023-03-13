function check()
{
    var n1 = document.getElementById("username");
    var n2 = document.getElementById("password");
    if(n1 != " " && n2 != " ")
    {
        return true;
    }
    else 
    {
        alert("Khong duoc de trong");
    }
}