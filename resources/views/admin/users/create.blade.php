@extends('admin.layout.master')
@section('title','Admin | Create User')
@section('nav', 'User')
@section('nav_sub', 'Create')
@section('main')
<div class="row">
    <div id="basic" class="col-lg-12 layout-spacing">

        <form method="post" action="{{route('user-store')}}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-lg-6 col-12 mx-auto">
                    <div class="statbox widget box box-shadow">

                        <div class="form-group">
                            <label class="text-primary">Name</label>
                            <input type="text" name="name" placeholder="Your Name" class="form-control">
                            <span class="text-danger">@error('name'){{$message}}@enderror</span>
                        </div>
                        <div class="form-group">
                            <label class="text-primary">Email</label>
                            <input type="text" name="email" placeholder="Your Email..." class="form-control">
                            <span class="text-danger">@error('email'){{$message}}@enderror</span>
                        </div>
                        <div class="custom-file-container" data-upload-id="myFirstImage">
                            <label>Avatar <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image">x</a></label>
                            <label class="custom-file-container__custom-file">
                                <input type="file" name="avatar" class="custom-file-container__custom-file__custom-file-input" accept="image/*">
                                <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                                <span class="custom-file-container__custom-file__custom-file-control"></span>
                            </label>
                            <div class="custom-file-container__image-preview"></div>
                        </div>
                        <div class="form-group">
                            <label class="text-primary">Password</label>
                            <input type="password" name="password" placeholder="Your Password..." class="form-control">
                            <span class="text-danger">@error('password'){{$message}}@enderror</span>
                        </div>
                        <div class="form-group">
                            <label class="text-primary">Repeat Password</label>
                            <input type="password" name="cf_password" placeholder="Confirm Your Password..." class="form-control">
                            <span class="text-danger">@error('cf_password'){{$message}}@enderror</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-12 mx-auto">
                    <div class="statbox widget box box-shadow">
                        <div class="form-group">
                            <label class="text-primary">Phone</label>
                            <input type="text" name="phone" placeholder="Your Phone Number..." class="form-control">
                            <span class="text-danger">@error('phone'){{$message}}@enderror</span>
                        </div>
                        <div class="form-group">
                            <label class="text-primary">Address</label>
                            <input type="text" name="address" placeholder="Your Address..." class="form-control">
                            <span class="text-danger">@error('address'){{$message}}@enderror</span>
                        </div>
                        <div class="form-group">
                            <label class="text-primary">Authorization</label>
                            <br>
                            <select class="selectpicker form-control" name="role_id" title="Choose options">
                                @foreach($roles as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <input type="submit" name="pass" class="mt-4 btn btn-primary text-right" value="Create">
                        <a href="{{route('user-index')}}" class="mt-4 btn btn-danger text-right">Cancel</a>
                    </div>
                </div>
        </form>

    </div>
</div>
</div>
<script>
    var firstUpload = new FileUploadWithPreview('myFirstImage')
</script>
@endsection