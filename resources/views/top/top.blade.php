@extends('layouts.common')

@section('content')

@foreach($categories as $category)
<div class="container mt-5">
    <h3 class="text-danger font-weight-bold">{{$category->name}}</h3>
    <hr class="bg-danger" />
    <div class="card-wrapper row row-cols-1 row-cols-sm-2 row-cols-lg-3 mb-5">
      @foreach(App\Models\Product::where('category_id',$category->id)->get() as $product)
        <div class="col card">
          <img src="{{ asset('images') }}/{{ $product->image }}" class="card-img-top" />
          <div class="card-body">
          <h5 class="card-title font-weight-bold" style="display:inline;">{{ $product->name }}</h5><span class="card-title pr-1" style="float: right">{{ $product->price }} 円（税込）</span>
            <hr />
            <p class="card-text">{{ $product->description }}</p>
          </div>
        </div>
      @endforeach
    </div>
</div>
@endforeach

@endsection