<?php
$servername = "localhost";
$username   = "root";
$password   = "";
$dbname     = "acara9_pgweb";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM sekolah";
$result = $conn->query($sql);

echo "<a href='input/index.html'>Input</a><br><br>";

if ($result && $result->num_rows > 0) {
    echo "<table border='1' cellpadding='8' cellspacing='0'>";
    echo "<tr>
            <th>ID</th>
            <th>Nama Sekolah</th>
            <th>NPSN</th>
            <th>Bentuk Pen</th>
            <th>Status</th>
            <th>Alamat</th>
            <th>Kelurahan</th>
            <th>Kecamatan</th>
            <th>Latitude</th>
            <th>Longitude</th>
            <th colspan='2'>Aksi</th>
            </tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["nama_sekolah"] . "</td>";
        echo "<td>" . $row["npsn"] . "</td>";
        echo "<td>" . $row["bentuk_pen"] . "</td>";
        echo "<td>" . $row["status"] . "</td>";
        echo "<td>" . $row["alamat"] . "</td>";
        echo "<td>" . $row["kelurahan"] . "</td>";
        echo "<td>" . $row["kecamatan"] . "</td>";
        echo "<td>" . $row["latitude"] . "</td>";
        echo "<td>" . $row["longitude"] . "</td>";
        echo "<td><a href='delete.php?id=" . $row["id"] . "' onclick='return confirm(\"Yakin hapus data?\");'>hapus</a></td>";
        echo "<td><a href='edit/edit.php?id=" . $row["id"] . "'>edit</a></td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

$conn->close();
?>