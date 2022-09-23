<?php
/*
ETAPE 2

Ajouter des compétences aux class

-> VousMeme

- Jab (basic strength)

- Uppercut (basic strength + 20)

- crochet (basic strength + 15)

- Enchaînement (lance deux coups devastateurs)(basic strength + 30)

-> Hippo

- Smash (c'est un coup à mi-chemin entre un crochet et un uppercut qui frappe le côté du menton) (basic strength)

- Uppercut (uppercut surpuissant) (basic strength + 30)

- Gazelle Punch (après avoir pris une impulsion sur ses appuis, Ippo lance un uppercut dévastateur qui met souvent à terre 
directement) (basic strength + 20)

- Dempsey Roll (Ippo déplace son torse afin de former un huit à l'horizontale, puis il se sert de l'impulsion pour distribuer 
des coups puissants, son mouvement rendant la riposte très difficile) (basic strength + 50)

Quand vous affrontez Hippo, vous devez pouvoir choisir vos techniques.

Et Hippo doit lancer des techniques aléatoirement.

Les techniques n'ont pas toute la même puissance.
*/

class Hippo
{
    public $name;
    public $strength;
    public $stamina;
    public $vitesse;

    public function __construct($name , $strength , $stamina , $vitesse)
    {
        $this->name = $name;
        $this->strength = $strength;
        $this->stamina = $stamina;
        $this->vitesse = $vitesse;
    }

    public function coupSpecial(challenger $challenger)
    {
        return $challenger->stamina = $challenger->stamina - $challenger->stamina;
    }
    
    public function smash(challenger $challenger)
    {
        return $challenger->stamina = $challenger->stamina - $this->strength;
    }

    public function gazellePunch(challenger $challenger)
    {
        return $challenger->stamina = $challenger->stamina - ($this->strength + 20);
    }

    public function ultiUppercut(challenger $challenger)
    {
        return $challenger->stamina = $challenger->stamina - ($this->strength + 30);
    }    

    public function dempsey_roll(challenger $challenger)
    {
        return $challenger->stamina = $challenger->stamina - ($this->strength + 50);
    }
}

class Challenger
{
    public $name;
    public $strength;
    public $stamina;
    public $vitesse;

    public function __construct($name , $strength , $stamina , $vitesse)
    {
        $this->name = $name;
        $this->strength = $strength;
        $this->stamina = $stamina;
        $this->vitesse = $vitesse;
    }

    public function coupSpecial(Hippo $hippo)
    {
        return $hippo->stamina = $hippo->stamina - $hippo->stamina;
    }

    public function jab(Hippo $hippo)
    {
        return $hippo->stamina = $hippo->stamina - $this->strength;
    }

    public function crochet(Hippo $hippo)
    {
        return $hippo->stamina = $hippo->stamina - ($this->strength + 10);
    }

    public function uppercut(Hippo $hippo)
    {
        return $hippo->stamina = $hippo->stamina - ($this->strength + 20);
    }    

    public function enchainement(Hippo $hippo)
    {
        return $hippo->stamina = $hippo->stamina - ($this->strength + 30);    
    }
}

class Fight
{
    public function combat(Hippo $hippo , Challenger $challenger)
    {
        for ($round = 1; $round <= 10 ; $round++) 
        {
            echo "\n\n Debut du round $round ! \n\n";

            if ($hippo->vitesse >= $challenger->vitesse)
            {
                if($hippo->stamina > 0)
                {
                    $rand = rand(1 , 100);

                    if($rand <= 5)
                    {
                        $hippo->coupSpecial($challenger);
                        echo "Coup surpuissant de Hippo!!! Chal est KO  \n";
                    }
                    elseif ($rand > 5 && $rand <= 15)
                    {
                        $hippo->dempsey_roll($challenger);
                        echo "Ouuuh le fameux Dempsey Roll de Hippo ! Il reste " . $challenger->stamina . " pv à Chal  \n";
                    }
                    elseif ($rand > 15 && $rand <= 30)
                    {
                        $hippo->ultiUppercut($challenger);
                        echo "Violent uppercut de Hippo ! Il reste ". $challenger->stamina . " pv à Chal \n";    
                    }
                    elseif ($rand > 30 && $rand <= 50)
                    {
                        $hippo->gazellePunch($challenger);
                        echo "La gazelle ne rate pas sa cible ! Il reste ". $challenger->stamina . " pv à Chal  \n";    
                    }
                    else
                    {
                        $hippo->smash($challenger);
                        echo "Hippo smash la tête de Chal ! Il reste ". $challenger->stamina . " pv à Chal \n";
                    }
                }

                if($challenger->stamina > 0)
                {
                    echo "\n Tapes '1' pour Coup Spécial - '2' pour Enchainement - '3' pour Uppercut - '4' pour Crochet - '5' pour Jab \n";

                    $select = readline();

                    switch ($select)
                    {
                        case "1":
                        $challenger->coupSpecial($hippo);
                        echo "Coup surpuissant de Chal!!! Hippo est KO  \n";
                        break;

                        case "2":
                        $challenger->enchainement($hippo);
                        echo "Magnifique enchainement de Chal ! Il reste " . $hippo->stamina . " pv à Hippo  \n";
                        break;

                        case "3":
                        $challenger->uppercut($hippo);
                        echo "Chal envoi un parpaing dans la bouche de Hippo ! Il lui reste ". $hippo->stamina . " pv \n";
                        break;

                        case "4":
                        $challenger->crochet($hippo);
                        echo "Quel crochet de Chal ! Il reste ". $hippo->stamina . " pv à Hippo  \n";
                        break;

                        case "5":
                        $challenger->jab($hippo);
                        echo "Petit jab de Chal dans la tête de Hippo ! Il reste ". $hippo->stamina . " pv à Hippo \n";
                        break;
                    }
                }
            }
            else
            {
                if($challenger->stamina > 0)
                {
                    echo "\n Tapes '1' pour Coup Spécial - '2' pour Enchainement - '3' pour Uppercut - '4' pour Crochet - '5' pour Jab \n";

                    $select = readline();
                    
                    switch ($select)
                    {
                        case "1":
                        $challenger->coupSpecial($hippo);
                        echo "Coup surpuissant de Chal!!! Hippo est KO  \n";
                        break;

                        case "2":
                        $challenger->enchainement($hippo);
                        echo "Magnifique enchainement de Chal ! Il reste " . $hippo->stamina . " pv à Hippo  \n";
                        break;

                        case "3":
                        $challenger->uppercut($hippo);
                        echo "Chal envoi un parpaing dans la bouche de Hippo ! Il lui reste ". $hippo->stamina . " pv \n";
                        break;

                        case "4":
                        $challenger->crochet($hippo);
                        echo "Quel crochet de Chal ! Il reste ". $hippo->stamina . " pv à Hippo  \n";
                        break;

                        case "5":
                        $challenger->jab($hippo);
                        echo "Petit jab de Chal dans la tête de Hippo ! Il reste ". $hippo->stamina . " pv à Hippo \n";
                        break;
                    }

                }

                if($hippo->stamina > 0)
                {
                    $rand = rand(1 , 100);

                    if($rand <= 5)
                    {
                        $hippo->coupSpecial($challenger);
                        echo "Coup surpuissant de Hippo!!! Chal est KO  \n";
                    }
                    elseif ($rand > 5 && $rand <= 15)
                    {
                        $hippo->dempsey_roll($challenger);
                        echo "Ouuuh le fameux Dempsey Roll de Hippo ! Il reste " . $challenger->stamina . " pv à Chal  \n";
                    }
                    elseif ($rand > 15 && $rand <= 30)
                    {
                        $hippo->ultiUppercut($challenger);
                        echo "Violent uppercut de Hippo ! Il reste ". $challenger->stamina . " pv à Chal \n";    
                    }
                    elseif ($rand > 30 && $rand <= 50)
                    {
                        $hippo->gazellePunch($challenger);
                        echo "La gazelle ne rate pas sa cible ! Il reste ". $challenger->stamina . " pv à Chal  \n";    
                    }
                    else
                    {
                        $hippo->smash($challenger);
                        echo "Hippo smash la tête de Chal ! Il reste ". $challenger->stamina . " pv à Chal \n";
                    }
                }
            }

            if($challenger->stamina <= 0)
            {
                echo "\n Hippo win";
                break;
            }

            if($hippo->stamina <= 0)
            {
                echo "\n Chal win";
                break;
            }

            if($round === 10)
            {
                if($challenger->stamina > $hippo->stamina)
                {
                    echo "\n Fin du combat ! Avec ". $challenger->stamina . "pv restant pour Chal contre " . $hippo->stamina . " pv pour Hippo <br/> \n";
                    echo "Le vainqueur et nouveau champion est Chal !!!";
                }
                else
                {
                    echo "\n Fin du combat ! Avec ". $hippo->stamina . "pv restant pour Hippo contre " . $challenger->stamina . " pv pour Chal <br/> \n";
                    echo "Le vainqueur et toujours champion est Hippo !!!";
                }
            }
        }
    }
}

$hippo = new Hippo("Hippo" , 15 , 200 , 2);
$challenger = new Challenger("Chal" , 20 , 200 , 1);
$fight = new Fight;

echo $fight->combat($hippo , $challenger);