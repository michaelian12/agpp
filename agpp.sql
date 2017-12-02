drop database if exists agpp;
create database agpp;
use agpp;

-- Parent Tables

create table pengguna
(
	id_pengguna int primary key unique auto_increment,
	nama_pengguna varchar(100),
	jabatan enum('Admin', 'Manajer Proyek', 'Site Manager'),
	email varchar(50),
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
	id_risiko int primary key unique,
	nama_risiko varchar(100),
	nilai_s int,
	kontrol varchar(100),
	nilai_d int
);

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
	id_efek int primary key unique,
	nama_efek varchar(100),
	id_risiko int,
	foreign key(id_risiko) references risiko(id_risiko)
);

create table penyebab
(
	id_penyebab int primary key unique,
	nama_penyebab varchar(100),
	nilai_o int,
	id_risiko int,
	foreign key(id_risiko) references risiko(id_risiko)
);

create table mitigasi
(
	id_mitigasi int primary key unique,
	nama_mitigasi varchar(100),
	id_risiko int,
	foreign key(id_risiko) references risiko(id_risiko)
);

create table laporan_pekerjaan
(
	id_laporan_pekerjaan int primary key unique,
	tgl_laporan_pekerjaan date,
	kemajuan float,
	id_pekerjaan int,
	foreign key(id_pekerjaan) references pekerjaan(id_pekerjaan)
);

create table laporan_kendala
(
	id_laporan_kendala int primary key unique,
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