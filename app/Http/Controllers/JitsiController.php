<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Meeting;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\View;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;

class JitsiController extends Controller
{
    public $meeting;
   

   public function create()
   {
       $meeting = new Meeting();   
       return view('meetings',compact('meeting'));
   }


    public function store(Request $request)
    {
        // Valider le formulaire ici...

        // Enregistrez les données dans la base de données
        $meeting = Meeting::create([
            'title' => $request->input('title'),
            'participants' => $request->input('participants'),
            'description' => $request->input('description'),
            'start_date' => $request->input('start_date'),
        ]);

        // Envoyez les données à l'API de Jitsi
         $this->createJitsiMeeting($meeting);
         

       
        // return View::make('meetings', ['meeting' => $meeting])
        //     ->with('message', 'Réunion créée avec succès!');

        // ... in the store method
        
       return redirect()->route('tables')->with('message', 'Réunion créée avec succès!');

    
    }




    private function createJitsiMeeting(Meeting $meeting)
    {
        $jitsiApiUrl = env('JITSI_API_URL', ''); // Remplacez par l'URL de l'API Jitsi
        $jitsiApiKey = env('JITSI_API_KEY', ''); // Remplacez par votre clé API Jitsi
        $jitsiApiSecret = env('JITSI_API_SECRET', ''); // Remplacez par votre secret API Jitsi

        $client = new Client();

        try {
            // Envoyez les données à l'API de Jitsi
            $response = $client->post($jitsiApiUrl, [
                'headers' => [
                    'Content-Type' => 'application/json',
                ],
                'json' => [
                    'title' => $meeting->title,
                    'participants' => $meeting->participants,
                    'description' => $meeting->description,
                    'start_date' => $meeting->start_date,
                    // Ajoutez d'autres données nécessaires pour votre API Jitsi
                ],
            ]);

            // Traitez la réponse de l'API Jitsi ici...
            Log::info('Réunion Jitsi créée avec succès : ' . $response->getBody());
        } catch (\Exception $e) {
            Log::error('Erreur lors de la création d\'une réunion Jitsi : ' . $e->getMessage());
        }
    }

    // document.getElementById("show-meeting-form").addEventListener("click", function() {
    //     document.getElementById("meeting-form").style.display = "block";
    // });



    
    // ... other code
    
    public function index()
    {
        $meetings = Meeting::all(); // Adjust pagination limit as needed
        return (view('tables', ['meetings' => $meetings]));
    }
    
  // JitsiController.php



  public function joinMeeting($id)
  {
      // Implémentez la logique pour récupérer les détails de la réunion en fonction de l'ID
      $meeting = Meeting::find($id);

      // Vérifiez si la réunion existe
      if (!$meeting) {
          abort(404); // Ou gérez l'absence de réunion d'une manière appropriée
      }

      // Redirigez l'utilisateur vers la vue meetings avec les détails de la réunion
      return view('meetings', ['meeting' => $meeting]);
  }


  public function destroy($id)
  {
      $meeting = Meeting::findOrFail($id);
      $meeting->delete();
  
      return redirect()->route('tables')->with('success', 'Meeting supprimé avec succès!');
  }
  
  
  public function getMeetings()
  {
      $meetings = Meeting::select(['title', 'participants', 'description', 'start_date', 'id']);
  
      return datatables()->of($meetings)
          ->addColumn('action', function ($meeting) {
              return '<a href="' . route('join.meeting', $meeting->id) . '" class="btn btn-primary">Voir</a>
                      <a href="' . route('meeting.edit', $meeting->id) . '" class="btn btn-warning edit-meeting">Modifier</a>
                      <a href="' . route('meeting.delete', $meeting->id) . '" class="btn btn-danger delete-meeting">Supprimer</a>';
          })
          ->rawColumns(['action'])
          ->make(true);
  }

  public function edit($id)
{
    $meeting = Meeting::find($id);

    if (!$meeting) {
        abort(404); // Ou gérez l'absence de réunion d'une manière appropriée
    }

    return view('edit-meeting', ['meeting' => $meeting]);
}

public function update(Request $request, $id)
{
    $meeting = Meeting::findOrFail($id);

    // Valider les données du formulaire ici...

    $meeting->update([
        'title' => $request->input('title'),
        'participants' => $request->input('participants'),
        'description' => $request->input('description'),
        'start_date' => \Carbon\Carbon::parse($request->input('start_date')), // Convertir en objet Carbon
    ]);

    return redirect()->route('tables')->with('success', 'Meeting mis à jour avec succès!');
}




}
