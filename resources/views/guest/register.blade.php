@extends('layouts.guest')
@section('title', 'Register')

@section('content')
<div class="max-w-md mx-auto px-6 py-10">
  <h1 class="text-2xl font-bold mb-6 text-center">Register</h1>
  @include('partials.guest-alert')
  <form action="{{ route('register.process') }}" method="POST" class="bg-white rounded-lg shadow p-6">
    @csrf
    @include('partials.guest-input', ['name' => 'name', 'label' => 'Name'])
    @include('partials.guest-input', ['name' => 'email', 'label' => 'Email', 'type' => 'email'])
    @include('partials.guest-input', ['name' => 'password', 'label' => 'Password', 'type' => 'password'])
    @include('partials.guest-input', ['name' => 'password_confirmation', 'label' => 'Confirm Password', 'type' => 'password'])
    <button class="w-full bg-orange-500 text-white py-2 rounded-lg font-semibold hover:bg-orange-600">Register</button>
  </form>
</div>
@endsection
