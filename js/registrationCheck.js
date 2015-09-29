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

        }
    }

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

