# TODOS

- [ ] Register
- [x] Login
- [ ] Dashboard
- [ ] Authorization
  - [ ] Admin
    - [x] Create Kwarran
    - [x] Read Kwarran
    - [x] Update Kwarran
    - [x] Delete Kwarran
    - [x] Read Pangkalan
    - [ ] Verify Pangkalan
    - [x] Delete Pangkalan
    - [x] Read Pembina
  - [ ] Admin Pangkalan
    - [x] Read Kwarran
    - [x] Read Pangkalan
    - [x] Update Related Pangkalan
    - [x] Delete Related Pangkalan
    - [x] Create Pembina in Related Pangkalan
    - [x] Read Pembina in Related Pangkalan
    - [x] Update Pembina in Related Pangkalan
    - [x] Delete Pembina in Related Pangkalan
    - [ ] Verify Pembina in Related Pangkalan
    - [ ] Create Peserta Didik in Related Pangkalan
    - [ ] Read Peserta Didik in Related Pangkalan
    - [ ] Update Peserta Didik in Related Pangkalan
    - [ ] Delete Peserta Didik in Related Pangkalan
    - [ ] Verify Peserta Didik in Related Pangkalan
  - [ ] Pembina
    - [x] Read Kwarran
    - [x] Read Related Pangkalan
    - [x] Read Pembina in Related Pangkalan
    - [x] Update Related Pembina
    - [x] Delete Related Pembina
    - [ ] Read Peserta Didik in Related Pangkalan
  - [ ] Peserta Didik
    - [x] Read Kwarran
    - [x] Read Related Pangkalan
    - [x] Read Pembina in Related Pangkalan
- [ ] Policy
  - [ ] Admin
    - [ ] View Any
    - [ ] View
    - [ ] Create
    - [ ] Update
    - [ ] Delete
  - [x] Kwarran
    - [x] Create
      - [x] Admin
    - [x] Update
      - [x] Admin
    - [x] Delete
      - [x] Admin
  - [x] Pangkalan
    - [x] View Any
      - [x] Admin
      - [x] Admin Pangkalan
      - [x] Pembina
    - [x] View
      - [x] Admin
      - [x] Admin Pangkalan
      - [x] Pembina
      - [x] Peserta
    - [x] Create
      - [x] Guest
    - [x] Update
      - [x] Admin Pangkalan
    - [x] Delete
      - [x] Admin
      - [x] Admin Pangkalan
  - [x] Pembina
    - [x] View Any
      - [x] Admin
      - [x] Pembina
      - [x] Peserta Didik
    - [x] View
      - [x] Admin
      - [x] Pembina
      - [x] Peserta Didik
    - [x] Create
      - [x] Admin Pangkalan
    - [x] Update
      - [x] Related Pembina
      - [x] Admin Pangkalan
    - [x] Delete
      - [x] Admin
      - [x] Related Pembina
      - [x] Admin Pangkalan
  - [ ] Peserta Didik
    - [ ] View Any
      - [ ] Admin
      - [ ] Related Pembina in Related Pangkalan
    - [ ] View
      - [ ] Admin
      - [ ] Related Pembina in Related Pangkalan
    - [ ] Create
      - [ ] Related Admin Pangkalan in Related Pangkalan
    - [ ] Update
      - [ ] Related Admin Pangkalan in Related Pangkalan
    - [ ] Delete
      - [ ] Admin
      - [ ] Related Admin Pangkalan in Related Pangkalan
  - [ ] Jadwal
    - [ ] View Any
      - [ ] Admin
      - [ ] Admin Pangkalan
    - [ ] View
      - [ ] Admin
      - [ ] Pembina
      - [ ] Admin Pangkalan
      - [ ] Peserta Didik
    - [ ] Create
      - [ ] Admin Pangkalan
    - [ ] Update
      - [ ] Admin Pangkalan
    - [ ] Delete
      - [ ] Admin Pangkalan
- [ ] CRUD
  - [ ] Create
    - [x] Admin
    - [x] Kwarran
    - [x] Pangkalan
    - [x] Pembina
    - [x] Peserta Didik
    - [ ] Jadwal
  - [ ] Upload Foto
    - [ ] Pangkalan
    - [ ] Pembina
    - [ ] Peserta Didik
  - [ ] Validation
    - [ ] Admin
    - [ ] Kwarran
    - [ ] Pangkalan
    - [ ] Pembina
    - [ ] Peserta Didik
    - [ ] Jadwal
  - [ ] Read
    - [x] Admin
    - [x] Kwarran
    - [x] Pangkalan
    - [x] Pembina
    - [x] Peserta Didik
    - [ ] Jadwal
    - [ ] Poin Uji
    - [ ] Agama
  - [ ] Read Specific
    - [x] Admin
    - [x] Kwarran
    - [x] Pangkalan
    - [x] Pembina
    - [x] Peserta Didik
    - [ ] Jadwal
    - [ ] Poin Uji
    - [ ] Agama
  - [ ] Update
    - [x] Admin
    - [x] Kwarran
    - [x] Pangkalan
    - [x] Pembina
    - [x] Peserta Didik
    - [ ] Jadwal
    - [ ] Poin Uji
  - [ ] Delete
    - [x] Admin
    - [x] Kwarran
    - [x] Pangkalan
    - [x] Pembina
    - [x] Peserta Didik
    - [ ] Jadwal
    - [ ] Poin Uji
- [ ] UIs
  - [ ] Landing Page
  - [ ] Form Login
  - [ ] Form Register
    - [ ] Pangkalan
    - [ ] Pembina
    - [ ] Peserta

# To Be Fixed

- [ ] Menambah no_kwarran di form tambah kwarran
- [ ] Di halaman detail kwarran, ketika diklik jumlah pangkalan maka akan mengarah ke daftar pangkalah di kwarran terkait
- [ ] Memisahkan field gudep putra dan putri serta ambalan putra dan putri di tabel pangkalan

# Selesai

- [x] Migration
  - [x] Admin
  - [x] Kwarran
  - [x] Pangkalan
  - [x] Pembina
  - [x] Peserta Didik
  - [x] Poin
  - [x] Jadwal
  - [x] Agama
- [x] Factory
  - [x] Kwarran
  - [x] Pangkalan
  - [x] User
  - [x] Pembina
  - [x] Peserta Didik
- [x] Seeder
  - [x] Admin
  - [x] Kwarran
  - [x] Pangkalan
  - [x] Pembina
  - [x] Peserta Didik
  - [x] Poin
  - [x] Agama
- [x] Relations
  - [x] User - Admin
  - [x] User - Pembina
  - [x] User - Peserta Didik
  - [x] Kwarran - Pangkalan
  - [x] Pangkalan - Pembina
  - [x] Pangkalan - Peserta Didik
  - [x] Pangkalan - Jadwal
  - [x] Agama - Pembina
  - [x] Agama - Peserta Didik
  - [x] Agama - Poin
  - [x] Jadwal - Poin
  - [x] Jadwal - Pembina
