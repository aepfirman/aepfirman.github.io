<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $status = htmlspecialchars($_POST['status']);
    $minat = htmlspecialchars($_POST['minat']);
    $message = htmlspecialchars($_POST['message']);

    // Format status dan minat
    $status_text = $status == '1' ? 'Siswa' : 'Orang Tua';
    $minat_text = $minat == '1' ? 'Minat Mendaftar' : 'Hanya Bertanya';

    // Alamat email tujuan
    $to = "ppdb@smpalmuttaqin.sch.id";

    // Subjek email
    $subject = "Pesan Baru dari Formulir Kontak";

    // Isi pesan email
    $body = "Nama: $name\n";
    $body .= "Email: $email\n";
    $body .= "Telepon: $phone\n";
    $body .= "Status: $status_text\n";
    $body .= "Minat: $minat_text\n\n";
    $body .= "Pesan:\n$message";

    // Header email
    $headers = "From: $email";

    // Coba kirim email
    if (mail($to, $subject, $body, $headers)) {
        // Redirect ke halaman mail-success.html setelah pesan dikirim
        header("Location: mail-success.html");
        exit();
    } else {
        // Redirect ke halaman 404.html jika terjadi kesalahan
        header("Location: 404.html");
        exit();
    }
} else {
    // Redirect ke halaman 404.html jika akses tidak melalui POST
    header("Location: 404.html");
    exit();
}
?>
