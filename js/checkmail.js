function checkemail() {
    username = document.getElementById("uiEmail").value;
    document.getElementById("uiMessage").innerHTML = 'Please wait...';

    $.ajax({
        url: 'add-user.php',
        type: 'POST',
        async: !1,
        //contentType: 'charset=utf-8',
        data: { un: email},
        success: function (data) {
            document.getElementById("uiMessage").innerHTML = data;
        }
    });

}
