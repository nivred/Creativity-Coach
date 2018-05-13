<?php
    if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $company = $_POST['company'];
        $address = $_POST['address'];
        $city = $_POST['city'];
        $state = $_POST['state'];
        $zip = $_POST['zip'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $org = $_POST['org'];
        $time = $_POST['time'];
        $ref = $_POST['ref'];
        $subject = $_POST['subject'];
        $message = $_POST['message'];

        $errorEmpty = false;
        $errorEmail = false;

        if (empty($name) || empty($email) || empty ($subject) || empty ($message)) {
            echo "<span class='form-error'>THIS FIELD REQUIRED</span>";
            $errorEmpty = true;
        }
        elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "<span class='form-error'>VALID EMAIL REQUIRED</span>";
            $errorEmail = true;
        } else {
            echo "<span class='form-success'>MESSAGE SENT</span>";

            $mailTo = "contact@dervinmejia.com";
            $headers = "From: ".$emailFrom;
            $txt = "Submission from: ".$name.".\n\n".

                    "Company: ".$company."\n".
                    "Address: ".$address."\n".
                    "City: ".$city.", ".
                    "State: ".$state.", ".
                    "Zip: ".$zip."\n\n".

                    "Organization Type:".$org."\n".
                    "Referred By: ".$ref."\n\n".

                    "Phone: ".$phone."\n".
                    "Available During: ".$time."\n\n".

                    "Email: ".$email."\n".

                    "Subject ".$subject."\n".
                    "Message ".$message."\n";
                 
            mail($mailTo, $subject, $txt, $headers);
            header("Location: index.html");
        }
    }
    else {
        echo "UNEXPECTED ERROR";
    }
?>

<script>
    $("#name, #email, #subject, #message").removeClass("input-error");

    var errorEmpty = "<?php echo $errorEmpty; ?>";
    var errorEmail = "<?php echo $errorEmail; ?>";

    if (errorEmpty == true) {
        $("#name, #email, #subject, #message").addClass("input-error");
    }
    if (errorEmail == true) {
        $("#email").addClass("input-error");
    }
    if (errorEmpty == false && errorEmail == false) {
        $("#name, #email, #subject, #message").val("");
    }
</script>