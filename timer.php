<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="styles.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <!-- timer 1 -->
    <section class="t1">

      <!-- zichtbare timer -->
      <div class="timerNumber">
         <p id="tijd1">30</p>
      </div>

      <!-- ontzichtbare timer -->
      <input id='timer1' type='hidden' value="">

      <!-- reset tijd -->
      <input id='value1' type='hidden' value="29">

      <!-- startstop knop -->
      <button id='startstop1' onclick="Interval('1')">start</button>

      <!-- plus knop -->
      <button id='plus1' onclick="Add('1', '1')">+</button>

      <!-- min knop -->
      <button id='min1' onclick="Min('1', '1')">-</button>

    </section>

    <section class="t2">

      <!-- timer 2 -->

      <!-- zichtbare timer -->
      <div class="timerNumber">
        <p id="tijd2">30</p>
      </div>

      <!-- ontzichtbare timer -->
      <input id='timer2' type='hidden' value="">

      <!-- reset tijd -->
      <input id='value2' type='hidden' value="29">

      <!-- startstop knop -->
      <button id='startstop2' onclick="Interval('2')">start</button>

      <!-- plus knop -->
      <button id='plus2' onclick="Add('2', '2')">+</button>

      <!-- min knop -->
      <button id='min2' onclick="Min('2', '2')">-</button>

    </section>

</body>

</html>
<script>
    var tijd;
    var x;

    //dit voorzorgt ervoor dat de timer kan lopen
    function Interval(kant) {

        //checkt of de knop op start of stop staat
        if (document.getElementById('startstop' + kant).innerHTML == 'stop') {

            //stop de timer
            clearInterval(tijd);

            // zet de knop op start en zet de knoppen aan
            document.getElementById('startstop' + kant).innerHTML = 'start';
            document.getElementById("startstop1").disabled = false;
            document.getElementById("startstop2").disabled = false;

            // reset de timer
            SetTimer(kant, document.getElementById('value' + kant).value);
            document.getElementById("tijd" + kant).innerHTML = parseInt(document.getElementById("value" + kant).value) + 1;
        } else {

            //zet de knop van de andere speler uit
            if(kant == 1){
            document.getElementById("startstop2").disabled = true;
            }else{
                document.getElementById("startstop1").disabled = true;
            }

            //zet de knop op stop
            document.getElementById("startstop" + kant).innerHTML = 'stop';

            // begint de timer
            tijd = setInterval(function() {
                Timer(kant)
            }, 1000);

            //reset de values
            SetTimer(1, document.getElementById('value1').value);
            SetTimer(2, document.getElementById('value2').value);
        }
    }

    //dit set de tijd voor de timer voordat hij begint
    function SetTimer(kant, time) {
        document.getElementById('timer' + kant).value = time;
        document.getElementById('tijd' + kant).innerHTML = parseInt(time) + 1;
    }

    // dit voorzorgt dat de timer steeds met een verminderd
    function Timer(kant) {
        // verlaagt de timer
        var distance = document.getElementById('timer' + kant).value--;

        //checkt of hij is afgelopen
        if (distance > 0) {

            //verlaagt de zichtbare timer
            document.getElementById("tijd" + kant).innerHTML = distance;
        } else {

            //stopt de timer
            Interval(kant);

            //zet het scherm op rood
            document.body.style.background = 'red';

            //start de functie die na 3 secondes het scherm op wit zet
            x = setInterval(function() {
                Afgelopen()
            }, 3000);
        }
    }

    // dit voegt 5 toe
    function Add(kant, tijd) {
        document.getElementById('value' + kant).value = parseInt(document.getElementById('value' + kant).value) + 5;
        document.getElementById('tijd' + tijd).innerHTML = parseInt(document.getElementById('value' + kant).value) + 1;
    }

    //dit haalt 5 eraf
    function Min(kant, tijd) {
        document.getElementById('value' + kant).value = parseInt(document.getElementById('value' + kant).value) - 5;
        document.getElementById('tijd' + tijd).innerHTML = parseInt(document.getElementById('value' + kant).value) + 1;
    }

    //dit maakt het scherm weer wit na 3 secondes
    function Afgelopen(){
            clearInterval(x);

            //zet het schrom op wit
            document.body.style.background = 'white';
    }
</script>
<?php

?>
