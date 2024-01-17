<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
class CustomNotification extends Notification
{
    use Queueable;
  protected $affectation;
    
        public function __construct($affectation)
        {
            $this->affectation = $affectation;
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
    /*public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }*/

  
       
        public function toMail($notifiable)
        {
                return (new MailMessage)
                    ->subject('Nouvelle affectation enregistrée')
                    ->line('Une nouvelle affectation a été enregistrée dans notre système.')
                    ->line('Détails de l\'affectation:')
                    ->line('Référence: ' . $this->affectation->materiels->reference)
                    ->line('Quantité affectée: ' . $this->affectation->quantite_affecte)
                    ->line('Structures: ' . $this->affectation->structures->nom)
                    ->line('Date d\'affectation: ' . $this->affectation->created_at)
                    ->line('Merci de votre collaboration !');
           
                // Si aucun utilisateur CSAF lié à la structure n'a été trouvé, vous pouvez gérer cette situation en conséquence
                // Par exemple, vous pourriez envoyer la notification à un e-mail générique ou à l'administrateur.
                return null;
            }
       

    /**
     * Get the array representation of the notification.
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
