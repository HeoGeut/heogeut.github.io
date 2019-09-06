function notready() {
    alert("준비 중입니다.");
}

function check() {

    if (document.input_id.id.value == "admin")
    {
        if (document.input_pw.pw.value == "1234")
        {
            location.href = "Admin.html";
        }
        else
        {
            alert("Wrong Password!");
        }
    }
    else
    {
        alert("Wrong Id!");
    }
}

function enterkey() {
    if (window.event.keyCode == 13) {
        check();
    }
}

function agree()
{
    if(document.getElementById("agree").checked == true)
    {
        location.href = "Signin.html";
    }
    else
    {
        alert("please agree the policy");
    }
}