<?php
$conn = mysqli_connect('localhost', 'root', '', 'uas_1904030090');

//pemanggilan tabel
function query($query)
{
  global $conn;

  //mengambil seluruh data pada tabel
  $result = mysqli_query($conn, $query);

  if (mysqli_num_rows($result) == 1) {
    return mysqli_fetch_assoc($result);
  }

  //pemanggilan elemen data dengan rapi
  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }
  return $rows;
}

function tambah($data)
{
  global $conn;

  $nama = htmlspecialchars($data['nama']);
  $alamat = htmlspecialchars($data['alamat']);
  $jenis_kelamin = htmlspecialchars($data['jenis_kelamin']);
  $agama = htmlspecialchars($data['agama']);
  $foto = htmlspecialchars($data['foto']);

  $query = "INSERT INTO calon_mhs 
  VALUES
  (null,'$nama','$alamat','$jenis_kelamin','$agama','$foto');";
  mysqli_query($conn, $query);

  echo mysqli_error($conn);
  return mysqli_affected_rows($conn);
}

function hapus($id_anggota)
{
  global $conn;
  mysqli_query($conn, "DELETE FROM tabel_anggota WHERE id_anggota=$id_anggota") or die(mysqli_error($conn));
  return mysqli_affected_rows($conn);
}

function hapusbuku($id)
{
  global $conn;
  mysqli_query($conn, "DELETE FROM tabel_buku WHERE id=$id") or die(mysqli_error($conn));
  return mysqli_affected_rows($conn);
}


function edit($data)
{
  global $conn;

  $id_anggota = $data['id_anggota'];
  $nama = htmlspecialchars($data['nama']);
  $alamat = htmlspecialchars($data['alamat']);
  $jenis_kelamin = htmlspecialchars($data['jenis_kelamin']);
  $agama = htmlspecialchars($data['agama']);
  $foto = htmlspecialchars($data['foto']);

  $query = "UPDATE tabel_anggota SET
  nama ='$nama',
  alamat ='$alamat',
  jenis_kelamin ='$jenis_kelamin',
  agama ='$agama',
  foto ='$foto'
  WHERE id_anggota = $id_anggota;";

  mysqli_query($conn, $query);

  echo mysqli_error($conn);
  return mysqli_affected_rows($conn);
}

function editbuku($data)
{
  global $conn;

  $id = $data['id'];
  $nama_buku = htmlspecialchars($data['nama_buku']);
  $penulis = htmlspecialchars($data['penulis']);
  $penerbit = htmlspecialchars($data['penerbit']);
  $foto_buku = htmlspecialchars($data['foto_buku']);
  $tahun = htmlspecialchars($data['tahun']);

  $query = "UPDATE tabel_buku SET
  nama_buku ='$nama_buku',
  penulis ='$penulis',
  penerbit ='$penerbit',
  foto_buku ='$foto_buku',
  tahun ='$tahun'
  WHERE id = $id;";

  mysqli_query($conn, $query);

  echo mysqli_error($conn);
  return mysqli_affected_rows($conn);
}
function cari($keyword)
{
  global $conn;

  $query = "SELECT * FROM tabel_anggota WHERE nama LIKE'%$keyword%'";
  $result = mysqli_query($conn, $query);

  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }
  return $rows;
}

function caridosen($keyword)
{
  global $conn;

  $query = "SELECT * FROM tabel_buku WHERE nama LIKE'%$keyword%'";
  $result = mysqli_query($conn, $query);

  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }
  return $rows;
}
