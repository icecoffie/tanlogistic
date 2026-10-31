# TAN Logistic — Company Profile

Website company profile **PT. Tetuko Anugerah Nusantara (TAN LOGISTIC)**.
Laravel 12 + Blade + Tailwind CSS v4 + Alpine.js.

- **Tanpa database**: tidak ada migration, model, atau koneksi DB.
- **Tanpa Node di server**: CSS/JS di-compile sekali via `npm run build` ke `public/build`, lalu di-upload apa adanya.
- Halaman: Home, About, Services, Clients, Contact.

## Struktur penting

| Path | Isi |
|---|---|
| `config/content.php` | **Semua teks & daftar konten** (layanan, klien, FAQ, kantor, SEO per halaman). Edit di sini saja. |
| `tailwind.config.js` | Warna brand (`primary`, `accent`, `dark`, `soft`) & font (Anton + Inter). |
| `routes/web.php` | Routing 5 halaman ke `PageController`. |
| `resources/views/layouts/app.blade.php` | Layout utama + meta SEO/Open Graph + Google Fonts. |
| `resources/views/pages/` | View per halaman. |
| `resources/views/partials/` | Section yang dipakai ulang (advantages, FAQ, klien, sertifikasi, CTA). |
| `resources/views/components/` | `navbar`, `footer`, `service-card`, `stat-card`, `faq-item`, `client-logo`, `icon`, `logo`, `button`, `page-header`, `section-heading`. |
| `public/images/` | Gambar: `hero.jpg`, `ocean.jpg`, `air.jpg`, `land.jpg`, `trucking.jpg`, `warehouse.jpg`, `port.jpg`, `map.jpg`. |

### Mengganti konten
- **Teks**: edit `config/content.php`. Di server produksi jalankan `php artisan config:clear` (atau `config:cache` lagi) setelah mengubahnya.
- **Logo**: `public/images/tan-logo.svg` (navbar, background terang), `tan-logo-dark.svg` (footer, background gelap), `tan-favicon.svg` (emblem di section Global Network). `public/favicon.svg` adalah salinan emblem dengan bingkai persegi untuk tab browser. Path logo diatur di `company.logo*` pada `config/content.php`.
- **Gambar**: timpa file di `public/images/` dengan nama yang sama. (Foto bawaan dari Unsplash, bebas dipakai; ganti dengan foto milik perusahaan bila ada.)
- **Logo klien**: taruh file di `public/images/clients/` (mis. `cgv.png`), lalu isi `'logo' => 'images/clients/cgv.png'` pada klien terkait. Jika kosong, nama klien tampil sebagai wordmark.
- **Sosial media**: ganti `'url' => '#'` di `company.social`.
- **WhatsApp**: isi `company.whatsapp` (format `6281234567890`) untuk memunculkan tombol "Chat via WhatsApp" di halaman Contact.
- **Ikon**: memakai nama ikon dari `resources/views/components/icon.blade.php` (Lucide).

> Mengubah class Tailwind di view/konten? Jalankan `npm run build` lagi di lokal, lalu upload ulang folder `public/build`.

### Animasi (Motion)
Animasi memakai [Motion](https://motion.dev) (versi vanilla JS dari Framer Motion), lewat atribut di Blade. Logikanya ada di `resources/js/motion.js`:

| Atribut | Efek |
|---|---|
| `data-reveal="up\|fade\|left\|right\|scale"` | Muncul saat di-scroll ke layar |
| `data-delay="0.2"` | Delay tambahan (detik) |
| `data-stagger` | Anak-anak elemen muncul bergantian |
| `data-count` | Angka menghitung naik dari 0 (mis. `10,000+`) |
| `data-parallax="80"` | Efek parallax saat scroll |
| `data-float` | Melayang pelan terus-menerus |

Pengunjung yang memakai setelan *reduce motion* di OS tidak mendapat animasi. Jika JS gagal dimuat, semua konten tetap tampil.

### Route planner (Home)
Kartu Origin/Destination di section End to End bisa diklik. Daftar kota & mode diatur di `end_to_end.mockup` pada `config/content.php`. Tombol "Get a quote" membuka halaman Contact dengan layanan dan pesan rute yang sudah terisi.

### Company Profile (PDF)
- PDF ditampilkan di **`/company-profile`** dan langsung terbuka di PDF viewer browser (`Content-Disposition: inline`), bukan ter-download.
- File disimpan di `storage/app/company-profile/` (di luar `public/`, jadi tidak bisa diakses selain lewat route tersebut). File asli dari Canva (12,6 MB) disimpan di subfolder `original/`. Yang dipakai website adalah versi teroptimasi (5 MB) dengan metadata SEO.
- Untuk update: ganti `storage/app/company-profile/tan-logistic-company-profile-2026.pdf` (nama sama, atau ubah `company_profile.path` di `config/content.php`).

### SEO
Yang sudah ada di kode:
- Title, description, canonical, Open Graph & Twitter card unik per halaman. Gambar share: `public/images/og-image.jpg` (1200×630).
- Structured data (JSON-LD): Organization + 5 kantor cabang (LocalBusiness), WebSite, WebPage, BreadcrumbList, FAQPage, dan daftar Service.
- `/sitemap.xml` dan `/robots.txt` otomatis.
- Redirect 301 otomatis dari `tanlogistic.com` dan `http://` ke **`https://www.tanlogistic.com`** (di `public/.htaccess`), plus gzip & cache browser.
- Di production semua URL dipaksa ke `APP_URL` dengan https (`AppServiceProvider`).

Langkah yang harus dilakukan **setelah live** (tidak bisa dari kode):
1. Set `.env`: `APP_ENV=production`, `APP_URL=https://www.tanlogistic.com`.
2. **Google Search Console**: tambahkan properti `https://www.tanlogistic.com`, pilih verifikasi "HTML tag", isi kodenya di `GOOGLE_SITE_VERIFICATION=` pada `.env`, lalu submit `https://www.tanlogistic.com/sitemap.xml`.
3. **Google Business Profile**: daftarkan ke-6 kantor (nama, alamat & telepon sama persis dengan website). Ini paling berpengaruh untuk pencarian lokal seperti "freight forwarder Bekasi".
4. Isi link sosial media di `company.social` (otomatis masuk ke `sameAs` di structured data).
5. Minta partner/klien menautkan ke tanlogistic.com (backlink), dan daftarkan di direktori logistik (profil JCTrans, direktori bisnis Indonesia).

### Form kontak
Form di halaman Contact **tidak memakai backend**. Saat dikirim, form menyusun email (subjek + isi) lalu membuka aplikasi email pengunjung lewat `mailto:info@tanlogistic.com`. Tidak ada data yang disimpan di server.

---

## Instalasi lokal

Prasyarat: PHP ≥ 8.2, Composer, Node.js ≥ 20.

```bash
composer install
cp .env.example .env        # lewati jika .env sudah ada
php artisan key:generate
npm install
npm run build
php artisan serve
```

Buka http://127.0.0.1:8000. Tidak ada langkah database.

Mode development (auto-reload CSS/JS): jalankan `npm run dev` di terminal kedua (atau `composer dev` untuk menjalankan keduanya).

Test: `php artisan test`.

---

## Deploy ke shared hosting

### 1. Siapkan di komputer lokal

```bash
composer install --no-dev --optimize-autoloader
npm install
npm run build          # menghasilkan public/build (wajib ikut di-upload)
```

Upload seluruh folder project **kecuali** `node_modules/` (dan `.git/` jika ada). Pastikan `vendor/` dan `public/build/` ikut ter-upload.

### 2. Atur `.env` di server

```env
APP_NAME="TAN Logistic"
APP_ENV=production
APP_DEBUG=false
APP_URL=https://www.tanlogistic.com
SESSION_DRIVER=file
CACHE_STORE=file
```

Jika `APP_KEY` kosong, jalankan `php artisan key:generate` (via SSH/terminal cPanel), atau generate di lokal lalu salin nilainya.

Pastikan folder `storage/` dan `bootstrap/cache/` dapat ditulis (permission `775`).

### 3a. Opsi A — Document root diarahkan ke `/public` (disarankan)

Di cPanel/hosting panel, ubah document root domain ke `<folder-project>/public`. Selesai.

### 3b. Opsi B — Isi `public` dipindah ke `public_html`

Bila document root tidak bisa diubah:

1. Upload project ke folder di **luar** `public_html`, misalnya `/home/USER/tanlogistic`.
2. Pindahkan **isi** `tanlogistic/public/` (termasuk `.htaccess`, `build/`, `images/`, `index.php`, `favicon.svg`) ke `/home/USER/public_html/`.
3. Edit `public_html/index.php`, sesuaikan path ke folder project:

```php
// sebelum
if (file_exists($maintenance = __DIR__.'/../storage/framework/maintenance.php')) {
require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';

// sesudah
if (file_exists($maintenance = __DIR__.'/../tanlogistic/storage/framework/maintenance.php')) {
require __DIR__.'/../tanlogistic/vendor/autoload.php';
$app = require_once __DIR__.'/../tanlogistic/bootstrap/app.php';
```

4. Beri tahu Laravel lokasi folder public yang baru, agar `asset()` & Vite menemukan `public_html/build`. Tambahkan di `tanlogistic/app/Providers/AppServiceProvider.php` pada method `register()`:

```php
$this->app->usePublicPath(base_path('../public_html'));
```

### 4. Optimasi (opsional, bila ada akses SSH)

```bash
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

Setelah mengubah `config/content.php`, ulangi `php artisan config:cache` (atau `config:clear`).
