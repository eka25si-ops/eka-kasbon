@include('partials.form-field', ['name' => 'name', 'label' => 'Nama', 'value' => $user->name ?? ''])
@include('partials.form-field', ['name' => 'email', 'label' => 'Email', 'type' => 'email', 'value' => $user->email ?? ''])
@include('partials.form-field', ['name' => 'password', 'label' => 'Password', 'type' => 'password', 'hint' => isset($user) ? 'Kosongkan jika tidak ingin mengubah password.' : null])
@include('partials.form-field', ['name' => 'password_confirmation', 'label' => 'Konfirmasi Password', 'type' => 'password'])
