function SendMail()
{
    var body = document.getElementById("message").value;
    var SubjectLine = document.getElementById("subject").value;
    window.location.href = "mailto:strategyquant1@gmail.com?subject="+SubjectLine+"&body="+body;
}