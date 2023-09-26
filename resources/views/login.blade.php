<!DOCTYPE html>
<html>
<head>
    <title>AufaMovies || Register</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">
<main class="bg-white p-8 rounded-lg shadow-lg max-w-md w-full">
    <form action="login.blade.php" method="post">
        <h1 class="text-3xl font-semibold text-center mb-6">Login</h1>
        <div class="mb-4">
            <label for="username" class="block font-medium">Username:</label>
            <input type="text" name="username" id="username" class="w-full px-4 py-2 border rounded shadow-md"/>
        </div>
        <div class="mb-4">
            <label for="password" class="block font-medium">Password:</label>
            <input type="password" name="password" id="password" class="w-full px-4 py-2 border rounded shadow-md"/>
        </div>
        <button href="index" type="submit" class="w-full bg-blue-500 text-white py-2 rounded hover:bg-blue-600">Login</button>
        <div class="text-center mt-4 text-gray-600">Not a member yet? <a href="register.php" class="text-blue-500 hover:underline">Sign Up here</a></div>
    </form>
</main>
</body>
</html>
