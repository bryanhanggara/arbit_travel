@extends('layout.app')

@section('content')

<!-- Header -->
<div class="header-two">
    <div class="container mt-2">
        <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide-to="0"
                    class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="card">
                        <img src="{{url('front_end/assets/image/promo2.png')}}" class="card-img" alt="...">
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="card">
                        <img src="{{url('front_end/assets/image/promo1.png')}}" class="card-img" alt="...">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>                   
<!-- breadcumb -->
<nav aria-label="breadcrumb">
    <div class="container mt-3">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">package</li>
        </ol>
    </div>
</nav>
<!-- search -->
<div class="container mt-4">
    <div class="search">
        <form action="{{'more-packages'}}" method="get">
            <input type="text" placeholder="Search" class="form-control" name="keyword" value="{{ request('keyword') }}"> 
        </form>
    </div>
</div>

<!-- packages -->
<div class="content">
    <div class="container mt-3">
        <div class="row g-3">
            <div class="col-lg-3">
                <div class="filter mobile-off tablet-off">
                    <div class="d-flex justify-content-between">
                        <h4>Filter</h4> 
                        <h4><ion-icon name="filter-outline"></ion-icon></h4>
                    </div>
                    <!-- <h4><ion-icon name="filter-outline"></ion-icon> Filter</h4>  -->
                    <h6 class="mb-3">Price</h6>

                    <div class="range-slider">
                        <form action="{{ route('more.index') }}" method="GET">
                            <div id="price-slider"></div>
                            <input type="hidden" id="min-price" name="min_price" value="{{ $filterMinPrice }}">
                            <input type="hidden" id="max-price" name="max_price" value="{{ $filterMaxPrice }}">
                            <button type="submit" class="btn btn-success w-100 mt-4">Filter</button>
                        </form>
                    </div>
                    <!--location-->
                    <h6 class="mb-3">Location</h6>
                    <div class="input-group mb-3">
                        <form action="{{url('more-packages')}}" method="get">
                           <div class="input-group">
                            <div class="input-group-text border-0 bg-white">
                                <input class="form-check-input mt-0" type="checkbox" value="indonesia"
                                    aria-label="Radio button for following text input" name="keyword">
                            </div>
                            <div class="filter-content">Indonesia</div>
                           </div>
                           <div class="input-group">
                            <div class="input-group-text border-0 bg-white">
                                <input class="form-check-input mt-0" type="checkbox" value=""
                                    aria-label="Radio button for following text input" name="keyword">
                            </div>
                            <div class="filter-content">Other Country</div>
                           </div>
                            <button class="btn" type="submit" hidden>Search</button>
                        </form>
                    </div>
                    <br>
                    <!--categories-->
                    <h6 class="mb-3">Categories</h6>
                    <div class="input-group mb-3">
                        <form action="{{url('more-packages')}}" method="get">
                           <div class="input-group">
                            <div class="input-group-text border-0 bg-white">
                                <input class="form-check-input mt-0" type="checkbox" value="private"
                                    aria-label="Radio button for following text input" name="keyword">
                            </div>
                            <div class="filter-content">Private</div>
                           </div>
                           <div class="input-group">
                            <div class="input-group-text border-0 bg-white">
                                <input class="form-check-input mt-0" type="checkbox" value="public"
                                    aria-label="Radio button for following text input" name="keyword">
                            </div>
                            <div class="filter-content">Public</div>
                           </div>
                            <button class="btn" type="submit" hidden>Search</button>
                        </form>
                    </div>

                </div>
            </div>
            <div class="col-lg-9">
                <div class="package">
                    <div class="row mt-3">
                       @foreach ($packages as $item)
                       <div class="col-lg-4 col-md-4 col-sm-6">
                        <div class="card border-0">
                            <img src="{{$item->galleries->count() ? Storage::url($item->galleries->first()->image) :'' }}" class="card-img-top " alt="...">
                            <div class="card-body">
                                <h5 class="card-title">{{$item->title}}</h5>
                                <div class="card-status row g-0">
                                    <div class="col text-start">
                                        <h6><ion-icon name="star-outline"></ion-icon> 4.5 Rating</h6>
                                    </div>
                                    <div class="col text-center">
                                        <h6><ion-icon name="paper-plane-outline"></ion-icon> {{$item->location}}</h6>
                                    </div>
                                    <div class="col text-end">
                                        <h6><ion-icon name="calendar-number-outline"></ion-icon> {{$item->departure_date}}</h6>
                                    </div>
                                </div>
                                <div class="card-buy row mt-2">
                                    <div class="col"><b>$ {{$item->price}}</b>
                                        <h6>/Night</h6>
                                    </div>
                                    <div class="col-6"><a href="{{route('detail', $item->slug)}}"
                                            class="btn btn-dark ms-xl-5">Details</a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                       @endforeach
                       @if(isset($packages) && count($packages) > 0)
                            
                            @else
                                    @if(isset($packages))
                                        <p>Tidak ada paket travel yang sesuai dengan kisaran harga yang dimasukkan.</p>
                                    @endif
                            @endif
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>


<script>
    var priceSlider = document.getElementById('price-slider');
    var minPriceInput = document.getElementById('min-price');
    var maxPriceInput = document.getElementById('max-price');

    noUiSlider.create(priceSlider, {
        start: [{{ $filterMinPrice }}, {{ $filterMaxPrice }}],
        connect: true,
        range: {
            'min': {{ $minPrice }},
            'max': {{ $maxPrice }}
        }
    });

    // Update input fields when the slider changes
    priceSlider.noUiSlider.on('update', function(values, handle) {
        if (handle === 0) {
            minPriceInput.value = values[0];
        } else {
            maxPriceInput.value = values[1];
        }
    });
</script>
<br><br>
@endsection