<?php

    //Klassendefinition
    class aWATTarHand extends IPSModule {

        public function Create(){
            
            // Diese Zeile nicht löschen.
            parent::Create();

            //Variabeln anlegen
            $this->RegisterVariableInteger("datetoday", "Datum Heute");
            $this->RegisterVariableInteger("datetomorow", "Datum Morgen");
            
            //$Dayhelp = "Preis_0_1";
            //$Dayhelp2 = "Preis 0-1 Uhr";

            //Variabeln Stunden Anlegen
            for ($i = 0; $i < 48; $i++) {

                if($i <24){

                    $b = $i + 1;
                    $c = $i;
                    if($b < 10){
                        $b = "0" . $b;
                    }
                    if($c < 10){
                        $c = "0" . $c;
                    }
                    $Dayhelp = "Preis_" . $c . "_" . $b;
                    $Dayhelp2 = "Preis " . $c . "-" . $b . "Uhr";
                    $this->RegisterVariableFloat($Dayhelp, $Dayhelp2);

                }else {

                    $b = $i + 1 -24;
                    $c = $i - 24;
                    if($b < 10){
                        $b = "0" . $b;
                    }
                    if($c < 10){
                        $c = "0" . $c;
                    }
                    $Dayhelp = "Preism_" . $c . "_" . $b;
                    $Dayhelp2 = "Preis morgen " . $c . "-" . $b . "Uhr";
                    $this->RegisterVariableFloat($Dayhelp, $Dayhelp2);

                }
            }
            

            //Timer Anlegen
            $this->RegisterTimer("UpdateaWATTarHand", 0, 'aWATTarPrices(' . $this->InstanceID . ');');
            $this->aWATTarPrices();

            //Timer für jede Stunde setzen
            //$next_timer = strtotime(date('Y-m-d H:00:10', strtotime('+1 hour')));
            //$this->SetTimerInterval('UpdateData', ($next_timer - time()) * 1000);

        }


        // Überschreibt die intere IPS_ApplyChanges($id) Funktion
        public function ApplyChanges() {
            // Diese Zeile nicht löschen
            parent::ApplyChanges();
        }

        /**
        * Die folgenden Funktionen stehen automatisch zur Verfügung, wenn das Modul über die "Module Control" eingefügt wurden.
        * Die Funktionen werden, mit dem selbst eingerichteten Prefix, in PHP und JSON-RPC wiefolgt zur Verfügung gestellt:
        *
        * ABC_MeineErsteEigeneFunktion($id);
        *
        */


        public function aWATTarPrices() {


            
            // Selbsterstellter Code
            
            /*
            //API Abfrage aWATTar
    
            //URL Für aWATTar Schnitstellenabfrage aufbereiten
            $ch = curl_init();
    
            $urlpart1 = 'https://api.awattar.at/v1/marketdata?start=';
            $urlpart2 = strtotime(date('d.m.Y 00:00:00')) * 1000;
            $urlpart3 = '&end=';
    
            $timestamp1 = time();
            $merkertime1 = (strtotime(date('d.m.Y 00:00:00')) + 46800);
    
            if ($timestamp1 >= $merkertime1) {
    
                $urlpart4 = (strtotime(date('d.m.Y 00:00:00')) + 172800) * 1000;
    
            } else {
    
                $urlpart4 = (strtotime(date('d.m.Y 00:00:00')) + 86400) * 1000;
    
            }
    
            //URL Bilden
            $url = $urlpart1 . $urlpart2 . $urlpart3 . $urlpart4;
    
            //API Abfrage iniziieren
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    
            //DAten abfragen
            $resp = curl_exec($ch);
    
            //if Abfrage für Error
            if($e = curl_error($ch)){
                echo $e;
            } else{
                $decoded = json_decode($resp, true);
                //print_r($decoded);
                //echo "Funktioniert <br><br>";
            }
    
            //Api Verbindung schließen
            curl_close($ch);


    
            //echo 'geht' . "\n";
            //echo $url . "\n";
            //echo $decoded;
            */

            
            /*KontrollCode
            $this->SetValue("datetoday", 123);
            $this->SetValue("datetomorow", 345);
            */

            //Timer für jede Stunde setzen
            $next_timer = strtotime(date('Y-m-d H:00:10', strtotime('+1 hour')));
            $this->SetTimerInterval('UpdateaWATTarHand', ($next_timer - time()) * 1000);



        }
        
    }
  



?>