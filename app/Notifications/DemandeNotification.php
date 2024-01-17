<?php

namespace App\Notifications;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class DemandeNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    protected $demande;

    public function __construct($demande)
    {
        $this->demande = $demande;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail($notifiable)
    {
    // Récupérer l'utilisateur DAF lié à la même structure que l'affectation
    $user = User::where('email');

    if ($user) {
        return (new MailMessage())
            ->subject('Nouvelle demande')
            ->line('Une nouvelle demande a été enregistrée dans notre système.')
            ->line('Détails de l\'affectation:')
            ->line('Sujet: ' . $this->demande->sujet)
            ->line('Contenu: ' . $this->demande->contenu)
            ->line('Date d\'envoie: ' . $this->demande->created_at)
            ->line('Merci de votre collaboration !');
    } else {
        // Si aucun utilisateur CSAF lié à la structure n'a été trouvé, vous pouvez gérer cette situation en conséquence
        // Par exemple, vous pourriez envoyer la notification à un e-mail générique ou à l'administrateur.
        return null;
    }
}


    /* * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
