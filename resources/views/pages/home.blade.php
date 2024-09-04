@extends('layout.app')

@section('content')
        <!-- Header -->
        <div class="header-one">
          <div class="container mt-2">
              <div class="card">
                  <img src="{{url('front_end/assets/image/header-sea.png')}}" class="card-img" alt="header">
                  <div class="vignette"></div>
                  <div class="card-img-overlay">
                      <div class="header-title">
                          <h2 class="motto">Dreams To Flight<br>Effortless Bookings Delight</h2>
                          <p class="sub-motto">Enjoy the breathtaking view of the nature. Relax and cherish your dreams to
                              the fullest</p>
                      </div>
                      <div class="header-status">
                          <div class="row g-lg-0">
                              <div class="col col-lg-3 col-md-6 col-sm-6 ">
                                  <ion-icon name="person-outline"></ion-icon>
                                  <div class="status">
                                      <h6 class="grey">Members</h6>
                                      <h6 class="black">24k Active</h6>
                                  </div>
                                  </div>
                              <div class="col col-lg-3 col-md-6 col-sm-6 ">
                                  <ion-icon name="location-outline"></ion-icon>
                                  <div class="status">
                                      <h6 class="grey">Destinations</h6>
                                      <h6 class="black">1.2k Places</h6>
                                  </div>
                              </div>
                              <div class="col col-lg-3 col-md-6 col-sm-6 ">
                                  <ion-icon name="star-outline"></ion-icon>
                                  <div class="status">
                                      <h6 class="grey">Rating Website</h6>
                                      <h6 class="black">4.9+ Rating</h6>
                                  </div>
                              </div>
                              <div class="col col-lg-3 col-md-6 col-sm-6 ">
                                  <ion-icon name="layers-outline"></ion-icon>
                                  <div class="status">
                                      <h6 class="grey">Partners</h6>
                                      <h6 class="black"> 500+ Mitra</h6>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  
  
      <!-- Package -->
      <div class="package">
          <div class=" container mt-5">
              <div class="title row">
                  <h3 class="col">Popular Destinations</h3>
                  <a class="col text-end me-2 mt-2" href="{{route('more.index')}}">See more</a>
              </div>
              <!-- CAROUSEL ONLY FOR DESKTOP -->
              <div id="package" class="carousel slide tablet-off mobile-off">
                  <div class="carousel-inner">
                      <div class="carousel-item active">
                          <div class="row">
                              <!-- Card 1 -->
                             @foreach ($items as $item)
                             <div class="col-md-3">
                              <div class="card border-0">
                                  <a href="detail.html"><img src="{{$item->galleries->count() ? Storage::url($item->galleries->first()->image) :'' }}" class="card-img-top "
                                          alt="..."></a>
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
                                              <h6><ion-icon name="calendar-number-outline"></ion-icon> Jul 2-7</h6>
                                          </div>
                                      </div>
                                      <div class="card-buy row mt-2">
                                          <div class="col"><b>$ {{$item->price}}</b>
                                              <h6>/Night</h6>
                                          </div>
                                          <div class="col-6"><a href="{{route('detail', $item->slug)}}" class="btn btn-dark ms-xl-5">Details</a>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                             @endforeach
                          </div>
                      </div>
                  </div>
                  <button class="carousel-control-prev" type="button" data-bs-target="#package" data-bs-slide="prev">
                      <ion-icon name="chevron-back-outline"></ion-icon>
                  </button>
                  <button class="carousel-control-next" type="button" data-bs-target="#package" data-bs-slide="next">
                      <ion-icon name="chevron-forward-outline"></ion-icon>
                  </button>
              </div>
              <!-- CAROUSEL FOR TABLET -->
              <div id="packageTablet" class="carousel slide mobile-off">
                  <div class="carousel-inner">
                      <div class="carousel-item active">
                          <div class="row">
                              <!-- Card 1 -->
                             @foreach ($items_pad as $item)
                             <div class="col-md-4">
                                 
                              <div class="card border-0">
                                <a href="detail.html"><img src="{{$item->galleries->count() ? Storage::url($item->galleries->first()->image) :'' }}" class="card-img-top "
                                        alt="..."></a>
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
                                            <h6><ion-icon name="calendar-number-outline"></ion-icon> Jul 2-7</h6>
                                        </div>
                                    </div>
                                    <div class="card-buy row mt-2">
                                        <div class="col"><b>$ {{$item->price}}</b>
                                            <h6>/Night</h6>
                                        </div>
                                        <div class="col-6"><a href="{{route('detail', $item->slug)}}" class="btn btn-dark ms-xl-5">Details</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                          </div>
                             @endforeach
                          </div>
                      </div>
                      <div class="carousel-item">
                        <div class="row">
                            <!-- Card 1 -->
                           @foreach ($items_pad_next as $item)
                           <div class="col-4">
                            <div class="card border-0">
                                <a href="detail.html"><img src="{{$item->galleries->count() ? Storage::url($item->galleries->first()->image) :'' }}" class="card-img-top "
                                        alt="..."></a>
                                <div class="card-body">
                                    <h5 class="card-title">{{$item->title}}</h5>
                                    <div class="card-status row g-0">
                                        <div class="col text-start">
                                            <h6><ion-icon name="star-outline"></ion-icon> 4.5 Rating</h6>
                                        </div>
                                        <div class="col text-center">
                                            <h6><ion-icon name="paper-plane-outline"></ion-icon> Bekasi</h6>
                                        </div>
                                        <div class="col text-end">
                                            <h6><ion-icon name="calendar-number-outline"></ion-icon> Jul 2-7</h6>
                                        </div>
                                    </div>
                                    <div class="card-buy row mt-2">
                                        <div class="col"><b>Rp.2,5 Juta</b>
                                            <h6>/malam</h6>
                                        </div>
                                        <div class="col-6"><a href="{{route('detail', $item->slug)}}" class="btn btn-dark ms-xl-5">Details</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                           @endforeach
                        </div>
                    </div>
                  </div>
                  <button class="carousel-control-prev" type="button" data-bs-target="#packageTablet"
                      data-bs-slide="prev">
                      <ion-icon name="chevron-back-outline"></ion-icon>
                  </button>
                  <button class="carousel-control-next" type="button" data-bs-target="#packageTablet"
                      data-bs-slide="next">
                      <ion-icon name="chevron-forward-outline"></ion-icon>
                  </button>
              </div>
                 <!-- CAROUSEL FOR MOBILE -->
            <div id="packageMobile" class="carousel slide tablet-off">
              <div class="carousel-inner">
                  <div class="carousel-item active">
                      <div class="row">
                          <!-- Card 1 -->
                          @foreach ($items_mob as $item)
                          <div class="col-6">
                            <div class="card border-0">
                                <a href="detail.html"><img src="{{$item->galleries->count() ? Storage::url($item->galleries->first()->image) :'' }}" class="card-img-top "
                                        alt="..."></a>
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
                                            <h6><ion-icon name="calendar-number-outline"></ion-icon> Jul 2-7</h6>
                                        </div>
                                    </div>
                                    <div class="card-buy row mt-2">
                                        <div class="col"><b>$ {{$item->price}}</b>
                                            <h6>/Night</h6>
                                        </div>
                                        <div class="col-6"><a href="{{route('detail', $item->slug)}}" class="btn btn-dark ms-xl-5">Details</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                          @endforeach
                      </div>
                  </div>
                  <div class="carousel-item">
                      <div class="row">
                          <!-- Card 1 -->
                          @foreach ($items_mob_next as $item)
                          <div class="col-6">
                            <div class="card border-0">
                                <a href="detail.html"><img src="{{$item->galleries->count() ? Storage::url($item->galleries->first()->image) :'' }}" class="card-img-top "
                                        alt="..."></a>
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
                                            <h6><ion-icon name="calendar-number-outline"></ion-icon> Jul 2-7</h6>
                                        </div>
                                    </div>
                                    <div class="card-buy row mt-2">
                                        <div class="col"><b>$ {{$item->price}}</b>
                                            <h6>/Night</h6>
                                        </div>
                                        <div class="col-6"><a href="{{route('detail', $item->slug)}}" class="btn btn-dark ms-xl-5">Details</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                          @endforeach
                      </div>
                    </div>
              </div>
              <button class="carousel-control-prev" type="button" data-bs-target="#packageMobile"
                  data-bs-slide="prev">
                  <ion-icon name="chevron-back-outline"></ion-icon>
              </button>
              <button class="carousel-control-next" type="button" data-bs-target="#packageMobile"
                  data-bs-slide="next">
                  <ion-icon name="chevron-forward-outline"></ion-icon>
              </button>
          </div>
          </div>
      </div>
  
       <!-- About -->
        <div class="about-us">
            <div class="container text-center">
                <h3>Why Choose Us?</h3>
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <div class="cards">
                            <img src="{{url('front_end/assets/image/expertly.png')}}" alt="">
                            <h6>Expertly Curated Journeys</h6>
                            <p>We enthusiasts meticulously designs each journey, ensuring a perfect
                                blend of adventure, culture, and relaxation.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <div class="cards">
                            <img src="{{url('front_end/assets/image/affordable.png')}}" alt="">
                            <h6>Affordable and Value-Packed</h6>
                            <p>We offer value-packed packages that allow you to explore the world without breaking the bank.
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <div class="cards">
                            <img src="{{url('front_end/assets/image/seamless.png')}}" alt="">
                            <h6>Seamless and Hassle-Free</h6>
                            <p>We takes care of all the details, from booking accommodations and transportation to
                                organizing guided tours.</p>
                        </div>
                    </div>
                </div>

            </div>

        </div>

        <!-- gallery -->
        <div class="gallery">
            <div class="container">
                <h3 class="text-center">Gallery</h3>
                <div class="row mt-5">
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="wrapper-image-potrait">
                            <img src="{{url('front_end/assets/image/asset 5.jpg')}}" alt="">
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="wrapper-image-potrait">
                            <img src="{{url('front_end/assets/image/asset 6.jpg')}}" alt="">
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 ">
                        <div class="wrapper-image-potrait mobile-off">
                            <img src="{{url('front_end/assets/image/asset 6.jpg')}}" alt="">
                        </div>
                    </div>
                    <div class="col-lg-3 tablet-off mobile-off">
                        <div class="wrapper-image-potrait">
                            <img src="{{url('front_end/assets/image/asset 4.jpg')}}" alt="">
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-lg-4 col-sm-6">
                        <div class="wrapper-image-landscape">
                            <iframe width="560" height="315" src="https://www.youtube.com/embed/tRxagnoYPoM?si=dwS1_TuuQmggwaTm" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <div class="wrapper-image-landscape">
                            <iframe width="560" height="315" src="https://www.youtube.com/embed/qnXcB5L97MI?si=HioyAaNJQE5qATxj" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                        </div>
                    </div>
                    <div class="col-lg-4 mobile-off tablet-off">
                        <div class="wrapper-image-landscape">
                            <iframe width="560" height="315" src="https://www.youtube.com/embed/tRxagnoYPoM?si=dwS1_TuuQmggwaTm" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
            </div>
    
        </div>
  
      <br>
      <!-- partner logo -->
      <div class="container mt-5">
          <div class="slider">
              <div class="slider-track">
                  <div class="slide">
                      <img src="{{url('front_end/assets/image/icon/pesona.png')}}" alt="">
                  </div>
                  <div class="slide">
                      <img src="{{url('front_end/assets/image/icon/etihad.png')}}" alt="">
                  </div>
                  <div class="slide">
                      <img src="{{url('front_end/assets/image/icon/garuda.png')}}" alt="">
                  </div>
                  <div class="slide">
                      <img src="{{url('front_end/assets/image/icon/citilink.png')}}" alt="">
                  </div>
                  <div class="slide">
                      <img src="{{url('front_end/assets/image/icon/bca.png')}}" alt="">
                  </div>
                  <div class="slide">
                      <img src="{{url('front_end/assets/image/icon/bri.png')}}" alt="">
                  </div>
                  <div class="slide">
                    <img src="{{url('front_end/assets/image/icon/pesona.png')}}" alt="">
                  </div>
                  <!--  -->
                  <div class="slide">
                    <img src="{{url('front_end/assets/image/icon/booking.jpg')}}" alt="">
                  </div>
                  <div class="slide">
                    <img src="{{url('front_end/assets/image/icon/pesona.png')}}" alt="">
                </div>
              </div>
          </div>
      </div>
  
      <!-- reviews -->
      <div class="review">
          <div class="container mt-5">
              <div class="row g-5 tablet-off mobile-off">
                  <div class="col-lg-4 col-sm-6">
                      <div class="card">
                          <div class="card-body">
                              <h6 class="card-text">"This is a wider card with supporting text below as a natural lead-in
                                  to additional content."</h6>
                              <ion-icon name="star"></ion-icon><ion-icon name="star"></ion-icon><ion-icon
                                  name="star"></ion-icon><ion-icon name="star"></ion-icon><ion-icon
                                  name="star-half"></ion-icon>
                              <div class="profile d-flex mt-3">
                                  <div class="photo">
                                      <img src="{{url('front_end/assets/image/profile.png')}}" alt="">
                                  </div>
                                  <div class="ms-3">
                                      <h6 class="name">Pebria</h6>
                                      <h6 class="location">Jambi, Indonesia</h6>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="col-lg-4 col-sm-6">
                      <div class="card">
                          <div class="card-body">
                              <h6 class="card-text">"This is a wider card with supporting text below as a natural lead-in
                                  to
                                  additional content."</h6>
                              <ion-icon name="star"></ion-icon><ion-icon name="star"></ion-icon><ion-icon
                                  name="star"></ion-icon><ion-icon name="star"></ion-icon><ion-icon
                                  name="star-half"></ion-icon>
                              <div class="profile d-flex mt-3">
                                  <div class="photo">
                                      <img src="{{url('front_end/assets/image/profile.png')}}" alt="">
                                  </div>
                                  <div class="ms-3">
                                      <h6 class="name">Lohan</h6>
                                      <h6 class="location">Jakarta, Indonesia</h6>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="col-lg-4 col-sm-8">
                      <div class="card">
                          <div class="card-body">
                              <h6 class="card-text">"This is a wider card with supporting text below as a natural lead-in
                                  to
                                  additional content."</h6>
                              <ion-icon name="star"></ion-icon><ion-icon name="star"></ion-icon><ion-icon
                                  name="star"></ion-icon><ion-icon name="star"></ion-icon><ion-icon
                                  name="star-outline"></ion-icon>
                              <div class="profile d-flex mt-3">
                                  <div class="photo">
                                      <img src="{{url('front_end/assets/image/profile.png')}}" alt="">
                                  </div>
                                  <div class="ms-3">
                                      <h6 class="name">Ribery</h6>
                                      <h6 class="location">Berlin, German</h6>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
              
              <!--mobile view-->
              <div id="reviewMobile" class="carousel slide">
                  <div class="carousel-inner">
                      <div class="carousel-item active">
                          <div class="row">
                              <!-- Card 1 -->
                              <div class="col-6">
                                  <div class="card">
                                      <div class="card-body">
                                          <h6 class="card-text">"This is a wider card with supporting text below as a
                                              natural lead-in
                                              to additional content."</h6>
                                          <ion-icon name="star"></ion-icon><ion-icon name="star"></ion-icon><ion-icon
                                              name="star"></ion-icon><ion-icon name="star"></ion-icon><ion-icon
                                              name="star-half"></ion-icon>
                                          <div class="profile d-flex mt-3">
                                              <div class="photo">
                                                  <img src="assets/image/profile.png" alt="">
                                              </div>
                                              <div class="ms-3">
                                                  <h6 class="name">Rihan</h6>
                                                  <h6 class="location">Jambi, Indonesia</h6>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                              <!-- Card 2 -->
                              <div class="col-6">
                                  <div class="card">
                                      <div class="card-body">
                                          <h6 class="card-text">"This is a wider card with supporting text below as a
                                              natural lead-in
                                              to
                                              additional content."</h6>
                                          <ion-icon name="star"></ion-icon><ion-icon name="star"></ion-icon><ion-icon
                                              name="star"></ion-icon><ion-icon name="star"></ion-icon><ion-icon
                                              name="star-half"></ion-icon>
                                          <div class="profile d-flex mt-3">
                                              <div class="photo">
                                                  <img src="assets/image/profile.png" alt="">
                                              </div>
                                              <div class="ms-3">
                                                  <h6 class="name">Lohan</h6>
                                                  <h6 class="location">Jakarta, Indonesia</h6>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="carousel-item">
                          <div class="row">
                              <!-- Card 1 -->
                              <div class="col-6">
                                  <div class="card">
                                      <div class="card-body">
                                          <h6 class="card-text">"This is a wider card with supporting text below as a
                                              natural lead-in
                                              to
                                              additional content."</h6>
                                          <ion-icon name="star"></ion-icon><ion-icon name="star"></ion-icon><ion-icon
                                              name="star"></ion-icon><ion-icon name="star"></ion-icon><ion-icon
                                              name="star-outline"></ion-icon>
                                          <div class="profile d-flex mt-3">
                                              <div class="photo">
                                                  <img src="assets/image/profile.png" alt="">
                                              </div>
                                              <div class="ms-3">
                                                  <h6 class="name">Ribery</h6>
                                                  <h6 class="location">Berlin, German</h6>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                              <!-- Card 2 -->
                              <div class="col-6">
  
                              </div>
                          </div>
                      </div>
                  </div>
                  <button class="carousel-control-prev" type="button" data-bs-target="#reviewMobile" data-bs-slide="prev">
                      <ion-icon name="chevron-back-outline"></ion-icon>
                  </button>
                  <button class="carousel-control-next" type="button" data-bs-target="#reviewMobile" data-bs-slide="next">
                      <ion-icon name="chevron-forward-outline"></ion-icon>
                  </button>
              </div>
          </div>
      </div>
  
      <!-- CTA -->
      <div class="CTA mt-5">
          <div class="container">
              <div>
                  <h5 class="CTA-title">Discover the Beauty of Nature with Us</h5>
                  <p class="CTA-text">Affordable Adventures in Nature, Just a Click Away. Book Now!</p>
              </div>
              <form action="">
                  <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Enter your email">
                  <a href="#" class="btn btn-dark d-inline-block">Signup</a>
              </form>
          </div>
      </div>
  
@endsection