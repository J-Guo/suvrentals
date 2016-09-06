/**
 * Created with JetBrains PhpStorm.
 * User: Jayaprakash
 * Date: 17/05/16
 * Time: 4:24 PM
 * To change this template use File | Settings | File Templates.
 */

if(navigator.geolocation){
    navigator.geolocation.getCurrentPosition(function(position) {


        console.log(position.coords.latitude);
        console.log(position.coords.longitude);

        $('#latitude').val(position.coords.latitude);
        $('#longitude').val(position.coords.longitude);

    });


}
//broswer does not support Geolocation
else{
    alert('Your Browser does not support Google Map');
}


//function storeLocation(lati,longit){
//
//    $.ajax({
//        url: 'index.php',
//        type: 'POST',
//        dataType: 'JSON',
//        data:{latitude:lati,longitude:longit}
//
//    });
//
//}
