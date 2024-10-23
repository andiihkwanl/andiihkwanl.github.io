create database andi;
use andi;
create table katalog (
    id int auto_increment primary key,
    nama_barang varchar (255) not null,
    jumlah_barang int not null,
    harga int not null,
);

ALTER TABLE katalog ADD file VARCHAR(255);
