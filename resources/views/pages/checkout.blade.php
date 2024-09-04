@extends('layout.app')

@section('content')
       <!-- details -->
       <div class="details-package mt-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="details">
                        <h5>Trip to {{$item->travel_packages->title}}, {{$item->travel_packages->location}}</h5>
                        <h6>Member</h6>
                        <table class="table table-responsive-sm text-center">
                            <thead>
                                <tr>
                                    <td>Picture</td>
                                    <td>Name</td>
                                    <td>Nationality</td>
                                    <td>Visa</td>
                                    <td>Flight</td>
                                    <td>Passport</td>
                                    <td></td>
                                </tr>
                            </thead>
                            <tbody>
                               @forelse ($item->details as $detail)
                               <tr>
                                <td>
                                    <img src="https://ui-avatars.com/api/{{$detail->username}}" height="60" class="rounded-circle">
                                </td>
                                <td class="align-middle">
                                    {{$detail->username}}
                                </td>
                                <td class="align-middle">
                                    {{$detail->nationality}}
                                </td>
                                <td class="align-middle">
                                   {{$detail->is_visa ? '30 Days' : 'N/A'}}
                                </td>
                                <td class="align-middle">
                                   {{$detail->is_flight}}
                                </td>
                                <td class="align-middle">
                                    {{ \Carbon\Carbon::createFromDate($detail->doe_passport) > \Carbon\Carbon::now() ? 'Active': 'Inactive' }}
                                    
                                </td>
                                <td class="align-middle">
                                    <a href="{{route('checkout.remove', $detail->id)}}">
                                        <img src="{{url('front_end/assets/image/trash-fill.svg')}}" alt="">
                                    </a>
                                </td>
                            </tr>
                               @empty
                                   <tr>
                                        <td  colspan="6" class="text-center">No visitor</td>
                                   </tr>
                               @endforelse
                            </tbody>
                        </table>
                     
                        <div class="member mt-3">
                            <h5>Add Member</h5>
                            <form action="{{route('checkout.create',$item->id)}}" class="form-inline" method="POST">
                                @csrf
                                <div class="row mt-3">
                                    <div class="col-lg-6">
                                        <p>Username</p>
                                        <input type="text" name="username" class="form-control mb-2 mr-sm-2" id="username" placeholder="Username">

                                    </div>
                                    <div class="col-lg-6">
                                        <p>Nationality</p>
                                        <input type="text" required name="nationality" class="form-control mb-2 mr-sm-2" id="nationality" style="width:50px;" placeholder="nationality">

                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-lg-4">
                                        <p>Plane</p>
                                        <select name="is_flight" id="inputVisa" required class="custom-select mb-2 mr-sm-2">
                                            <option value="Visa" selected>
                                                FLIGHT
                                            </option>
                                            <option value="EKONOMI">
                                                EKONOMI
                                            </option>
                                            <option value="BISNIS">
                                                BISNIS
                                            </option>
                                            <option value="FIRST">
                                                FIRST
                                            </option>
                                            
                                        </select>
                                    </div>
                                    <div class="col-lg-4 ">
                                        <p>Visa</p>
                                        <select name="is_visa" id="inputVisa" required class="custom-select mb-2 mr-sm-2">
                                            <option value="Visa" selected>
                                                Visa
                                            </option>
                                            <option value="1">
                                                30 Days
                                            </option>
                                            <option value="0">
                                                N/A
                                            </option>
                                            
                                        </select>
                                    </div>
                                </div>
                                <p class="mt-3">Doe Passport</p>
                                <input type="date" name="doe_passport" class="form-control datepicker" id="doe_passport" placeholder="DOE Passport">
                                <button type="submit" class="btn btn-success mt-3" href="checkout.html">Add New</button>

                            </form>

                        </div>


                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="bill">
                        <h6>Checkout Information</h6>
                        <div class="row mt-3">
                            <div class="col text-start index">Members</div>
                            <div class="col text-end value">{{$item->details->count()}} Person</div>
                        </div>
                        <div class="row">
                            <div class="col text-start index">additional Visa</div>
                            <div class="col text-end value">$ {{$item->additional_visa}},00</div>
                        </div>
                        <div class="row">
                            <div class="col text-start index">Flight</div>
                            <div class="col text-end value">$ {{$item->additional_flight}},00</div>
                        </div>
                        <div class="row">
                            <div class="col text-start index">Packet price</div>
                            <div class="col text-end value">$ {{$item->travel_packages->price}},00 / Person</div>
                        </div>
                        <div class="row mt-3">
                            <div class="col text-start index">Total (Unique Code)</div>
                            <div class="col text-end value total">$ {{$item->transactions_total}}, <span class="text-orange">
                                {{mt_rand(0,99)}}
                               </span></div>
                        </div>
                        <hr>
                        <h6>Payment Instructions</h6>
                        <div class="row mt-3">
                            <div class="col-3">
                                <div class="payment-logo">
                                    <img src="{{url('front_end/assets/image/logo-bri.png')}}" alt="">
                                </div>
                            </div>
                            <div class="col-9">
                                <div class="payment-content">
                                    <h6>PT BRYAN TRAVEL GEMBIRA</h6>
                                    <h5>0981 1233 1231 2222</h5>
                                    <h5>Bank Rakyat Indonesia</h5>
                                </div>
                            </div>
                        </div>
                        <a class="btn btn-success mt-3r" href="{{route('checkout.success', $item->id)}}">Place Order</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br><br>
@endsection
