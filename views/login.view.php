<?php

require "partials/header.php";


?>

<div class="min-h-screen bg-gray-100 flex items-center justify-center relative">


    <?php require "partials/arrowHome.php"; ?>


    <div class="w-full max-w-md p-10 bg-white rounded-2xl shadow-lg">
        <h1 class="text-4xl font-bold text-blue-600 text-center mb-6">Login</h1>
        <form method="POST" action="">
            <div class="mb-8">
                <label for="email" class="block text-gray-700 font-medium">Email</label>
                <input id="email" type="text" name="email" placeholder="Enter your email"
                    class="w-full px-4 py-2 mt-1 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-600 focus:outline-none">
                <div class="emailError"></div>
            </div>

            <div class="mb-8">
                <label for="password" class="block text-gray-700 font-medium">Password</label>
                <input id="password" type="password" name="password" placeholder="Enter your password"
                    class="w-full px-4 py-2 mt-1 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-600 focus:outline-none">
                <div class="passwordError"></div>
            </div>

            <button type="submit" name="SUBMIT_login"
                class="w-full px-4 py-2 text-white bg-blue-600 rounded-lg hover:bg-blue-700 transition">Login</button>
        </form>

        <div class="mt-6 w-full text-center text-gray-400 hover:text-black transition">
            <a href="/signup">No account yet? Create one <span class="underline hover:text-blue-600 transition">here.</span></a>
        </div>

        <div class="w-full text-center text-gray-400 hover:text-black transition">
            <a href="/resetPassword">Forgot your password? Reset it <span class="underline hover:text-blue-600 transition">here.</span></a>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $("form").on("submit", function(event) {
            event.preventDefault(); // Prevent default form submission
            let isValid = true;

            const dataToSend = {
                branch_Email: $("#email").val(),
                branch_Password: $("#password").val(),
            };

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

            if (!isValid) return; // Stop if validation fails

            // AJAX Request
            $.ajax({
                url: '/api/verifyLogin',
                type: "POST",
                data: dataToSend,
                dataType: "json", // Expect JSON response
                success: function(result) {
                    if (result.status) {
                        // Display error message on the appropriate field
                        validateField(result.field, result.status, result.messageField, result.message);
                    } else {
                        // Success — Redirect or show success message
                        console.log("Login successful:", result.message);
                        window.location.href = /;

                    }
                },
                error: function(xhr, status, error) {
                    console.error("AJAX Error:", error);
                }
            });
        });
    });
</script>


<?php

require "partials/footer.php";

?>