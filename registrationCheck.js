/**
 * Created by albertoanceschi on 29/09/15.
 */
function formValidation() {
    var fname = document.registration.firstname;
    var lname = document.registration.lastname;
    var email = document.registration.mail;
    var pass = document.registration.password;
    var repass = document.registration.repassword;
    var uclass = document.registration.class;

    if (fname_validation(fname)) {
        if (lname_validation(lname)) {
            if (email_validation(email)) {
                if (pass_validation(pass, repass)) {

                }
            }
        }
    }

    return false;

}

function fname_validation(fname) {
    var fname_len = fname.value.length;
    if (fname_len == 0 ) {
        alert("First name should not be empty");
        fname.focus();
        return false;
    }
    return true;
}

function lname_validation(lname) {
    var lname_len = lname.value.length;
    if (lname_len == 0 ) {
        alert("Last name should not be empty");
        lname.focus();
        return false;
    }
    return true;
}

function email_validation(email) {
    var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    if (email.value.match(mailformat)) {
        return true;
    } else {
        alert("You have entered an invalid email address");
        email.focus();
        return false;
    }
}

function pass_validation(pass, repass) {
    var pass_len = pass.value.length;
    var repass_len = repass.value.length;
    if (pass_len == 0 || repass_len == 0) {
        alert("Password should not be empty");
        pass.focus();
        repass.focus();
        return false;
    } else if (pass != repass) {
        alert("Passwords should be the same");
        pass.focus();
        repass.focus();
        return false;
    }
    return true;
}