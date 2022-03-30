<div>
    <div class="section-title-01 honmob">
        <div class="bg_parallax image_02_parallax"></div>
        <div class="opacy_bg_02">
            <div class="container">
                <h1>Edit Service </h1>
                <div class="crumbs">
                    <ul>
                        <li><a href="/">Home</a></li>
                        <li>/</li>
                        <li>Edit Service </li>
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
                                        Edit Service
                                    </div>
                                    <div class="col-md-6">
                                        <a href="{{ route('admin.services') }}" class="btn btn-info pull-right">All Services</a>
                                    </div>
                                </div>
                            </div>
                            <div class="panel-body">
                                @if (Session::has('message'))
                                    <div class="alert alert-success" role="alert">
                                        {{ Session::get('message') }}
                                    </div>
                                @endif
                                <form class="form-horizontal" wire:submit.prevent="updateService">
                                    @csrf
                                    <div class="form-group">
                                        <label for="title" class="control-label col-sm-3">Service Title:</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="title" wire:model = "title" wire:keyup="generateSlug">
                                            @error('title')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="slug" class="control-label col-sm-3">Service Slug:</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" title="slug" wire:model="slug" wire:keyup="generateSlug">
                                            @error('slug')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="price" class="control-label col-sm-3">Service Price:</label>
                                        <div class="col-sm-9">
                                            <input type="currency" class="form-control" title="price" wire:model="price">
                                            @error('price')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="discount" class="control-label col-sm-3">Service Discount:</label>
                                        <div class="col-sm-9">
                                            <input type="currency" class="form-control" title="discount" wire:model="discount">
                                            @error('discount')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="discount_type" class="control-label col-sm-3">Discount Type:</label>
                                        <div class="col-sm-9">
                                            <select name="" wire:model="discount_type" id="" class="form-control">
                                                <option value="">Select Discount Type</option>
                                                <option value="fixed">Fixed</option>
                                                <option value="percent">Percent</option>
                                            </select>
                                            @error('discount_type')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="service_category" class="control-label col-sm-3">Service Category:</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" wire:model="service_category">
                                                <option value="">Select Service Category</option>
                                                @foreach ($categories as $category )
                                                    <option value="{{ $category->id }}" >{{ $category->category_title }}</option>
                                                @endforeach
                                            </select>
                                            @error('service_category')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="tagline" class="control-label col-sm-3">Tagline:</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" title="tagline" wire:model="tagline">
                                            @error('tagline')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="thumbnail" class="control-label col-sm-3">Service Thumbnail:</label>
                                        <div class="col-sm-9">
                                            <input type="file" class="form-control" name="thumbnail" wire:model="newThumbnail">
                                            @error('newThumbnail')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror

                                            @if ($newThumbnail)
                                                <img src="{{ $newThumbnail->temporaryUrl() }}" width="60" alt="">
                                            @else
                                            <img src="{{ asset('images/services/thumbnails') }}/{{ $thumbnail }}" width="60" alt="">
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="image" class="control-label col-sm-3">Service Image:</label>
                                        <div class="col-sm-9">
                                            <input type="file" class="form-control" name="image" wire:model="newImage">
                                            @error('newImage')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror

                                            @if ($newImage)
                                                <img src="{{ $newImage->temporaryUrl() }}" width="60" alt="">
                                            @else
                                                <img src="{{ asset('images/services') }}/{{ $image }}" width="60" alt="">
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inclusion" class="control-label col-sm-3">Service Inclusion:</label>
                                        <div class="col-sm-9">
                                            <textarea name="inclusion" class="form-control" id="" cols="30" rows="4" wire:model="inclusion"></textarea>
                                            @error('inclusion')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="exclusion" class="control-label col-sm-3">Service Exclusion:</label>
                                        <div class="col-sm-9">
                                            <textarea name="exclusion" class="form-control" id="" cols="30" rows="4" wire:model="exclusion"></textarea>
                                            @error('exclusion')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="service_description" class="control-label col-sm-3">Service Description:</label>
                                        <div class="col-sm-9">
                                            <textarea name="service_description" class="form-control" id="" cols="30" rows="8" wire:model="service_description"></textarea>
                                            @error('slug')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-success pull-right">Update Service</button>
                                </form>
                            </div>
                          </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>


