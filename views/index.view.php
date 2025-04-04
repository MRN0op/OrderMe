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


<?php

require "partials/wrapperBot.php";
require "partials/footer.php";

?>