<?php
// File footer.php
?>

<style>
    .footer {
    background-color: #FB9EC6; /* Warna latar belakang footer */
    color: #fff; /* Warna teks */
    padding: 2rem 0; /* Padding atas dan bawah */
    font-family: Arial, sans-serif;
}

.footer .container {
    max-width: 1200px;
    margin: auto;
}

.footer h5 {
    font-size: 18px;
    margin-bottom: 1rem;
    font-weight: bold;
}

.footer p {
    font-size: 14px;
    line-height: 1.6;
}

.footer a {
    color: fff#;
    text-decoration: none;
}

.footer a:hover {
    text-decoration: underline;
}

.footer ul {
    padding: 0;
    list-style: none;
}

.footer ul li {
    margin-bottom: 0.5rem;
}

.footer .text-center {
    text-align: center;
    color: #eb478c;
}

.text-pink{
    color: #eb478c;
}

.footer .row {
    display: flex;
    justify-content: space-between;
    flex-wrap: wrap;
    gap: 1rem;
}

.footer .col-md-4 {
    flex: 1 1 calc(33.33% - 1rem);
    min-width: 250px; /* Minimum lebar kolom */
}

.footer small {
    display: block;
    margin-top: 1rem;
    color: #eee;
}

/* Jika Anda ingin footer tetap di bawah layar */
.footer.fixed-bottom {
    position: fixed;
    bottom: 0;
    width: 100%;
    z-index: 10; /* Menjamin footer berada di atas elemen lain */
}

/* Responsive untuk layar kecil */
@media (max-width: 768px) {
    .footer .row {
        flex-direction: column;
        text-align: center;
    }

    .footer .col-md-4 {
        flex: 1 1 100%;
    }
}

</style>

<footer class="footer ">
    <div class="container">
        <div class="row">
            <!-- Kolom 1 -->
            <div class="col-md-4 text-center">
                <h5>The Sale Store</h5>
                <p>Daftarkan dirimu untuk mendapatkan informasi terbaru tentang produk kami!</p>
                <a href="register.php" class="text-pink">Klik Disini</a>
            </div>
            <!-- Kolom 2 -->
            <div class="col-md-4 text-center">
                <h5>Informasi dan Bantuan</h5>
                <ul class="list-unstyled">
                    <li><a href="contact.php" class="text-pink">Tentang Kami</a></li>
                </ul>
            </div>
            <!-- Kolom 3 -->
            <div class="col-md-4 text-center">
                <h5>Lokasi</h5>
                <p>Jl. Cemara Raya, Banjarmasin, Kalimantan Selatan</p>
            </div>
        </div>
        <div class="text-center mt-3">
            <small class="text-pink">&copy; <?php echo date("Y"); ?> Suitestyle</small>
        </div>
    </div>
</footer>
