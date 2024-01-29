<?php
 namespace App\Models;
 use App\Models\Forfait;
 use App\Models\Element;
 class Caracteristique{
    public $elements=[];
    public function __construct(string $description)
    {
        $a=$description;
        //echo $f->id;
        //echo $a;
        $chaine=$a;
        $position = strrpos($chaine, ";");

        if ($position !== false) {
          $chaine = substr($chaine, 0, $position);
        }

      // echo $chaine;
       $a=$chaine;
      // echo "<br><br>et<br>";

        //$a =substr($a,0,strlen($a)-1);
        //echo "<br>".strlen($a)." et ".$a[strlen($a)-1];
        //echo($a);
        $element =explode(";",$a);
        //var_dump($element);
        $tab=$element;
        //var_dump($tab);
        for($i =0;$i<count($tab);$i++)
        {
            
            $this->elements[$i]=new Element($tab[$i]);
        }
        //echo count($this->elements);
       // var_dump($this->elements);
    }
    public function Template():string
    {
        //echo "ok";
        $t='';

        for($i=0;$i<count($this->elements);$i++)
        {
           // console.log(element);
          // echo "on essaie : ".$i;
          // echo $this->elments[$i]->Template();
            $t.=$this->elements[$i]->Template();
        }
        return $t;
    }
    public function SingleTemplate():string
    {
        //echo "ok";
        $t='';

        for($i=0;$i<count($this->elements);$i++)
        {
           // console.log(element);
          // echo "on essaie : ".$i;
          // echo $this->elments[$i]->Template();
            $t.=$this->elements[$i]->SingleTemplate();
        }
        return $t;
    }
 
 }
?>