<!--<script src="<?php //echo $app->getBaseUrl(); ?>dist/app.bundle.js"></script>-->
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>
    var formSent = false;
    var formURL = $('#email-form').attr('action');

    $('#email-form').submit(function() {
        if (validateForm($(this))) {
            sendForm();
        }
        return false;
    });

    function sendForm() {

        // animation actions

        var formData = $('#email-form').serialize();

        $.ajax({
            url: formURL,
            type: 'GET',
            data: formData,
            dataType: "jsonp",
            jsonp: "c",
            contentType: "application/json; charset=utf-8",

            success: function(data) {
                formSent = true;
                //console.log(data.result);
                $('input[name="email"]').val('');
                TweenMax.to('.thanks', .5, {
                    'opacity': 1,
                    'display': 'block'
                })
            }
        });

    }
</script>
</body>

</html>
