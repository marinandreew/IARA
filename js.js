function load(){
    
    $.ajax({
      url: 'random.php',
      error: function(){
      console.log('ERROR');
      }
   })

}

function myfunc(){
    document.getElementById('demo').innerHTML = 2;
}