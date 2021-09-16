<?php

   namespace App\Models;

   use Illuminate\Database\Eloquent\Builder;
   use Illuminate\Database\Eloquent\Factories\HasFactory;
   use Illuminate\Database\Eloquent\Model;
   use Illuminate\Support\Facades\DB;
   use Illuminate\Support\Facades\Hash;


   /**
    * @method static isLogged(string $email, string $password)
    * @method static registrazione(array $data)
    * @method static getProfileLink(int $utente_id)
    * @method static getNomeCognome(int $utente_id)
    * @property string email
    * @property string password
    * @property string nome
    * @property string cognome
    * @property int citta_id
    * @property int id
    */
   class Utente extends Model {

      use HasFactory;

      protected $table = 'Utente';
      public $timestamps = true;


      public function scopeIsLogged(Builder $query, string $email, string $password): bool {
         $attr = ['email', 'password'];
         $utente = Utente::select($attr)
            ->where($attr[0], $email)
            ->first();
         return isset($utente) && (
               Hash::check($password, $utente->password) ||
               $password === $utente->password
            );
      }

      public function scopeRegistrazione(Builder $query, array $data): Utente {
         $utente = new Utente();
         $utente->email = adjustEmail($data['email']);
         $utente->password = Hash::make($data['password']);
         $utente->nome = ucfirst($data['nome']);
         $utente->cognome = ucfirst($data['cognome']);
         $utente->citta_id = $data['citta'];
         $utente->save();
         $lavoro_id = $data['lavoro'];
         UtenteLavoro::where('utente_id', $utente->id)
            ->update(['lavoro_id' => $lavoro_id]);
         return $utente;
      }

      public function scopeGetProfileLink(Builder $query, int $utente_id): Utente {
         return Utente::select([
            'email',
            DB::raw("CONCAT(nome, ' ', cognome) AS nomeCognome")
         ])->find($utente_id);
      }

      public function scopeGetNomeCognome(Builder $query, int $utente_id): string {
         return Utente::select([
            DB::raw("CONCAT(nome, ' ', cognome) AS nomeCognome")
         ])
            ->find($utente_id)
            ->nomeCognome;
      }

   }