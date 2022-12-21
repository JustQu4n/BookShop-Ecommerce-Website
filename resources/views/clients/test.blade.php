<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>jQuery post() Demo</title>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
$(document).ready(function(){
    $("form").submit(function(event){
        // Stop form from submitting normally
        event.preventDefault();
        
        /* Serialize the submitted form control values to be sent to the web server with the request */
        var formValues = $(this).serialize();
        
        // Send the form data using post
        $.post("", formValues, function(data){
            // Display the returned data in browser
            $("#result").html(data);
        });
    });
});
</script>
</head>
<body>
    <form method="post">
        @csrf 
        <label>Name: <input type="text" name="name"></label>
        <label>Comment: <textarea cols="50" name="comment"></textarea></label>
        <input type="submit" value="Send">
    </form>
    <div id="result"></div>
</body>
</html>