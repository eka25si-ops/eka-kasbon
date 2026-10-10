<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Kasbon - Katalog & Toko</title>

  <!-- Tailwind CSS / Guest CSS -->
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="{{ asset('guest/css/style.css') }}">
</head>
<body class="bg-gray-50 text-gray-800">

  <!-- Navbar Guest -->
  <nav class="bg-white shadow-md py-4 px-6 flex justify-between items-center">
    <div class="flex items-center space-x-3">
      <img src="{{ asset('images/logo.png') }}" alt="Logo Kasbon" class="h-8">
    </div>
    <div class="space-x-4">
      <a href="/" class="text-gray-600 hover:text-orange-500 font-medium">Home</a>
      <a href="/admin" class="text-gray-600 hover:text-orange-500 font-medium">Ke Admin</a>
    </div>
  </nav>

  <!-- Main Content -->
  <main class="container mx-auto py-8 px-4">
    @yield('content')
  </main>

  <script src="{{ asset('guest/js/main.js') }}"></script>
</body>
</html>