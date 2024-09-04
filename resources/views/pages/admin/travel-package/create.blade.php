@extends('layout.admin')

@section('content')
                   <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Tambah Paket Travel</h1>
                </div>

                @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Ups!</strong> Input kamu ada yang salah ni.
                    <ul>
                        @foreach ($errors->all() as $err)
                            <li>{{$err}}</li>
                        @endforeach
                    </ul>
                </div>
                
            @endif
                
                <form action="{{route('travel-package.store')}}" method="POST">
                    @csrf
                    
                        <div class="form-group">
                            <label for="title">
                                Judul
                            </label>
                            <input type="text" name="title" class="form-control" placeholder="Judul" value="{{old('title')}}">
                        </div>
                        <div class="form-group">
                            <label for="location">
                                Lokasi
                            </label>
                            <input type="text" name="location" class="form-control" placeholder="Lokasi" value="{{old('location')}}">
                        </div>
                       <div class="form-group">
                            <label for="title">
                                Judul
                            </label>
                            <textarea name="about" placeholder="Tentang" class="d-block w-100 form-control" rows="10">{{old('about')}}</textarea>
                       </div>
                       <div class="form-group">
                            <label for="featured_even">
                                Event
                            </label>
                            <input type="text" name="featured_even" class="form-control" placeholder="event" value="{{old('featured_even')}}">
                        </div>
                        <div class="form-group">
                            <label for="language">
                                Bahasa
                            </label>
                            <input type="text" name="language" class="form-control" placeholder="Bahasa" value="{{old('language')}}">
                        </div>
                        <div class="form-group">
                            <label for="foods">
                                Makanan Khas
                            </label>
                            <input type="text" name="foods" class="form-control" placeholder="Makanan Khas" value="{{old('foods')}}">
                        </div>
                        <div class="form-group">
                            <label for="departure_date">
                                Tanggal
                            </label>
                            <input type="date" name="departure_date" class="form-control" placeholder="Tanggal" value="{{old('departure_date')}}">
                        </div>
                        <div class="form-group">
                            <label for="duration">
                                Durasi
                            </label>
                            <input type="text" name="duration" class="form-control" placeholder="Durasi" value="{{old('duration')}}">
                        </div>
                        <div class="form-group">
                            <label for="type">
                                Tipe Trip
                            </label>
                            <input type="text" name="type" class="form-control" placeholder="Tipe Trip" value="{{old('type')}}">
                        </div>
                        <div class="form-group">
                            <label for="price">
                                Harga
                            </label>
                            <input type="number" name="price" class="form-control" placeholder="Harga" value="{{old('price')}}">
                        </div>
                        


                        <button type="submit" class="btn btn-primary">
                            Simpan
                        </button>
                    
                </form>

                
            </div>
            <!-- /.container-fluid -->
@endsection
