<?php

require "partials/header.php";
require "partials/navbar.php";
require "partials/banner.php";
require "partials/wrapperTop.php";

?>

<section class="py-16 bg-gray-50" id="how-it-works">
    <div class="text-center mb-12">
        <h2 class="text-3xl sm:text-4xl font-bold text-blue-600">How It Works</h2>
        <p class="text-lg sm:text-xl text-gray-700 mt-4">A simple and efficient process to manage your restaurant's deliveries.</p>
    </div>
    
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-12 container mx-auto px-6">
        <!-- Step 1 -->
        <div class="flex flex-col items-center">
            <div class="text-blue-600 text-4xl mb-4">
                <i class="fas fa-tachometer-alt"></i> <!-- Example icon, replace with actual icons -->
            </div>
            <h3 class="text-xl font-semibold mb-2">Restaurant Dashboard</h3>
            <p class="text-center text-gray-600">View and manage your delivery agents in one central place.</p>
        </div>

        <!-- Step 2 -->
        <div class="flex flex-col items-center">
            <div class="text-blue-600 text-4xl mb-4">
                <i class="fas fa-tasks"></i> <!-- Example icon -->
            </div>
            <h3 class="text-xl font-semibold mb-2">Assign Jobs</h3>
            <p class="text-center text-gray-600">Easily assign deliveries to available agents with a single click.</p>
        </div>

        <!-- Step 3 -->
        <div class="flex flex-col items-center">
            <div class="text-blue-600 text-4xl mb-4">
                <i class="fas fa-map-marker-alt"></i> <!-- Example icon -->
            </div>
            <h3 class="text-xl font-semibold mb-2">Real-Time Map</h3>
            <p class="text-center text-gray-600">Track your agents' locations on a map and get live updates.</p>
        </div>

        <!-- Step 4 -->
        <div class="flex flex-col items-center">
            <div class="text-blue-600 text-4xl mb-4">
                <i class="fas fa-route"></i> <!-- Example icon -->
            </div>
            <h3 class="text-xl font-semibold mb-2">Navigation</h3>
            <p class="text-center text-gray-600">Delivery agents receive turn-by-turn directions to complete the deliveries.</p>
        </div>
    </div>
</section>


<section class="py-20 bg-gray-50" id="testimonials">
  <div class="text-center mb-16">
    <h2 class="text-3xl sm:text-4xl font-bold text-blue-600">What Our Users Say</h2>
    <p class="text-lg sm:text-xl text-gray-700 mt-4 max-w-2xl mx-auto">
      See how our platform is helping restaurant owners and delivery agents succeed.
    </p>
  </div>

  <div class="container mx-auto px-6 grid grid-cols-1 md:grid-cols-3 gap-8">
    <!-- Testimonial 1 -->
    <div class="bg-white shadow-xl rounded-2xl p-8 text-center hover:shadow-2xl transition duration-300 ease-in-out">
      <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="User Photo" class="w-20 h-20 rounded-full mx-auto mb-4 object-cover">
      <p class="text-gray-600 italic mb-4">
        "Thanks to this platform, we manage our deliveries more efficiently and reduce errors in assignments."
      </p>
      <h3 class="text-xl font-semibold text-blue-600">Owner of XYZ Restaurant</h3>
    </div>

    <!-- Testimonial 2 -->
    <div class="bg-white shadow-xl rounded-2xl p-8 text-center hover:shadow-2xl transition duration-300 ease-in-out">
      <img src="https://randomuser.me/api/portraits/men/75.jpg" alt="User Photo" class="w-20 h-20 rounded-full mx-auto mb-4 object-cover">
      <p class="text-gray-600 italic mb-4">
        "The real-time tracking and easy job assignments have made my job much easier and faster."
      </p>
      <h3 class="text-xl font-semibold text-blue-600">John Doe, Delivery Agent</h3>
    </div>

    <!-- Testimonial 3 -->
    <div class="bg-white shadow-xl rounded-2xl p-8 text-center hover:shadow-2xl transition duration-300 ease-in-out">
      <img src="https://randomuser.me/api/portraits/women/44.jpg" alt="User Photo" class="w-20 h-20 rounded-full mx-auto mb-4 object-cover">
      <p class="text-gray-600 italic mb-4">
        "I love how easy it is to track and get directions for deliveries. It saves me a lot of time and stress."
      </p>
      <h3 class="text-xl font-semibold text-blue-600">Sarah, Delivery Agent</h3>
    </div>
  </div>
</section>



<section class="py-16 bg-white" id="for-delivery-agents">
    <div class="text-center mb-12">
        <h2 class="text-3xl sm:text-4xl font-bold text-blue-600">For Delivery Agents</h2>
        <p class="text-lg sm:text-xl text-gray-700 mt-4">Empowering your delivery team with tools to succeed.</p>
    </div>

    <div class="container mx-auto px-6 flex flex-col-reverse md:flex-row items-center">
        <!-- Text Section: Benefits -->
        <div class="flex-1 md:mr-12">
            <div class="mb-8">
                <h3 class="text-2xl font-semibold text-blue-600 mb-4">Simplified Job Assignment</h3>
                <p class="text-lg text-gray-600">Get notified about your next job directly on your phone.</p>
            </div>
            <div class="mb-8">
                <h3 class="text-2xl font-semibold text-blue-600 mb-4">Optimized Routes</h3>
                <p class="text-lg text-gray-600">Navigate easily with built-in maps and directions.</p>
            </div>
            <div>
                <h3 class="text-2xl font-semibold text-blue-600 mb-4">Earnings Insights</h3>
                <p class="text-lg text-gray-600">Track your earnings and job history directly from the app.</p>
            </div>
        </div>

        <!-- Image Section: Delivery Agent with Mobile App -->
        <div class="flex-1 mb-8 md:mb-0">
            <img src="/media/guyOnPhone.png" alt="Delivery Agent Using Mobile App" class="rounded-lg shadow-xl w-full h-auto">
        </div>
    </div>
</section>

<?php

require "partials/wrapperBot.php";

?>

<section class="py-16 bg-blue-600 text-white text-center">
    <div class="container mx-auto px-6">
        <!-- Title -->
        <h2 class="text-3xl sm:text-4xl font-bold mb-4">Start Managing Deliveries with Ease</h2>
        
        <!-- Description -->
        <p class="text-lg sm:text-xl mb-8">Sign up now and streamline your restaurant’s delivery operations.</p>
        
        <!-- CTA Buttons -->
        <div class="flex justify-center gap-6">
            <a href="/signup" class="bg-white text-blue-600 hover:bg-blue-100 hover:text-blue-800 font-semibold py-4 px-8 rounded-full text-lg transition duration-300 ease-in-out">
                Sign Up
            </a>
        
        </div>
    </div>
</section>


<footer class="bg-gray-800 text-white py-12">
    <div class="container mx-auto px-6">
        <div class="flex flex-col md:flex-row justify-between mb-8">
            <!-- Quick Links -->
            <div class="mb-6 md:mb-0">
                <h3 class="text-xl font-semibold mb-4">Quick Links</h3>
                <ul class="space-y-2">
                    <li><a href="#home" class="hover:text-blue-600">Home</a></li>
                    <li><a href="#about-us" class="hover:text-blue-600">About Us</a></li>
                    <li><a href="#terms" class="hover:text-blue-600">Terms of Service</a></li>
                    <li><a href="#privacy" class="hover:text-blue-600">Privacy Policy</a></li>
                </ul>
            </div>

            <!-- Contact Information -->
            <div class="mb-6 md:mb-0">
                <h3 class="text-xl font-semibold mb-4">Contact</h3>
                <ul>
                    <li>Email: <a href="mailto:support@yourrestaurant.com" class="hover:text-blue-600">support@yourrestaurant.com</a></li>
                    <li>Phone: <a href="tel:+352691112089" class="hover:text-blue-600">+352 691 112 089</a></li>
                </ul>
            </div>

            <!-- Social Media -->
            <div class="flex gap-6">
                <a href="https://www.facebook.com" class="text-white hover:text-blue-600">
                    <i class="fab fa-facebook fa-2x"></i>
                </a>
                <a href="https://www.twitter.com" class="text-white hover:text-blue-600">
                    <i class="fab fa-twitter fa-2x"></i>
                </a>
                <a href="https://www.linkedin.com" class="text-white hover:text-blue-600">
                    <i class="fab fa-linkedin fa-2x"></i>
                </a>
                <a href="https://www.instagram.com" class="text-white hover:text-blue-600">
                    <i class="fab fa-instagram fa-2x"></i>
                </a>
            </div>
        </div>

        <!-- Footer Bottom -->
        <div class="text-center text-sm text-gray-400">
            <p>&copy; 2025 OrderMe, All Rights Reserved.</p>
        </div>
    </div>
</footer>


<?php
require "partials/footer.php";

?>