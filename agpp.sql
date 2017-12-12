drop database if exists agpp;
create database agpp;
use agpp;

-- Parent Tables

create table pengguna
(
	id_pengguna int primary key unique auto_increment,
	nama_pengguna varchar(100),
	jabatan enum('Admin', 'Manajer Proyek', 'Site Manager'),
	email varchar(50) unique,
	kata_sandi varchar(50),
	status enum('Aktif', 'Nonaktif')
);

insert into pengguna values
(1, 'Budianto Azis', 'Admin', 'budianto.azis@agpp.com', 'agpp', 'Aktif'),
(2, 'Agus Permana', 'Manajer Proyek', 'agus.permana@agpp.com', 'agpp', 'Aktif'),
(3, 'Agus Purnama', 'Site Manager', 'agus.purnama@agpp.com', 'agpp', 'Aktif');

create table proyek
(
	id_proyek int primary key unique auto_increment,
	no_spp varchar(50),
	nama_proyek varchar(100),
	nama_klien varchar(100),
	nilai_kontrak bigint,
	tgl_mulai date,
	tgl_selesai date
);

insert into proyek values
(1, '01/SPP/AGPP-NM/V/2010', 'Pelaksanaan Bangunan Mazda Showroom di Jl. Suryopranoto, Jakarta', 'PT. Nusantara Mazda', '6500000000', '2010-05-19', '2010-12-19'),
(2, '01/SPP/EGC-AGPP/PORSCHE/III/2014', 'Pelaksanaan Pekerjaan Struktur, Arsitektur, dan Mechanical Electrical Porsche Centre Jakarta', 'PT. Eurokars Artha Utama', '32670000000', '2014-03-26', '2015-03-25'),
(3, '01/SPP/NBM-AGPP/MITSUBISHI/II/2017', 'Pelaksanaan Pekerjaan Showroom, Service Reception, Service Bay, Service Store, Car Wash and Exterior', 'PT. Nusantara Berlian Motor', '10780000000', '2017-02-15', '2017-07-30');

create table risiko
(
	id_risiko int primary key unique auto_increment,
	nama_risiko varchar(100),
	nilai_s int,
	nama_kontrol varchar(100),
	nilai_d int
);

-- insert into risiko values
-- (1, 'Perubahan desain', 6, null, 10),
-- (2, 'Gambar desain lama', 7, 'Penjadwalan proyek', 1),
-- (3, 'Pembayaran macet dari owner', 10, 'Pemberitahuan jadwal pembayaran ke owner', 2),
-- (4, 'Pengeluaran biaya kompensasi untuk lingkungan', 2, null, 10),
-- (5, 'Harga material naik mendadak', 7, null, 8),
-- (6, 'Kualitas pekerjaan kurang baik', 6, 'Pengawasan lapangan', 2),
-- (7, 'Pekerja berhalangan hadir', 5, 'Absensi pekerja', 1),
-- (8, 'Pekerja tertimpa material', 2, 'Hasil laporan', 8),
-- (9, 'Pekerja celaka karena alat kerja', 2, 'Hasil laporan', 8),
-- (10, 'Tipe material diubah', 5, 'Hasil laporan', 6),
-- (11, 'Material yang dikirim salah', 8, 'Memberi daftar tipe material yang dibeli', 7),
-- (12, 'Alat kerja rusak', 10, 'Hasil laporan', 6),
-- (13, 'Pengiriman material terlambat', 6, 'Hasil laporan', 8),
-- (14, 'Penambahan pekerjaan', 5, null, 10),
-- (15, 'Bangunan proyek disegel', 9, null, 10),
-- (16, 'Pengerjaan ulang (faktor cuaca)', 8, null, 8);

-- Child Tables

create table pekerjaan
(
	id_pekerjaan int primary key unique auto_increment,
	nama_pekerjaan varchar(100),
	bobot float,
	id_proyek int,
	foreign key(id_proyek) references proyek(id_proyek)
);

create table efek
(
	id_efek int primary key unique auto_increment,
	nama_efek varchar(100),
	id_risiko int,
	foreign key(id_risiko) references risiko(id_risiko)
);

-- insert into `efek` (`id_efek`, `nama_efek`, `id_risiko`) values
-- (1, 'Menunggu gambar desain baru', 1),
-- (2, 'Pekerjaan utama terganggu', 1),
-- (3, 'Pekerjaan selanjutnya tertunda', 2),
-- (4, 'Biaya operasional membengkak', 3),
-- (5, 'Biaya lebih tinggi tidak sesuai rencana', 4),
-- (6, 'Biaya lebih tinggi tidak sesuai rencana', 5),
-- (7, 'Pengerjaan ulang', 6),
-- (8, 'Pekerjaan selanjutnya tertunda', 6),
-- (9, 'Pekerjaan kurang maksimal', 7),
-- (10, 'Biaya perawatan', 8),
-- (11, 'Biaya perawatan', 9),
-- (12, 'Harga material bisa lebih mahal', 10),
-- (13, 'Pekerjaan selanjutnya tertunda', 11),
-- (14, 'Pekerjaan kurang maksimal', 12),
-- (15, 'Pekerjaan selanjutnya tertunda', 13),
-- (16, 'Jadwal tidak sesuai rencana', 14),
-- (17, 'Proyek ditunda', 15),
-- (18, 'Biaya operasional membengkak', 15),
-- (19, 'Biaya tambahan untuk perbaikan', 16),
-- (20, 'Pekerjaan selanjutnya tertunda', 17);

create table penyebab
(
	id_penyebab int primary key unique auto_increment,
	nama_penyebab varchar(100),
	nilai_o int,
	id_risiko int,
	foreign key(id_risiko) references risiko(id_risiko)
);

-- insert into penyebab values
-- (1, 'Keinginan owner', 7, 1),
-- (2, 'Keputusan owner berubah-ubah', 5, 2),
-- (3, 'Owner tidak membayar angsuran tepat waktu', 7, 3),
-- (4, 'Lingkungan merasa terganggu karena pekerjaan proyek', 5, 4),
-- (5, 'Kenaikan harga dolar', 2, 5),
-- (6, 'Pekerjaan dilakukan manual tanpa alat saat malam', 3, 6),
-- (7, 'Pekerja kurang andal', 2, 6),
-- (8, 'Pekerja sakit', 3, 7),
-- (9, 'Kelalaian pekerja', 5, 8),
-- (10, 'Kelalaian pekerja', 5, 9),
-- (11, 'Tipe material yang dipesan kosong', 2, 10),
-- (12, 'Keinginan owner', 3, 10),
-- (13, 'Kesalahan distributor', 2, 11),
-- (14, 'Pekerja kurang tepat menggunakan alat', 3, 12),
-- (15, 'Jadwal produksi tidak sesuai dengan jadwal proyek', 3, 13),
-- (16, 'Kendaraan pengirim mengalami kecelakaan', 3, 13),
-- (17, 'Aturan red line untuk material impor', 2. 13),
-- (18, 'Owner menambah spesifikasi proyek', 8, 14),
-- (19, 'Bangunan tidak sesuai izin', 7, 15),
-- (20, 'Kerusakan karena cuaca buruk', 3, 16);

create table mitigasi
(
	id_mitigasi int primary key unique auto_increment,
	nama_mitigasi varchar(100),
	id_penyebab int,
	foreign key(id_penyebab) references penyebab(id_penyebab)
);

-- insert into mitigasi values
-- (1, 'Negosiasi dengan owner', 1),
-- (2, 'Memberi saran kepada owner agar mantap menentukan keputusan', 2),
-- (3, 'Proyek ditunda hingga owner membayar tagihan', 3),
-- (4, 'Negosiasi dengan lingkungan', 4),
-- (5, 'Negosiasi dengan owner', 5),
-- (6, 'Pengerjaan ulang', 6),
-- (7, 'Pelatihan kepada pekerja', 7),
-- (8, 'Klaim asuransi', 9),
-- (9, 'Klaim asuransi', 10),
-- (10, 'Negosiasi dengan owner', 11),
-- (11, 'Negosiasi dengan owner', 12),
-- (12, 'Jadwal pengiriman dimajukan', 13),
-- (13, 'Pelatihan kepada pekerja', 14),
-- (14, 'Jadwal pengiriman dimajukan', 16),
-- (15, 'Jadwal pengiriman dimajukan', 17),
-- (16, 'Negosiasi dengan owner', 18),
-- (17, 'Hubungi owner untuk menangani izin', 19),
-- (18, 'Klaim asuransi', 20);

create table laporan_pekerjaan
(
	id_laporan_pekerjaan int primary key unique auto_increment,
	tgl_laporan_pekerjaan date,
	kemajuan float,
	id_pekerjaan int,
	foreign key(id_pekerjaan) references pekerjaan(id_pekerjaan)
);

create table laporan_kendala
(
	id_laporan_kendala int primary key unique auto_increment,
	ket_kendala varchar(300),
	tgl_laporan_kendala date,
	id_proyek int,
	foreign key(id_proyek) references proyek(id_proyek)
);

create table identifikasi_risiko
(
	id_identifikasi_risiko int primary key unique,
	tgl_identifikasi_risiko date,
	id_proyek int,
	id_risiko int,
	id_efek int,
	id_penyebab int,
	id_mitigasi int,
	foreign key(id_proyek) references proyek(id_proyek),
	foreign key(id_risiko) references risiko(id_risiko),
	foreign key(id_efek) references efek(id_efek),
	foreign key(id_penyebab) references penyebab(id_penyebab),
	foreign key(id_mitigasi) references mitigasi(id_mitigasi)
);