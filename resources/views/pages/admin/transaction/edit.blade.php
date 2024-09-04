@extends('layout.admin')

@section('content')
                   <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Ubah Galeri Paket Travel</h1>
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
                
                <form action="{{route('transaction.update', $item->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                        <div class="form-group">
                            <label for="transactions_status">Status</label>
                            <select name="transactions_status"  required class="form-control">
                                <option value="{{$item->transactions_status}}">Jangan Ubah ( {{ $item->transactions_status }} )</option>
                                <option value="IN_CART">In Cart</option>
                                <option value="PENDING">Pending</option>
                                <option value="SUCCESS">Sukses</option>
                                <option value="CANCEL">Cancel</option>
                                <option value="FAILED">Failed</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">
                            Simpan
                        </button>
                    
                </form>

                
            </div>
            <!-- /.container-fluid -->
@endsection
