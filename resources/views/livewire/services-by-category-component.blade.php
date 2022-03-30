<div>
    <div class="section-title-01 honmob">
        <div class="bg_parallax image_01_parallax"></div>
        <div class="opacy_bg_02">
            <div class="container">
                <h1>{{ $s_category->category_title }} Services</h1>
                <div class="crumbs">
                    <ul>
                        <li><a href="/">Home</a></li>
                        <li>/</li>
                        <li>{{ $s_category->category_title }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <section class="content-central">
        <div class="container">
            <div class="row" style="margin-top: -30px;">
                <div class="titles">
                    <h2>{{ $s_category->category_title }} <span>Services</span></h2>
                    <i class="fa fa-plane"></i>
                    <hr class="tall">
                </div>
            </div>
        </div>
        <div class="content_info" style="margin-top: -70px;">
            <div>
                <div class="container">
                    <div class="portfolioContainer">
                        @if ($s_category->services->count() > 0)
                            @foreach ($s_category->services as $service )
                                    <div class="col-xs-6 col-sm-4 col-md-3 nature hsgrids"
                                    style="padding-right: 5px;padding-left: 5px;">
                                    <a class="g-list" href="service-details/ac-wet-servicing.html">
                                        <div class="img-hover">
                                            <img src="{{ asset('images/services/thumbnails') }}/{{ $service->thumbnail }}" alt="{{ $service->service_title }}"
                                                class="img-responsive">
                                        </div>
                                        <div class="info-gallery">
                                            <h3>{{ $service->service_title }}</h3>
                                            <hr class="separator">
                                            <p>{{ $service->service_title }}</p>
                                            <div class="content-btn"><a href="service-details/ac-wet-servicing.html"
                                                    class="btn btn-primary">Book Now</a></div>
                                            <div class="price"><span>&#36;</span><b>From</b>{{ $service->price }}</div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        @else
                                <div class="col-md-12">
                                    <h1 class="text-danger text-center">
                                        THERE ARE NO SERVICES FOR THIS CATEGORY
                                    </h1>
                                </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
