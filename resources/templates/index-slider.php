<div class="w3-panel">
    <h1 class="w3-animate-left"><b> B a n k i t o</b></h1>
    <p class="w3-animate-right">Invierte en tu futuro</p>
</div>

<!-- Slideshow -->
<div class="w3-container">
    <div class="w3-display-container mySlides">
        <img src="images/coffee.jpg" style="width:100%">
        <div class="w3-display-middle w3-container">
            <button class="w3-button w3-white w3-padding-16 w3-hover-white w3-animate-bottom w3-round-xlarge"><b> Avanzamos contigo </b></button>
        </div>
    </div>
    <div class="w3-display-container mySlides">
        <img src="images/workbench.jpg" style="width:100%">
        <div class="w3-display-middle w3-container">
            <button class="w3-button w3-white w3-padding-16 w3-hover-white w3-animate-bottom w3-round-xlarge"><b> Aprendemos juntos </b></button>
        </div>
    </div>
    <div class="w3-display-container mySlides">
        <img src="images/sound.jpg" style="width:100%">
        <div class="w3-display-middle w3-container">
            <button class="w3-button w3-white w3-padding-16 w3-hover-white w3-animate-bottom w3-round-xlarge"><b> Proyección de futuro </b></button>
        </div>
    </div>

    <!-- Slideshow next/previous buttons -->
    <div class="w3-container w3-dark-grey w3-padding w3-xlarge">
        <div class="w3-left" onclick="plusDivs(-1)"><i class="fa fa-arrow-circle-left w3-hover-text-teal"></i></div>
        <div class="w3-right" onclick="plusDivs(1)"><i class="fa fa-arrow-circle-right w3-hover-text-teal"></i></div>

        <div class="w3-center">
            <span class="w3-tag demodots w3-border w3-transparent w3-hover-white" onclick="currentDiv(1)"></span>
            <span class="w3-tag demodots w3-border w3-transparent w3-hover-white" onclick="currentDiv(2)"></span>
            <span class="w3-tag demodots w3-border w3-transparent w3-hover-white" onclick="currentDiv(3)"></span>
        </div>
    </div>
</div>
<script>
// Slideshow
    var slideIndex = 1;
    showDivs(slideIndex);
    setInterval(nextDivs, 3500);

    function nextDivs() {
        showDivs(slideIndex += 1);
    }

    function plusDivs(n) {
        showDivs(slideIndex += n);
    }

    function currentDiv(n) {
        showDivs(slideIndex = n);
    }

    function showDivs(n) {
        var i;
        var x = document.getElementsByClassName("mySlides");
        var dots = document.getElementsByClassName("demodots");
        if (n > x.length) {
            slideIndex = 1
        }
        if (n < 1) {
            slideIndex = x.length
        }
        ;
        for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" w3-white", "");
        }
        x[slideIndex - 1].style.display = "block";
        dots[slideIndex - 1].className += " w3-white";
    }
</script>