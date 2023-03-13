function check()
{
    var n1 = document.getElementById("username").value;
    var n2 = document.getElementById("password").value;

    if(n1 === "" || n2 === ""||((/\s/).test(n1)==true || (/\s/).test(n2)==true))
    {
        alert("Khong duoc de trong");
	return false;
    }
    else 
    {
        return true;
    }
}
