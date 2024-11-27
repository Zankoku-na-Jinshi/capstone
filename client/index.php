<?php
include '../conn.php';
include 'layout/_layout.php';
?>

<!-- Welcome Section -->
<section id="welcome">
    <div class="content">
        <h2>FOOD <span>and</span> BREW</h2>
        <p>Meet. Eat. Drink. Smile.</p>
        <p>Est. 2022</p>
        <div class="button-container">
            <a href="#aboutus">Learn More</a>
            <a href="order.php">Order Now</a>
        </div>
        <div class="links">
            <a href="https://www.facebook.com/profile.php?id=61562315550432" class="social-icon facebook"><i
                    class="fab fa-facebook"></i></a>
            <a href="#" class="social-icon twitter"><i class="fab fa-twitter"></i></a>
            <a href="#" class="social-icon instagram"><i class="fab fa-instagram"></i></a>
        </div>
    </div>
</section>

<main>
    <!-- Our History Section -->
    <section id="history-section">
        <div class="history-card scroll-card">
            <div class="history-content">
                <h2>Our History</h2>
                <p>FAB Cafe opened on December 19, 2022, as the first coffee shop in San Antonino, Burgos, Isabela.</p>
            </div>
            <img src="../assets/images/shopcolseup.jpg" alt="Our History" class="history-image">
        </div>
    </section>

    <!-- Meet Our Owner Section -->
    <section id="owner-section">
        <div class="owner-card scroll-card">
            <img src="../assets/images/place.jpg" alt="Meet Our Owner" class="owner-image">
            <div class="owner-content">
                <h2>Our Place</h2>
                <p>Designed for your best comfort, our cafe is a haven for coffee enthusiasts and food lovers alike.</p>
            </div>
        </div>
    </section>





    <!-- About Us Section -->
    <div id="aboutus" class="responsive-container-block bigContainer">
        <div class="responsive-container-block Container">
            <div class="responsive-container-block leftSide">
                <p class="text-blk heading">
                    About Our Cafe
                </p>
                <p class="text-blk subHeading">
                    At FAB Cafe, we believe in bringing people together over a shared love of coffee and good food.
                    Since opening our doors in 2022, our mission has been to create a warm, welcoming environment
                    where
                    everyone feels like family. From our carefully crafted brews to our delicious food offerings,
                    every
                    aspect of FAB Cafe is designed to make your experience memorable.
                </p>
            </div>
            <div class="responsive-container-block rightSide">
                <img class="number1img" src="../assets/images/pic1.jpg">
                <img class="number2img" src="../assets/images/pic2.jpg">
                <img class="number3img" src="../assets/images/pic3.jpg">
                <img class="number5img" src="../assets/images/pic4.jpg">
                <iframe allowfullscreen="allowfullscreen" class="number4vid"
                    poster="https://workik-widget-assets.s3.amazonaws.com/widget-assets/images/b242.png"
                    src="https://www.youtube.com/embed/svg%3E?">
                </iframe>
                <img class="number7img" src="../assets/images/pic5.jpg">
                <img class="number6img" src="../assets/images/place.jpg">
            </div>
        </div>
    </div>


    <!-- Menu Section -->
    <section id="menu">
        <h2>Best Selling Products</h2>
        <div class="menu-content">
            <div class="menu-item">
                <img src="../assets/images/coffeephoto.jpg" alt="Menu Item 1">
                <h3>Salted Caramel</h3>
                <p>Coffee</p>
                <p>Price: ₱100.00</p>
            </div>
            <div class="menu-item">
                <img src="../assets/images/frappephoto.jpg" alt="Menu Item 2">
                <h3>Mocha</h3>
                <p>Frappuccino</p>
                <p>Price: ₱120.00</p>
            </div>
            <div class="menu-item">
                <img src="../assets/images/milkshakephoto.jpg" alt="Menu Item 3">
                <h3>Cookies & Cream</h3>
                <p>Milkshake</p>
                <p>Price: ₱59.00</p>
            </div>
        </div>
    </section>

    <!-- Contact Us Section -->
    <section id="contact" class="contact-section">
        <div class="contact-bg">
            <h3 style="color: white">Get in Touch with Us</h3>
            <h2>Contact Us</h2>
            <div class="line">
                <div></div>
                <div></div>
                <div></div>
            </div>
            <p class="text">Have questions or need assistance? We're here to help! Reach out to us for any inquiries,
                feedback, or support, and we'll get back to you as soon as possible.</p>
        </div>
    </section>

    <div class="contact-body">
        <div class="contact-info">
            <div>
                <span><i class="fas fa-mobile-alt"></i></span>
                <span>Phone No.</span>
                <span class="text">+63-995-378-3837</span>
            </div>
            <div>
                <span><i class="fas fa-envelope-open"></i></span>
                <span>E-mail</span>
                <span class="text">fabcafe22@gmail.com</span>
            </div>
            <div>
                <span><i class="fas fa-map-marker-alt"></i></span>
                <span>Address</span>
                <span class="text">San Antonino, Burgos, Isabela</span>
            </div>
            <div>
                <span><i class="fas fa-clock"></i></span>
                <span>Opening Hours</span>
                <span class="text">Monday - Sunday (9:00 AM to 8:00 PM)</span>
            </div>
        </div>

        <div class="contact-form">
            <form>
                <div>
                    <input type="text" class="form-control" placeholder="First Name">
                    <input type="text" class="form-control" placeholder="Last Name">
                </div>
                <div>
                    <input type="email" class="form-control" placeholder="E-mail">
                    <input type="text" class="form-control" placeholder="Phone">
                </div>
                <textarea rows="5" placeholder="Message" class="form-control"></textarea>
                <input type="submit" class="send-btn" value="send message">
            </form>

            <div>
                <img src="../assets/images/contactpic.png" alt="">
            </div>
        </div>
    </div>

    <div class="map">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15477.56229562094!2d121.6944967!3d17.0910031!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33855f81a6a86eb5%3A0x136aa6d04c38a527!2sFAB%20Cafe!5e0!3m2!1sen!2sph!4v1700910304"
            width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false"
            tabindex="0"></iframe>
    </div>

    <!-- Our Team Section -->
    <section id="employees">
        <h2 class="section-title">Our Team</h2>
        <div class="employees-container">
            <div class="employee-card scroll-card">
                <img src="../profiles/jhanjhanprofile.jpg" alt="Employee 1" class="employee-image">
                <h3>Jhan-Jhan Soriben</h3>
                <p>Barista</p>
            </div>
            <div class="employee-card scroll-card">
                <img src="../profiles/arleabelprofile.jpg" alt="Employee 2" class="employee-image">
                <h3>Arleabel Ramos</h3>
                <p>Manager</p>
            </div>
            <div class="employee-card scroll-card">
                <img src="../profiles/danielprofile.jpg" alt="Employee 3" class="employee-image">
                <h3>Daniel Caccam</h3>
                <p>Assistant</p>
            </div>
        </div>
    </section>



    <div class="contact-footer">
        <h3>Follow Us</h3>
        <div class="social-links">
            <a href="#" class="fab fa-facebook-f"></a>
            <a href="#" class="fab fa-twitter"></a>
            <a href="#" class="fab fa-instagram"></a>
            <a href="#" class="fab fa-linkedin"></a>
            <a href="#" class="fab fa-youtube"></a>
        </div>
    </div>
    </section>




    <!-- Footer -->
    <footer>
        <p>&copy; 2024 Food & Brew. All rights reserved.</p>
    </footer>
</main>

</body>
<script>
    function handleScrollAnimation() {
        const scrollCards = document.querySelectorAll('.scroll-card');
        scrollCards.forEach(card => {
            const cardPosition = card.getBoundingClientRect().top;
            const windowHeight = window.innerHeight;
            if (cardPosition < windowHeight - 100) {
                card.classList.add('in-view');
            }
        });
    }

    window.addEventListener('scroll', handleScrollAnimation);
    window.addEventListener('load', handleScrollAnimation);
</script>
<script>
    let lastScrollTop = 0;
    const sidebar = document.querySelector("sidebar");

    window.addEventListener("scroll", () => {
        const scrollTop = window.pageYOffset || document.documentElement.scrollTop;

        if (scrollTop > lastScrollTop) {
            // Scroll down - hide the sidebar
            sidebar.classList.add("hide-sidebar");
        } else {
            // Scroll up - show the sidebar
            sidebar.classList.remove("hide-sidebar");
        }

        lastScrollTop = scrollTop <= 0 ? 0 : scrollTop; // For Mobile or negative scrolling
    });
</script>

</html>