<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Page Not Found</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    animation: {
                        fadeIn: "fadeIn 1s ease-in-out",
                        shakeOnceEvery10s: "shake 0.5s ease-in-out 1 forwards, pause 9.5s steps(1, end) 0.5s infinite"
                    },
                    keyframes: {
                        fadeIn: {
                            "0%": { opacity: "0" },
                            "100%": { opacity: "1" }
                        },
                        shake: {
                            "0%, 100%": { transform: "translateX(0)" },
                            "25%": { transform: "translateX(-5px)" },
                            "50%": { transform: "translateX(5px)" },
                            "75%": { transform: "translateX(-5px)" }
                        }
                    }
                }
            }
        }
    </script>
</head>
<body class="flex items-center justify-center min-h-screen bg-gray-100">
    <div class="text-center animate-fadeIn">
        <div class="animate-[shake_1.2s_ease-in-out_forwards,none_9.5s_steps(1,end)_0.5s_infinite]">
            <svg class="w-24 h-24 mx-auto text-blue-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75-4.365-9.75-9.75-9.75ZM9.75 9.75a.75.75 0 0 1 1.06 0L12 10.94l1.19-1.19a.75.75 0 0 1 1.06 1.06L13.06 12l1.19 1.19a.75.75 0 1 1-1.06 1.06L12 13.06l-1.19 1.19a.75.75 0 1 1-1.06-1.06L10.94 12 9.75 10.81a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd"/>
            </svg>
        </div>
        <h1 class="mt-4 text-6xl font-bold text-blue-600">404</h1>
        <p class="mt-2 text-lg text-gray-600">Oops! The page you are looking for does not exist.</p>
        <a href="/" class="inline-block px-6 py-3 mt-6 text-white bg-blue-600 rounded-lg hover:bg-blue-700 transition duration-300 ease-in-out">Go Home</a>
    </div>
</body>
</html>