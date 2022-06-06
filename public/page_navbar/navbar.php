  <!--::header part start::-->
  <header class="main_menu home_menu">
      <div class="container">
          <div class="row align-items-center">
              <div class="col-lg-12">
                  <nav class="navbar navbar-expand-lg navbar-light pb-3">
                      <a class="navbar-brand" href="index.html"> <img src="<?= base_url() ?>/img/taibatravel.png" alt="logo"> </a>
                      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                          <span class="menu_icon"><i class="fas fa-bars"></i></span>
                      </button>

                      <div class="collapse navbar-collapse main-menu-item" id="navbarSupportedContent">
                          <ul class="navbar-nav">
                              <li class="nav-item">
                                  <a class="nav-link" href="#">Home</a>
                              </li>
                              <li class="nav-item dropdown">
                                  <a class="nav-link dropdown-toggle" href="blog.html" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                      Our Tour
                                  </a>
                                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                      <a class="dropdown-item" href="#international_section"> International Tour</a>
                                      <a class="dropdown-item" href="#domestic_section">Domestic Tour</a>
                                  </div>
                              </li>
                              <li class="nav-item">
                                  <a class="nav-link" href="#promo">Promo</a>
                              </li>
                              <li class="nav-item">
                                  <a class="nav-link" href="#">Virtual Tour</a>
                              </li>
                              <li class="nav-item">
                                  <a class="nav-link" href="#about_us">About Us</a>
                              </li>
                          </ul>
                      </div>
                      <a class="btn_1 d-none d-lg-block" href="<?= base_url('login') ?>">Sign In</a>
                  </nav>
              </div>
          </div>
      </div>
  </header>
  <!-- Header part end-->