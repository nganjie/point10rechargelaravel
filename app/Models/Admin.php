<?php

namespace App\Models;

use DateTime;
use App\Controllers\Securisation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Admin extends Model
{
    use HasFactory;
    public function utilisateur(){
        return $this->belongsTo(Utilisateur::class);
    }
    public function cloturer($post)
    {
      $pdo =$this->db->getPDO();
      $id =$post['id_commande'];
      $motif =$post['motif'];
      $pdo =$this->db->getPDO();
      $date =new DateTime();
      $req =$pdo->prepare("INSERT INTO cloturer_commande(id_commande,date_cloture,decision,id_admin) VALUES(:id,:date_cloture,:decision,:id_admin)");
      $req->execute(array(
        "id"=>$id,
        "date_cloture"=>$date->format("Y-m-d H:i:s"),
        "decision"=>$motif,
        "id_admin"=>$this->id_admin
      ));
      
    }
    public function connexion($post):int
    {
        $secu =new Securisation();
        //var_dump($post);
        $mail=$secu->securiser($post['mail']);
        $password=$secu->securiser($post['password']);
        $pdo =$this->getDB()->getPDO();
        $req=$pdo->prepare("SELECT c.id as id,id_utilisateur,email,password,nom,numero FROM admin c INNER JOIN utilisateur u ON u.id=c.id_utilisateur WHERE email=:mail");
        $req->bindValue("mail",$mail);
        $req->execute();
        $res=$req->fetch();
        //var_dump($res);
        if($res)
        {
            if($password==$res->password){
              session_start();
              $_SESSION["adm-id"] = $res->id;
              $_SESSION["adm-nom"] = $res->nom;
              $_SESSION["adm-password"] = $res->password;
              //$_SESSION["adm-ville"] = $res->ville;
              $_SESSION["adm-id_utilisateur"] = $res->id_utilisateur;
              $_SESSION["adm-email"] =$res->email;
              $_SESSION["adm-numero"] =$res->numero;
              $_SESSION["connecter"]=true;
              //echo "$res->id  et on a encore $res->id_utilisateur";
             
                return 1;
            }else{
                return 2;
            }
        }else{
            return 0;
        }
       // $req->bindValue("password",$password);
    }
    public function allUsers()
    {
      $pdo =$this->db->getPDO();
      $req=$pdo->prepare("SELECT id FROM utilisateur WHERE id in (SELECT id_utilisateur FROM client)");
      $req->execute();
      $data=$req->fetchAll();
      foreach($data as $us)
      {
        $this->users[]=new Client($this->db,$us->id);
      }
      
    }
    public function allClient()
    {
      $pdo =$this->db->getPDO();
      $req=$pdo->prepare("SELECT c.id,nom,numero,id_utilisateur,ville,email,date FROM utilisateur u INNER JOIN client c ON c.id_utilisateur=u.id");
      $req->execute();
      $data=$req->fetchAll();
      foreach($data as $us)
      {
        $this->users[]=$us;
      }
      
    }
    public function TemplateClient()
    {
      $a="";
    foreach($this->users as $us)
      {
        $a.="<tr class='responsive-table__row'>
        <td
          class='responsive-table__body__text responsive-table__body__text--name'
        >
          $us->nom
        </td>
  
        <td
          class='responsive-table__body__text responsive-table__body__text--types'
        >
          $us->email
        </td>
        <td
          class='responsive-table__body__text responsive-table__body__text--country'
        >
          $us->numero
        </td>
        <td
        class='responsive-table__body__text responsive-table__body__text--country'
      >
        $us->ville
      </td>
        <td
          class='responsive-table__body__text responsive-table__body__text--country'
        >
          $us->date
        </td>
        <td
          class='responsive-table__body__text responsive-table__body__text--status'
        >
          <span class='status-indicator status-indicator--new'></span>
          <span> New </span>
        </td>
  
        <!-- </td> -->
      </tr>";
      }
      
      return $a;
    }
    public function TemplateUsers()
    {
      $a="<ul>";
      foreach($this->users as $us)
      {
        $a.=$us->TemplateUsers();
      }
      $a.="</ul>";
      return $a;
    }
}
