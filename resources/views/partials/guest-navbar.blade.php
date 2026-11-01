<nav class="bg-white shadow-md py-4 px-6 flex justify-between items-center">
  <a href="{{ route('home') }}"><img src="{{ asset('images/logo.png') }}" alt="Logo Kasbon" class="h-10"></a>
  <div class="space-x-4 font-semibold text-gray-600">
    <a href="{{ route('home') }}" class="hover:text-orange-500">Home</a>
    <a href="{{ route('login') }}" class="hover:text-orange-500">Login</a>
    <a href="{{ route('register') }}" class="bg-orange-500 text-white px-4 py-2 rounded-lg hover:bg-orange-600">Register</a>
  </div>
</nav>
