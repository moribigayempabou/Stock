<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{

// ...

public function csafindex()
{
    // Obtenez l'utilisateur actuellement connecté
    
            $notifications = Notification::all();

            return view('CSAF.notifications.index', compact( 'notifications'));
        }
 
public function unreadCount(Request $request)
    {
        // Obtenez le nombre de notifications non lues, par exemple, en comptant les notifications dans votre base de données
        $unreadCount = Notification::where('read', 0)->count();

        // Retournez le résultat au format JSON, vous pouvez également renvoyer d'autres formats si nécessaire
        return response()->json(['count' => $unreadCount]);
    }

}
