
<div>
    <div class="section-title-01 honmob">
        <div class="bg_parallax image_02_parallax"></div>
        <div class="opacy_bg_02">
            <div class="container">
                <h1>Profile</h1>
                <div class="crumbs">
                    <ul>
                        <li><a href="/">Home</a></li>
                        <li>/</li>
                        <li>Profile</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <section class="content-central">
        <div class="content_info">
            <div class="paddings-mini">
                <div class="container">
                    <div class="row portfolioContainer">
                        <div class="col-md-8 col-md-offset-2 profile1">
                          <div class="panel panel-default">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-md-6">
                                        Profile
                                    </div>
                                    <div class="col-md-6">
                                    </div>
                                </div>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        @if ($service_provider->image)
                                            <img src="{{ asset('images/sproviders') }}/{{ $service_provider->image }}" alt="" width="100%">
                                        @else
                                        <img src="{{ asset('images/sproviders/default.png') }}" alt="" width="100%">
                                        @endif
                                    </div>
                                    <div class="col-md-8">
                                        <h3>Name: {{ Auth::user()->name }}</h3>
                                        <p>
                                            {{ $service_provider->about }}
                                        </p>
                                        <p><b>Email: </b> {{ Auth::user()->email }}</p>
                                        <p><b>Phone: </b> {{ Auth::user()->phone }}</p>
                                        <p><b>City: </b> {{ $service_provider->city }}</p>
                                        <p><b>Service Category: </b>
                                            @if ($service_provider->service_provider_id)
                                            {{ $service_provider->service_category->category_title }}
                                            @endif
                                            </p>
                                        <p><b>Service Locations: </b> {{ $service_provider->service_locations }}</p>
                                    </div>
                                </div>
                            </div>
                          </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>

