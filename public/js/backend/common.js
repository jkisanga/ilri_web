$(function() {  
$('#region').change(function () {
	
   // var url = '{!! route("api.districts")!!}/' + $('#region').val();
	
	var url = "{{url('api/districts')}}"; 

	
	return alert(url);

	
    var items = '<option class="list-group-item" value="">Select a district</option>';
    $.getJSON( url, {
        tags: "mount rainier",
        tagmode: "any",
        format: "json"
    })
        .done(function( data ) {
            $.each( data, function( i, item ) {
                items += "<option class='list-group-item' value='" + item.id + "'>" + item.name + "</option>";
            });
            $('#districts').html(items);
        });
});
});
