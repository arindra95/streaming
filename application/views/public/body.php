<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- CSS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?= base_url('asset/public/'); ?>css/slick.css" />
    <link rel="stylesheet" type="text/css" href="<?= base_url('asset/public/'); ?>css/slick-theme.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous" />

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <link href="https://vjs.zencdn.net/7.18.1/video-js.css" rel="stylesheet" />

    <!-- If you'd like to support IE8 (for Video.js versions prior to v7) -->
    <script src="https://vjs.zencdn.net/ie8/1.1.2/videojs-ie8.min.js"></script>

    <title>Vidio</title>
</head>
<style>
    .navbar {
        box-shadow: 0 4px 10px 0 rgb(0 0 0 / 20%);

    }

    .list-streaming {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .content-panel {
        height: 4em;
        width: 8em;
        margin: .2em .7em;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        border-radius: 5px;
    }

    .containers {
        padding: 0 5%;
    }

    .advertising .content-panel {
        width: 300px;
        height: 250px;
        margin: auto;
        /* margin-bottom: .7em;
        margin-top: .7em; */
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        border-radius: 0px;
    }

    .slick-arrow {
        background-color: #fff;
        z-index: 997;
        color: #333;
        box-shadow: 0 4px 10px 0 rgb(0 0 0 / 20%);
        position: absolute;
        top: 20%;
        cursor: pointer;
        font-size: 1.2em;
        border-radius: 50%;
        padding: 0;
        width: 2em;
        height: 2em;
        text-align: center;
    }

    .slick-arrow i {
        position: relative;
        top: .3em;
    }

    .slick-arrow.prev-arrow {
        left: -30px;
    }

    .slick-arrow.next-arrow {
        right: -30px
    }

    .slick-list {
        position: relative;

        display: block;
        overflow: hidden;

        margin: 0;
        padding: 0;
    }


    .stream-data {
        background-color: #cecece;
        margin-right: 1em;
        border-radius: 10px;
        width: 150px;
        text-align: center;
        /* padding: 1.5em; */
    }

    /*     .video-js {
        width: 500px;
        height: 340px;
    } */



    @media (max-width: 1200px) {
        /*        .video-js {
            width: 670px;
            height: 440px;
        } */
    }

    @media (max-width: 987px) {
        /*        .video-js {
            width: 690px;
            height: 340px;
        } */

        /* .advertising {

            margin-top: 2em;
        } */
    }

    @media (max-width: 763px) {
        /*      .video-js {
            width: 510px;
            height: 240px;
        } */


    }

    @media (max-width: 565px) {
        .slick-arrow.prev-arrow {
            left: -10px;
        }

        .slick-arrow.next-arrow {
            right: -2px
        }

        /* .video-js {
            width: 455px;
            height: 200px;
        } */
    }

    @media (max-width: 437px) {
        /* .video-js {
            width: 430px;
            height: 200px;
        } */

        /* .advertising .content-panel {
            height: 4em;
            background-size: contain;
        } */
    }


    @media (max-width: 420px) {
        /* .video-js {
            width: 380px;
            height: 200px;
        } */

        /* .advertising .content-panel {
            height: 3em;
            background-size: contain;
        } */
    }
</style>

<body>

    <div class="wrap">
        <!-- Navbar -->
        <nav class="navbar navbar-default navbar-expand-lg navbar-light navbar-inverse">
            <a class="navbar-brand" href="#">VIDIO</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Features</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Pricing</a>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- Navbar End -->
        <div style="clear: both;height: 2em;"></div>

        <div style="min-height:90vh;">
            <div class="containers" style="background-color: #eee3;">
                <ul class="list-streaming">
                    <?php foreach ($dataLiveAll as $dataLiveAllKey => $dataLiveAllValue) { ?>
                        <div>
                            <li style="width:100%;display:inline-block">
                                <a href="<?php echo base_url('Live/chanel/') . $dataLiveAllValue['pkey'] ?>">
                                    <div class="content-panel" style="background-image:url(<?php echo base_url('uploads/') . $dataLiveAllValue['img'] ?>)"></div>
                                </a>
                            </li>
                        </div>
                    <?php } ?>
                </ul>
            </div>


            <div style="clear: both;height: 4em;"></div>
            <!-- Jumbotron -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row ">
                        <div class="col-lg-3" style="">
                            <div class="advertising">
                                <div class="row">
                                    <?php foreach ($ads as $adsKey => $adsValue) { ?>
                                        <div class="col-sm-12 py-1">
                                            <!-- <img src="<?php echo base_url('uploads/' . $adsValue['img']) ?>" alt=""> -->
                                            <div class="content-panel" style="background-image:url(<?php echo base_url('uploads/' . $adsValue['img']) ?>)"></div>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 embed-responsive embed-responsive-4by3" style="text-align: center;">
                            <video autoplay="true" id="my-video" class="video-js embed-responsive-item" controls preload="auto" poster="<?php echo base_url('uploads/') . $dataLive['img'] ?>" data-setup="{}">
                                <source src="<?php echo $dataLive['link'] ?>" type="application/x-mpegURL" />
                            </video>
                        </div>
                        <div class="col-lg-3" style="">
                            <div class="advertising">
                                <div class="row">
                                    <?php foreach ($ads as $adsKey => $adsValue) { ?>
                                        <div class="col-sm-12 py-1">
                                            <!-- <img src="<?php echo base_url('uploads/' . $adsValue['img']) ?>" alt=""> -->
                                            <div class="content-panel" style="background-image:url(<?php echo base_url('uploads/' . $adsValue['img']) ?>)"></div>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Jumbotron End-->


        </div>


        <footer id="section5" class="footer" style="padding: 2em;text-align: center;">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col heading">
                        <span>© Copyright 2014 - 2020 ® ™. All Rights Reserved.
                        </span>

                    </div>
                </div>
            </div>
        </footer>
        <!-- footer   -->
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script type="text/javascript" src="<?= base_url('asset/public/'); ?>js/slick.min.js"></script>


    <script type="text/javascript">
        $('.list-streaming').slick({
            dots: false,
            infinite: true,
            slidesToShow: 3,
            slidesToScroll: 6,
            variableWidth: true,
            centerMode: true,
            nextArrow: '<div class="slick-arrow next-arrow"><i class="fa fa-chevron-right"></i></div>',
            prevArrow: '<div class="slick-arrow prev-arrow"><i class="fa fa-chevron-left"></i></div>',
            responsive: [{
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3,
                    }
                },
                {
                    breakpoint: 800,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2
                    }
                },
                {
                    breakpoint: 580,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }

            ]
        });
    </script>
    <script src="https://vjs.zencdn.net/7.18.1/video.min.js"></script>
</body>

</html>