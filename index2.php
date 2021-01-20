<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>cavicchioli php oop dipendenti 19 gennaio</title>
  <link rel="stylesheet" href="style2.css">
  <link rel="shortcut icon" href="#">

</head>
<body>


  <!--
  GOAL: sulla base dell'esercizio di ieri (vedi correzione qui su slack) aggiungere i seguenti vincoli di integrita':
  - nomi e cognomi devono essere di >3 caratteri
  - i livelli di sicurezza devono essere [1;5] per i dipendenti e [6;10] per i boss
  - ral employee [10.000;100.000]
  - non puo' esistere boss senza dipendenti
  Durante la fase di test, utilizzare il costrutto try-catch per gestire l'errore e informare l'utente


  -->

  <div class="container">
    <h4>
      <?php

        class Person {
          private $name;
          private $lastname;
          private $dateOfBirth;
          private $securyLvl;

          public function __construct($name, $lastname, $dateOfBirth, $securyLvl) {
            $this -> setName($name);
            $this -> setLastname($lastname);
            $this -> setDateOfBirth($dateOfBirth);
            $this -> setSecuryLvl($securyLvl);
          }

          public function getName() {
            return $this -> name;
          }
          public function setName($name) {
            if (strlen($name) <= 3) {
						  throw new NameCheck;
            }

            $this -> name = $name;
          }

          public function getLastname() {
            return $this -> lastname;
          }
          public function setLastname($lastname) {
            if (strlen($lastname) <= 3) {
              throw new LastnameCheck;
            }

            $this -> lastname = $lastname;
          }

          public function getFullname() {
            return $this -> getName() . ' ' . $this -> getLastname();
          }

          public function getDateOfBirth() {
            return $this -> dateOfBirth;
          }
          public function setDateOfBirth($dateOfBirth) {
            $this -> dateOfBirth = $dateOfBirth;
          }

          public function getSecuryLvl() {
            return $this -> securyLvl;
          }
          public function setSecuryLvl($securyLvl) {
            // if ($securyLvl != 0) {
            //   throw new PersonSecLvl;
            // }

            $this -> securyLvl = $securyLvl;
          }

          public function __toString() {
            return 'name: ' . $this -> getName() . '<br>'
              . 'lastname: ' . $this -> getLastname() . '<br>'
              . 'dateOfBirth: ' . $this -> getDateOfBirth() . '<br>'
              . 'securyLvl: ' . $this -> getSecuryLvl() . '<br>';
          }
        }

// -------------------------------------------------------------------------------------

        class Employee extends Person {
          private $ral;
          private $mainTask;
          private $idCode;
          private $dateOfHiring;
          public function __construct($name, $lastname, $dateOfBirth, $securyLvl,
                                      $ral, $mainTask, $idCode, $dateOfHiring) {
            parent::__construct($name, $lastname, $dateOfBirth, $securyLvl);
            $this -> setRal($ral);
            $this -> setMainTask($mainTask);
            $this -> setIdCode($idCode);
            $this -> setDateOfHiring($dateOfHiring);
          }

          // public function getSecuryLvl() {
          //   return $this -> securyLvl;
          // }
          public function setSecuryLvl($securyLvl) {
            if ($securyLvl < 1 || $securyLvl > 5) {
              throw = new EmployeeSecLvl;
            }

            $this -> securyLvl = $securyLvl;
          }

          public function getRal() {
            return $this -> $ral;
          }
          public function setRal($ral) {
            if ($ral < 10000 || $ral > 100000) {
              throw new RalCheck;
            }

            $this-> ral = $ral;
          }
          public function getMainTask() {
            return $this -> $mainTask;
          }
          public function setMainTask($mainTask) {
            $this -> mainTask = $mainTask;
          }
          public function getIdCode() {
            return $this -> $idCode;
          }
          public function setIdCode($idCode) {
            $this -> idCode = $idCode;
          }
          public function getDateOfHiring() {
            return $this -> $dateOfHiring;
          }
          public function setDateOfHiring($dateOfHiring) {
            $this -> dateOfHiring = $dateOfHiring;
          }
          public function __toString() {
            return parent::__toString() . '<br>'
              . 'ral: ' . $this -> ral . '<br>'
              . 'mainTask: ' . $this -> mainTask . '<br>'
              . 'idCode: ' . $this -> idCode . '<br>'
              . 'dateOfHiring: ' . $this -> dateOfHiring . '<br>';
          }
        }
//-----------------------------------------------------------------------------
        class Boss extends Employee {
          private $profit;
          private $vacancy;
          private $sector;
          private $employees;
          public function __construct($name, $lastname, $dateOfBirth, $securyLvl,
                                      $ral, $mainTask, $idCode, $dateOfHiring,
                                      $profit, $vacancy, $sector, $employees = []) {
            parent::__construct($name, $lastname, $dateOfBirth, $securyLvl,
                                $ral, $mainTask, $idCode, $dateOfHiring);
            $this -> setProfit($profit);
            $this -> setVacancy($vacancy);
            $this -> setSector($sector);
            $this -> setEmployees($employees);
          }

          // public function getSecuryLvl() {
          //   return $this -> securyLvl;
          // }

          public function setSecuryLvl($securyLvl) {
            if ($securyLvl < 6 || $securyLvl > 10) {
              throw = new BossSecLvl;
            }
            $this -> securyLvl = $securyLvl;
          }

          public function getProfit() {
            return $this -> profit;
          }
          public function setProfit($profit) {
            $this -> profit = $profit;
          }
          public function getVacancy() {
            return $this -> vacancy;
          }
          public function setVacancy($vacancy) {
            $this -> vacancy = $vacancy;
          }
          public function getSector() {
            return $this -> sector;
          }
          public function setSector($sector) {
            $this -> sector = $sector;
          }
          public function getEmployees() {
            return $this -> employees;
          }
          public function setEmployees($employees) {
            if (empty($employees)) {
              throw new BossEmpCheck;
            }
            $this -> employees = $employees;
          }
          public function __toString() {
            return parent::__toString() . '<br>'
                    . 'profit: ' . $this -> getProfit() . '<br>'
                    . 'vacancy: ' . $this -> getVacancy() . '<br>'
                    . 'sector: ' . $this -> getSector() . '<br>'
                    . 'employees:<br>' . $this -> getEmpsStr() . '<br>';
          }
          private function getEmpsStr() {
            $str = '';
            for ($x=0;$x<count($this -> getEmployees());$x++) {
              $emp = $this -> getEmployees()[$x];
              $fullname = $emp -> getName() . ' ' . $emp -> getLastname();
              $str .= ($x + 1) . ': ' . $fullname . '<br>';
            }
            return $str;
          }
        }

//-----------------------------------------------------------------------------
        // $p1 = new Person(
        //   '(p)name',
        //   '(p)lastname',
        //   '(p)dateOfBirth',
        //   '(p)securyLvl',
        // );
        // echo 'p1:<br>' . $p1 . '<br><br>';

        // $e1 = new Employee(
        //   '(e)name',
        //   '(e)lastname',
        //   '(e)dateOfBirth',
        //   '(e)securyLvl',
        //   '(e)ral',
        //   '(e)mainTask',
        //   '(e)idCode',
        //   '(e)dateOfHiring',
        // );
        // echo 'e1:<br>' . $e1 . '<br><br>';

        // $b1 = new Boss(
        //   '(b)name',
        //   '(b)lastname',
        //   '(b)dateOfBirth',
        //   '(b)securyLvl',
        //   '(b)ral',
        //   '(b)mainTask',
        //   '(b)idCode',
        //   '(b)dateOfHiring',
        //   '(b)profit',
        //   '(b)vacancy',
        //   '(b)sector',
        //   [
        //     $e1,
        //     $e1,
        //     $e1,
        //     $e1,
        //   ]
        // );

        // $e1-> setName('peiro');
        // echo 'b1:<br>' . $b1 . '<br><br>';

        // echo 'persona:<br>' . $p1 . '<br><br>'
        //   . 'dipendente:<br>' . $e1 . '<br><br>'
        //   . 'boss:<br>' . $b1 . '<br><br>';



        //https://stackify.com/php-try-catch-php-exception-tutorial/ spiegazione class extends per exception
        class NameCheck extends Exception {};
        class LastnameCheck extends Exception {};
        class RalCheck extends Exception {};
        // class PersonSecLvl extends Exception {};
        class EmployeeSecLvl extends Exception {};
        class BossSecLvl extends Exception {};
        class BossEmpCheck extends Exception {};

      ?>
    </h4>

    <div class="person">
      <?php
        try {
          $personCheck = new Person(
            'wsdasdsa',
            'Csssssse',
            '12-01-1999',
            0
          );
          echo 'Prova lunghezza lettere per nome e cognome in un esempio di class Person :<br>'
            . $personCheck . '<br><br>';
        } catch (NameCheck $e) {
          echo 'Prova lunghezza lettere nome cognome in un esempio di class Person :<br>'
            . 'NAME needs to be longer than 3 letters'
            . '- to get a message with more info change this message location near NameCheck in class Person and replace it with $e<br><br>';

        } catch (LastnameCheck $e) {
          echo 'Prova lunghezza lettere nome cognome in un esempio di class Person :<br>'
            . 'LASTNAME needs to be longer than 3 letters'
            . '- to get a message with more info change this message location near LastnameCheck in class Person and replace it with $e<br><br>';
        }
        // catch (PersonSecLvl $e) {
        //   echo 'securyLvl per una persona: <br>'
        //   . 'non sei nessuno non vali niente ti meriti un securyLvl di 0';
        // }
      ?>
    </div>

    <div class="employee">
      <?php
        try {
          $employeeCheck = new Employee(
            'eName',
            '(eC)lastname',
            '(eC)dateOfBirth',
            4,
            11000,
            '(eC)mainTask',
            '(eC)idCode',
            '(eC)dateOfHiring'
          );
          echo 'Prova di Employee:<br>' . $employeeCheck . '<br><br>';
        } catch (RalCheck $e) {
            echo 'Prova Ral di Employee:<br>'
                . 'Ral needs to be between 10.000 and 100.000<br><br>';
        } catch (EmployeeSecLvl $e) {
            echo 'Prova security di Employee:<br>'
                . 'tra 1 e 5 solamente<br><br>';
        } catch (NameCheck $e) {
          echo 'Prova lunghezza lettere nome cognome in un esempio di class employee:<br>'
            . 'NAME needs to be longer than 3 letters'
            . '- to get a message with more info change this message location near NameCheck in class Person and replace it with $e<br><br>';
        } catch (LastnameCheck $e) {
          echo 'Prova lunghezza lettere nome cognome in un esempio di class employee :<br>'
            . 'LASTNAME needs to be longer than 3 letters'
            . '- to get a message with more info change this message location near LastnameCheck in class Person and replace it with $e<br><br>';
        }

      ?>
    </div>

    <div class="boss">
      <?php
        try {

          $bossCheck = new Boss(
            'DonaldBigBoss',
            'Trsdss',
            '(bC)dateOfBirth',
            8,
            100000,
            'president',
            '(bC)idCode',
            'something-something-2016',
            '(bC)profit',
            '(bC)vacancy',
            '(bC)sector',
            [
              $employeeCheck,
              $employeeCheck
            ]
          );
          echo 'prova boss:<br>' . $bossCheck;

        } catch (BossEmpCheck $e) {
          echo 'prova array boss:<br>' . 'Non ci sono dipendenti, capo de chè?!';
        } catch (BossSecLvl $e) {
          echo 'Prova security di boss:<br>' . 'tra 6 e 10 solamente<br><br>';
        } catch (NameCheck $e) {
          echo 'Prova lunghezza lettere nome cognome in un esempio di class boss :<br>'
            . 'NAME needs to be longer than 3 letters'
            . '- to get a message with more info change this message location near NameCheck in class Boss and replace it with $e<br><br>';
        } catch (LastnameCheck $e) {
          echo 'Prova lunghezza lettere nome cognome in un esempio di class Boss :<br>'
            . 'LASTNAME needs to be longer than 3 letters'
            . '- to get a message with more info change this message location near LastnameCheck in class Person and replace it with $e<br><br>';
        } catch (RalCheck $e) {
            echo 'Prova Ral di boss:<br>'
                . 'Ral needs to be between 10.000 and 100.000<br><br>';
        }

      ?>
    </div>





  </div>

  <script src="script.js"></script>
</body>
</html>
