<?php

////// GESTION DES UTILISATEURS  //////////
function est_class_active($title, $value)
{
    if(!strcmp($title, $value)){
      return "\"active\"";
    }else{
      return "\"\"";
    }
}

function enregistrer_compte($numss, $email, $mot_de_passe)
{
  global $db;
  $q=$db->prepare('INSERT INTO patients (numss, email, password) VALUES (?,?,?)');
  $q->execute(array($numss, $email, $mot_de_passe));
  $q->closeCursor();
}

function enregistrer_message($id_patient, $specialite, $description)
{
  global $db;
  $q=$db->prepare('INSERT INTO messages (id_patient, description, specialite, date) VALUES (?,?,?, now())');
  $q->execute(array($id_patient, $description, $specialite));
  $q->closeCursor();
}



class Patient
{ 
  private $_id;
  private $_numss;
  private $_email;
  private $_password;
  private $_nom;
  private $_prenom;
  private $_date_de_naissance;

  public function id(){
    return $this->_id;
  }
  public function numss(){
    return $this->_numss;
  }
  public function email(){
    return $this->_email;
  }
  public function password(){
    return $this->_password;
  }

  public function __construct (array $donnees){
    if(isset($donnees['id']))
    {
      $this->_id = $donnees['id'];
    }
    if(isset($donnees['numss']))
    {
      $this->_id_patient = $donnees['numss'];
    }
    if(isset($donnees['email']))
    {
      $this->_date = $donnees['email'];
    }
    if(isset($donnees['password']))
    {
      $this->_specialite = $donnees['password'];
    }
  }
}

class Message
{ 
  private $_id;
  private $_id_patient;
  private $_date;
  private $_specialite;
  private $_description;

  public function id(){
    return $this->_id;
  }
  public function id_patient(){
    return $this->_id_patient;
  }
  public function date(){
    return $this->_date;
  }
  public function specialite(){
    return $this->_specialite;
  }
  public function description(){
    return $this->_description;
  }

  public function __construct (array $donnees){
    if(isset($donnees['id_message']))
    {
      $this->_id = $donnees['id_message'];
    }
    if(isset($donnees['id_patient']))
    {
      $this->_id_patient = $donnees['id_patient'];
    }
    if(isset($donnees['date']))
    {
      $this->_date = $donnees['date'];
    }
    if(isset($donnees['specialite']))
    {
      $this->_specialite = $donnees['specialite'];
    }
    if(isset($donnees['description']))
    {
      $this->_description = $donnees['description'];
    }
  }
}

class MessageManager
{ 
  private $_database;

  public function db(){
    return $this->_id;
  }
  public function date(){
    return $this->_date;
  }

  public function __construct ($database){
    $this->_database = $database;
  }

  public function add_message(Message $msg)
  {
    $q=$this->_database->prepare('INSERT INTO messages (id_patient, description, specialite, date) VALUES (?,?,?, now())');
    $q->execute(array($msg->id_patient(), $msg->description(), $msg->specialite()));
    $q->closeCursor();
  }

  public function print_messages($id_patient)
  {
    afficher_messages_par_patient_tri($id_patient, "date");
  }

  public function print_messages_sorted($id_patient, $tri)
  {
    $ordre = "date DESC";
    if(!strcasecmp($tri, "specialite"))
    {
      $ordre = 'specialite';
    }
    $req = "SELECT * FROM messages WHERE (id_patient = ?) ORDER BY $ordre";
    $q=$this->_database->prepare($req);
    $q->execute(array($id_patient));
    echo"
        <div class=\"table-responsive\">
        <table class=\"table\">
         <caption>Liste des messages envoyés</caption>
          <thead>
            <tr>
              <th class=\"text-center\" scope=\"col\">#</th>
              <th class=\"text-center\" scope=\"col\">Date</th>
              <th class=\"text-center\" scope=\"col\">Specialité</th>
              <th class=\"text-center\" scope=\"col\">Description</th>
            </tr>
          </thead>
          <tbody>";
    while ($donnees = $q->fetch(PDO::FETCH_ASSOC)) // Chaque entrée sera récupérée et placée dans un array.{
    {
     $msg = new Message($donnees);
      echo "<tr>
              <th scope=\"row\"> " . $msg->id() . " </th>
              <td> " . $msg->date() . "</td>
              <td> " . $msg->specialite() . "</td>
              <td> " . $msg->description() . "</td>
            </tr>";
    }
    echo "</tbody>
        </table>
        </div>";
    $q->closeCursor();
  }
}


function verifier_compte_existe($numss, $email)
{
  global $db;
  $q = $db->prepare('SELECT numss, email FROM patients WHERE (numss = ? OR email = ?)');
  $q->execute(array($numss, $email));
  //$resultat  = $q->fetchAll(PDO::FETCH_OBJ);
  $size = $q->rowCount();
  $q->closeCursor();
  return ($size > 0);
}

function get_id_user($numss, $email)
{
  global $db;
  $ret_id = -1;
  $q = $db->prepare('SELECT id, numss, email FROM patients WHERE (numss = ? OR email = ?)');
  $q->execute(array($numss, $email));
  $resultat  = $q->fetchAll(PDO::FETCH_OBJ);
  foreach( $resultat as $user ) {
   if(!strcmp($user->numss,$numss) || !strcasecmp($user->email,$email)){
     $ret_id = $user->id;
     break;
   }
  }
  return $ret_id;
}

function verifier_connexion($id, $mdp)
{
  global $db;
  $username = null;
  $ret = false;
  $q = $db->prepare('SELECT numss, email, password FROM patients WHERE (numss = ? OR email = ?)');
  $q->execute(array($id, $id));
  $resultat  = $q->fetchAll(PDO::FETCH_OBJ);
  foreach( $resultat as $user ) {
   if( (!strcasecmp($user->numss,$id) || !strcasecmp($user->email,$id)) && !strcmp($user->password,$mdp) ){
     $ret = true;
     $username = $user->numss;
     break;
   }
  }
  $q->closeCursor();
  if(ret){
    return $username;
  }
  else{
    return null;
  }
}

function get_ip_addr_invite(){
  return (getenv('HTTP_CLIENT_IP')?:
          getenv('HTTP_X_FORWARDED_FOR')?:
          getenv('HTTP_X_FORWARDED')?:
          getenv('HTTP_FORWARDED_FOR')?:
          getenv('HTTP_FORWARDED')?:
          getenv('REMOTE_ADDR'));
}
?>
