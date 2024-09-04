@extends('layout.app')

@section('title')
    Detail
@endsection

@section('content')

<div class="details-package mt-5">
    <div class="container">
      <div class="row">
        <div class="col-lg-8">
          <div class="details">
            <h3>{{$item->title}}</h3>
            <h5>{{$item->location}}</h5>
            <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
              <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide-to="0" class="active"
                  aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide-to="1"
                  aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide-to="2"
                  aria-label="Slide 3"></button>
              </div>
              <div class="carousel-inner">
                    @if ($item->galleries->count())
                        
                    <div class="carousel-item active">
                        <div class="gallery">
                          <img src="{{Storage::url($item->galleries->first()->image)}}" alt="" />
                        </div>
                      </div>
                     @foreach ($item->galleries as $gallery)
                     <div class="carousel-item">
                        <div class="gallery">
                          <img src="{{Storage::url($gallery->image)}}" alt="" />
                        </div>
                      </div>
                     @endforeach

                    @endif
              </div>
              <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
              </button>
              <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
              </button>
            </div>
            <h6 class="information-title">About</h6>
            <p>
             {{$item->about}}
            </p> <br>
            <h6 class="information-title">Discover the true beauty of nature</h6>
            <div class="row benefit">
              <div class="col-lg-6">
                <div class="benefit-item">
                  <img src="{{url('front_end/assets/image/icons/forest.png')}}" alt="">
                  <div class="benefit-information">
                    <div class="title">Featured Even</div>
                    <p class="sub-title">{{$item->featured_even}}</p>
                  </div>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="benefit-item">
                  <img src="{{url('front_end/assets/image/icons/relaxation.png')}}" alt="">
                  <div class="benefit-information">
                    <div class="title">Language</div>
                    <p class="sub-title">{{$item->language}}</p>
                  </div>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="benefit-item">
                  <img src="{{url('front_end/assets/image/icons/location.png')}}" alt="">
                  <div class="benefit-information">
                    <div class="title">Food</div>
                    <p class="sub-title">{{$item->foods}}</p>
                  </div>
                </div>
            </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="bill">
            <h6>Trip Information</h6>
            <div class="row mt-3">
              <div class="col text-start index">Date of departement</div>
              <div class="col text-end value">{{$item->departure_date}}</div>
            </div>
            <div class="row">
              <div class="col text-start index">Duration</div>
              <div class="col text-end value">{{$item->duration}}</div>
            </div>
            <div class="row">
              <div class="col text-start index">Type</div>
              <div class="col text-end value">{{$item->type}}</div>
            </div>
            <div class="row">
              <div class="col text-start index">Price</div>
              <div class="col text-end value">$ {{$item->price}}</div>
            </div>
            <hr />

            @guest
            <a class="btn btn-success" href="{{route('login')}}">Login or Register</a>
            @endguest
            @auth
            <form action="{{route('checkout-proccess', $item->id)}}" method="post">
                @csrf
                    <button type="submit" class="btn btn-success">
                        Join Now
                    </button>
               </form>
            @endauth
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection

