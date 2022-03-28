$(document).ready(function () {
    $('#notmatch').hide();
    $('#thaform').submit(function (e) {
        let password = $('#password').val();
        let cpassword = $('#cpassword').val();        
        if (password !== cpassword) {
            e.preventDefault();
            console.log('Password Not the same');
            $('#notmatch').addClass('alert alert-danger');
            $('#notmatch').removeClass('alert-warning');
            $('#notmatch').text('PAssowrd not match')
            $('#notmatch').show();
            setTimeout(() => {
                $('#notmatch').fadeOut();
            }, 5000);
            console.log(password)
            console.log(cpassword)
        }
        let password_lenght = password.length;
        if (password_lenght < 8) {
            e.preventDefault();
            console.log('Password less than 8');
            $('#notmatch').addClass('alert alert-warning');
            $('#notmatch').removeClass('alert-danger');
            $('#notmatch').text('Password Must be a minimum of 8');
            $('#notmatch').show();
            setTimeout(() => {
                $('#notmatch').fadeOut();
            }, 5000);
        }

    });
});