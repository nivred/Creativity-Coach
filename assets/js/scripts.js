// FORM VALIDATION & POST METHOD
$(document).ready(function() {
    $("form").submit(function(event) {
        event.preventDefault();
        var name = $("#name").val();
        var company = $("#company").val();
        var address = $("#address").val();
        var city = $("#city").val();
        var state = $("#state").val();
        var zip = $("#zip").val();
        var phone = $("#phone").val();
        var email = $("#email").val();
        var org = $("#org").val();
        var time = $("#time").val();
        var ref = $("#ref").val();
        var subject = $("#subject").val();
        var message = $("#message").val();
        var submit = $("#submit").val();
        $(".alert").load("contact-form.php", {
            name: name,
            company: company,
            address: address,
            city: city,
            state: state,
            zip: zip,
            phone: phone,
            email: email,
            org: org,
            time: time,
            ref: ref,
            subject: subject,
            message: message,
            submit: submit
        });
    });
});