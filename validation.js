function validate() {
    var fname = document.getElementById("firstname").value;
    var lname = document.getElementById("lastname").value;
    var name1 = fname.split("");
    var name2 = lname.split("");
    if (name1.length > 0 && name2.length > 0) {
        for (var i = 0; i < name1.length; i++) {
            if (!((name1[i] >= 'A' && name1[i] <= 'Z') || (name1[i] >= 'a' && name1[i] <= 'z'))) {
                alert("First name can only contain alphabets!");
                return false;
            }
        }
        for (var i = 0; i < name2.length; i++) {
            if (!((name2[i] >= 'A' && name2[i] <= 'Z') || (name2[i] >= 'a' && name2[i] <= 'z'))) {
                alert("Last name can only contain alphabets!");
                return false;
            }
        }
    }
    else {
        alert("please enter first and last name!");
        return false;
    }

    var email = document.getElementById("email").value;
    if (email.length > 0) {
        var mail = email.split("@");
        if (mail.length == 2) {
            var mail2 = mail[1].split(".");
            if (!(mail2.length == 2 && (mail2[0] != "" && mail2[1] != ""))) {
                alert("Email does not contain domain");
                return false;
            }
        }
        else {
            alert("Email should have a single '@'");
            return false;
        }
    }
    else {
        alert("Enter email");
        return false;
    }

    var pass = document.getElementById("password").value;
    var a = pass.split("");
    var bool1 = false;
    var bool2 = false;
    var bool3 = false;
    if (a.length >= 8) {
        for (var i = 0; i < a.length; i++) {
            if (a[i] >= 'A' && a[i] <= 'Z') {
                bool1 = true;
            }
            if (a[i] >= '0' && a[i] <= '9') {
                bool2 = true;
            }
            if (!((a[i] >= 'A' && a[i] <= 'Z') && (a[i] >= '0' && a[i] <= '9') && (a[i] >= 'a' && a[i] <= 'z'))) {
                bool3 = true;
            }
        }
        if (bool1 && bool2 && bool3) {
            alert("Successfully signed up!")
        }
        else {
            alert("Weak password");
            return false;
        }
    }
    else {
        alert("Password should have at least 8 characters!");
        return false;
    }

}