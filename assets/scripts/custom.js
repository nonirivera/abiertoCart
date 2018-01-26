$(document).ready(function() {
	// tooltip
	$('[data-toggle="tooltip"]').tooltip();

	// datatables
	$('#tableView').DataTable();

    // tinymce
    tinymce.init({
        selector: '#i_description',  // textarea ID
        setup: function(editor){
            editor.on('change',function(){
                editor.save();
            });
        },
        skin: 'lightgray',
        height: '250px',
        plugins: 'link image code advlist colorpicker',
    });    
});

function startTime() {
    var today = new Date();
    var h = today.getHours();
    var m = today.getMinutes();
    var s = today.getSeconds();
    m = checkTime(m);
    s = checkTime(s);
    document.getElementById('txtClock').innerHTML =
    "Time Now: " + h + ":" + m + ":" + s;
    var t = setTimeout(startTime, 500);
}
function checkTime(i) {
    if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
    return i;
}
