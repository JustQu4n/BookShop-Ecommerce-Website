{{--  <div id="center">
    <div class="loading-screen">
        <div class="loading-animation">
            <img src="{{asset('assets/images/logoes/logo.png')}}" alt="" class="logo-loading ">
            <div class="loading-bar"></div>
        </div>
    </div>
</div>

<script>
    var loader = document.getElementById("center")
        window.addEventListener("load", function () {
            loader.style.display = "none";
        })
</script>  --}}
<button class="scrollTop" onclick="topFunction()" id="myBtn" title="Go to top" style="display: inline-block;">
    <i class="ti-arrow-up"></i>
</button>

<script>
    var mybutton = document.getElementById("myBtn");

    // When the user scrolls down 20px from the top of the document, show the button
    window.onscroll = function() {
        scrollFunction()
    };

    function scrollFunction() {
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {

            mybutton.style.display = "block";
        } else {
            mybutton.style.display = "none";
        }
    }

    // When the user clicks on the button, scroll to the top of the document
    function topFunction() {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
    }
</script>
