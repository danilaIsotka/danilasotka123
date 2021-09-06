var slider = document.getElementById("investSlider");
var output = document.getElementById("invest");
output.value = slider.value; // Display the default slider value

// Update the current slider value (each time you drag the slider handle)
slider.oninput = function () {
	output.value = this.value;
}
output.oninput = function () {
	slider.value = this.value;
}



$(function () {
	$("#datepicker").datepicker();
});

let result = document.querySelector('#result');

$(function () {
	$('form').submit(function (e) {
		var $form = $(this);
		$.ajax({
			type: $form.attr('method'),
			url: $form.attr('action'),
			data: $form.serialize(),
			dataType: 'JSON',
		}).done(function (response) {
			$('#result').html('Результат: ' + response.sum + ' руб.');
		}).fail(function () {
			console.log('fail');
		});
		e.preventDefault();
	});
});