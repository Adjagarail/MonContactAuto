$(document).ready(function(){
    $("#submit1").click(function(event){
        let email = $('#email1').val();
        $.ajax({
            url: "/ajout/ajax/email/"+email,
            type: 'POST'
        }).done(function (data) {
            window.location.reload();
            console.log(data)
        })
    });
});