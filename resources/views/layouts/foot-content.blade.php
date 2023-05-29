<script src="../assets/js/core/popper.min.js" type="text/javascript"></script>
<script src="../assets/js/core/bootstrap.min.js" type="text/javascript"></script>
<script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>

<script src="../assets/js/plugins/countup.min.js"></script>

<script src="../assets/js/plugins/parallax.min.js"></script>


<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDTTfWur0PDbZWPr7Pmq8K3jiDp0_xUziI"></script>

<script async defer src="https://buttons.github.io/buttons.js"></script>
<script src="../assets/js/material-kit.min.js?v=3.0.4" type="text/javascript"></script>
<script></script>
<script>
    // get the element to animate
    var element = document.getElementById('count-stats');
    var elementHeight = element.clientHeight;

    // listen for scroll event and call animate function

    document.addEventListener('scroll', animate);

    // check if element is in view
    function inView() {
        // get window height
        var windowHeight = window.innerHeight;
        // get number of pixels that the document is scrolled
        var scrollY = window.scrollY || window.pageYOffset;
        // get current scroll position (distance from the top of the page to the bottom of the current viewport)
        var scrollPosition = scrollY + windowHeight;
        // get element position (distance from the top of the page to the bottom of the element)
        var elementPosition = element.getBoundingClientRect().top + scrollY + elementHeight;

        // is scroll position greater than element position? (is element in view?)
        if (scrollPosition > elementPosition) {
            return true;
        }

        return false;
    }

    var animateComplete = true;
    // animate element when it is in view
    function animate() {

        // is element in view?
        if (inView()) {
            if (animateComplete) {
                if (document.getElementById('state1')) {
                    const countUp = new CountUp('state1', document.getElementById("state1").getAttribute("countTo"));
                    if (!countUp.error) {
                        countUp.start();
                    } else {
                        console.error(countUp.error);
                    }
                }
                if (document.getElementById('state2')) {
                    const countUp1 = new CountUp('state2', document.getElementById("state2").getAttribute("countTo"));
                    if (!countUp1.error) {
                        countUp1.start();
                    } else {
                        console.error(countUp1.error);
                    }
                }
                if (document.getElementById('state3')) {
                    const countUp2 = new CountUp('state3', document.getElementById("state3").getAttribute("countTo"));
                    if (!countUp2.error) {
                        countUp2.start();
                    } else {
                        console.error(countUp2.error);
                    };
                }
                animateComplete = false;
            }
        }
    }

    if (document.getElementById('typed')) {
        var typed = new Typed("#typed", {
            stringsElement: '#typed-strings',
            typeSpeed: 90,
            backSpeed: 90,
            backDelay: 200,
            startDelay: 500,
            loop: true
        });
    }
</script>
<script>
    if (document.getElementsByClassName('page-header')) {
        window.onscroll = debounce(function() {
            var scrollPosition = window.pageYOffset;
            var bgParallax = document.querySelector('.page-header');
            var oVal = (window.scrollY / 3);
            bgParallax.style.transform = 'translate3d(0,' + oVal + 'px,0)';
        }, 6);
    }
</script>
<script defer src="https://static.cloudflareinsights.com/beacon.min.js/v52afc6f149f6479b8c77fa569edb01181681764108816"
    integrity="sha512-jGCTpDpBAYDGNYR5ztKt4BQPGef1P0giN6ZGVUi835kFF88FOmmn8jBQWNgrNd8g/Yu421NdgWhwQoaOPFflDw=="
    data-cf-beacon='{"rayId":"7c064fa2d80187db","version":"2023.4.0","r":1,"token":"1b7cbb72744b40c580f8633c6b62637e","si":100}'
    crossorigin="anonymous"></script>

<script>
    const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
    const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
</script>

<script>
    function updateSubtotal() {
        var quantityInput = document.getElementById('quantity');
        var quantity = parseInt(quantityInput.value);

        var priceField = document.getElementById('price');
        var price = parseInt(priceField.value);

        var subtotal = quantity * price;

        var subtotalElement = document.getElementById('subtotal');

        subtotalElement.innerHTML = subtotal.toLocaleString('en-US', {
            style: 'currency',
            currency: 'IDR'
        });
    }
</script>
