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
                <h1>{{ $category_title }} Services</h1>
                <div class="crumbs">
                    <ul>
                        <li><a href="/">Home</a></li>
                        <li>/</li>
                        <li>{{ $category_title }} Services</li>
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
                                            Services for {{ $category_title }}
                                        </div>
                                        <div class="col-md-6">
                                            <a href="#"
                                                class="btn btn-info pull-right">Add New</a>
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
                                            @if ($services->count() > 0)
                                            <tr>
                                                <th>#</th>
                                                <th>Image</th>
                                                <th>Name</th>
                                                <th>Category</th>
                                                <th>Price</th>
                                                <th>Status</th>
                                                <th>Created At</th>
                                                <th>Action</th>
                                            </tr>
                                            @endif

                                        </thead>
                                        <tbody>
                                            @if ($services->count() > 0)
                                                @foreach ($services as $service)
                                                    <tr>
                                                        <td>{{ $service->id }}</td>
                                                        <td>
                                                            <img src="{{ asset('images/services') }}/{{ $service->service_image }}"
                                                                width="100" height="80" style="border-radius: 5px; object-fit: cover" alt="">
                                                        </td>
                                                        <td>{{ $service->service_name }}</td>
                                                        @if (!$service->service_category_id)
                                                            <td class="danger">No Category</td>
                                                        @else
                                                            <td>{{ $service->service_category->category_title }}</td>
                                                        @endif
                                                        <td>{{ $service->price }}</td>
                                                        <td>
                                                            @if ($service->status)
                                                            <div class="badge">Active</div>
                                                            @else
                                                            <div class="badge">Inactive</div>
                                                            @endif
                                                        </td>

                                                        <td>{{ $service->created_at }}</td>
                                                        <td>
                                                            <a href="#" class="">
                                                                <i class="fa fa-edit fa-2x text-info"></i>
                                                            </a>
                                                            <a href="#"  class="" style="margin-left:10px;">
                                                                <i class="fa fa-trash fa-2x text-danger"></i>
                                                            </a>
                                                        </td>

                                                    </tr>
                                                @endforeach
                                                @else
                                                <div class="col-md-12">
                                                    <h2 class="text-danger text-center">N0 RESULTS FOUND</h2>
                                                </div>
                                            @endif

                                        </tbody>
                                    </table>
                                    {{ $services->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>

