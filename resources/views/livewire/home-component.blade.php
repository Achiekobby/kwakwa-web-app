<div>
    <section class="tp-banner-container">
        <div class="tp-banner">
            <ul>
                @foreach ($slides as $slide)
                <li data-transition="slidevertical" data-slotamount="1" data-masterspeed="1000"
                data-saveperformance="off" data-title="Slide">
                <img src="{{asset('images/Sliders')}}/{{ $slide->image }}" alt="{{ $slide->title }}" data-bgposition="center center"
                    data-kenburns="on" data-duration="6000" data-ease="Linear.easeNone" data-bgfit="130"
                    data-bgfitend="100" data-bgpositionend="right center">
                </li>
                @endforeach
            </ul>
            <div class="tp-bannertimer"></div>
        </div>
        <div class="filter-title">
            <div class="title-header">
                <h2 style="color:#fff;">BOOK A SERVICE</h2>
                <p class="lead">Book a service at very affordable price, </p>
            </div>
            <div class="filter-header">
                <form id="sform" action="searchservices" method="post">
                    <input type="text" id="q" name="q" required="required" placeholder="What Services do you want?"
                        class="input-large typeahead" autocomplete="off">
                    <input type="submit" name="submit" value="Search">
                </form>
            </div>
        </div>
    </section>
    <section class="content-central">
        <div class="content_info content_resalt">
            <div class="container" style="margin-top: 40px;">
                <div class="row">
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <ul id="sponsors" class="tooltip-hover">
                            @foreach ($service_categories as $s_category)
                            <li data-toggle="tooltip" title="" data-original-title="{{ $s_category->category_title }}"> <a
                                href="{{ route('home.services_by_category',['category_slug'=>$s_category->slug]) }}"><img src="{{asset('images/categories')}}/{{ $s_category->category_image }}"
                                    alt="{{ $s_category->category_title }}"></a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="semiboxshadow text-center">
            <img src="{{asset('assets/img/img-theme/shp.png')}}" class="img-responsive" alt="">
        </div>
        <div class="content_info">
            <div>
                <div class="container">
                    <div class="row">
                        <div class="titles">
                            <h2>SurfsideMedia <span>Choice</span> of Services</h2>
                            <i class="fa fa-plane"></i>
                            <hr class="tall">
                        </div>
                    </div>
                                <div class="portfolioContainer" style="margin-top: -50px;">
                                @foreach ($featured_services as $f_service )
                                    <div class="col-xs-6 col-sm-4 col-md-3 hsgrids"
                                        style="padding-right: 5px;padding-left: 5px;">
                                        <a class="g-list" href="{{ route('home.service_details',['service_slug'=>$f_service->slug]) }}">
                                            <div class="img-hover">
                                                <img src="{{asset('images/services/thumbnails')}}/{{ $f_service->thumbnail }}" alt="{{ $f_service->service_name }}"
                                                    class="img-responsive">
                                            </div>
                                            <div class="info-gallery">
                                                <h3>{{ $f_service->service_name }}</h3>
                                                <hr class="separator">
                                                <p>{{ $f_service->service_name }}</p>
                                                <div class="content-btn"><a href="service-details/ac-dry-servicing.html"
                                                        class="btn btn-primary">Book Now</a></div>
                                                <div class="price"><span>&#36;</span><b>From</b>{{ $f_service->price }}</div>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="content_info">
            <div class="bg-dark color-white border-top">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 ">
                            <div class="services-lines-info">
                                <h2>WELCOME TO DIVERSIFIED</h2>
                                <p class="lead">
                                    Book best services at one place.
                                    <span class="line"></span>
                                </p>

                                <p>Find a wide variety of home services.</p>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <ul class="services-lines">
                                @foreach ($featured_categories as $f_category )
                                <li>
                                    <a href="{{ route('home.services_by_category',['category_slug'=>$f_category->slug]) }}">
                                        <div class="item-service-line">
                                            <i class="fa"><img class="icon-img"
                                                    src="{{asset('images/categories')}}/{{ $f_category->category_image }}" alt="{{ $f_category->category_title }}"></i>
                                            <h5>{{ $f_category->category_title }}</h5>
                                        </div>
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <div class="container">
                <div class="row">
                    <div class="titles">
                        <h2><span>Appliance</span>Services</h2>
                        <i class="fa fa-plane"></i>
                        <hr class="tall">
                    </div>
                </div>
            </div>
            <div id="boxes-carousel">
                @foreach ($appliance_services as $a_service )
                <div>
                    <a class="g-list" href="{{ route('home.service_details',['service_slug'=>$a_service->slug]) }}">
                        <div class="img-hover">
                            <img src="{{asset('images/services/thumbnails')}}/{{ $a_service->thumbnail }}" alt="{{ $a_service->service_image }}" class="img-responsive">
                        </div>

                        <div class="info-gallery">
                            <h3>{{ $a_service->service_name }}</h3>
                            <hr class="separator">
                            <p>{{ $a_service->service_name }}</p>
                            <div class="content-btn"><a href="service-details/ac-wet-servicing.html"
                                    class="btn btn-primary">Book Now</a></div>
                            <div class="price"><span>&#36;</span><b>From</b>{{ $a_service->price }}</div>
                        </div>
                    </a>
                </div>
                @endforeach

            </div>
        </div>
    </section>
</div>

@push('scripts')
    <script type="text/javascript">
        var path = "{{ route('autocomplete') }}";

        $('input.typeahead').typeahead({
            source: function(query, process){
                return $.get(path,{term:query},function(data){
                    return process(data);
                });
            }
        });
    </script>
@endpush
