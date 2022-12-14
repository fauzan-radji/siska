# TODOs

## CRUD

### Searching

- [ ] Admin
- [x] Kwarran
- [x] Pangkalan
- [ ] Pembina
- [ ] Peserta Didik
- [ ] Poin
- [ ] Poin Teruji
- [ ] Jadwal

### Upload Foto

- [ ] Pangkalan
- [ ] Pembina
- [ ] Peserta Didik

### Validation

- [ ] Admin
- [ ] Kwarran
- [ ] Pangkalan
- [ ] Pembina
- [ ] Peserta Didik
- [ ] Jadwal

## UIs

- Dashboard
  - [x] Dashboard
  - Kwartir Ranting
    - [x] Daftar Kwarran
    - [x] Detail Kwarran
    - [x] Tambah Kwarran | Edit Kwarran
  - Pangkalan
    - [x] Daftar Pangkalan
    - [ ] Tambah Pangkalan | Edit Pangkalan
    - [ ] Detail Pangkalan
    - [ ] Pangkalan Saya
    - [x] Ruang Tunggu
  - Pembina
    - [ ] Daftar Pembina
    - [ ] Tambah Pembina
    - [ ] Ruang Tunggu
  - Peserta Didik
    - [ ] Daftar Peserta Didik
    - [ ] Tambah Peserta Didik
    - [ ] Ruang Tunggu
  - [ ] Syarat Kecakapan Umum
  - [ ] Jadwal
  - Pengurus
    - [ ] Daftar Pengurus
    - [ ] Tambah Pengurus
  - Profile
    - [ ] Akun Saya
    - [ ] Logout
- Details Page
  - [ ] Admin
  - [ ] Kwarran
  - [ ] Pangkalan
  - [ ] Pembina
  - [ ] Peserta Didik
  - [ ] Jadwal
- Landing Page
  - [ ] Navbar
  - [ ] Hero Image
  - [ ] Deskripsi
  - [ ] Lensa Kegiatan
  - [ ] Footer
- [ ] Register | Tombol kembali ke beranda
- [ ] Login | Tombol kembali ke beranda

# To Be Fixed

- [ ] Optimalisasi Query (N+1 Problem)
- [ ] Menambah no_kwarran di form tambah kwarran
- [ ] Memisahkan field gudep putra dan putri serta ambalan putra dan putri di tabel pangkalan
- [ ] Fix judul tiap halaman
- [ ] Fix locale (bahasa yang digunakan aplikasi)
- [ ] Fix kata-kata yang digunakan di forelse empty

# :smiley: Selesai

## Migration

- Admin
- Kwarran
- Pangkalan
- Pembina
- Peserta Didik
- Poin
- Jadwal
- Agama

## Factory

- Kwarran
- Pangkalan
- User
- Pembina
- Peserta Didik

## Seeder

- Admin
- Kwarran
- Pangkalan
- Pembina
- Peserta Didik
- Poin
- Agama

## Relations

- User - Admin
- User - Pembina
- User - Peserta Didik
- Kwarran - Pangkalan
- Pangkalan - Pembina
- Pangkalan - Peserta Didik
- Pangkalan - Jadwal
- Agama - Pembina
- Agama - Peserta Didik
- Agama - Poin
- Jadwal - Poin
- Jadwal - Pembina
- Peserta Didik - Poin

## Register

- Pangkalan
- Pembina
- Peserta Didik

## Login

- Admin
- Pembina
- Peserta Didik

## Authorization

### Admin

- Create Kwarran
- Read Kwarran
- Update Kwarran
- Delete Kwarran
- Read Pangkalan
- Delete Pangkalan
- Read Pembina
- Read Jadwal
- Verify Pangkalan
- Read Poin
- Read Poin Teruji Peserta Didik

### Admin Pangkalan

- Read Kwarran
- Read Pangkalan
- Update Related Pangkalan
- Delete Related Pangkalan
- Create Pembina in Related Pangkalan
- Read Pembina in Related Pangkalan
- Update Pembina in Related Pangkalan
- Delete Pembina in Related Pangkalan
- Create Peserta Didik in Related
- Read Peserta Didik in Related Pangkalan
- Update Peserta Didik in Related Pangkalan
- Delete Peserta Didik in Related Pangkalan
- Create Jadwal in Related Pangkalan
- Read Jadwal in Related Pangkalan
- Update Jadwal in Related Pangkalan
- Delete Jadwal in Related Pangkalan
- Verify Pembina in Related Pangkalan
- Verify Peserta Didik in Related Pangkalan
- Read Poin
- Update Poin Teruji in Related Peserta Didik
- Read Poin Teruji in Related Peserta Didik

### Pembina

- Read Kwarran
- Read Related Pangkalan
- Read Pembina in Related Pangkalan
- Update Related Pembina
- Delete Related Pembina
- Read Peserta Didik in Related Pangkalan
- Read Jadwal in Related Pangkalan
- Read Poin
- Update Poin Teruji in Related Peserta Didik
- Read Poin Teruji in Related Peserta Didik

### Peserta Didik

- Read Kwarran
- Read Related Pangkalan
- Read Pembina in Related Pangkalan
- Read Jadwal in Related Pangkalan
- Read Poin
- Read Poin Teruji in Related Peserta Didik

## Policy

### Admin

- View Any
  - Admin
- View
  - Admin
- Create
  - Admin
- Update
  - Admin
- Delete
  - Admin

### Kwarran

- Create
  - Admin
- Update
  - Admin
- Delete
  - Admin

### Pangkalan

- View Any
  - Admin
  - Admin Pangkalan
  - Pembina
- View
  - Admin
  - Admin Pangkalan
  - Pembina
  - Peserta
- Create
  - Guest
- Update
  - Admin Pangkalan
- Delete
  - Admin
  - Admin Pangkalan
- Verify
  - Admin
- Verify All
  - Admin

### Pembina

- View Any
  - Admin
  - Admin Pangkalan
  - Pembina
  - Peserta Didik
- View
  - Admin
  - Admin Pangkalan in Related Pangkalan
  - Pembina in Related Pangkalan
  - Peserta Didik in Related Pangkalan
- Create
  - Admin Pangkalan
  - Guest
- Update
  - Admin Pangkalan in Related Pangkalan
  - Related Pembina
- Delete
  - Admin
  - Admin Pangkalan in Related Pangkalan
  - Related Pembina
- Verify
  - Related Admin Pangkalan
- Verify All
  - Related Admin Pangkalan

### Peserta Didik

- View Any
  - Admin
  - Admin Pangkalan
  - Pembina
- View
  - Admin
  - Admin Pangkalan in Related Pangkalan
  - Pembina in Related Pangkalan
- Create
  - Admin Pangkalan
  - Guest
- Update
  - Admin Pangkalan in Related Pangkalan
  - Related Peserta Didik
- Delete
  - Admin
  - Admin Pangkalan in Related Pangkalan
  - Related Peserta Didik
- Verify
  - Related Admin Pangkalan
- Verify All
  - Related Admin Pangkalan
- Uji
  - Related Admin Pangkalan
  - Related Pembina

### Jadwal

- View Any
  - Admin
  - Admin Pangkalan
  - Pembina
  - Peserta Didik
- View
  - Admin
  - Pembina
  - Admin Pangkalan
  - Peserta Didik
- Create
  - Admin Pangkalan
- Update
  - Admin Pangkalan
- Delete
  - Admin Pangkalan

### Poin

- View Any
  - Admin
  - Admin Pangkalan
  - Pembina
  - Peserta Didik
- Update
  - Related Admin Pangkalan
  - Related Pembina

## CRUD

### Create

- Admin
- Kwarran
- Pangkalan
- Pembina
- Peserta Didik
- Jadwal

### Read

- Admin
- Kwarran
- Pangkalan
- Pembina
- Peserta Didik
- Jadwal
- Poin
- Poin Teruji

### Read Specific

- Admin
- Kwarran
- Pangkalan
- Pembina
- Peserta Didik
- Jadwal

### Update

- Admin
- Kwarran
- Pangkalan
- Pembina
- Peserta Didik
- Jadwal
- Poin Teruji

### Delete

- Admin
- Kwarran
- Pangkalan
- Pembina
- Peserta Didik
- Jadwal

## UIs

- Form Login
- Form Register
  - Pangkalan
  - Pembina
  - Peserta
- Data Potensi Chart
- Waiting Room Page
  - Pangkalan
  - Pembina
  - Peserta Didik
