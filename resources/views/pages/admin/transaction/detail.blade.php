@extends('layout.admin')

@section('content')
                   <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Detail Transaksi Travel</h1>
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
                
            <table class="table table-bordered">
               <tr>
                    <th>ID</th>
                    <td>{{$items->id}}</td>
               </tr>
               <tr>
                    <th>Paket Travel</th>
                    <td>{{$items->travel_packages->title}}</td>
               </tr>
               <tr>
                    <th>Pembeli</th>
                    <td>{{$items->user->name}}</td>
               </tr>
                <tr>
                    <th>Additional Visa</th>
                    <td>{{$items->additional_visa}}</td>
               </tr>
                <tr>
                    <th>Total Transaksi</th>
                    <td>{{$items->transactions_total}}</td>
               </tr>
                <tr>
                    <th>Status</th>
                    <td>{{$items->transactions_status}}</td>
               </tr>
               <tr>
                    <th>Pembelian</th>
                    <td>
                        <table class="table table-bordered">
                            <tr>
                                <th>Nama</th>
                                <th>Nasional</th>
                                <th>VISA</th>
                                <th>DOE Passport</th>
                            </tr>
                            @foreach ($items->details as $item)
                                <tr>
                                    <td>{{$item->id}}</td>
                                    <td>{{$item->username}}</td>
                                    <td>{{$item->nationality}}</td>
                                    <td>{{$item->is_visa ? '30 Days' : 'N/A'}}</td>
                                    <td>{{$item->doe_passport}}</td>
                                </tr>
                            @endforeach
                        </table>
                    </td>
               </tr>
            </table>
                
            </div>
            <!-- /.container-fluid -->
@endsection
