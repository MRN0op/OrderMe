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
    <div id="orderContainer" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 p-6">
        <!-- Unfinished Orders will be shown here -->
    </div>
</div>

<div
    class="bg-white border border-gray-200 rounded-lg shadow-lg p-8 transition-transform transform hover:scale-105 duration-300 mt-6 mb-6">

    <h1 class="text-3xl font-bold text-blue-600 text-center mb-6">Finished Orders</h1>
    <div id="finishedOrderContainer" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 p-6">
        <!-- Finished Orders will be shown here -->
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

        // Here is a function to show all the available Agents to show in the optionlist in Unfinished Orders
        function showDeliveryAgentOptions(status, deliveryAgent, containerId) {
            const container = $(`#${containerId}`);
            container.empty(); // Clear previous content

            if (status === 'pending') {
                // Use a unique select ID per container to avoid conflicts
                const selectId = `agentSelect_${containerId}`;

                container.html(`
                    <p class="text-gray-500 mb-1">Delivery Agent:</p>
                    <select id="${selectId}" class="px-3 py-2 border rounded-md bg-gray-50 focus:ring-2 focus:ring-blue-600 w-32">
                        <option disabled selected>Loading...</option>
                    </select>
                `);

                $.ajax({
                    url: '/api/v1/getAvailableDeliveryAgents',
                    type: "GET",
                    dataType: "json",
                    success: function(response) {
                        const select = container.find(`#${selectId}`);
                        select.empty(); // Clear "Loading..." option

                        if (response.status === "success" && Array.isArray(response.data) && response.data.length > 0) {
                            // Add a default placeholder
                            select.append(`<option disabled selected>Select an agent</option>`);

                            response.data.forEach(agent => {
                                const option = `<option value="${agent.pk_delivery_agent_email}">${agent.name}</option>`;
                                select.append(option);
                            });
                        } else {
                            container.html('<p class="text-gray-600">No delivery agents available</p>');
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error("AJAX Error:", error);
                        container.html('<p class="text-red-600">Failed to load delivery agents</p>');
                    }
                });
            } else {
                container.html(`
                    <p class="text-gray-500 mb-1">Delivery Agent:</p>
                    <p class="font-semibold text-gray-800">${deliveryAgent || 'Unknown Delivery Agent'}</p>
                `);
            }
        }

        // Shows all the Unfinished Orders
        function loadUnfinishedOrders() {
            $.ajax({
                url: '/api/v1/getUnfinishedOrders', // change to your actual endpoint
                type: "GET",
                dataType: "json",
                success: function(response) {

                    let ordersContainer = $("#orderContainer");
                    ordersContainer.empty();

                    if (response.status === "success") {
                        if (response.data.length === 0) {
                            ordersContainer.append('<p class="text-center text-gray-600">No unfinished orders</p>');
                        } else {
                            response.data.forEach(order => {
                                let status = order.status.toLowerCase();
                                let statusDisplay = order.status.charAt(0).toUpperCase() + order.status.slice(1);

                                let barColor = "";
                                let badgeClass = "";

                                switch (status) {
                                    case "underway":
                                        barColor = "bg-orange-500";
                                        badgeClass = "bg-orange-100 text-orange-700";
                                        break;
                                    case "accepted":
                                        barColor = "bg-blue-500";
                                        badgeClass = "bg-blue-100 text-blue-700";
                                        break;
                                    case "pending":
                                        barColor = "bg-yellow-500";
                                        badgeClass = "bg-yellow-100 text-yellow-700";
                                        break;
                                    default:
                                        barColor = "bg-gray-300";
                                        badgeClass = "bg-gray-100 text-gray-700";
                                }

                                let deliveryAgent = order.name || "Unassigned";
                                let expectedHour = new Date(order.timestamp_expected_delivery).getHours();

                                let containerId = `options_${order.pk_order}`;

                                let deliveryHtml = `
                                    <div class="flex border border-gray-300 rounded-xl shadow-lg bg-white overflow-hidden transform hover:scale-105 hover:shadow-2xl transition duration-300">
                                        <div class="w-3 ${barColor}"></div>

                                        <div class="p-6 flex-1">
                                            <div class="flex justify-between items-center">
                                                <h2 class="text-2xl font-semibold text-gray-800">Order #${order.pk_order}</h2>
                                                <span class="text-xs font-medium px-4 py-2 rounded-lg ${badgeClass}">${statusDisplay}</span>
                                            </div>

                                            <p class="text-gray-700 mt-2 text-lg font-medium">${order.costumer_Name}</p>
                                            <p class="text-gray-500 text-sm">${order.costumer_address}</p>

                                            <div class="border-t border-gray-200 my-4"></div>

                                            <div class="flex justify-between text-base" id="${containerId}"></div>

                                            <div class="flex justify-between text-base mt-2">
                                                <p class="text-gray-500">Total Price:</p>
                                                <p class="font-semibold text-gray-800">${order.total_price}€</p>
                                            </div>

                                            <div class="border-t border-gray-200 my-4"></div>

                                            <div class="flex justify-between text-sm">
                                                <p class="text-gray-500">Expected Delivery:</p>
                                                <p class="text-gray-700">${expectedHour}:00</p>
                                            </div>
                                        </div>
                                    </div>
                                `;
                                ordersContainer.append(deliveryHtml);

                                showDeliveryAgentOptions(status, deliveryAgent, containerId);
                            });
                        }
                    } else {
                        console.error("Error: ", response.message);
                        ordersContainer.html('<p class="text-center text-red-600">Error loading orders</p>');
                    }
                },
                error: function(xhr, status, error) {
                    console.error("AJAX Error:", error);
                    $("#orderContainer").html('<p class="text-center text-red-600">Failed to load data</p>');
                }
            });
        }

        // On time = time <= 5min   Late = time >= 30   Delivered = rest
        function loadFinishedOrders() {
            $.ajax({
                url: '/api/v1/getFinishedOrders',
                type: "GET",
                dataType: "json",
                success: function(response) {

                    let ordersContainer = $("#finishedOrderContainer");

                    if (response.status === "success") {
                        if (response.data.length === 0) {
                            ordersContainer.append('<p class="text-center text-gray-600">No finished orders</p>');
                        } else {
                            response.data.forEach(order => {
                                // Get expected delivery and actual delivery times
                                let expectedTime = new Date(order.timestamp_expected_delivery);
                                let deliveredTime = new Date(order.timestamp_delivered);
                                let timeDiff = (deliveredTime - expectedTime) / 60000; // Time difference in minutes

                                // Default badge values
                                let barColor = "bg-green-500";
                                let badgeClass = "bg-green-100 text-green-700";
                                let statusDisplay = "Delivered";
                                let textColor = "font-semibold text-green-700";

                                // Determine status based on time difference
                                if (timeDiff <= 5) {
                                    statusDisplay = "On Time";
                                    barColor = "bg-blue-500";
                                    badgeClass = "bg-blue-100 text-blue-700";
                                    textColor = "font-semibold text-green-700";
                                } else if (timeDiff >= 30) {
                                    statusDisplay = "Late";
                                    barColor = "bg-red-500";
                                    badgeClass = "bg-red-100 text-red-700";
                                    textColor = "font-semibold text-red-700";
                                }

                                let actualDeliveryHour = deliveredTime.getHours().toString().padStart(2, '0');
                                let actualDeliveryMinute = deliveredTime.getMinutes().toString().padStart(2, '0');
                                let actualDeliveryTime = `${actualDeliveryHour}:${actualDeliveryMinute}`;

                                let expectedDeliveryHour = expectedTime.getHours().toString().padStart(2, '0');
                                let expectedDeliveryMinute = expectedTime.getMinutes().toString().padStart(2, '0');
                                let expectedHour = `${expectedDeliveryHour}:${expectedDeliveryMinute}`;

                                // Get delivery agent (if available)
                                let deliveryAgent = order.name || "Unassigned";

                                let containerId = `options_${order.pk_order}`;

                                let deliveryHtml = `
                                    <div class="flex border border-gray-300 rounded-xl shadow-lg bg-white overflow-hidden transform hover:scale-105 hover:shadow-2xl transition duration-300">
                                        <div class="w-3 ${barColor}"></div>

                                        <div class="p-6 flex-1">
                                            <div class="flex justify-between items-center">
                                                <h2 class="text-2xl font-semibold text-gray-800">Order #${order.pk_order}</h2>
                                                <span class="text-xs font-medium px-4 py-2 rounded-lg ${badgeClass}">${statusDisplay}</span>
                                            </div>

                                            <p class="text-gray-700 mt-2 text-lg font-medium">${order.costumer_Name}</p>
                                            <p class="text-gray-500 text-sm">${order.costumer_address}</p>

                                            <div class="border-t border-gray-200 my-4"></div>

                                            <div class="flex justify-between text-base" id="${containerId}"></div>

                                            <div class="flex justify-between text-base mt-2">
                                                <p class="text-gray-500">Total Price:</p>
                                                <p class="font-semibold text-gray-800">${order.total_price}€</p>
                                            </div>

                                            <div class="border-t border-gray-200 my-4"></div>

                                            <div class="flex justify-between text-sm">
                                                <p class="text-gray-500">Expected Delivery:</p>
                                                <p class="text-gray-700">${expectedHour}</p>
                                            </div>

                                            <div class="flex justify-between text-sm mt-2">
                                                <p class="text-gray-500">Actual Delivery:</p>
                                                <p class="text-gray-700 ${textColor}">${actualDeliveryTime}</p>
                                            </div>
                                        </div>
                                    </div>
                                `;
                                ordersContainer.append(deliveryHtml);
                            });
                        }
                    } else {
                        console.error("Error: ", response.message);
                        ordersContainer.html('<p class="text-center text-red-600">Error loading orders</p>');
                    }
                },
                error: function(xhr, status, error) {
                    console.error("AJAX Error:", error);
                    $("#orderContainer").html('<p class="text-center text-red-600">Failed to load data</p>');
                }
            });
        }

        loadDeliveryAgents();
        loadUnfinishedOrders();
        loadFinishedOrders();
    });
</script>

<?php

require "partials/wrapperBot.php";

require "partials/footer.php";

?>