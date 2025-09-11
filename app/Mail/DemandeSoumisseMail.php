<?php
namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Content;

class DemandeSoumisseMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user; // rendre la variable accessible dans la vue

    public function __construct(User $user)
    {
        $this->user = $user; // assigner correctement
    }

    public function build()
    {
        return $this->subject('Confirmation de votre demande')
                    ->view('emails.demande_soumise')
                    ->with([
                        'creator' => $this->user, // ✅ passer à la vue
                    ]);
    }
}
