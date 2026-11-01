<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title', 'Kasbon')</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 text-gray-800 min-h-screen flex flex-col">
  @include('partials.guest-navbar')
  <main class="flex-1">@yield('content')</main>
  @include('partials.guest-footer')
</body>
</html>
