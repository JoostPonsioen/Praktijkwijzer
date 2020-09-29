/*Datum van vandaag in footer*/
var today = new Date();
var dd = today.getDate();
var mm = today.getMonth() + 1; //Januari is 0!

var yyyy = today.getFullYear();
if (dd < 10) {
  dd = '0' + dd;
}
if (mm < 10) {
  mm = '0' + mm;
}
var today = dd + '/' + mm + '/' + yyyy;
document.getElementById('datum').innerHTML = today;

/*Scroll to top*/
function scrollWin() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}


