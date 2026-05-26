<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form
    $nama = htmlspecialchars($_POST['nama']);
    $email = htmlspecialchars($_POST['email']);
    $pesan = htmlspecialchars($_POST['pesan']);

    // Ganti dengan email klien Anda
    $email_tujuan = "kaisarendarnur@gmail.com"; 
    
    $subjek = "Pesan Baru dari Website Portofolio: $nama";
    
    $isi_email = "Anda menerima pesan baru dari website.\n\n";
    $isi_email .= "Nama: $nama\n";
    $isi_email .= "Email: $email\n\n";
    $isi_email .= "Pesan:\n$pesan\n";

    // Header untuk email
    $headers = "From: noreply@domainwebsiteklien.com\r\n";
    $headers .= "Reply-To: $email\r\n";

    // Kirim email
    if (mail($email_tujuan, $subjek, $isi_email, $headers)) {
        echo "<script>alert('Pesan berhasil dikirim! Kami akan segera menghubungi Anda.'); window.location.href='index.html';</script>";
    } else {
        echo "<script>alert('Maaf, terjadi kesalahan saat mengirim pesan.'); window.history.back();</script>";
    }
} else {
    echo "Akses ditolak.";
}
?>