<div>
    <div class="section-title-01 honmob">
        <div class="bg_parallax image_02_parallax"></div>
        <div class="opacy_bg_02">
            <div class="container">
                <h1>Service Categories</h1>
                <div class="crumbs">
                    <ul>
                        <li><a href="/">Home</a></li>
                        <li>/</li>
                        <li>Service Categories</li>
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
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Image</th>
                                        <th>Category Title</th>
                                        <th>Slug</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categories as $category)

                                    <tr>
                                        <td>{{ $category->id }}</td>
                                        <td>
                                            <img src="{{ asset('images/categories')}}/{{ $category->category_image }}" width="60" alt="">
                                        </td>
                                        <td>{{ $category->category_title }}</td>
                                        <td>{{ $category->slug }}</td>
                                    </tr>

                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
