<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use NotchPay\NotchPay;

class CheckoutController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric|min:100',
            'email' => 'required|email',
        ]);

        // Initialiser NotchPay
        NotchPay::setApiKey(env('NOTCHPAY_SECRET_KEY'));

        // Create a transaction
        $transaction = NotchPay::createTransaction([
            'amount' => $request->amount,       // Amount in FCFA
            'currency' => $request->currency ?? 'XAF',
            'email' => $request->email,
            'callback_url' => route('notchpay.callback'),
            'metadata' => [
                'user_id' => auth()->id(),
                'location' => $request->location ?? null,
            ],
        ]);

        // Retourner les infos pour le frontend
        return response()->json([
            'reference' => $transaction['reference'],
            'authorization_url' => $transaction['authorization_url'],
        ]);
    }


    public function callback(Request $request)
{
    // Vérifier l'événement
    $data = $request->all();

    // Ici tu peux vérifier le status et enregistrer dans ta base
    if($data['status'] === 'success'){
        // Exemple : marquer la commande comme payée
        // Order::where('reference', $data['reference'])->update(['status' => 'paid']);
    }

    return response()->json(['message' => 'Callback reçu']);
}

}



//AIzaSyBFy2K961KtG9I4cLr1hVF5vR_XzcCnhrg
