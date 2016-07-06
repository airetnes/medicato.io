@extends('layouts.master')
@section('title', trans('home.title'))

@section('content')

    <aside class="callout">
        <div class="text-vertical-center">
            <h1>Lorem ipsum dolor</h1>
        </div>
    </aside>

    <section id="about" class="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ex!</h2>
                    <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing <a href="#">Lorem ipsum dolor sit</a>.</p>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </section>

    <section id="services" class="services bg-primary">
        <div class="container">
            <div class="row text-center">
                <div class="col-md-12">
                    <h2>Lorem ipsum dolor.</h2>
                    <hr class="small">
                    <div class="row">
                        <div class="col-md-3 col-sm-6">
                            <div class="service-item">
                            <span class="fa-stack fa-4x faa-parent animated-hover">
                                <i class="fa fa-circle fa-stack-2x"></i>
                                <i class="fa fa-heartbeat faa-pulse fa-stack-1x text-primary"></i>
                            </span>
                                <h4>
                                    <strong>Lorem ipsum</strong>
                                </h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                <a href="#" class="btn btn-light">Подробнее</a>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="service-item">
                            <span class="fa-stack fa-4x faa-parent animated-hover">
                                <i class="fa fa-circle fa-stack-2x"></i>
                                <i class="fa fa-ambulance faa-passing-reverse fa-stack-1x text-primary"></i>
                            </span>
                                <h4>
                                    <strong>Lorem ipsum</strong>
                                </h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                <a href="#" class="btn btn-light">Подробнее</a>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="service-item">
                            <span class="fa-stack fa-4x faa-parent animated-hover">
                                <i class="fa fa-circle fa-stack-2x"></i>
                                <i class="fa fa-medkit faa-tada fa-stack-1x text-primary"></i>
                            </span>
                                <h4>
                                    <strong>Lorem ipsum</strong>
                                </h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                <a href="#" class="btn btn-light">Подробнее</a>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="service-item">
                            <span class="fa-stack fa-4x faa-parent animated-hover">
                                <i class="fa fa-circle fa-stack-2x"></i>
                                <i class="fa fa-hospital-o faa-flash fa-stack-1x text-primary"></i>
                            </span>
                                <h4>
                                    <strong>Lorem ipsum</strong>
                                </h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                <a href="#" class="btn btn-light">Подробнее</a>
                            </div>
                        </div>
                    </div>
                    <!-- /.row (nested) -->
                </div>
                <!-- /.col-lg-10 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </section>

    <section id="team" class="team">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h2>Lorem ipsum</h2>
                    <hr class="small">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="team-item">
                                <a href="#">
                                    <img class="img-team img-responsive" src="http://www.seratis.com/blog/wp-content/uploads/2014/01/care.jpg">
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="team-item">
                                <a href="#">
                                    <img class="img-team img-responsive" src="http://www.bluebirdlaw.co.uk/wp-content/uploads/2016/02/doctor-clipboard.jpg">
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="team-item">
                                <a href="#">
                                    <img class="img-team img-responsive" src="http://www.sarcgoa.com/img/doctor.jpg">
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="team-item">
                                <a href="#">
                                    <img class="img-team img-responsive" src="https://36.media.tumblr.com/tumblr_lx2kmwIcio1qfsq00o1_500.jpg">
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- /.row (nested) -->
                    <a href="#" class="btn btn-dark">Lorem ipsum dolor</a>
                </div>
                <!-- /.col-lg-10 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </section>

    <aside class="call-to-action bg-primary">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h3>Lorem ipsum dolor sit amet.</h3>
                    <a href="#" class="btn btn-lg btn-light">Click Me!</a>
                    <a href="#" class="btn btn-lg btn-dark">Look at Me!</a>
                </div>
            </div>
        </div>
    </aside>

    <section id="contact" class="map">
        <script type="text/javascript" charset="utf-8" src="https://api-maps.yandex.ru/services/constructor/1.0/js/?sid=VtFjm1DCzPtMTbRX7cLnA3WAPmfHDKgN&width=100%&height=500&lang=ru_RU&sourceType=constructor"></script>
    </section>

@endsection