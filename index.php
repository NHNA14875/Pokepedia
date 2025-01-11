<?php
include "koneksi.php";
?>

<!doctype html>
<html lang="en" id="htmlPage">
    <head>
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Pokepedia</title>
        <link rel="icon" href="img/l2.png"/>
        <link 
          rel="stylesheet" 
          href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
        />
        <link 
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" 
            rel="stylesheet" 
            integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" 
            crossorigin="anonymous"
        />
        <!--css start-->
        <style>
          html {
              scroll-behavior: smooth;
          }

          .navbar .nav-link {
              color: black !important;
          }

          .icon-dark-mode {
              color: #000;
              transition: color 0.3s;
          }

          [data-bs-theme="dark"] .icon-dark-mode {
              color: #ffffff;
          }

          [data-bs-theme="dark"] .navbar,
          [data-bs-theme="dark"] .navbar-brand {
              background-color: #ffffff !important;
              color: #000000 !important;
          }

          [data-bs-theme="dark"] #hero {
              background-color: #6c757d !important;
              color: #ffffff !important;
          }

          [data-bs-theme="dark"] #article,
          [data-bs-theme="dark"] footer {
              background-color: #343a40 !important;
              color: #ffffff !important;
          }

          [data-bs-theme="dark"] #gallery,
          [data-bs-theme="dark"] #about-me {
              background-color: #6c757d !important;
              color: #ffffff !important;
          }

          .checkbox {
              opacity: 0;
              position: absolute;
              display: none !important;
          }

          .checkbox-label {
              background-color: #111;
              width: 50px;
              height: 26px;
              border-radius: 50px;
              position: relative;
              padding: 5px;
              display: flex;
              justify-content: space-between;
              align-items: center;
              margin-top: 10px;
          }

          .bi-moon {
              color: whitesmoke;
          }

          .bi-brightness-high {
              color: rgb(255, 75, 75);
          }

          .checkbox-label .ball {
              background-color: #fff;
              width: 22px;
              height: 22px;
              position: absolute;
              left: 2px;
              top: 2px;
              border-radius: 50%;
              transition: transform 0.2s linear;
          }

          .checkbox:checked + .checkbox-label .ball {
              transform: translateX(24px);
          }

          .navbar-toggler-icon {
              background-image: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'%3E%3Cpath stroke='black' stroke-linecap='round' stroke-miterlimit='10' stroke-width='1.5' d='M2 4.75h12M2 8h12M2 11.25h12'/%3E%3C/svg%3E");
          }

          .navbar-toggler {
              border-color: black;
          }

          .navbar-toggler:focus,
          .navbar-toggler:hover {
              background-color: rgba(0, 0, 0, 0.1);
          }

          .custom-link {
              color: black; 
              text-decoration: none; 
          }

          .custom-link:hover {
              color: black; 
              text-decoration: none;
          }

          [data-bs-theme="dark"] .custom-link {
              color: white;
          }

          [data-bs-theme="dark"] .custom-link:hover {
              color: white; 
          }


          .profile-image {
              border-radius: 50%;
              width: 250px;
              height: 250px;
              object-fit: cover;
          }

          /* quary */
          @media screen and (min-width: 1024px) {
              main {
                  display: flex;
                  justify-content: space-between;
              }
              .article, .gallery {
                  padding: 20px;
              }
          }

          @media screen and (min-width: 768px) and (max-width: 1023px) {
              nav {
                  flex-direction: column;
                  align-items: center;
              }
              main {
                  flex-direction: column;
              }
              .article {
                  margin-bottom: 20px;
              }
          }

          @media screen and (max-width: 767px) {
              nav {
                  flex-direction: column;
                  gap: 10px;
                  text-align: center;
              }
              nav a {
                  width: 100%;
              }
              main {
                  flex-direction: column;
              }
              .article, .gallery {
                  padding: 15px;
              }
          }
        </style>
        <!--css end-->
    </head>
    <body>
        <!--nav begin-->
        <nav class="navbar navbar-expand-lg bg-body-tertiary sticky-top">
            <div class="container">
              <a class="navbar-brand" href="#">
                <img src="img/l2.png" alt="Logo" width="30" height="30" class="d-inline-block align-text-top me-2">
                Pokepedia
              </a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 text-dark">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#article">Article</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#gallery">Gallery</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#schedule">Schedule</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#about-me">About Me</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="login.php" target="_blank">Login</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="logout.php" target="_blank">Logout</a>
                    </li>
                    <!-- bagian switch dark mode -->
                    <li class="nav-item">
                        <input type="checkbox" class="checkbox" id="checkbox">
                        <label for="checkbox" class="checkbox-label">
                            <i class="bi bi-moon"></i>
                            <i class="bi bi-brightness-high"></i>
                            <span class="ball"></span>
                        </label>
                    </li>
                </ul>
            </div>
            
              </div>
            </div>
          </nav>
        <!--nav end-->
        <!--hero begin-->
        <section id="hero" class="text-center p-5 bg-danger-subtle text-sm-start">
          <div class="container">
            <div class="d-sm-flex flex-sm-row-reverse align-items-center">
              <img src="img/banner.jpg" class="img-fluid" width="300">
              <div>
                <h1 class="fw-bold display-4">Gotta Catch em All!</h1>
                <h4 class="lead display-6">Cari semua data pokemon yang anda inginkan &ensp;&ensp;&ensp;</h4>
                <h6>
                  <span id="tanggal"></span>
                  <span id="jam"></span>
                </h6>
              </div>
            </div>
          </div>
        </section>
        <!--hero end-->
        <!-- article begin -->
        <section id="article" class="text-center p-5">
          <div class="container">
            <h1 class="fw-bold display-4 pb-3">article</h1>
            <div class="row row-cols-1 row-cols-md-3 g-4 justify-content-center">
              <?php
              $sql = "SELECT * FROM article ORDER BY tanggal DESC";
              $hasil = $conn->query($sql); 

              while($row = $hasil->fetch_assoc()){
              ?>
                <div class="col">
                  <div class="card h-100">
                    <img src="img/<?= $row["gambar"]?>" class="card-img-top" alt="..." />
                    <div class="card-body">
                      <h5 class="card-title"><?= $row["judul"]?></h5>
                      <p class="card-text">
                        <?= $row["isi"]?>
                      </p>
                    </div>
                    <div class="card-footer">
                      <small class="text-body-secondary">
                        <?= $row["tanggal"]?>
                      </small>
                    </div>
                  </div>
                </div>
              <?php
              }
              ?> 
            </div>
          </div>
        </section>
        <!-- article end -->
        <!--gallery begin-->
        <section id="gallery" class="text-center p-5 bg-danger-subtle">
            <div class="container">
                <h1 class="fw-bold display-4 pb-3" id="gallery">Gallery</h1>
                <div id="carouselExample" class="carousel slide">
                    <div class="carousel-inner">
                        <?php
                        // Ambil data gambar dari database
                        $sql = "SELECT * FROM gallery ORDER BY tanggal DESC"; 
                        $hasil = $conn->query($sql); 

                        // Cek apakah ada gambar
                        $isActive = true; // Untuk menandai item pertama sebagai 'active'
                        while($row = $hasil->fetch_assoc()){
                            // Mendapatkan nama gambar dari kolom 'gambar'
                            $imageSrc = "img/" . $row['gambar']; // Asumsi gambar disimpan di folder 'img/'

                            // Menampilkan gambar di carousel
                            if ($isActive) {
                                // Set item pertama sebagai active
                                echo '<div class="carousel-item active">';
                                $isActive = false;
                            } else {
                                echo '<div class="carousel-item">';
                            }
                            echo '<img src="' . $imageSrc . '" class="d-block w-100" alt="gallery image">';
                            echo '</div>';
                        }
                        ?>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </section>

        <!--gallery end-->
        <!--schedule start-->
        <section id="schedule" class="text-center p-5">
          <h2 class="fw-bold display-4 pb-3">Schedule</h2>
          <div class="container">
            <div class="row">
              <!-- Senin -->
              <div class="col-md-3 mb-3">
                <div class="card h-100">
                  <div class="card-header bg-danger text-white text-center">
                    Senin
                  </div>
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item">FREE</li>
                  </ul>
                </div>
              </div>
              <!-- Selasa -->
              <div class="col-md-3 mb-3">
                <div class="card h-100">
                  <div class="card-header bg-danger text-white text-center">
                    Selasa
                  </div>
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                      Basis Data <br>
                      12:30-14:10 | D.3.M
                    </li>
                    <li class="list-group-item">
                      Probabilitas dan Statistik <br>
                      07:00-09:30 | H.3.8
                    </li>
                    <li class="list-group-item">
                      Pendidikan Kewarganegaraan <br>
                      18:30-20:10 | Aula E.3.1
                    </li>
                  </ul>
                </div>
              </div>
              <!-- Rabu -->
              <div class="col-md-3 mb-3">
                <div class="card h-100">
                  <div class="card-header bg-danger text-white text-center">
                    Rabu
                  </div>
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                      Rekayasa Perangkat Lunak <br>
                      07:00-09:30 | H.4.5
                    </li>
                    <li class="list-group-item">
                      Sistem Informasi <br>
                      09:30-12:00 | H.5.13
                    </li>
                  </ul>
                </div>
              </div>
              <!-- Kamis -->
              <div class="col-md-3 mb-3">
                <div class="card h-100">
                  <div class="card-header bg-danger text-white text-center">
                    Kamis
                  </div>
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                      Basis Data <br>
                      07:30-08:40 | H.5.1
                    </li>
                    <li class="list-group-item">
                      Pemrograman Berbasis Web <br>
                      08:40-10:20 | D.2.J
                    </li>
                  </ul>
                </div>
              </div>
              <!-- Jumat -->
              <div class="col-md-3 mb-3">
                <div class="card h-100">
                  <div class="card-header bg-danger text-white text-center">
                    Jumat
                  </div>
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                      Sistem Operasi <br>
                      07:00-09:30 | D2.3K
                    </li>
                    <li class="list-group-item">
                      Logika Informatika <br>
                      09:30-12:00 | H.4.10
                    </li>
                  </ul>
                </div>
              </div>
              <!-- Sabtu -->
              <div class="col-md-3 mb-3">
                <div class="card h-100">
                  <div class="card-header bg-danger text-white text-center">
                    Sabtu
                  </div>
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item">FREE</li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </section>
        <!--schdule end-->
        <!--about-me start-->
        <section id="about-me" class="text-center p-5 bg-danger-subtle d-flex justify-content-center align-items-center">
          <div class="container">
            <div class="d-flex flex-column flex-sm-row align-items-center justify-content-center">
              <img src="https://media.licdn.com/dms/image/v2/D4E03AQH3cLbYEivRkg/profile-displayphoto-shrink_400_400/profile-displayphoto-shrink_400_400/0/1695111149688?e=1741824000&v=beta&t=4KiQRk1v5NeryIXiYn2_KoPpEkJrV-9aXvzsV40pfjM" class="img-fluid rounded-circle profile-image mb-4 mb-sm-0" width="250" alt="Profile Image">
              <div class="text-center text-sm-start ms-sm-4">
                <h6 class="text-muted">A11.2023.14875</h6>
                <h1 class="fw-bold">Naufal Hanif Noorvietriya Achmadi</h1>
                <h6 class="text-muted">Program Studi Teknik Informatika</h6>
                <a href="https://dinus.ac.id/" class="custom-link">
                  <h6 class="fw-bold">Universitas Dian Nuswantoro</h6>
              </a>              
              </div>
            </div>
          </div>
        </section>
        <!--about-me end-->
        <!--footer begin-->
        <footer class="text-center p-5">
            <a href="https://www.instagram.com/nhanifna"><i class="bi bi-instagram h2 p-2 icon-dark-mode"></i></a>
            <a href="https://x.com/hanif_nauf23939"><i class="bi bi-twitter-x h2 p-2 icon-dark-mode"></i></a>
            <a href="https://wa.me/+6285210742500"><i class="bi bi-whatsapp h2 p-2 icon-dark-mode"></i></a>
            <br><br>
            <div>
                Naufal Hanif Noorvetriya Achmadi &copy; 2024
            </div>
        </footer>
        <!--footer end-->
        <!--javascript start-->
        <script 
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" 
            crossorigin="anonymous"
        ></script>
        <script type="text/javascript">
          window.setTimeout("tampilWaktu()", 1000);

          function tampilWaktu() {
            var waktu = new Date();
            var bulan = waktu.getMonth() + 1;

            setTimeout("tampilWaktu()", 1000);
            document.getElementById("tanggal").innerHTML = waktu.getDate() + "/" + bulan + "/" + waktu.getFullYear();
            document.getElementById("jam").innerHTML = waktu.getHours() + ":" + waktu.getMinutes() + ":" + waktu.getSeconds();
          }
        </script>
        <script>
          const html = document.getElementById("htmlPage");
          const checkbox = document.getElementById("checkbox")
          checkbox.addEventListener("change", () => {
            if (checkbox.checked) {
              html.setAttribute("data-bs-theme", "dark");
            } else {
              html.setAttribute("data-bs-theme", "light");
            }
          });
        </script>
        <!--javascript end-->
    </body>
</html>
