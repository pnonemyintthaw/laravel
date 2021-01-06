{{-- div>
    Order your soul. Reduce your wants. - Augustine
</div> --}}

<div class="col-lg-3 col-md-6 my-4">
  <div class="card h-100">
    <a href="#"><img class="card-img-top" src="{{asset($item->photo)}}" alt=""></a>
    <div class="card-body">
      <h4 class="card-title">
        <a href="#">{{$item->name}}</a>
      </h4>
      <h5>{{$item->price}} MMK</h5>
      {{-- <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur!</p> --}}
    </div>
    <div class="card-footer">
      <a href="{{route('itemdetail',$item->id)}}" class="btn btn-info">Detail</a>
    </div>
  </div>
</div>