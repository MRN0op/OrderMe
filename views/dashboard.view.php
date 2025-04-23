<?php

require "partials/header.php";
require "partials/navbar.php";
require "partials/wrapperTop.php";

?>

<div
    class="bg-white border border-gray-200 rounded-lg shadow-lg p-8 transition-transform transform hover:scale-105 duration-300 mt-6 mb-6">
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
<div
    class="bg-white border border-gray-200 rounded-lg shadow-lg p-8 transition-transform transform hover:scale-105 duration-300 mt-6 mb-6">
    <h1 class="text-3xl font-bold text-blue-600 text-center mb-6">Delivery Agents</h1>

    <div id="deliveryAgentsContainer" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        <!-- Delivery Agents will be shown here -->
    </div>
</div>

<div
    class="bg-white border border-gray-200 rounded-lg shadow-lg p-8 transition-transform transform hover:scale-105 duration-300 mt-6 mb-6">

    <h1 class="text-3xl font-bold text-blue-600 text-center mb-6">Unfinished Orders</h1>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 p-6">
        <div
            class="flex border border-gray-300 rounded-xl shadow-lg bg-white overflow-hidden transform hover:scale-105 hover:shadow-2xl transition duration-300">
            <!-- Status Indicator -->
            <div class="w-3 bg-orange-500"></div>

            <div class="p-6 flex-1">
                <div class="flex justify-between items-center">
                    <h2 class="text-2xl font-semibold text-gray-800">Order #1025</h2>
                    <span
                        class="text-xs font-medium px-4 py-2 rounded-lg bg-orange-100 text-orange-700">Underway</span>
                </div>

                <p class="text-gray-700 mt-2 text-lg font-medium">Alice Johnson</p>
                <p class="text-gray-500 text-sm">789 Pine St, TX</p>

                <div class="border-t border-gray-200 my-4"></div>

                <div class="flex justify-between text-base">
                    <p class="text-gray-500">Delivery Agent:</p>
                    <p class="font-semibold text-gray-800">Agent 1</p>
                </div>

                <div class="flex justify-between text-base mt-2">
                    <p class="text-gray-500">Total Price:</p>
                    <p class="font-semibold text-gray-800">32.25€</p>
                </div>

                <div class="border-t border-gray-200 my-4"></div>

                <div class="flex justify-between text-sm">
                    <p class="text-gray-500">Expected Delivery:</p>
                    <p class="text-gray-700">9:00</p>
                </div>
            </div>
        </div>


        <div
            class="flex border border-gray-300 rounded-xl shadow-lg bg-white overflow-hidden transform hover:scale-105 hover:shadow-2xl transition duration-300">
            <!-- Status Indicator -->
            <div class="w-3 bg-blue-500"></div>

            <div class="p-6 flex-1">
                <div class="flex justify-between items-center">
                    <h2 class="text-2xl font-semibold text-gray-800">Order #1026</h2>
                    <span
                        class="text-xs font-medium px-4 py-2 rounded-lg bg-blue-100 text-blue-700">Accepted</span>
                </div>

                <p class="text-gray-700 mt-2 text-lg font-medium">Alice Johnson</p>
                <p class="text-gray-500 text-sm">789 Pine St, TX</p>

                <div class="border-t border-gray-200 my-4"></div>

                <div class="flex justify-between text-base">
                    <p class="text-gray-500">Delivery Agent:</p>
                    <p class="font-semibold text-gray-800">Agent 1</p>
                </div>

                <div class="flex justify-between text-base mt-2">
                    <p class="text-gray-500">Total Price:</p>
                    <p class="font-semibold text-gray-800">32.25€</p>
                </div>

                <div class="border-t border-gray-200 my-4"></div>

                <div class="flex justify-between text-sm">
                    <p class="text-gray-500">Expected Delivery:</p>
                    <p class="text-gray-700">9:00</p>
                </div>
            </div>
        </div>

        <div
            class="flex border border-gray-300 rounded-xl shadow-lg bg-white overflow-hidden transform hover:scale-105 hover:shadow-2xl transition duration-300">
            <!-- Status Indicator -->
            <div class="w-3 bg-yellow-500"></div>

            <div class="p-6 flex-1">
                <div class="flex justify-between items-center">
                    <h2 class="text-2xl font-semibold text-gray-800">Order #1026</h2>
                    <span
                        class="text-xs font-medium px-4 py-2 rounded-lg bg-yellow-100 text-yellow-700">Pending</span>
                </div>

                <p class="text-gray-700 mt-2 text-lg font-medium">Alice Johnson</p>
                <p class="text-gray-500 text-sm">789 Pine St, TX</p>

                <div class="border-t border-gray-200 my-4"></div>

                <div class="flex justify-between text-base">
                    <p class="text-gray-500">Delivery Agent:</p>
                    <select
                        class="px-3 py-2 border rounded-md bg-gray-50 focus:ring-2 focus:ring-blue-600 w-32">
                        <option value="agent1">Agent1</option>
                        <option value="agent2">Agent2</option>
                        <option value="agent3">Agent3</option>
                    </select>
                </div>

                <div class="flex justify-between text-base mt-2">
                    <p class="text-gray-500">Total Price:</p>
                    <p class="font-semibold text-gray-800">32.25€</p>
                </div>

                <div class="border-t border-gray-200 my-4"></div>

                <div class="flex justify-between text-sm">
                    <p class="text-gray-500">Expected Delivery:</p>
                    <p class="text-gray-700">9:00</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div
    class="bg-white border border-gray-200 rounded-lg shadow-lg p-8 transition-transform transform hover:scale-105 duration-300 mt-6 mb-6">

    <h1 class="text-3xl font-bold text-blue-600 text-center mb-6">Finished Orders</h1>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 p-6">

        <!-- Order Card 1 -->
        <div
            class="flex border border-gray-300 rounded-xl shadow-lg bg-white overflow-hidden transform hover:scale-105 hover:shadow-2xl transition duration-300">
            <!-- Status Indicator -->
            <div class="w-3 bg-green-500"></div>

            <div class="p-6 flex-1">
                <div class="flex justify-between items-center">
                    <h2 class="text-2xl font-semibold text-gray-800">Order #1023</h2>
                    <span
                        class="text-xs font-medium px-4 py-2 rounded-lg bg-green-100 text-green-600">Delivered</span>
                </div>

                <p class="text-gray-700 mt-2 text-lg font-medium">John Doe</p>
                <p class="text-gray-500 text-sm">123 Main St, NY</p>

                <div class="border-t border-gray-200 my-4"></div>

                <div class="flex justify-between text-base">
                    <p class="text-gray-500">Delivery Agent:</p>
                    <p class="font-semibold text-gray-800">Agent 1</p>
                </div>

                <div class="flex justify-between text-base mt-2">
                    <p class="text-gray-500">Total Price:</p>
                    <p class="font-semibold text-gray-800">€45.34</p>
                </div>

                <div class="border-t border-gray-200 my-4"></div>

                <div class="flex justify-between text-sm">
                    <p class="text-gray-500">Expected Delivery:</p>
                    <p class="text-gray-700">20:00</p>
                </div>

                <div class="flex justify-between text-sm mt-2">
                    <p class="text-gray-500">Actual Delivery:</p>
                    <p class="font-semibold text-green-700">20:05</p>
                </div>
            </div>
        </div>

        <!-- Order Card 2 -->
        <div
            class="flex border border-gray-300 rounded-xl shadow-lg bg-white overflow-hidden transform hover:scale-105 hover:shadow-2xl transition duration-300">
            <!-- Status Indicator -->
            <div class="w-3 bg-red-500"></div>

            <div class="p-6 flex-1">
                <div class="flex justify-between items-center">
                    <h2 class="text-2xl font-semibold text-gray-800">Order #1024</h2>
                    <span class="text-xs font-medium px-4 py-2 rounded-lg bg-red-100 text-red-600">Late</span>
                </div>

                <p class="text-gray-700 mt-2 text-lg font-medium">Jane Smith</p>
                <p class="text-gray-500 text-sm">456 Oak St, CA</p>

                <div class="border-t border-gray-200 my-4"></div>

                <div class="flex justify-between text-base">
                    <p class="text-gray-500">Delivery Agent:</p>
                    <p class="font-semibold text-gray-800">Agent 2</p>
                </div>

                <div class="flex justify-between text-base mt-2">
                    <p class="text-gray-500">Total Price:</p>
                    <p class="font-semibold text-gray-800">€79.50</p>
                </div>

                <div class="border-t border-gray-200 my-4"></div>

                <div class="flex justify-between text-sm">
                    <p class="text-gray-500">Expected Delivery:</p>
                    <p class="text-gray-700">20:00</p>
                </div>

                <div class="flex justify-between text-sm mt-2">
                    <p class="text-gray-500">Actual Delivery:</p>
                    <p class="font-semibold text-red-700">20:30</p>
                </div>
            </div>
        </div>

        <!-- Order Card 3 -->
        <div
            class="flex border border-gray-300 rounded-xl shadow-lg bg-white overflow-hidden transform hover:scale-105 hover:shadow-2xl transition duration-300">
            <!-- Status Indicator -->
            <div class="w-3 bg-blue-500"></div>

            <div class="p-6 flex-1">
                <div class="flex justify-between items-center">
                    <h2 class="text-2xl font-semibold text-gray-800">Order #1025</h2>
                    <span class="text-xs font-medium px-4 py-2 rounded-lg bg-blue-100 text-blue-600">On
                        Time</span>
                </div>

                <p class="text-gray-700 mt-2 text-lg font-medium">Alice Johnson</p>
                <p class="text-gray-500 text-sm">789 Pine St, TX</p>

                <div class="border-t border-gray-200 my-4"></div>

                <div class="flex justify-between text-base">
                    <p class="text-gray-500">Delivery Agent:</p>
                    <p class="font-semibold text-gray-800">Agent 3</p>
                </div>

                <div class="flex justify-between text-base mt-2">
                    <p class="text-gray-500">Total Price:</p>
                    <p class="font-semibold text-gray-800">€32.25</p>
                </div>

                <div class="border-t border-gray-200 my-4"></div>

                <div class="flex justify-between text-sm">
                    <p class="text-gray-500">Expected Delivery:</p>
                    <p class="text-gray-700">21:00 </p>
                </div>

                <div class="flex justify-between text-sm mt-2">
                    <p class="text-gray-500">Actual Delivery:</p>
                    <p class="font-semibold text-green-700">21:00</p>
                </div>
            </div>
        </div>

    </div>
</div>

<script>
    $(document).ready(function() {
        function loadDeliveryAgents() {
            $.ajax({
                url: '/api/v1/getDeliveryAgents',
                type: "GET",
                dataType: "json",
                success: function(response) {
                    console.log(response);
                    if (response.status === "success") {
                        let agentsContainer = $("#deliveryAgentsContainer");
                        agentsContainer.empty();

                        if (response.data.length === 0) {
                            agentsContainer.append('<p class="text-center text-gray-600">No delivery agents</p>');
                        } else {
                            response.data.forEach(agent => {
                                let status = agent.status.toLowerCase();
                                let statusText = agent.status.charAt(0).toUpperCase() + agent.status.slice(1);
                                let hoverClass = "";
                                let statusClass = "";
                                let iconSvg = "";

                                switch (status) {
                                    case "available":
                                        hoverClass = "group-hover:text-green-600";
                                        iconSvg = `
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                    stroke="currentColor" class="size-6 ${hoverClass} transition">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                                </svg>
                            `;
                                        break;
                                    case "busy":
                                        hoverClass = "group-hover:text-yellow-600";
                                        iconSvg = `
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                    stroke="currentColor" class="size-6 ${hoverClass} transition">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg>
                            `;
                                        break;
                                    case "unavailable":
                                        hoverClass = "group-hover:text-red-600";
                                        iconSvg = `
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                    stroke="currentColor" class="size-6 ${hoverClass} transition">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                                </svg>
                            `;
                                        break;
                                    default:
                                        statusText = "Unknown";
                                        hoverClass = "group-hover:text-gray-600";
                                        iconSvg = `
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                    stroke="currentColor" class="size-6 ${hoverClass} transition">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h6" />
                                </svg>
                            `;
                                        break;
                                }

                                let agentHtml = `
                        <div class="p-6 bg-white rounded-lg shadow-md border border-gray-200 transition-transform transform hover:scale-105 duration-300 flex flex-col items-center text-center group">
                            <h2 class="text-xl font-semibold text-gray-800">${agent.name}</h2>
                            <p class="text-gray-600 mt-1">📍 ${agent.current_location || 'Unknown Location'}</p>
                            <div class="flex items-center mt-3">
                                ${iconSvg}
                                <span class="ml-2 font-medium ${hoverClass} transition">${statusText}</span>
                            </div>
                        </div>
                    `;
                                agentsContainer.append(agentHtml);
                            });
                        }
                    } else {
                        console.error("Error: ", response.message);
                        $("#deliveryAgentsContainer").html('<p class="text-center text-red-600">Error loading agents</p>');
                    }
                },
                error: function(xhr, status, error) {
                    console.error("AJAX Error:", error);
                    $("#deliveryAgentsContainer").html('<p class="text-center text-red-600">Failed to load data</p>');
                }
            });



        }

        loadDeliveryAgents();
    });
</script>


<?php

require "partials/wrapperBot.php";

require "partials/footer.php";

?>