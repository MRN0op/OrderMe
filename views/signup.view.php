<?php

require "partials/header.php";
//require "partials/navbar.php"

?>

<div class="flex items-center justify-center min-h-screen bg-gray-100">
    <?php
    require "partials/arrowHome.php"
    ?>
    <div class="w-full max-w-md p-10 bg-white rounded-2xl shadow-lg">
        <h1 class="text-4xl font-bold text-blue-600 text-center mb-6">Sign up</h1>
        <form method="POST" action="">

            <div class="mb-8">
                <label for="name" class="block text-gray-700 font-medium">Name</label>
                <input id="name" type="text" name="name" placeholder="Enter your branch name"
                    class="w-full px-4 py-2 mt-1 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-600 focus:outline-none">
                <div class="nameError"></div>
            </div>

            <div class="mb-8">
                <label for="address" class="block text-gray-700 font-medium">Address</label>
                <input id="address" type="text" name="address" placeholder="Enter your branch Address"
                    class="w-full px-4 py-2 mt-1 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-600 focus:outline-none">
                <div class="addressError"></div>
            </div>

            <div class="mb-8">
                <label for="phoneNumber" class="block text-gray-700 font-medium">Phone Number</label>
                <div id="phoneNumberField" class="flex items-center border border-gray-300 rounded-lg overflow-hidden focus-within:ring-2 focus-within:ring-blue-600">
                    <select class="px-3 py-2 bg-gray-100 border-r border-gray-300 focus:outline-none" name="prefix">
                        <option value="+352">+352 (LU)</option>
                        <option value="+49">+49 (DE)</option>
                    </select>
                    <input id="phoneNumber" type="text" name="phoneNumber" placeholder="Enter your phone number"
                        class="w-full px-4 py-2 focus:outline-none">
                </div>
                <div class="phoneError"></div>
            </div>

            <div class="mb-8">
                <label for="email" class="block text-gray-700 font-medium">Email</label>
                <input id="email" type="email" name="email" placeholder="Enter your branch email"
                    class="w-full px-4 py-2 mt-1 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-600 focus:outline-none">
                <div class="emailError"></div>
            </div>

            <div class="mb-8">
                <label for="password" class="block text-gray-700 font-medium">Password</label>
                <input id="password" type="password" name="password" placeholder="Enter your password"
                    class="w-full px-4 py-2 mt-1 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-600 focus:outline-none">
                <div class="passwordError"></div>
            </div>

            <div class="mb-8">
                <label for="password_confirm" class="block text-gray-700 font-medium">Confirm password</label>
                <input id="password_confirm" type="password" name="password_confirm" placeholder="Confirm your password"
                    class="w-full px-4 py-2 mt-1 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-600 focus:outline-none">
                <div class="confirmPasswordError"></div>
            </div>

            <button type="submit" name="submit_register" class="w-full px-4 py-2 text-white bg-blue-600 rounded-lg hover:bg-blue-700 transition">Sign up</button>

        </form>

        <div class="mt-6 w-full text-center text-gray-400 hover:text-black transition">
            <a class=" " href="/login">Already have an account? Log in <span class="underline hover:text-blue-600 transition">here.</span></a>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $("form").on("submit", function(event) {
                let isValid = true;

                function validateField(field, condition, messageField, message) {
                    if (condition) {
                        $(field).addClass("border-red-600").removeClass("border-gray-300");
                        $(messageField).text(message).removeClass("hidden").addClass("text-red-600 text-sm mt-1");
                        isValid = false;
                    } else {
                        $(field).removeClass("border-red-600").addClass("border-gray-300");
                        $(messageField).text("").addClass("hidden");
                    }
                }

                // Validate Name (at least 2 characters)
                validateField("#name", $.trim($("#name").val()).length < 2, $(".nameError"), "Name must be at least 2 characters long.");

                // Validate Address (at least 6 characters)
                validateField("#address", $.trim($("#address").val()).length < 6, $(".addressError"), "Address must be at least 6 characters long.");

                // Validate Phone Number (digits only)
                const phonePattern = /^\d+$/;
                validateField("#phoneNumberField", !phonePattern.test($.trim($("#phoneNumber").val())), $(".phoneError"), "Enter a valid phone number (digits only).");

                // Validate Email
                const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                validateField("#email", !emailPattern.test($.trim($("#email").val())), $(".emailError"), "Enter a valid email.");

                // Validate Password
                const passwordValue = $("#password").val();
                const confirmPasswordValue = $("#password_confirm").val();
                const hasSpecialChar = /[!@#$%^&*(),.?":{}|<>]/.test(passwordValue);
                const hasMinLength = passwordValue.length >= 8;

                validateField("#password", !hasSpecialChar || !hasMinLength, $(".passwordError"), "Password must be at least 8 characters long and contain a special character.");
                validateField("#password_confirm", confirmPasswordValue !== passwordValue, $(".confirmPasswordError"), "Passwords do not match.");

                if (!isValid) {
                    event.preventDefault();
                }
            });          
        });
    </script>

    <?php

    require "partials/footer.php";

    ?>