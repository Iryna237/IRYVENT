<?php
// app/Http/Controllers/PaymentController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Ticket;
use App\Models\Commande;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Str;

class PaymentController extends Controller
{
    public function checkout(Request $request)
    {
        // Valider les données
        $request->validate([
            'event_id' => 'required|exists:events,id',
            'ticket_id' => 'required|exists:tickets,id',
            'amount' => 'required|numeric',
            'email' => 'required|email',
        ]);

        // Récupérer l'événement et le ticket
        $event = Event::find($request->event_id);
        $ticket = Ticket::find($request->ticket_id);

        if (!$event || !$ticket) {
            return back()->with('error', 'Event or ticket not found.');
        }

        // Vérifier la disponibilité
        if ($ticket->quantity <= 0) {
            return back()->with('error', 'This ticket is sold out.');
        }

        // Générer une référence unique
        $reference = 'TICKET_' . Str::random(8) . '_' . time();

        // Créer la commande en statut pending
        $commande = Commande::create([
            'user_id' => auth()->id(),
            'event_id' => $event->id,
            'ticket_id' => $ticket->id,
            'ticket_type' => $ticket->type,
            'amount' => $request->amount,
            'currency' => 'XAF',
            'reference' => $reference,
            'statut' => 'pending',
            'quantity' => 1,
            'customer_email' => $request->email,
        ]);

        // Rediriger vers l'interface de paiement simulée
        return redirect()->route('payment.simulate', $commande->id);
    }

    public function simulatePayment($commandeId)
    {
        $commande = Commande::with(['event', 'ticket'])->findOrFail($commandeId);
        
        return view('simulate', compact('commande'));
    }

    public function processPayment(Request $request)
    {
        $request->validate([
            'commande_id' => 'required|exists:commandes,id',
            'phone_number' => 'nullable|string'
        ]);

        $commande = Commande::with(['event', 'ticket'])->find($request->commande_id);

        // SIMULATION : Marquer comme payé peu importe le numéro
        $commande->update([
            'statut' => 'confirmed',
            'phone_number' => $request->phone_number
        ]);

        // Réduire la quantité disponible
        $ticket = Ticket::find($commande->ticket_id);
        if ($ticket) {
            $ticket->decrement('quantity', 1);
        }

        // Générer le QR Code
        $qrCodeData = $this->generateQRCode($commande);

        // Envoyer l'email avec le ticket
        $this->sendTicketEmail($commande, $qrCodeData);

        return redirect()->route('payment.success')
            ->with('success', 'Payment successful! Your ticket has been sent to your email.')
            ->with('commande_id', $commande->id);
    }

    private function generateQRCode($commande)
    {
        $qrData = [
            'ticket_id' => $commande->id,
            'event' => $commande->event->title,
            'ticket_type' => $commande->ticket_type,
            'reference' => $commande->reference,
            'amount' => $commande->amount,
            'currency' => $commande->currency
        ];

        $qrContent = json_encode($qrData);
        
        // Générer le QR code en base64
        $qrCode = QrCode::format('png')->size(200)->generate($qrContent);
        $qrCodeBase64 = base64_encode($qrCode);

        return $qrCodeBase64;
    }

private function sendTicketEmail($commande, $qrCodeData)
{
    try {
        $emailData = [
            'commande' => $commande,
            'event' => $commande->event,
            'ticket' => $commande->ticket,
            'qrCode' => $qrCodeData // Assurez-vous que cette variable est bien passée
        ];

        Mail::send('emails.ticket', $emailData, function($message) use ($commande) {
            $message->to($commande->customer_email)
                    ->subject('Your Ticket for ' . $commande->event->title);
        });

        Log::info('Ticket email sent successfully', [
            'commande_id' => $commande->id, 
            'email' => $commande->customer_email
        ]);

    } catch (\Exception $e) {
        Log::error('Failed to send ticket email: ' . $e->getMessage());
        // Ne pas relancer l'exception pour éviter de bloquer le processus
    }
}
    public function success(Request $request)
    {
        $commande_id = session('commande_id');
        $commande = null;

        if ($commande_id) {
            $commande = Commande::with(['event', 'ticket'])->find($commande_id);
        }

        return view('buy_sucess', [
            'commande' => $commande,
            'success_message' => session('success')
        ]);
    }
}