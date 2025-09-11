<?php
namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CompteValideMail extends Mailable
{
    use Queueable, SerializesModels;

    public $creator; 
    public function __construct(Creator $creator)
    {
        $this->creator = $creator; 
    }

    public function build()
    {
        return $this->subject('votre demande a ete valide')
                    ->view('emails.compte_valide')
                    ->with([
                        'creator' => $this->creator,
                    ]);
    }
}
