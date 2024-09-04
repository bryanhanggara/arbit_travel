@extends('layout.admin')

@section('content')
                   <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Tambah Galeri Paket Travel</h1>
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
                
                <form action="{{route('gallery.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                        <div class="form-group">
                            <label for="travel_packages_id">Nama Paket</label>
                            <select name="travel_packages_id" required class="form-control">
                                <option value="">Pilih Paket</option>
                                    @foreach ($travel_packages as $travel)
                                        <option value="{{$travel->id}}">
                                            {{$travel->title}}
                                        </option>
                                    @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="image">Gambar</label>
                            <input type="file" name="image" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-primary">
                            Simpan
                        </button>
                    
                </form>

                
            </div>
            <!-- /.container-fluid -->
@endsection
