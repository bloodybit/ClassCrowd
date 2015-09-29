/**
 * Created by albertoanceschi on 29/09/15.
 */

var elFirst = document.getElementById('firstname');
var elLast = document.getElementById('lastname');
var elMail = document.getElementById('mail');
var elPass = document.getElementById('password');
var elRepass = document.getElementById('repassword');

var firstMsg = document.getElementById('firstFeedback');
var lastMsg = document.getElementById('lastFeedback');
var mailMsg = document.getElementById('mailFeedback');
var passMsg = document.getElementById('passFeedback');
var repassMsg = document.getElementById('repassFeedback');

function firstname_validation() {
    if (elFirst.value.length < 2) {
        firstMsg.innerHTML = 'First name must be 3 characters or more';
    } else {
        firstMsg.innerHTML = '';
    }
}

function lastname_validation() {
    if (elLast.value.length < 2) {
        lastMsg.innerHTML = 'Last name must be 3 characters or more';
    } else {
        lastMsg.innerHTML = '';
    }
}

function mail_validation() {
    var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    if (!elMail.value.match(mailformat)) {
        mailMsg.innerHTML = 'Email address not valid';
    } else {
        mailMsg.innerHTML = '';
    }
}

function password_validation() {
    if (elPass.value.length < 6) {
        passMsg.innerHTML = 'Password must be 6 characters or more';
    } else {
        passMsg.innerHTML = '';
    }
}

function repassword_validation() {
    if (elPass != elRepass) {
        repassMsg.innerHTML = 'Passwords are different'
    } else {
        repassMsg.innerHTML = '';
    }
}

elFirst.addEventListener('blur', function() { firstname_validation(); }, false);

elLast.addEventListener('blur', function() { lastname_validation(); }, false);

elMail.addEventListener('blur', function() { mail_validation(); }, false);

elPass.addEventListener('blur', function() { password_validation(), false});

elRepass.addEventListener('blur', function() { repassword_validation(), false});

