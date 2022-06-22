<?php
$setting = $this->db->query("select * from pengaturan where id='1'")->row();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Teras Meeting Room</title>
        <link rel="stylesheet" href="<?=base_url("assets/front/")?>css/bootstrap.min.css">
        <link rel="stylesheet" href="<?=base_url("assets/front/")?>css/fontawesome.min.css">
        <link rel="stylesheet" href="<?=base_url("assets/front/")?>css/style.css">
        <link href="https://fonts.googleapis.com/css?family=Lobster|Lobster+Two|Noto+Serif" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    </head>
    <body>
        
        <nav class="navbar navbar-expand-lg navbar-light bg-light text-capitalize main-font-family">
            <div class="container">
                <a class="navbar-brand" href="<?=base_url()?>"><img src="<?=base_url("assets/front/")?>imgs/logo2.png" alt="#" /></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#show-menu" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="show-menu">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="#home">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#room">rooms</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#gallery">gallery</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#testimoni">testimoni</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#register">Register</a>
                        </li>
                        <li class="nav-item book d-flex align-items-center">
                            <a class="nav-link" href="#book">Book Now</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        
        <header id="home">
            <div class="small-container">
                <div class="row">
                    <div class="col-lg-4 col-12 lobster-font-family d-flex align-items-center">
                        <h2><?=$setting->text_header_small?></h2>
                        <button><a href="#">About hotel</a></button>
                    </div>
                </div>
                <div class="h-slider roboto-font-family welcome d-flex align-items-center justify-content-center">
                    <h1 class="text-capitalize">Welcome to <br><span><?=$setting->text_header?></span></h1>
                    <div id="headerslider" class="carousel slide" data-ride="carousel">
                      <div class="carousel-inner">
                        <div class="carousel-item carousel-three active"></div>
                        <div class="carousel-item carousel-two"></div>
                        <div class="carousel-item carousel-one"></div>
                      </div>
                      <a class="carousel-control-prev" href="#headerslider" role="button" data-slide="prev">
                        <i class="fas fa-angle-double-left"></i>
                        <span class="sr-only">Previous</span>
                      </a>
                      <a class="carousel-control-next" href="#headerslider" role="button" data-slide="next">
                        <i class="fas fa-angle-double-right"></i>
                        <span class="sr-only">Next</span>
                      </a>
                    </div>
                </div>
            </div>
            <div class="st-rec"></div>
            <div class="rd-rec"></div>
        </header>
        
        <div class="about lobster-font-family">
            <div class="container">
                <h2 class="text-center text-capitalize">About our hotel</h2>
                <img src="<?=base_url("assets/front/")?>imgs/shape.png">
                <div class="row">
                    <div class="col-lg-6 col-12">
                        <?=$setting->deskripsi_hotel?>
                        <button><a href="#">Read more</a></button>
                    </div>
                    <div class="col-lg-6 col-12">
                        <div class="img"></div>
                    </div>
                </div>
                <h2 class="text-capitalize" id="room">Meeting Rooms</h2>
                <div class="row">
                    <div class="col-lg-4 col-12">
                        <div class="img"></div>
                    </div>
                    <div class="col-lg-8 col-12">
                        <div class="block">
                            <div>
                                <img src="<?=base_url("assets/front/")?>imgs/shape.png">
                                 <?=$setting->deskripsi_ruang_meeting?>
                                <button><a href="#" class="text-capitalize">Read more</a></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="gallery lobster-font-family" id="gallery">
            <div class="container">
                <h2 class="text-calitalize text-center">Our gallery</h2>
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="pic-one"><h4>Relaxed swimming</h4></div>
                        <div class="pic-two"><h4>Spacious Accommodtion</h4></div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="pic-three active"><h4>Yoga Wellness</h4></div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="pic-four"><h4>Romantic dinner</h4></div>
                        <div class="pic-five"><h4>Apa & Wellness</h4></div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="slider main-font-family" id="testimoni">
            <h2 class="text-center text-capitalize main-font-family">what our clients say</h2>
          <div id="slideToNext" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#slideToNext" data-slide-to="0" class="active"></li>
              <li data-target="#slideToNext" data-slide-to="1"></li>
              <li data-target="#slideToNext" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <div class="carousel-caption d-block">
                    <img src="<?=base_url("assets/front/")?>imgs/pic7.jpg">
                  <h5>jone due</h5>
                  <p>It is a long established fact that a reader wil
l be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters,</p>
                </div>
              </div>
              <div class="carousel-item">
                <div class="carousel-caption d-block">
                    <img src="<?=base_url("assets/front/")?>imgs/pic7.jpg">
                  <h5>jone due</h5>
                  <p>It is a long established fact that a reader wil
l be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters,</p>
                </div>
              </div>
              <div class="carousel-item">
                <div class="carousel-caption d-block">
                    <img src="<?=base_url("assets/front/")?>imgs/pic7.jpg">
                  <h5>jone due</h5>
                  <p>It is a long established fact that a reader wil
l be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters,</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        
        <div class="contact main-font-family text-center">
            <div class="container">
                <h2 id="register">Get in touch</h2>
                <div class="row">
                    <div class="col-6">
                        <div class="contact-form">
                            <form method="POST" action="<?=base_url("home/register")?>">
                                <input type="text" name="full_name" placeholder="Name">
                                <input type="email" name="email" placeholder="Email">
                                <input type="text" name="phone" placeholder="Phone" maxlength="12">
                                <input type="password" name="password" placeholder="Password">
                                <input type="submit" value="submit">
                            </form>
                        </div>
                    </div>
                    <div class="col-6">
                        <h2 class="text-right">Book Your Holiday Best for relaxed retreats and cultural encounters</h2>
                        <img src="<?=base_url("assets/front/")?>imgs/shape.png">
                    </div>
                </div>
            </div>
            <div></div>
        </div>
        
        <footer class="noto-font-family">
            <div class="overlay">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4 col-md-6 col-12">
                            <h3>Useful links</h3>
                            <ul class="text-capitalize">
                                <li><a href="#">Home</a></li>
                                <li><a href="#rooms">Rooms</a></li>
                                <li><a href="#gallery">Gallery</a></li>
                                <li><a href="#testimoni">Testimoni</a></li>
                                <li><a href="#register">Register</a></li>
                            </ul>
                        </div>
                        <div class="col-lg-4 col-md-6 col-12">
                            <h3>Find us</h3>
                            <p><?=$setting->alamat?><br>
                                <?=$setting->no_telp?><br>
                                <?=$setting->fax?><br>
                                <?=$setting->email?>
                            </p>
                        </div>
                        <div class="col-lg-4 col-md-6 col-12 form">
                            <h3>Social Media</h3>
                            <ul>
                                <li><a href="<?=$setting->facebook?>"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="<?=$setting->twitter?>"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="<?=$setting->instagram?>"><i class="fab fa-instagram"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        
        <div class="copyright noto-font-family">
            <p>© <?=date("Y")?> All Rights Reserved. Teras Meeting Room</p>
        </div>
        
        <script src="<?=base_url("assets/front/")?>js/jquery-3.3.1.min.js"></script>
        <script src="<?=base_url("assets/front/")?>js/bootstrap.min.js"></script>
        <script>
            $(function () {
                
                'use strict';
                
                var winH = $(window).height();
                
                $('header').height(winH);
                
                $('.navbar ul.navbar-nav li a').on('click', function (e) {
                    
                    var getAttr = $(this).attr('href');
                    console.log(getAttr);
                    if(getAttr == '#book'){
                    	window.location.href = '<?=base_url('auth')?>';
                    }else{
	                    e.preventDefault();
	                    $('html').animate({scrollTop: $(getAttr).offset().top}, 1000);
                    }
                });
            });
        </script>
    </body>
</html>