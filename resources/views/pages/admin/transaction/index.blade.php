@extends('layout.admin')

@section('content')
                   <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Transaksi Paket Travel</h1>
                </div>

                <table class="table table-striped">
                    <thead>
                        <th>Nomor</th>
                        <th>ID</th>
                        <th>Paket Travel</th>
                        <th>Nama Pengguna</th>
                        <th>VISA</th>
                        <th>Total</th>
                        <th>Status</th>
                        
                        <th>
                            Action
                        </th>
                    </thead>
                    <tbody>
                       @forelse ($items as $item)
                           <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$item->id}}</td>
                                <td>{{$item->travel_packages->title}}</td>
                                <td>{{$item->user->name}}</td>
                                <td>{{$item->additional_visa}}</td>
                                <td>{{$item->transactions_total}}</td>
                                <td>{{$item->transactions_status}}</td>
                                <td>
                                   <div class="dropdown">
                                        <div
                                                class="nav-link action-admin dropdown-toggle" id="navbardrop" data-toggle="dropdown">
                                                Aksi
                                        </div>
                                        <div class="dropdown-menu">
                                            
                                            <form action="{{ route('transaction.destroy', $item->id)}}" method="POST">
                                                @csrf
                                                @method('delete')
                                                    <button class="btn" style="width: 100%;" type="submit">
                                                        Hapus
                                                    </button>
                                            </form>
                                            <hr>
                                            <a href="{{route('transaction.edit', $item->id)}}">
                                               <button class="btn" style="width: 100%;">
                                                    Ubah
                                               </button>
                                            </a>
                                            <a href="{{route('transaction.show', $item->id)}}">
                                                <button class="btn" style="width: 100%;">
                                                     Detail
                                                </button>
                                             </a>
                                        </div>
                                        
                                   </div>
                                </td>
                           </tr>
                       @empty
                           
                       <tr>
                            <td colspan="7" class="text-center">
                               Data Kosong 
                            </td>
                       </tr>
                           
                       @endforelse
                    </tbody>
                </table>
            </div>
            <!-- /.container-fluid -->
@endsection
