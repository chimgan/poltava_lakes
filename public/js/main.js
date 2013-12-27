/**
 * Main javascript functions list
 * User: vlad
 * Date: 9/25/13
 * Time: 8:37 PM
 */

$(document).ready(function () {

//    $('#grebinskiy').hover(
//        function() {
//            $('#img1').css("position", "none");
////            $('#img2').css("position", "block");
//            //alert('over');
//        },
//        function() {
////            $('#img2 img').css("position", "none");
////            $('#img1 img').css("position", "block");
//            //alert('out');
//        }
//    );

    var image = $('#img1');

    image.mapster(
    {
        fillOpacity: 0.4,
        fillColor: "0A78F5",
        stroke: true,
        strokeColor: "3320FF",
        strokeOpacity: 0.8,
        strokeWidth: 4,
        isSelectable: false,
        onClick: function (e) {

            alert(e.key);
        }
    });
});

