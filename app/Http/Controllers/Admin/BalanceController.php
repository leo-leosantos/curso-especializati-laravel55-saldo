<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\MoneyValidationFormRequest;
use App\Models\Balance;
use App\User;

class BalanceController extends Controller
{
    public function index()
    {
        $balance = auth()->user()->balance;
        $amount = $balance ? $balance->amount : 0;
        return view('admin.balance.index', compact('amount'));
    }

    public function deposit()
    {
        return view('admin.balance.deposit');
    }


    public function depositStore(MoneyValidationFormRequest $request)
    {
        $value = $request->value;

        $balance = auth()->user()->balance()->firstOrCreate([]);
        $response = $balance->deposit($value);


        if ($response['success']) {
            return  redirect()->route('balance.index')->with('success', $response['message']);
        }

        return redirect()->back()->with('error', $response['message']);
    }



    public function  withdraw()
    {
        return view('admin.balance.withdraw');
    }

    public function withdrawStore(MoneyValidationFormRequest $request)
    {

        $value = $request->value;

        $balance = auth()->user()->balance()->firstOrCreate([]);
        $response = $balance->withdraw($value);


        if ($response['success']) {
            return  redirect()->route('balance.index')->with('success', $response['message']);
        }

        return redirect()->back()->with('error', $response['message']);
    }


    public  function transfer()
    {
        return view('admin.balance.transfer');
    }
    public  function confirmtransfer(Request $request, User $user)
    {


        if (!$sender = $user->getSender($request->sender)) {
            return redirect()->back()->with('error', 'Usuário informado nao encontrado');
        }
        if ($sender->id === auth()->user()->id) {
            return redirect()->back()->with('error', 'Você não pode transferir para você mesmo!!');
        }

        return view('admin.balance.transfer-confirm', compact('sender'));
    }


    public function confirmTransferStore( Request $request)
    {
        dd($request->all());
    }
}
