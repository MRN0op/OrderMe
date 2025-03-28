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
            </div>

            <div class="mb-8">
                <label for="password" class="block text-gray-700 font-medium">Password</label>
                <input id="password" type="password" name="password" placeholder="Enter your password"
                    class="w-full px-4 py-2 mt-1 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-600 focus:outline-none">
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


<?php

require "partials/footer.php";

?>