<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>Liste Clément</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="icon" type="image/png" href="./vue/assets/favicon.ico" />
</head>
<body>
<div style="position: fixed; width: 100%; top: 0; left: 0; z-index: 11; display: none;" id="hiddenForm">
    <form style="padding: 2rem 1rem;" id="secretForm">
        <h3 style="color: white; text-align: center;">Merci!</h3>
        <div class="form-row">
            <div class="col-9">
                <input type="text" required class="form-control mb-2 mr-sm-2" id="name" placeholder="Prénom">
            </div>
            <div class="col">
                <select class="form-control col" id="numberSelected">

                </select>
            </div>
        </div>
        <button style="width: 100%;" type="submit" class="btn btn-primary mb-2">Valider</button>
    </form>
</div>

<div class="container" style="padding-top: 2rem;">
    <div class="card border-dark mb-3">
        <div class="card-header">Liste d'emménagement</div>
        <div class="card-body text-dark">
            <h5 class="card-title">Bonjour! 👋</h5>
            <p class="card-text" style="text-align: justify;">
                J'ai réalisé une liste pour me rappeler de ce que je dois acheter pour mon arrivée à Grenoble.</p>
            <p style="text-align: justify;"> Comme je suis en informatique je me suis dit que ce serait marrant de coder moi-même le système.</p>
            <p style="text-align: justify;"> J'ai noté absolument tout (même les broutilles) parce que de base elle sert pour moi quand je serais dans le centre commercial et que je devrais me souvenir
                de tout ce que je dois prendre.</p>
            <p style="text-align: justify;"> Si vous souhaitez participer, je vous en remercie. 🙏🏻</p>
            <p style="text-align: justify;"> Bisous à tous! 😘</p>
        </div>
    </div>
    <?php
    global $front;
    foreach ($front as $obj){
        echo '
        <div class="object">
            <form>
                <div class="form-row">
                <input type="hidden" value="'.$obj->getId().'">
                    <div class="col-9">
                        <input type="text" class="form-control mb-2 mr-sm-2" id="name" readonly placeholder="'.$obj->getName().'">
                    </div>
                    <div class="col">
                        <input style="text-align: center;" type="text" readonly class="form-control mb-2 mr-sm-2" id="number" placeholder="'.($obj->getTotal()-$obj->getLast()).'/'.$obj->getTotal().'">
                    </div>
                </div>
                <div>';
        foreach ($obj->getParticipant() as $part){
            echo '<table class="table">
                <thead>
                    <tr>
                      <th scope="col">Participe déjà ♥️</th>
                      <th scope="col"></th>
                    </tr>
                </thead>
            <tbody>';
            echo '
                <tr>
                  <td scope="row">'.$part->getPseudo().'</td>
                  <td>'.$part->getNumber().'</td>
                </tr>
            ';
            echo '</tbody></table>';
        }
        echo '</div>
                <button '.($obj->getLast()==0?"disabled":"").' style="margin-left: 50%;transform: translateX(-50%);" type="submit" class="btn btn-primary mb-2">Je le prends</button>
            </form>
        </div>
        ';
    }
    ?>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script>
    var id = null;
    var hiddenForm = $('#hiddenForm');
    document.getElementById("secretForm").addEventListener('submit', event => {
        event.preventDefault();
        $.ajax({
            url : 'vue/action.php',
            type : 'POST',
            data:  {
                'id': id,
                'surname': document.getElementById("secretForm").children[1].children[0].children[0].value,
                'number': document.getElementById("secretForm").children[1].children[1].children[0].value
            },
            success : function (result) {
                document.getElementById("secretForm").submit();
            },
            error : function () {
            }
        });
    })
    var mask = $('<div></div>')
        .css({
            position: 'fixed',
            width: '100%',
            height: '100%',
            top: 0,
            left: 0,
            'z-index': 10,
            display: 'none',
            'background-color': 'rgba(0, 0, 0, .5)'
        })
        .appendTo(document.body)
        .click(function(event){
            event.preventDefault();
            mask.toggle();
            hiddenForm.toggle();
            return false;
        })
    var objects = $('.object');
    console.log(objects)
    var selectedNumber =  $('#numberSelected');
    for (let i=0; i<objects.length; i++){
        objects[i].children[0].addEventListener('submit', event => {
            event.preventDefault();
        })
        //Boutons
        objects[i].children[0].children[2].addEventListener('click', event => {
            id = parseInt(event.target.parentElement.children[0].children[0].value);
            selectedNumber.find('option').remove().end();
            var numbers = objects[i].children[0].children[0].children[2].children[0].placeholder.split('/');
            for (let j = 1; j<=parseInt(numbers[1])-parseInt(numbers[0]); j++){
                selectedNumber.append('<option value="'+j+'">'+j+'</option>');
            }
            mask.toggle();
            hiddenForm.toggle();
        });
    }
</script>
</body>
</html>