drop database if exists agpp;
create database agpp;
use agpp;

-- Parent Tables

create table pengguna
(
	id_pengguna int primary key unique auto_increment,
	nama_pengguna varchar(100),
	jabatan enum('Direktur', 'Manajer Proyek', 'Site Manager'),
	email varchar(50),
	kata_sandi varchar(50),
	status enum('Aktif', 'Nonaktif')
);

create table proyek
(
	id_proyek int primary key unique auto_increment,
	no_spp varchar(50),
	nama_proyek varchar(100),
	nama_klien varchar(100),
	nilai_kontrak int,
	tgl_mulai date,
	tgl_selesai date
);

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
	id_pekerjaan int primary key unique,
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

create table laporan_risiko
(
	id_laporan_risiko int primary key unique,
	nama_risiko varchar(300),
	nama_efek varchar(300),
	nama_penyebab varchar(300),
	tgl_laporan_risiko date,
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