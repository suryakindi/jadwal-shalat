
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="author" content="Untree.co" />
    <link rel="shortcut icon" href="favicon.png" />

    <meta name="description" content="" />
    <meta name="keywords" content="bootstrap, bootstrap5" />

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@400;500;600;700&display=swap"
      rel="stylesheet"
    />

    <link rel="stylesheet" href="fonts/icomoon/style.css" />
    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css" />

    <link rel="stylesheet" href="css/tiny-slider.css" />
    <link rel="stylesheet" href="css/aos.css" />
    <link rel="stylesheet" href="css/style.css" />

    <title>
      Jadwal Shalat
    </title>
  </head>
  <body>
    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close">
          <span class="icofont-close js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>

    <nav class="site-nav">
      <div class="container">
        <div class="menu-bg-wrap">
          <div class="site-navigation">
            <a href="/" class="logo m-0 float-start">Jadwal Shalat & Imsak</a>

            <ul
              class="js-clone-nav d-none d-lg-inline-block text-start site-menu float-end"
            >
              <li class="active"><a href="/">Home</a></li>
              <li><a href="#about">About</a></li>
             
            </ul>

            <a
              href="#"
              class="burger light me-auto float-end mt-1 site-menu-toggle js-menu-toggle d-inline-block d-lg-none"
              data-toggle="collapse"
              data-target="#main-navbar"
            >
              <span></span>
            </a>
          </div>
        </div>
      </div>
    </nav>

    <div class="hero">
      <div class="hero-slide">
        <div
          class="img overlay"
          style="background-image: url('https://t3.ftcdn.net/jpg/04/89/37/24/360_F_489372447_5niHtl1GUPhOsDDcAxBAQ3xTFkQnNix1.jpg')"
        ></div>
      </div>

      <div class="container">
        <div class="row justify-content-center align-items-center">
          <div class="col-lg-9 text-center">
              @isset($namakotasekarang)
        <h1 class="heading" data-aos="fade-up">
            {{$namakotasekarang}}-{{date('D-M-Y, H:i')}}
            </h1>  
            @endisset
           
            <h1 class="heading" data-aos="fade-up">
              Masukkan Nama Kota & Tanggal
            </h1>
            <form
              action=""
              class="narrow-w form-search d-flex align-items-stretch mb-3"
              data-aos="fade-up"
              data-aos-delay="200"
              method="POST"
            >
            @csrf
            <input
            type="text"
            name="namakota"
            class="form-control px-4"
            placeholder="Kota"
            required
            />
              <input
              type="date"
              name="tanggal"
              required
            />
              <button type="submit" class="btn btn-primary">Search</button>
            </form>
            @isset($namakota)
            <h5 style="color: white">Jadwal Shalat & Imsak Di Kota : {{$namakota}}</h5>   
            @endisset
            <hr>
            @isset($jadwal)
            <div class="table-responsive scrollbar">
            <table class="table table-striped table-dark table-responsive">
              <thead>
                <tr>
                  <th scope="col">Imsak</th>
                  <th scope="col">Subuh</th>
                  <th scope="col">Dhuha</th>
                  <th scope="col">Dzuhur</th>
                  <th scope="col">Ashar</th>
                  <th scope="col">Maghrib</th>
                  <th scope="col">Isya</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>{{$jadwal['imsak']}}</td>
                  <td>{{$jadwal['subuh']}}</td>
                  <td>{{$jadwal['dhuha']}}</td>
                  <td>{{$jadwal['dzuhur']}}</td>
                  <td>{{$jadwal['ashar']}}</td>
                  <td>{{$jadwal['maghrib']}}</td>
                  <td>{{$jadwal['isya']}}</td>
                </tr>
              </tbody>
            </table>
            </div>
            @endisset 
              @isset($jadwalkotasekarang)
        <div class="table-responsive scrollbar">
              <table class="table table-striped table-dark table-responsive">
                <thead>
                  <tr>
                    <th scope="col">Imsak</th>
                    <th scope="col">Subuh</th>
                    <th scope="col">Dhuha</th>
                    <th scope="col">Dzuhur</th>
                    <th scope="col">Ashar</th>
                    <th scope="col">Maghrib</th>
                    <th scope="col">Isya</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>{{$jadwalkotasekarang['imsak']}}</td>
                    <td>{{$jadwalkotasekarang['subuh']}}</td>
                    <td>{{$jadwalkotasekarang['dhuha']}}</td>
                    <td>{{$jadwalkotasekarang['dzuhur']}}</td>
                    <td>{{$jadwalkotasekarang['ashar']}}</td>
                    <td>{{$jadwalkotasekarang['maghrib']}}</td>
                    <td>{{$jadwalkotasekarang['isya']}}</td> 
                  </tr>
                </tbody>
              </table>
              </div>
            @endisset
            
        </div>
        </div>
      </div>
    </div>
    <section id="about">
      <div class="container">
        <div class="row">
          <div class="col-6 col-lg-3" data-aos="fade-up" data-aos-delay="300">
            <div class="box-feature">
              <h3 class="mb-3">Backend & Frontend</h3>
              <p>
                PHP Framework Laravel 9 & Bootstrap 5
              </p>
            </div>
          </div>
          <div class="col-6 col-lg-6" data-aos="fade-up" data-aos-delay="300">
            <div class="box-feature">
              <h3 class="mb-3">API</h3>
              <p>
                <a href="https://fathimah.docs.apiary.io/#introduction/dokumentasi">https://fathimah.docs.apiary.io/#introduction/dokumentasi</a>
              </p>
            </div>
          </div>
          <div class="col-6 col-lg-3" data-aos="fade-up" data-aos-delay="300">
            <div class="box-feature">
              <h3 class="mb-3">DEVELOPER</h3>
              <p>
                <a href="https://suryakindi.vercel.app/">Surya Kindi Bayhaqi</a>
              </p>
            </div>
          </div>
          
          
        </div>
      </div>
    </section>

    <div class="site-footer">
      <div class="container">
        <div class="row mt-5">
          <div class="col-12 text-center">
            <!-- 
              **==========
              NOTE: 
              Please don't remove this copyright link unless you buy the license here https://untree.co/license/  
              **==========
            -->

            <p>
              Copyright &copy;
              <script>
                document.write(new Date().getFullYear());
              </script>
              Designed with Love By Surya Kindi Bayhaqi
              
              
            </p>
            
          </div>
        </div>
      </div>
      <!-- /.container -->
    </div>
    <!-- /.site-footer -->

    <!-- Preloader -->
    <div id="overlayer"></div>
    <div class="loader">
      <div class="spinner-border" role="status">
        <span class="visually-hidden">Loading...</span>
      </div>
    </div>

    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/tiny-slider.js"></script>
    <script src="js/aos.js"></script>
    <script src="js/navbar.js"></script>
    <script src="js/counter.js"></script>
    <script src="js/custom.js"></script>
  </body>
</html>
