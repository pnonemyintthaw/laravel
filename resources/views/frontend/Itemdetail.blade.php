@extends('frontend_master')

@section('content')
  <div class="container">

    <div class="row my-5">

      <div class="col-md-6">
        <img src="{{asset($item->photo)}}" class="img-fluid">
      </div>

      <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h4>{{$item->name}}</h4>
            </div>
            <div class="card-body">
                <p>{{$item->description}}</p>

                <p>{{$item->price}} MMK</p>

                <input type="number" name="qty" class="form-control w-50" value="1" min="1">
            </div>
            <div class="card-footer">
              <?php
              $id = $item['id'];
              $name = $item['name'];
              $price = $item['price'];
              $discount = $item['discount'];
              $photo = $item['photo'];
              $codeno = $item['codeno'];


              ?>
                <button class="btn btn-success addtocartBtn" data-id="<?= $id;?>" data-name="<?= $name;?>" data-codeno="<?= $codeno;?>"data-photo="<?= $photo;?>" data-price="<?= $price;?>" data-discount="<?= $discount;?>">Add To Cart</button>
            </div>
        </div>
      </div>
    </div>
    <!-- /.row -->

  </div>
@endsection

@section('script')
    <script type="text/javascript" src="{{asset('frontend_asset/js/custom.js')}}"></script>
@endsection