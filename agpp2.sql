DROP DATABASE IF EXISTS agpp;
CREATE DATABASE agpp;
USE agpp;

-- Parent Tables

CREATE TABLE `pengguna` (
  `id_pengguna` int(11) NOT NULL,
  `nama_pengguna` varchar(100) DEFAULT NULL,
  `jabatan` enum('Admin','Manajer Proyek','Site Manager') DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `kata_sandi` varchar(50) DEFAULT NULL,
  `status` enum('Aktif','Nonaktif') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `pengguna` (`id_pengguna`, `nama_pengguna`, `jabatan`, `email`, `kata_sandi`, `status`) VALUES
(1, 'Budianto Azis', 'Admin', 'budianto.azis@agpp.com', 'agpp', 'Aktif'),
(2, 'Agus Permana', 'Manajer Proyek', 'agus.permana@agpp.com', 'agpp', 'Aktif'),
(3, 'Agus Purnama', 'Site Manager', 'agus.purnama@agpp.com', 'agpp', 'Aktif');

CREATE TABLE `klien` (
  `id_klien` int(11) NOT NULL,
  `nama_klien` varchar(100) NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `perusahaan` varchar(100) NOT NULL,
  `alamat` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `klien` (`id_klien`, `nama_klien`, `no_telp`, `perusahaan`, `alamat`) VALUES
(1, 'Joe Surya', '021-3510888', 'PT. Nusantara Mazda', 'Jl. Suryopranoto No. 77 - 79, Petojo Sel., Kota Jakarta Pusat, Daerah Khusus Ibukota Jakarta'),
(2, 'Fransiska Renata', '021-7239333', 'PT. Eurokars Artha Utama', 'Jl. Sultan Iskandar Muda No.51, Kby. Lama, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta'),
(3, 'Joe Surya', '0813-5128-2992', 'PT. Nusantara Berlian Motor', 'Jl. Cinere Raya No. 18B, Cinere, Kota Depok, Jawa Barat');

-- CREATE TABLE `master_risiko` (
--   `id_master_risiko` int(11) NOT NULL,
--   `nama_master_risiko` varchar(100) NOT NULL
-- ) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- INSERT INTO `master_risiko` (`id_master_risiko`, `nama_master_risiko`) VALUES
-- (1, 'Perubahan desain'),
-- (2, 'Gambar desain lama'),
-- (3, 'Pembayaran macet dari owner'),
-- (4, 'Pengeluaran biaya kompensasi untuk lingkungan'),
-- (5, 'Harga material naik mendadak'),
-- (6, 'Kualitas pekerjaan kurang baik'),
-- (7, 'Pekerja berhalangan hadir'),
-- (8, 'Pekerja tertimpa material'),
-- (9, 'Pekerja celaka karena alat kerja'),
-- (10, 'Tipe material diubah'),
-- (11, 'Material yang dikirim salah'),
-- (12, 'Alat kerja rusak'),
-- (13, 'Pengiriman material terlambat'),
-- (14, 'Penambahan pekerjaan'),
-- (15, 'Bangunan proyek disegel'),
-- (16, 'Pengerjaan ulang (faktor cuaca)');

-- Child Tables

CREATE TABLE `proyek` (
  `id_proyek` int(11) NOT NULL,
  `no_spp` varchar(50) DEFAULT NULL,
  `nama_proyek` varchar(300) DEFAULT NULL,
  `nilai_kontrak` bigint(20) DEFAULT NULL,
  `tgl_mulai` date DEFAULT NULL,
  `tgl_selesai` date DEFAULT NULL,
  `nilai_kritis` int(11) DEFAULT NULL,
  `id_klien` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `proyek` (`id_proyek`, `no_spp`, `nama_proyek`, `nilai_kontrak`, `tgl_mulai`, `tgl_selesai`, `nilai_kritis`, `id_klien`) VALUES
(1, '01/SPP/AGPP-NM/V/2010', 'Pelaksanaan Bangunan Mazda Showroom di Jl. Suryopranoto, Jakarta', 6500000000, '2010-05-19', '2010-12-19', NULL, 1),
(2, '01/SPP/EGC-AGPP/PORSCHE/III/2014', 'Pelaksanaan Pekerjaan Struktur, Arsitektur, dan Mechanical Electrical Porsche Centre Jakarta', 32670000000, '2014-03-26', '2015-03-25', NULL, 2),
(3, '01/SPP/NBM-AGPP/MITSUBISHI/II/2017', 'Pelaksanaan Pekerjaan Showroom, Service Reception, Service Bay, Service Store, Car Wash and Exterior Mitsubishi Showroom Medan', 10780000000, '2017-02-15', '2017-07-30', 155, 3);

CREATE TABLE `pekerjaan` (
  `id_pekerjaan` int(11) NOT NULL,
  `nama_pekerjaan` varchar(300) DEFAULT NULL,
  `bobot` float DEFAULT NULL,
  `tgl_mulai_pekerjaan` date DEFAULT NULL,
  `tgl_selesai_pekerjaan` date DEFAULT NULL,
  `id_proyek` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `pekerjaan` (`id_pekerjaan`, `nama_pekerjaan`, `bobot`, `tgl_mulai_pekerjaan`, `tgl_selesai_pekerjaan`, `id_proyek`) VALUES
(1, 'Preliminary', 3.452, '2017-02-06', '2017-07-29', 3),
(2, 'Showroom - Civil work - Ground floor', 5.962, '2017-02-13', '2017-04-08', 3),
(3, 'Showroom - Civil work - Mezzanine floor', 4.102, '2017-03-06', '2017-04-15', 3),
(4, 'Showroom - Civil work - Roof deck and roof top', 1.547, '2017-04-03', '2017-04-22', 3),
(5, 'Showroom - Steel structure (SR, service reception, and service bay)', 6.414, '2017-05-15', '2017-07-15', 3),
(6, 'Showroom - Architecture (SR) - Floor finish - Ground floor', 3.915, '2017-05-08', '2017-06-17', 3),
(7, 'Showroom - Architecture (SR) - Floor finish - Mezzanine and roof floor', 1.008, '2017-06-06', '2017-07-15', 3),
(8, 'Showroom - Architecture (SR) - Wall type - Ground floor', 2.472, '2017-03-27', '2017-06-10', 3),
(9, 'Showroom - Architecture (SR) - Wall type - Mezzanine and roof floor', 2.334, '2017-04-10', '2017-06-17', 3),
(10, 'Showroom - Architecture (SR) - Ceiling - Ground floor', 0.697, '2017-05-08', '2017-06-10', 3),
(11, 'Showroom - Architecture (SR) - Ceiling - Mezzanine and roof floor', 1.131, '2017-05-22', '2017-07-15', 3),
(12, 'Showroom - Architecture (SR) - Doors and windows - Ground floor', 2.208, '2017-05-11', '2017-07-22', 3),
(13, 'Showroom - Architecture (SR) - Doors and window - Mezzanine and roof floor', 4.207, '2017-06-12', '2017-07-29', 3),
(14, 'Showroom - Architecture (SR) - Sanitairs - Ground floor', 0.884, '2017-06-05', '2017-07-15', 3),
(15, 'Showroom - Architecture (SR) - Sanitairs - Mezzanine and roof floor', 1.037, '2017-07-10', '2017-07-22', 3),
(16, 'Service area - Civil work - Ground floor', 8.046, '2017-02-13', '2017-04-08', 3),
(17, 'Service area - Civil work - Roof deck and roof top', 0.405, '2017-03-27', '2017-04-22', 3),
(18, 'Service area - Steel structure (SR, service reception and service bay', 10.255, '2017-03-13', '2017-05-06', 3),
(19, 'Service area - Architecture (Service bay, service store, car wash, and canteen) - Floor finish - Ground floor', 6.716, '2017-05-15', '2017-07-15', 3),
(20, 'Service area - Architecture (Service bay, service store, car wash, and canteen) - Wall type - Ground floor', 2.780, '2017-04-24', '2017-06-10', 3),
(21, 'Service area - Architecture (Service bay, service store, car wash, and canteen) - Ceiling - Ground floor', 1.076, '2017-05-22', '2017-06-10', 3),
(22, 'Service area - Architecture (Service bay, service store, car wash, and canteen) - Doors and windows - Ground floor', 1.738, '2017-06-05', '2017-07-15', 3),
(23, 'Service area - Architecture (Service bay, service store, car wash, and canteen) - Sanitairs - Ground floor', 0.464, '2017-06-12', '2017-07-22', 3),
(24, 'Exterior', 10.282, '2017-06-12', '2017-07-22', 3),
(25, 'Drainage', 1.414, '2017-02-27', '2017-05-06', 3),
(26, 'ME', 10.912, '2017-05-01', '2017-07-29', 3),
(27, 'Plumbing', 4.543, '2017-03-20', '2017-05-27', 3);

CREATE TABLE `risiko` (
  `id_risiko` int(11) NOT NULL,
  `nama_risiko` varchar(100) DEFAULT NULL,
  `nilai_s` int(11) DEFAULT NULL,
  `nama_kontrol` varchar(100) DEFAULT NULL,
  `nilai_d` int(11) DEFAULT NULL,
  `id_proyek` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `risiko` (`id_risiko`, `nama_risiko`, `nilai_s`, `nama_kontrol`, `nilai_d`, `id_proyek`) VALUES
(1, 'Perubahan desain', 6, 'Tidak ada', 10, 3),
(2, 'Gambar desain lama', 7, 'Penjadwalan proyek', 1, 3),
(3, 'Pembayaran macet dari owner', 10, 'Pemberitahuan jadwal pembayaran ke owner', 2, 3),
(4, 'Pengeluaran biaya kompensasi untuk lingkungan', 2, 'Tidak ada', 10, 3),
(5, 'Harga material naik mendadak', 7, 'Tidak ada', 8, 3),
(6, 'Kualitas pekerjaan kurang baik', 6, 'Pengawasan lapangan', 2, 3),
(7, 'Pekerja berhalangan hadir', 5, 'Absensi pekerja', 1, 3),
(8, 'Pekerja tertimpa material', 2, 'Hasil laporan', 8, 3),
(9, 'Pekerja celaka karena alat kerja', 2, 'Hasil laporan', 8, 3),
(10, 'Tipe material diubah', 5, 'Hasil laporan', 6, 3),
(11, 'Material yang dikirim salah', 8, 'Memberi daftar tipe material yang dibeli', 7, 3),
(12, 'Alat kerja rusak', 10, 'Hasil laporan', 6, 3),
(13, 'Pengiriman material terlambat', 6, 'Hasil laporan', 8, 3),
(14, 'Penambahan pekerjaan', 5, 'Tidak ada', 10, 3),
(15, 'Bangunan proyek disegel', 9, 'Tidak ada', 10, 3),
(16, 'Pengerjaan ulang (faktor cuaca)', 8, 'Tidak ada', 8, 3);

CREATE TABLE `efek` (
  `id_efek` int(11) NOT NULL,
  `nama_efek` varchar(100) DEFAULT NULL,
  `id_risiko` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `efek` (`id_efek`, `nama_efek`, `id_risiko`) VALUES
(1, 'Menunggu gambar desain baru', 1),
(2, 'Pekerjaan utama terganggu', 1),
(3, 'Pekerjaan selanjutnya tertunda', 2),
(4, 'Biaya operasional membengkak', 3),
(5, 'Biaya lebih tinggi tidak sesuai rencana', 4),
(6, 'Biaya lebih tinggi tidak sesuai rencana', 5),
(7, 'Pengerjaan ulang', 6),
(8, 'Pekerjaan selanjutnya tertunda', 6),
(9, 'Pekerjaan kurang maksimal', 7),
(10, 'Biaya perawatan', 8),
(11, 'Biaya perawatan', 9),
(12, 'Harga material bisa lebih mahal', 10),
(13, 'Pekerjaan selanjutnya tertunda', 11),
(14, 'Pekerjaan kurang maksimal', 12),
(15, 'Pekerjaan selanjutnya tertunda', 13),
(16, 'Jadwal tidak sesuai rencana', 14),
(17, 'Proyek ditunda', 15),
(18, 'Biaya operasional membengkak', 15),
(19, 'Biaya tambahan untuk perbaikan', 16),
(20, 'Pekerjaan selanjutnya tertunda', 16);

CREATE TABLE `penyebab` (
  `id_penyebab` int(11) NOT NULL,
  `nama_penyebab` varchar(100) DEFAULT NULL,
  `nilai_o` int(11) DEFAULT NULL,
  `rpn` int(11) DEFAULT NULL,
  `kategori` enum('Tinggi','Rendah') DEFAULT NULL,
  `id_risiko` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `penyebab` (`id_penyebab`, `nama_penyebab`, `nilai_o`, `rpn`, `kategori`, `id_risiko`) VALUES
(1, 'Keinginan owner', 7, 420, 'Tinggi', 1),
(2, 'Keputusan owner berubah-ubah', 5, 35, 'Rendah', 2),
(3, 'Owner tidak membayar angsuran tepat waktu', 7, 140, 'Rendah', 3),
(4, 'Lingkungan merasa terganggu karena pekerjaan proyek', 5, 100, 'Rendah', 4),
(5, 'Kenaikan harga dolar', 2, 112, 'Rendah', 5),
(6, 'Pekerjaan dilakukan manual tanpa alat saat malam', 3, 36, 'Rendah', 6),
(7, 'Pekerja kurang andal', 2, 24, 'Rendah', 6),
(8, 'Pekerja sakit', 3, 15, 'Rendah', 7),
(9, 'Kelalaian pekerja', 5, 80, 'Rendah', 8),
(10, 'Kelalaian pekerja', 5, 80, 'Rendah', 9),
(11, 'Tipe material yang dipesan kosong', 2, 60, 'Rendah', 10),
(12, 'Keinginan owner', 3, 90, 'Rendah', 10),
(13, 'Kesalahan distributor', 2, 112, 'Rendah', 11),
(14, 'Pekerja kurang tepat menggunakan alat', 3, 180, 'Tinggi', 12),
(15, 'Jadwal produksi tidak sesuai dengan jadwal proyek', 3, 144, 'Rendah', 13),
(16, 'Kendaraan pengirim mengalami kecelakaan', 3, 144, 'Rendah', 13),
(17, 'Aturan red line untuk material impor', 2, 96, 'Rendah', 13),
(18, 'Owner menambah spesifikasi proyek', 8, 400, 'Tinggi', 14),
(19, 'Bangunan tidak sesuai izin', 7, 630, 'Tinggi', 15),
(20, 'Kerusakan karena cuaca buruk', 3, 192, 'Tinggi', 16);

CREATE TABLE `mitigasi` (
  `id_mitigasi` int(11) NOT NULL,
  `nama_mitigasi` varchar(100) DEFAULT NULL,
  `id_penyebab` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `mitigasi` (`id_mitigasi`, `nama_mitigasi`, `id_penyebab`) VALUES
(1, 'Negosiasi dengan owner', 1),
(2, 'Memberi saran kepada owner agar mantap menentukan keputusan', 2),
(3, 'Proyek ditunda hingga owner membayar tagihan', 3),
(4, 'Negosiasi dengan lingkungan', 4),
(5, 'Negosiasi dengan owner', 5),
(6, 'Pengerjaan ulang menggunakan alat saat siang', 6),
(7, 'Pelatihan kepada pekerja', 7),
(8, 'Tidak ada', 8),
(9, 'Klaim asuransi', 9),
(10, 'Klaim asuransi', 10),
(11, 'Negosiasi dengan owner', 11),
(12, 'Negosiasi dengan owner', 12),
(13, 'Jadwal pengiriman dimajukan', 13),
(14, 'Pelatihan kepada pekerja', 14),
(15, 'Tidak ada', 15),
(16, 'Jadwal pengiriman dimajukan', 16),
(17, 'Jadwal pengiriman dimajukan', 17),
(18, 'Negosiasi dengan owner', 18),
(19, 'Hubungi owner untuk menangani izin', 19),
(20, 'Klaim asuransi', 20);

CREATE TABLE `laporan_pekerjaan` (
  `id_laporan_pekerjaan` int(11) NOT NULL,
  `tgl_laporan_pekerjaan` date DEFAULT NULL,
  `kemajuan` float DEFAULT NULL,
  `id_pekerjaan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `laporan_harian` (
  `id_laporan_harian` int(11) NOT NULL,
  `tgl_laporan_harian` date DEFAULT NULL,
  `cuaca` varchar(300) DEFAULT NULL,
  `kendala` varchar(300) DEFAULT NULL,
  `efek` varchar(300) DEFAULT NULL,
  `penyebab` varchar(300) DEFAULT NULL,
  `deteksi` varchar(300) DEFAULT NULL,
  `read_status` boolean DEFAULT 0,
  `id_proyek` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `evaluasi` (
  `id_evaluasi` int(11) NOT NULL,
  `tgl_evaluasi` date DEFAULT NULL,
  `nama_risiko` varchar(100) DEFAULT NULL,
  `nilai_s` int(11) DEFAULT NULL,
  `nama_penyebab` varchar(100) DEFAULT NULL,
  `nilai_o` int(11) DEFAULT NULL,
  `nama_kontrol` varchar(100) DEFAULT NULL,
  `nilai_d` int(11) DEFAULT NULL,
  `rpn` int(11) DEFAULT NULL,
  `kategori` enum('Tinggi','Rendah') DEFAULT NULL,
  `nama_mitigasi` varchar(100) DEFAULT NULL,
  `id_proyek` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Primary and Foreign Key

ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_pengguna`),
  ADD UNIQUE KEY `email` (`email`);

ALTER TABLE `klien`
  ADD PRIMARY KEY (`id_klien`);

ALTER TABLE `proyek`
  ADD PRIMARY KEY (`id_proyek`),
  ADD KEY `id_klien` (`id_klien`);

ALTER TABLE `master_risiko`
  ADD PRIMARY KEY (`id_master_risiko`);

ALTER TABLE `pekerjaan`
  ADD PRIMARY KEY (`id_pekerjaan`),
  ADD KEY `id_proyek` (`id_proyek`);

ALTER TABLE `risiko`
  ADD PRIMARY KEY (`id_risiko`),
  ADD KEY `id_proyek` (`id_proyek`);

ALTER TABLE `efek`
  ADD PRIMARY KEY (`id_efek`),
  ADD KEY `id_risiko` (`id_risiko`);

ALTER TABLE `penyebab`
  ADD PRIMARY KEY (`id_penyebab`),
  ADD KEY `id_risiko` (`id_risiko`);

ALTER TABLE `mitigasi`
  ADD PRIMARY KEY (`id_mitigasi`),
  ADD KEY `id_penyebab` (`id_penyebab`);

ALTER TABLE `laporan_pekerjaan`
  ADD PRIMARY KEY (`id_laporan_pekerjaan`),
  ADD KEY `id_pekerjaan` (`id_pekerjaan`);

ALTER TABLE `laporan_harian`
  ADD PRIMARY KEY (`id_laporan_harian`),
  ADD KEY `id_proyek` (`id_proyek`);

ALTER TABLE `evaluasi`
  ADD PRIMARY KEY (`id_evaluasi`),
  ADD KEY `id_proyek` (`id_proyek`);

-- Auto Increment

ALTER TABLE `pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

ALTER TABLE `klien`
  MODIFY `id_klien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

ALTER TABLE `proyek`
  MODIFY `id_proyek` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

ALTER TABLE `master_risiko`
  MODIFY `id_master_risiko` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

ALTER TABLE `pekerjaan`
  MODIFY `id_pekerjaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

ALTER TABLE `risiko`
  MODIFY `id_risiko` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

ALTER TABLE `efek`
  MODIFY `id_efek` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

ALTER TABLE `penyebab`
  MODIFY `id_penyebab` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

ALTER TABLE `mitigasi`
  MODIFY `id_mitigasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

ALTER TABLE `laporan_pekerjaan`
  MODIFY `id_laporan_pekerjaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

ALTER TABLE `laporan_harian`
  MODIFY `id_laporan_harian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

ALTER TABLE `evaluasi`
  MODIFY `id_evaluasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

-- Constraint for Foreign Key

ALTER TABLE `proyek`
  ADD CONSTRAINT `proyek_ibfk_1` FOREIGN KEY (`id_klien`) REFERENCES `klien` (`id_klien`);

ALTER TABLE `pekerjaan`
  ADD CONSTRAINT `pekerjaan_ibfk_1` FOREIGN KEY (`id_proyek`) REFERENCES `proyek` (`id_proyek`);

ALTER TABLE `risiko`
  ADD CONSTRAINT `risiko_ibfk_1` FOREIGN KEY (`id_proyek`) REFERENCES `proyek` (`id_proyek`);

ALTER TABLE `efek`
  ADD CONSTRAINT `efek_ibfk_1` FOREIGN KEY (`id_risiko`) REFERENCES `risiko` (`id_risiko`);

ALTER TABLE `penyebab`
  ADD CONSTRAINT `penyebab_ibfk_1` FOREIGN KEY (`id_risiko`) REFERENCES `risiko` (`id_risiko`);

ALTER TABLE `mitigasi`
  ADD CONSTRAINT `mitigasi_ibfk_1` FOREIGN KEY (`id_penyebab`) REFERENCES `penyebab` (`id_penyebab`);

ALTER TABLE `laporan_pekerjaan`
  ADD CONSTRAINT `laporan_pekerjaan_ibfk_1` FOREIGN KEY (`id_pekerjaan`) REFERENCES `pekerjaan` (`id_pekerjaan`);

ALTER TABLE `laporan_harian`
  ADD CONSTRAINT `laporan_harian_ibfk_1` FOREIGN KEY (`id_proyek`) REFERENCES `proyek` (`id_proyek`);

ALTER TABLE `evaluasi`
  ADD CONSTRAINT `evaluasi_ibfk_1` FOREIGN KEY (`id_proyek`) REFERENCES `proyek` (`id_proyek`);
