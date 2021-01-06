@extends("backend_master")

@section('content')
<main class="app-content">


<div class="app-title">
                <div>
                    <h1> <i class="icofont-list"></i> Item Form </h1>
                </div>
                <ul class="app-breadcrumb breadcrumb side">
                    <a href="{{route('item.index')}}" class="btn btn-outline-primary">
                        <i class="icofont-double-left">Back</i>
                    </a>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="tile">
                        <div class="tile-body">
                            <form action="{{route('item.store')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                
                                <div class="form-group row">
                                    <label for="name_id" class="col-sm-2 col-form-label"> Name </label>
                                    <div class="col-sm-10">
                                      <input type="text" class="form-control  @error('name') is-invalid @enderror" id="name_id" name="name"placeholder="Item Name..." value="{{old('name')}}">
                                    @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="photo_id" class="col-sm-2 col-form-label"> Photo </label>
                                    <div class="col-sm-10">
                                      <input type="file" id="photo_id" name="photo" class="@error('photo') is-invalid @enderror">
                                      @error('photo')
                                         <div class="alert alert-danger">{{ $message }}</div>
                                      @enderror
                                    </div>
                                </div>

                                <div class="form-group row">

                                    <label for="name_id" class="col-sm-2 col-form-label"> Price </label>
                                    <div class="col-sm-10">
                                       <ul class="nav nav-tabs" id="myTab" role="tablist">
                                          <li class="nav-item" role="presentation">
                                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Unit Price</a>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Discount</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content" id="myTabContent">
                                      <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                          <input type="text" name="price" class="form-control" value="0">
                                      </div>
                                      <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                          <input type="text" name="discount" class="form-control" value="0">
                                      </div>

                                  </div>

                              </div>
                          </div>

                        <div class="form-group row">

                            <label for="name_id" class="col-sm-2 col-form-label"> Description </label>
                            <div class="col-sm-10">
                              <textarea class="form-control" name="description"></textarea>
                          </div>
                        </div>


                            <div class="form-group row">

                                    <label for="name_id" class="col-sm-2 col-form-label">Brands</label>
                                    <div class="col-sm-10">
                                     <select class="form-control" name="brand">
                                        @foreach($brands as $brand)
                                         <option value="{{$brand->id}}">{{$brand->name}}</option>
                                         @endforeach
                                     </select>
                                 </div>
                             </div>


                             <div class="form-group row">

                                    <label for="name_id" class="col-sm-2 col-form-label">Categories </label>
                                    <div class="col-sm-10">
                                     <select class="form-control category" name="category">
                                        @foreach($categories as $category)
                                         <option value="{{$category->id}}">{{$category->name}}</option>
                                         @endforeach
                                     </select>
                                 </div>
                             </div>


                             <div class="form-group row">

                                    <label for="name_id" class="col-sm-2 col-form-label">subcategories </label>
                                    <div class="col-sm-10">
                                     <select class="form-control" name="subcategory" disabled="">
                                        <optgroup label="Choose Subcategory" class="subcategory_option">
                                        @foreach($subcategories as $subcategory)
                                         <option value="{{$subcategory->id}}">{{$subcategory->name}}</option>
                                        </optgroup>
                                         @endforeach
                                     </select>
                                 </div>
                             </div>

                                <div class="form-group row">
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="icofont-save"></i>
                                            Save
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
@section('script')
  <script type="text/javascript">
    $(document).ready(function () {
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
      $('.category').change(function () {
        let categoryid = $(this).val();
        // alert(categoryid);
        $.post("{{route('filterCategory')}}",{cid:categoryid},function (response) {
          // console.log(response);
          var html = "";
          for(let row of response){
            html+=`<option value="${row.id}">${row.name}</option>`;
          }
          $('.subcategory').prop('disabled',false);
          $('.subcategory_option').html(html);
        })
      })
    })
  </script>
@endsection
