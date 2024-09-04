<?php

namespace App\Http\Controllers;

use Mail;
use App\Mail\TransactionSuccess;
use Illuminate\Http\Request;
use App\Models\travelPackage;
use App\Models\Transaction;
use App\Models\TransactionsDetails;
use App\Models\User;

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

use Midtrans\Config;
use Midtrans\Snap;


class CheckoutController extends Controller
{
    public function index(Request $request, $id) 
    {
        $item = Transaction::with(['details','travel_packages','user'])->findOrFail($id);
        return view('pages.checkout',[
            'item' => $item
        ]);
    }

    public function proccess(Request $request, $id)
    {
        $travel_package =  travelPackage::findorfail($id);

        $transaction = Transaction::create([
            'travel_packages_id' => $id,
            'users_id' => Auth::user()->id,
            'additional_visa' => 0,
            'additional_flight' => 0,
            'transactions_total' => $travel_package->price,
            'transactions_status' => 'IN_CART',
        ]);

        TransactionsDetails::create([
            'transactions_id' => $transaction->id,
            'username'=>Auth::user()->username,
            'nationality' => 'ID',
            'is_visa' => false,
            'is_flight' => 0,
            'doe_passport' => Carbon::now()->addYears(5),
        ]);

        return redirect()->route('checkout', $transaction->id);
    }

    public function remove(Request $request, $detail_id)
    {
        $item = TransactionsDetails::findorfail($detail_id);

        $transaction = Transaction::with(['details','travel_packages'])->findOrFail($item->transactions_id);

        if($item->is_visa)
        {
            $transaction->transactions_total -= 190;
            $transaction->additional_visa -= 190;
        }

        switch ($item->is_flight) {
            case 'FIRST':
                $transaction->transactions_total -= 290;
                $transaction->additional_flight -= 290; // Harga business class
                break;
            case 'BISNIS':
                $transaction->transactions_total -= 100;
                $transaction->additional_flight -= 100; // Harga first class
                break;
            case 'EKONOMI':
            default:
                $transaction->transactions_total -= 50;
                $transaction->additional_flight -= 50; // Harga economy class
                break;
        }

        $transaction->transactions_total -= $transaction->travel_packages->price;
        $transaction->save();

        $item->delete();

        return redirect()->route('checkout', $item->transactions_id);
    }

    public function create(Request $request, $id)
    {
        $request->validate([
            'username'=> 'required|string|exists:users,username',
            'is_visa' => 'required|boolean',
            'is_flight' => 'required|string',
            'doe_passport' => 'required',
        ]);

        $data = $request->all();
        $data['transactions_id'] = $id;

        TransactionsDetails::create($data);

        $transaction = Transaction::with(['travel_packages'])->find($id);

        if($request->is_visa)
        {
            $transaction->transactions_total += 190;
            $transaction->additional_visa += 190;
        }

        switch ($request->is_flight) {
            case 'FIRST':
                $transaction->transactions_total += 290;
                $transaction->additional_flight += 290; // Harga business class
                break;
            case 'BISNIS':
                $transaction->transactions_total += 100;
                $transaction->additional_flight += 100; // Harga first class
                break;
            case 'EKONOMI':
            default:
                $transaction->transactions_total += 50;
                $transaction->additional_flight += 50; // Harga economy class
                break;
        }


        $transaction->transactions_total += $transaction->travel_packages->price;
        $transaction->save();

        return redirect()->route('checkout',$id);
    }

    public function success(Request $request , $id)
    {
        $transaction = Transaction::
            with(['details','travel_packages.galleries','user'])
            ->findorfail($id);
        $transaction->transactions_status = 'PENDING';

        $transaction->save();

        Mail::to($transaction->user)->send(
            new TransactionSuccess($transaction)
        );
        return view('pages.success');
    }
}
