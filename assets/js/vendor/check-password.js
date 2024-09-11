function checkPassword() {
    var text = document.getElementById('password').value;

    var length = document.getElementById('length');
    var lowercase = document.getElementById('lowercase');
    var uppercase = document.getElementById('uppercase');
    var number = document.getElementById('number');
    var special = document.getElementById('special');
    checkIfEightChar(text) ? length.classList.add('success') : length.classList.remove('success');
    checkIfOneLowercase(text) ? lowercase.classList.add('success') : lowercase.classList.remove('success');
    checkIfOneUppercase(text) ? uppercase.classList.add('success') : uppercase.classList.remove('success');
    checkIfOneDigit(text) ? number.classList.add('success') : number.classList.remove('success');
    checkIfOneSpecialChar(text) ? special.classList.add('success') : special.classList.remove('success');
}
function getPassword() {
    var text = document.getElementById('password').value;
    $(".checklist-password").show();
}

function checkIfEightChar(text){
    return text.length >= 8;
}

function checkIfOneLowercase(text) {
    return /[a-z]/.test(text);
}

function checkIfOneUppercase(text) {
    return /[A-Z]/.test(text);
}

function checkIfOneDigit(text) {
    return /[0-9]/.test(text);
}

function checkIfOneSpecialChar(text) {
    return /[~`!#$%\^&*+=\-\[\]\\';,/{}|\\":<>\?]/g.test(text);
}
function alertCheckPassword(){
    $('.checklist-password').removeClass('is-invalid').addClass('is-invalid');
}