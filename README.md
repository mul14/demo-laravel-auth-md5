# Contoh Laravel Login dengan `npp`/`nip`/`nik` dan password masih `md5`

Cara ini cukup minimalist tanpa mengubah config.

Pada `App/Models/User.php` tambahkan.

```php
protected $primaryKey = 'npp';

public $incrementing = false;
```

Saat pengecekan login, ganti dengan menggunakan logic biasa.

```php
// routes/web.php

Route::post('/login', function () {
    $npp = request()->npp;
    $password = request()->password;

    $user = App\Models\User::query()
        ->where('npp', $npp)
        ->where('password', md5($password))
        ->first();

    if ($user) {
        auth()->login($user, true); // Bisa

        // auth()->loginUsingId($user->npp, true); // Bisa

        return redirect('/admin');
    }

    return back();
});

Route::get('/admin', function () {
    return [
        'npp' => auth()->user()->npp,
        'name' => auth()->user()->name,
    ];
});

```

## Instalasi

Sesuaikan `.env`, lalu jalankan

```php
php artisan migrate:fresh --seed
```

NPP dan password sudah pre-filled. Jadi bisa langsung klik tombol login.
