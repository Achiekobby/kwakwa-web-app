
<div>
    <div class="section-title-01 honmob">
        <div class="bg_parallax image_02_parallax"></div>
        <div class="opacy_bg_02">
            <div class="container">
                <h1>Edit Profile</h1>
                <div class="crumbs">
                    <ul>
                        <li><a href="/">Home</a></li>
                        <li>/</li>
                        <li>Edit Profile</li>
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
                        <div class="col-md-8 col-md-offset-2 Edit profile1">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-md-6">
                                            Edit Profile
                                        </div>
                                        <div class="col-md-6">
                                        </div>
                                    </div>
                                </div>
                            <div class="panel-body">
                                <div class="row">
                                    @if (Session::has('message'))
                                        <div class="alert alert-success">{{ Session::get('message') }}</div>
                                    @endif
                                    <div class="col-md-12">
                                        <form class="form-horizontal" wire:submit.prevent="updateProfile">
                                            @csrf
                                            <div class="form-group">
                                                <label for="image" class="control-label col-md-3">Profile Image:</label>
                                                <div class="col-md-9">
                                                <input type="file" class="form-control-file" name="newImage" wire:model="newImage">
                                                    @if ($newImage)
                                                        <img src="{{ $newImage->temporaryUrl() }}" alt="" width="220">
                                                    @elseif($image)
                                                        <img src="{{ asset('images/sproviders') }}/{{ $image }}" alt="" width="220">
                                                    @else
                                                        <img src="{{ asset('images/sproviders/default.png') }}" alt="" width="220">
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="about" class="control-label col-md-3">About:</label>
                                                <div class="col-md-9">
                                                <textarea name="about" cols="30" rows="5" class="form-control" wire:model="about"></textarea>
                                            </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="city" class="control-label col-md-3">City:</label/>
                                                <div class="col-md-9">
                                                    <input type="text" class="form-control" name="city" wire:model="city">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="image" class="control-label col-md-3">Service Category:</label>
                                                <div class="col-md-9">
                                                <select name="service_category" class="form-control" wire:model="service_category">
                                                    <option value="">Please Select a Category</option>
                                                    @foreach ($categories as $category)
                                                        <option value="{{ $category->id }}">{{ $category->category_title }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="service_location" class="control-label col-md-3">Service Locations Pincode/ZipCode:</label>
                                                <div class="col-md-9">
                                                    <input type="text" class="form-control" name="newImage" wire:model="service_locations">
                                                </div>
                                            </div>
                                            <button class="btn btn-primary pull-right" type="submit">Update Profile</button>
                                        </form>
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

