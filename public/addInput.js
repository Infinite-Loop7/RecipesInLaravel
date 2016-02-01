var counter = 1;
var limit = 40;
function addInput(divName){
     if (counter == limit)  {
          alert("You have reached the limit of adding " + counter + " ingredients.");
     }
     else {
          var newdiv = document.createElement('div');
          newdiv.innerHTML = "Ingredient " + (counter + 1) + " <br><input type='text' name='myInputs[]' >";
          document.getElementById(divName).appendChild(newdiv);
          counter++;
     }
}