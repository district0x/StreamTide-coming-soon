<!--<script src="<?php //echo $app->getBaseUrl(); ?>dist/app.bundle.js"></script>-->
<?php
if(isset($_POST['email']) && !empty($_POST['email'])){
    /** user email */
    $user_email = $_POST['email'];
    shell_exec("echo $user_email | /var/lib/mailman/bin/add_members -r - LISTNAME");
    echo 1;
    die;
}
?>
</body>
</html>
