<?php

    require "partials/header.php";
    //require "partials/navbar.php"

?>

<div class="flex items-center justify-center min-h-screen bg-gray-100">
    <?php
        require "partials/arrowHome.php"
    ?>
    <div class="w-full max-w-md p-10 bg-white rounded-2xl shadow-lg">
            <h1 class="text-4xl font-bold text-blue-600 text-center mb-6">Register</h1>
            <form method="POST" action="">

                <div class="mb-8">
                    <label for="branch_Name" class="block text-gray-700 font-medium">Name</label>
                    <input id="branch_Name" type="text" name="branch_Name" placeholder="Enter your branch name"
                        class="w-full px-4 py-2 mt-1 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-600 focus:outline-none">
                </div>

                <div class="mb-8">
                    <label for="branch_Address" class="block text-gray-700 font-medium">Address</label>
                    <input id="branch_Address" type="text" name="branch_Address" placeholder="Enter your branch Address"
                        class="w-full px-4 py-2 mt-1 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-600 focus:outline-none">
                </div>

                <div class="mb-8">
                    <label for="branch_TelefonNumber" class="block text-gray-700 font-medium">Phone Number</label>
                    <input id="branch_TelefonNumber" type="text" name="branch_TelefonNumber" placeholder="Enter your branch phone number"
                        class="w-full px-4 py-2 mt-1 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-600 focus:outline-none">
                </div>

                <div class="mb-8">
                    <label for="branch_Email" class="block text-gray-700 font-medium">Email</label>
                    <input id="branch_Email" type="text" name="branch_Email" placeholder="Enter your branch email"
                        class="w-full px-4 py-2 mt-1 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-600 focus:outline-none">
                </div>

                <div class="mb-8">
                    <label for="branch_password" class="block text-gray-700 font-medium">Password</label>
                    <input id="branch_password" type="password" name="branch_password" placeholder="Enter your password"
                        class="w-full px-4 py-2 mt-1 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-600 focus:outline-none">
                </div>

                <div class="mb-8">
                    <label for="branch_password_confirm" class="block text-gray-700 font-medium">Confirm password</label>
                    <input id="branch_password_confirm" type="password" name="branch_password_confirm" placeholder="Confirm your password"
                        class="w-full px-4 py-2 mt-1 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-600 focus:outline-none">
                </div>

                <button type="submit" name="SUBMIT_login" class="w-full px-4 py-2 text-white bg-blue-600 rounded-lg hover:bg-blue-700 transition">Login</button>
                                    
            </form>

            <div class="mt-6 w-full text-center text-gray-400 hover:text-black transition">
                <a class=" " href="/login">Already have an account? Log in <span class="underline hover:text-blue-600 transition">here.</span></a>
            </div>
</div>

<?php

    require "partials/footer.php";

?>