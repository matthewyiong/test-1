let form_box = document.getElementsByClassName('form-box')[0];
let login_box = document.getElementsByClassName('login-box')[0];
let register_box = document.getElementsByClassName('register-box')[0];
function register() {
    form_box.style.transform = 'translateX(80%)';
    login_box.classList.add('hidden');
    register_box.classList.remove('hidden');
}
function login() {
    form_box.style.transform = 'translateX(0)';
    login_box.classList.remove('hidden');
    register_box.classList.add('hidden');
}


function showAlert(message, success = false){
    alert (message);
    // var alertBox= document.getElementById('alert');
    // alertBox.textContent= message;
    // alertBox.classList.toggle('success',success);
    // alertBox.style.display = 'block';
    // setTimeout(function(){
    //     alertBox.style.display = 'none';

    // }, 3000);
}