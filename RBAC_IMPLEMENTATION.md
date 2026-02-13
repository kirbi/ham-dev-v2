# Implementasi RBAC untuk Manajemen Pasien

## 📋 Ringkasan

Implementasi lengkap Role-Based Access Control (RBAC) untuk modul Pasien dengan menggunakan Livewire. Sistem ini menghilangkan redundansi pada controller lama yang memiliki fungsi terpisah untuk admin dan konselor.

## 🎯 Fitur Utama

### 1. **Middleware Role-Based**
- Custom middleware `RoleMiddleware` untuk memeriksa role user
- Middleware terdaftar dengan alias `role` 
- Dapat digunakan di route dengan: `middleware('role:admin,konselor')`

### 2. **Controller Refactored**
- Controller tunggal tanpa duplikasi fungsi
- Menggunakan middleware di constructor
- Pemeriksaan role di dalam method untuk fitur spesifik (contoh: download hanya untuk admin)

### 3. **Livewire Components**
- **PasienIndex**: Listing pasien dengan fitur search, filter, pagination
- **PasienForm**: Form create/update dengan cascading dropdown
- Integrasi RBAC langsung di component (tombol delete hanya tampil untuk admin)

### 4. **Routes dengan RBAC**
```php
// Admin & Konselor
Route::middleware(['auth', 'role:admin,konselor'])->group(function () {
    Route::get('/pasien', PasienIndex::class);
    Route::get('/pasien/create', PasienForm::class);
    Route::get('/pasien/{id}/edit', PasienForm::class);
    Route::get('/pasien/{id}', [PasienController::class, 'show']);
});

// Admin Only
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/pasien/{id}/download', [PasienController::class, 'download']);
});
```

## 📁 File yang Dibuat

### Backend
1. **app/Http/Middleware/RoleMiddleware.php** - Middleware untuk checking role
2. **app/Http/Controllers/PasienController.php** - Controller refactored (tidak redundan)
3. **app/Livewire/Pasien/Index.php** - Component untuk listing pasien
4. **app/Livewire/Pasien/Form.php** - Component untuk form pasien

### Frontend
5. **resources/views/livewire/pasien/index.blade.php** - View listing dengan Tailwind CSS
6. **resources/views/livewire/pasien/form.blade.php** - View form dengan validasi
7. **resources/views/pasien/index.blade.php** - Wrapper view (opsional)

### Config
8. **bootstrap/app.php** - Registrasi middleware alias
9. **routes/web.php** - Routes dengan RBAC middleware

## 🔐 Cara Kerja RBAC

### Level 1: Middleware Route
```php
Route::middleware(['auth', 'role:admin,konselor'])->group(function () {
    // Routes yang bisa diakses admin dan konselor
});
```

### Level 2: Controller Method
```php
public function download($id) {
    if (auth()->user()->type !== 'admin') {
        abort(403, 'Only administrators can download patient data.');
    }
    // Logic download
}
```

### Level 3: Livewire Component
```php
public function delete($id) {
    if (!$this->isAdmin()) {
        $this->dispatch('alert', type: 'error', message: 'Unauthorized');
        return;
    }
    // Logic delete
}
```

### Level 4: View/UI
```blade
@if($isAdmin)
    <button wire:click="delete({{ $pasien->id_pasien }})">Hapus</button>
@endif
```

## 🎨 Keunggulan Implementasi

### ✅ Dibanding Controller Lama:
- **Tidak Redundan**: Satu controller untuk semua role (vs controller lama yang punya method terpisah `index()` dan `konselorIndex()`)
- **Maintainable**: Perubahan hanya di satu tempat
- **DRY Principle**: Tidak ada duplikasi code

### ✅ Dengan Livewire:
- **Reaktif**: Real-time search & filter tanpa reload
- **Modern**: SPA-like experience
- **Efisien**: Hanya load data yang diperlukan

### ✅ Keamanan Berlapis:
1. Middleware di route level
2. Authorization di controller
3. Permission check di component
4. Conditional rendering di view

## 🚀 Cara Menggunakan

### 1. Akses Route
```
/pasien              → Listing pasien (admin & konselor)
/pasien/create       → Form tambah pasien (admin & konselor)
/pasien/{id}/edit    → Form edit pasien (admin & konselor)
/pasien/{id}         → Detail pasien (admin & konselor)
/pasien/{id}/download → Download PDF (admin only)
```

### 2. Behavior Berdasarkan Role

**Admin dapat:**
- View, Create, Edit pasien
- Delete pasien
- Download PDF pasien

**Konselor dapat:**
- View, Create, Edit pasien
- Tidak bisa delete
- Tidak bisa download PDF

### 3. Testing RBAC

```php
// Di browser/testing:
// Login sebagai admin → Semua fitur aktif
// Login sebagai konselor → Tombol delete & download tidak muncul
// Akses langsung URL download sebagai konselor → Error 403
```

## 📝 Catatan Tambahan

1. **Model User** harus punya field `type` dengan nilai: `admin`, `konselor`, dll
2. **Model Pasien** disesuaikan dengan struktur database Anda
3. **Layouts & Components** (navbar, sidebar, dll) sudah tersedia di folder components
4. **Livewire v3** digunakan untuk implementasi ini

## 🔄 Migrasi dari Controller Lama

Untuk menggunakan sistem baru:
1. Update route dari controller lama ke yang baru
2. Pastikan user sudah login dan punya field `type`
3. Test semua role untuk memastikan akses sesuai

---

**Sistem RBAC ini dapat diterapkan ke modul lain** dengan pola yang sama (FollowUp, Konseling, Laporan, dll).
