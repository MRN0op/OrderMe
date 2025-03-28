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

<!-- Delivery Agents Section -->
<div class="bg-white border border-gray-200 rounded-lg shadow-lg p-8 mt-6 mb-6">
    <h1 class="text-3xl font-bold text-blue-600 text-center mb-6">Delivery Agents</h1>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        <!-- Agent 1 (Available) -->
        <div class="p-6 bg-white rounded-lg shadow-md border border-gray-200 transition-transform transform hover:scale-105 duration-300 flex flex-col items-center text-center group">
            <h2 class="text-xl font-semibold text-gray-800">Agent 1</h2>
            <p class="text-gray-600 mt-1">📍 New York, NY</p>
            <div class="flex items-center mt-3">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 group-hover:text-green-600 transition">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                </svg>
                <span class="ml-2 font-medium group-hover:text-green-600 transition">Available</span>
            </div>
        </div>

        <!-- Agent 2 (Busy) -->
        <div class="p-6 bg-white rounded-lg shadow-md border border-gray-200 transition-transform transform hover:scale-105 duration-300 flex flex-col items-center text-center group">
            <h2 class="text-xl font-semibold text-gray-800">Agent 2</h2>
            <p class="text-gray-600 mt-1">📍 Los Angeles, CA</p>
            <div class="flex items-center mt-3">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 group-hover:text-yellow-600 transition">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
                <span class="ml-2 font-medium group-hover:text-yellow-600 transition">Busy</span>
            </div>
        </div>

        <!-- Agent 3 (Unavailable) -->
        <div class="p-6 bg-white rounded-lg shadow-md border border-gray-200 transition-transform transform hover:scale-105 duration-300 flex flex-col items-center text-center group">
            <h2 class="text-xl font-semibold text-gray-800">Agent 3</h2>
            <p class="text-gray-600 mt-1">📍 Chicago, IL</p>
            <div class="flex items-center mt-3">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 group-hover:text-red-600 transition">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                </svg>
                <span class="ml-2 font-medium group-hover:text-red-600 transition">Unavailable</span>
            </div>
        </div>
    </div>
</div>



<?php

require "partials/wrapperBot.php";

require "partials/footer.php";

?>