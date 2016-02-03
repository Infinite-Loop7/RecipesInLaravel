var counter = 1;
var limit = 40;
function addInput(divName){
     if (counter == limit)  {
          alert("You have reached the limit of adding " + counter + " ingredients.");
     }
     else {
          var newdiv = document.createElement('TABLE');
          
          
          newdiv.innerHTML = "<td>Ingredient " + (counter + 1) + " </td><td><input type='text' placeholder='Name' name='myInputs[]' ></td> <td><input type='text' placeholder='Measurement' name='myInputs2[]'></td> <td><input type='text' placeholder='cups; ts; tbs' name='myInputs3[]'></td></td>";
          
          document.body.appendChild(newdiv);
          counter++;
     }
}