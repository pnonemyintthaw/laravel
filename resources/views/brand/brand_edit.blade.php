@extends("backend_master")

@section('content')
<main class="app-content">


<div class="app-title">
                <div>
                    <h1> <i class="icofont-list"></i> Brand Edit Form </h1>
                </div>
                <ul class="app-breadcrumb breadcrumb side">
                    <a href="" class="btn btn-outline-primary">
                        <i class="icofont-double-left">Back</i>
                    </a>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="tile">
                        <div class="tile-body">
                            <form action="{{route('brand.update',$brand->id)}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                
                                <div class="form-group row">
                                    <label for="name_id" class="col-sm-2 col-form-label"> Name </label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control  @error('name') is-invalid @enderror" id="name_id" name="name" 
                                        value="{{$brand->name}}">
                                      @error('name')
                                      <div class="alert alert-danger">{{ $message }}</div>
                                      @enderror
                                  </div>
                              </div>

                              <div class="form-group row">
                                <label for="photo_id" class="col-sm-2 col-form-label"> Photo </label>
                                <div class="col-sm-10">


                                    <nav>
                                      <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                        <a class="nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Old Photo</a>
                                        <a class="nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">New Photo</a>

                                    </div>
                                </nav>
                                <div class="tab-content" id="nav-tabContent">
                                  <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                      <img src="{{asset($brand->photo)}}" class="img-fluid">
                                      <input type="hidden" name="oldphoto" value="{{$brand->photo}}">
                                  </div>
                                  <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                      <input type="file" id="photo_id" name="photo" class="@error('photo') is-invalid @enderror">
                                      @error('photo')
                                      <div class="alert alert-danger">{{ $message }}</div>
                                      @enderror
                                  </div>

                              </div>

                          </div>
                      </div>

                                <div class="form-group row">
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="icofont-save"></i>
                                            Update
                                        </button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>

    </main>

@endsection
