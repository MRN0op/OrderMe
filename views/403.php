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
                            "0%": {
                                opacity: "0"
                            },
                            "100%": {
                                opacity: "1"
                            }
                        },
                        shake: {
                            "0%, 100%": {
                                transform: "translateX(0)"
                            },
                            "25%": {
                                transform: "translateX(-5px)"
                            },
                            "50%": {
                                transform: "translateX(5px)"
                            },
                            "75%": {
                                transform: "translateX(-5px)"
                            }
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
                <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75-4.365-9.75-9.75-9.75ZM9 10.5a3 3 0 0 1 6 0v1.5h1.5a.75.75 0 0 1 .75.75v4.5a.75.75 0 0 1-.75.75h-9a.75.75 0 0 1-.75-.75v-4.5a.75.75 0 0 1 .75-.75H9V10.5Zm4.5 0a1.5 1.5 0 1 0-3 0v1.5h3V10.5Z" clip-rule="evenodd" />
            </svg>
        </div>
        <h1 class="mt-4 text-6xl font-bold text-blue-600">403</h1>
        <p class="mt-2 text-lg text-gray-600">Access Denied! You don’t have permission to view this page.</p>
        <a href="/" class="inline-block px-6 py-3 mt-6 text-white bg-blue-600 rounded-lg hover:bg-blue-700 transition duration-300 ease-in-out shadow-md">Go Home</a>
    </div>
</body>

</html>