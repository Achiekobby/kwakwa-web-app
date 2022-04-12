
<div>
    <style>
        nav svg {
            height: 20px;
        }

        nav .hidden {
            display: block !important;

        }

    </style>
    <div class="section-title-01 honmob">
        <div class="bg_parallax image_02_parallax"></div>
        <div class="opacy_bg_02">
            <div class="container">
                <h1>Service Providers</h1>
                <div class="crumbs">
                    <ul>
                        <li><a href="/">Home</a></li>
                        <li>/</li>
                        <li>Service Providers</li>
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
                        <div class="col-md-12 profile1">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-md-6">
                                            All Service Providers
                                        </div>
                                        <div class="col-md-6">

                                        </div>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    @if (Session::has('message'))
                                        <div class="alert alert-success" role="alert">
                                            {{ Session::get('message') }}
                                        </div>
                                    @endif
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Image</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>City</th>
                                                <th>Service Category</th>
                                                <th>Service Locations</th>
                                                {{-- <th>Action</th> --}}
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($providers as $provider)
                                                <tr>
                                                    <td>{{ $provider->id }}</td>
                                                    <td>
                                                        <img src="{{ asset('images/sproviders') }}/{{ $provider->image }}"
                                                            width="60" alt="">
                                                    </td>
                                                    <td>{{ $provider->user->name }}</td>
                                                    <td>{{ $provider->user->email }}</td>
                                                    <td>{{ $provider->user->phone }}</td>
                                                    <td>{{ $provider->city }}</td>
                                                    <td>{{ $provider->service_category->category_title }}</td>
                                                    <td>{{ $provider->service_locations }}</td>
                                                    {{-- <td>
                                                        <a href="{{ route('admin.services_by_category',['category_slug'=>$category->slug]) }}" class="" style="margin-right:10px">
                                                            <i class="fa fa-list fa-2x text-warning"></i>
                                                        </a>
                                                        <a href="{{ route('admin.edit-service-category',['category_id'=>$category->id]) }}" class="">
                                                            <i class="fa fa-edit fa-2x text-info"></i>
                                                        </a>
                                                        <a onclick="confirm('Are you sure you want to delete this service category!') ||event.stopImmediatePropagation()" href="#" wire:click="deleteServiceCategory({{ $category->id }})" class="" style="margin-left:10px;">
                                                            <i class="fa fa-trash fa-2x text-danger"></i>
                                                        </a> --}}
                                                    </td>

                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    {{ $providers->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
