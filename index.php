<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>cavicchioli php oop dipendenti</title>
  <link rel="stylesheet" href="style.css">
  <link rel="shortcut icon" href="#">

</head>
<body>


  <!--

    GOAL:
    creare 3 classi per rappresentare la seguente realta':
  - persona
  - dipendente
  - boss
  cercare inoltre di sciegliere alcune variabili di istanza (max 3 o 4 per classe) che possono avere senso in questa realta' e decidere le relazione di parantela (chi estende chi);
  per ogni classe definire eventuale classe padre, variabili di istanza, costruttore, proprieta' e toString;
  instanziando le varie classi provare a stampare cercando di ottenere un log sensato


  -->

  <div class="container">
    <h2>
      <?php

        class Persona {
          // name lastname dateOfBirth
          private $name;
          private $lastname;
          private $dateOfBirth;

          public function __construct($name, $lastname, $dateOfBirth) {

            $this-> setName($name);
            $this-> setLastname($lastname);
            $this-> setDateOfBirth($dateOfBirth);
          }

          //get set name
          public function getName() {
            return $this-> name;
          }
          public function setName($name) {

            if (gettype($name) == 'string') {
              $this-> name = $name;
            } else {
              $this-> name = 'this should be a string not a number or something else';
            }
          }

          //get set lastname
          public function getLastname() {
            return $this-> lastname;
          }
          public function setLastname($lastname) {
            $this-> lastname = $lastname;
          }

          //get set dateOfBirth
          public function getDateOfBirth() {
            return $this-> dateOfBirth;
          }
          public function setDateOfBirth($dateOfBirth) {
            $this-> dateOfBirth = $dateOfBirth;
          }

          //toString
          public function __toString(){

            return
              'name: ' . $this-> getName() . '<br>'
              . 'lastname: ' . $this-> getLastname() . '<br>'
              . 'dateOfBirth: ' . $this-> getDateOfBirth();
          }

        }

        class Dipendente extends Persona {
          // education salary
          private $education;
          private $salary;

          public function __construct($name, $lastname, $dateOfBirth,
                                      $education, $salary) {

            parent::__construct($name, $lastname, $dateOfBirth);

            $this-> setEducation($education);
            $this-> setSalary($salary);
          }

          //get set education
          public function getEducation() {
            return $this-> education;
          }
          public function setEducation($education) {
            $this-> education = $education;
          }

          //get set salary
          public function getSalary() {
            return $this-> salary;
          }
          public function setSalary($salary) {
            $this-> salary = $salary;
          }

          public function __toString() {

            return parent::__toString() . '<br>'
            . 'education: ' . $this-> getEducation() . '<br>'
            . 'salary: ' . $this-> getSalary();
          }


        }

        class Boss extends Dipendente {
          // bonus struttura dipendenti
          private $bonus;
          private $struttura;
          private $dipendenti;

          public function __construct($name, $lastname, $dateOfBirth, $education, $salary,
                                      $bonus, $struttura, $employees = []) {

            parent::__construct($name, $lastname, $dateOfBirth, $education, $salary);

            $this-> setBonus($bonus);
            $this-> setStruttura($struttura);
            $this-> setEmployees($employees);

          }

          //get set bonus
          public function getBonus() {
            return $this-> bonus;
          }
          public function setBonus($bonus) {
            $this-> bonus = $bonus;
          }

          //get set struttura
          public function getStruttura() {
            return $this-> struttura;
          }
          public function setStruttura($struttura) {
            $this-> struttura = $struttura;
          }

          //get set dipendenti
          public function getEmployees() {
            return $this -> employees;
          }
          public function setEmployees($employees) {
            $this -> employees = $employees;
          }

          public function __toString() {

            return parent::__toString() . '<br>'
            . 'bonus: ' . $this-> getBonus() . '<br>'
            . 'struttura: ' . $this-> getStruttura() . '<br>'
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




        $persona = new Persona(
          '(p)nome',
          '(p)cognome',
          '(p)dataDiNascita'
        );
        $dipendente1 = new Dipendente(
          '(d)nome',
          '(d)cognome',
          '(d)dataDiNascita',
          '(d)livelloScolastico',
          '(d)stipendio'
        );
        $boss = new Boss(
          '(b)nome',
          '(b)(b)cognome',
          '(b)dataDiNascita',
          '(b)livelloScolastico',
          '(b)stipendio',
          '(b)bonus',
          '(b)struttura',
          [
            $dipendente1,
            $dipendente1,
            $dipendente1,
          ]
        );

        echo 'persona:<br>' . $persona . '<br><br>'
          . 'dipendente:<br>' . $dipendente . '<br><br>'
          . 'boss:<br>' . $boss. '<br><br>';

      ?>
    </h2>

  </div>

  <script src="script.js"></script>
</body>
</html>
