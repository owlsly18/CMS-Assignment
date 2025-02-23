<?php
include 'db.php';

$sql = "SELECT * FROM outsource_payments";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../assets/css/styles.css">
    <!-- <script> -->
</head>
<body>
    
    <nav>
        <div class="nav-logo">
            <img src="../assets/images/Logo.svg" alt="Logoipsum">
        </div>
        <div class="nav-items">
            <a href="" class="nav-item">Products</a>
            <a href="" class="nav-item">Solutions</a>
            <a href="" class="nav-item">Help Center</a>
            <a href="" class="nav-item">Get Started</a>
        </div>
        <div class="nav-btns">
            <a href="" class="nav-item nav-btn login">Login</a>
            <a href="" class="nav-item nav-btn demo btn">Request a demo</a>
        </div>
        <div class="hamburger" onclick="toggleMenu()">
            &#9776;
        </div>
    </nav>
    <section class="hero">
        <div class="slider-area">
            <div class="title" id="hero-title">Get instant cash 
                flow with invoice 
                factoring</div>
            <div class="sub-title" id="hero-subtitle">Why wait? Get same day funding and a faster way to access cash flow.</div>
            <div class="btn" id="hero-btn">Get started</div>
            <div class="slide-indicator">
                <div class="circle active" onclick=changeSlide(0)></div>
                <div class="circle" onclick=changeSlide(1)></div>
                <div class="circle" onclick=changeSlide(2)></div>
            </div>
        </div>
        <div class="img-area">
            <img src="../assets/images/HeroImage.png" alt="HeroImagePng" id="hero-image">
        </div>
    </section>
    <section class="outsource-payment">
        <div class="heading">
            <div class="title">Outsource payment collection</div>
            <div class="sub-title">Faster and flexible access to cash flow from one or all your invoices.</div>
        </div>
        <div class="content">
            <?php while ($row = $result->fetch_assoc()) : ?>
                <div class="card">
                    <img src="../assets/images/<?php echo ($row['icon']); ?>" alt="Icon">
                    <h3 class="title"><?php echo ($row['title']); ?></h3>
                    <p class="sub-title"><?php echo ($row['description']); ?></p>
                </div>
            <?php endwhile; ?>
        </div>
    </section>

    <section class="task-manager">
        <div class="heading">
            <div class="title">Task Manager</div>
            <div class="sub-title">Your daily to do list</div>
        </div>
        <div class="content">
             <div class="task-list" id="task-list"></div>
             <div class="add-new-task">
                <input class="text-area" type="text" id="task-input" placeholder="Add new task">
             </div>
             <div class="add-task btn" onclick="addTask()">Add Task</div>
        </div>
    </section>


    <section class="contact-us">
        <div class="heading">
        <div class="title">Contact Us</div>
        <div class="sub-title">Speak with our team to see how we can help your business.</div>
        </div>
        <div class="content">
            <form action="" class="contact-form" id="contact-form">
                <input type="text" id="name" name="name" placeholder="Your name" required><br>
                <input type="text" id="email" name="email" placeholder="Email" required><br>
                <input type="text" id="number" name="number" placeholder="Your best contact number" ><br>
                <input type="text" id="honeypot" name="honeypot" style="display:none;">
                <textarea id="message" name="message" rows="5" placeholder="Enter your message here" class="textarea" required></textarea><br>
                <button class="btn" type="submit">Submit</button>
            </form>
            
        </div>
    </section>


    <footer>
        <div class="footer-top">
            <div class="description">
                <div class="texts">Curabitur consequat, purus a scelerisque sagittis, nulla metus tincidunt elit, vel venenatis nulla libero nec nulla. Suspendisse potenti. Aenean a justo vel sapien pellentesque tincidunt. Sed luctus, elit ac interdum convallis, ligula libero egestas orci, at auctor felis ligula nec odio.</div>
                <div class="icons">
                    <img src="../assets/images/LinkedinIcon.svg" alt="Linkedin">
                    <img src="../assets/images/EmailIcon.svg" alt="Email">
                </div>
            </div>
            <div class="links">
                <div class="link-category">
                    <div class="title">Products</div>
                    <div class="link">Payments</div>
                    <div class="link">Invoice Factoring</div>
                    <div class="link">Invoice finance</div>
                    <div class="link">Supplier finance</div>
                    <div class="link">Customer finance</div>
                </div>
                <div class="link-category">
                    <div class="title">Company</div>
                    <div class="link">About us</div>
                    <div class="link">Contact us</div>
                </div>
                <div class="link-category">
                    <div class="title">Resources</div>
                    <div class="link">Frequently asked questions</div>
                    <div class="link">Knowledge base</div>
                    <div class="link">API documentation</div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="other-links">
                <div class="link">Privacy policy</div>
                <div class="link">Contact us</div>
            </div>
            <div class="site-links">
                <div class="link">Site map</div>
                <div class="link">@ebpearls</div>
            </div>
        </div>
    </footer>
    <script>
        function toggleMenu() {
            const navItems = document.querySelector('.nav-items');
            navItems.classList.toggle('active');
        }
    </script>
    <script src="../assets/js/slider.js"></script>
    <script src="../assets/js/formvalidation.js"></script>
    <script src="../assets/js/taskmanager.js"></script>
</body>
</html>