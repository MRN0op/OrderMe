<?php

require "partials/header.php";
require "partials/navbar.php";
require "partials/wrapperTop.php";

?>

<div class="bg-white border border-gray-200 rounded-lg shadow-lg p-8 transition-transform transform hover:scale-105 duration-300 mt-6 mb-6">
    <h1 class="text-4xl font-bold text-blue-600 text-center mb-6">Add delivery agent</h1>
    <form method="POST" action="">
        <div class="mb-8 flex flex-wrap items-center gap-4">
            <div class="flex-1">
                <label for="email" class="block text-gray-700 font-medium">Email</label>
                <input id="email" type="text" name="email" placeholder="Enter delivery agent's email"
                    class="w-full px-4 py-2 mt-1 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-600 focus:outline-none">
            </div>
            <div class="flex-1">
                <label for="name" class="block text-gray-700 font-medium">Name</label>
                <input id="name" type="text" name="name" placeholder="Enter delivery agent's name"
                    class="w-full px-4 py-2 mt-1 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-600 focus:outline-none">
            </div>
            <div class="flex items-end">
                <button type="submit" name="addAgent"
                    class="px-4 py-2 mt-7 text-white bg-blue-600 rounded-lg hover:bg-blue-700 transition">Add</button>
            </div>
        </div>
    </form>
</div>

<div class="bg-white border border-gray-200 rounded-lg shadow-lg p-8 transition-transform transform hover:scale-105 duration-300 mt-6 mb-6">
    <h1 class="text-4xl font-bold text-blue-600 text-center mb-6"> Delivery agents</h1>
    
</div>



<?php

require "partials/wrapperBot.php";

require "partials/footer.php";

?>