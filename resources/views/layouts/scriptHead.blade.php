<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    $("#hide").hide()
    $(document).ready(function() {
        $("#menu-an").click(function() {
            $("#hide").toggle(1000);
        });
    });
</script>


<script>
    var mybutton = document.getElementById("nav");
    window.onscroll = function() {
        navfixed()
    };

    // When the user scrolls down 20px from the top of the document, show the button


    function navfixed() {
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {

            mybutton.style.position = "fixed";
        } else {
            mybutton.style.position = "sticky";
        }
    }

    // When the user clicks on the button, scroll to the top of the document
    function topFunction() {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
    }
</script>

<script>
    function openNav() {
        var temp = document.getElementById("hide")

        temp.style.display = "inline-block";
    }
</script>
