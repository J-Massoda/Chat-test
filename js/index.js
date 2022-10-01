const lock = document.querySelector('.fa-lock');
const pass = document.querySelector('#password');

function show ()
{
    if (pass.type == 'password') {
        pass.type = 'text'
    } else {
        pass.type = 'password'
    }
}