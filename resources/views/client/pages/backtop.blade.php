<div id="app">
    <!-- Your other content here -->

    <div class="back-to-top" onclick="scrollToTop()">
        <i class="fa-solid fa-arrow-up"></i>
    </div>
</div>

<script>
    function scrollToTop() {
        window.scrollTo({
            top: 0,
            behavior: "smooth",
        });
    }

    function handleScroll() {
        var isVisible = window.scrollY > 300;
        var backToTopButton = document.querySelector('.back-to-top');
        if (isVisible) {
            backToTopButton.classList.add('visible');
        } else {
            backToTopButton.classList.remove('visible');
        }
    }

    window.addEventListener("scroll", handleScroll);
</script>
