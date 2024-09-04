@extends('layout.admin')

@section('content')
                   <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Galeri Paket Travel</h1>
                    <a href="{{route('gallery.create')}}" class="btn btn-primary">
                        <b>+</b> Tambah
                    </a>
                </div>

                <table class="table table-striped">
                    <thead>
                        <th>Nomor</th>
                        <th>Judul</th>
                        <th>Gambar</th>
                        <th>
                            
                        </th>
                    </thead>
                    <tbody>
                       @forelse ($items as $item)
                           <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$item->travel_packages->title}}</td>
                                <td>
                                    <img src="{{Storage::url($item->image)}}" alt="foto_travel" width="150px" class="img-thumbnail">
                                </td>
                                <td>
                                   <div class="dropdown">
                                        <div
                                                class="nav-link action-admin dropdown-toggle" id="navbardrop" data-toggle="dropdown">
                                                Aksi
                                        </div>
                                        <div class="dropdown-menu">
                                            
                                            <form action="{{ route('gallery.destroy', $item->id)}}" method="POST">
                                                @csrf
                                                @method('delete')
                                                    <button class="btn" style="width: 100%;" type="submit">
                                                        Hapus
                                                    </button>
                                            </form>
                                            <hr>
                                            <a href="{{route('gallery.edit', $item->id)}}">
                                               <button class="btn" style="width: 100%;">
                                                    Ubah
                                               </button>
                                            </a>
                                        </div>
                                        
                                   </div>
                                </td>
                           </tr>
                       @empty
                           
                       <tr>
                            <td>
                               Data Kosong 
                            </td>
                       </tr>
                           
                       @endforelse
                    </tbody>
                </table>
            </div>
            <!-- /.container-fluid -->
@endsection
