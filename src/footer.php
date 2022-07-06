<script src="<?php echo $app->getBaseUrl(); ?>dist/app.bundle.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/gsap/1.18.0/TweenMax.min.js"></script>
<script>
    var formSent = false;
    var formURL = $('#email-form').attr('action');

    $('#email-form').submit(function(e) {
        //e.preventDefault();
        if (validateForm()) {
            sendForm();
        }
        return false;
    });

    $('input[type="email"]').focus(function(){
        $('.c-footer__btn').text('Get Updates');
    });

    function validateForm(){
        var email = $('input[type="email"]').val();
        if(email == ''){
            alert('please enter an email');
            return false;
        }
        return true;
    }
    function sendForm() {

        // animation actions
        var email = $('input[type="email"]').val();
        var formData = { EMAIL: email }//$('#email-form').serialize();
        console.log(formData);
    

        $.ajax({
            url: formURL,
            type: 'GET',
            data: formData,
            dataType: "json",
            contentType: "application/json; charset=utf-8",
            success: function(data) {
                formSent = true;
                console.log(data.result);
                //alert(data.result);
                if(data.result == 'success'){
                    $('input[type="email"]').val('');
                    $('.c-footer__btn').text('Subscribed!');
                    $('.thanks').text(data.msg);
                    TweenMax.to('.thanks', .5, {
                        'opacity': 1,
                        'display': 'block'
                    })
                }else{
                    $('input[type="email"]').val('');
                    $('.error_subscribe').text("Error Occured: "+data.msg);
                    TweenMax.to('.error_subscribe', .5, {
                        'opacity': 1,
                        'display': 'block'
                    })
                }
            }
        });

    }
</script>
</body>

</html>
