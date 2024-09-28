let elements = document.getElementsByClassName("datetimepicker");

Array.prototype.forEach.call(elements, function (element) {
	let isFlatpickrActive = false;

	element.addEventListener("click", function () {
		if (isFlatpickrActive) {
			element._flatpickr.destroy();
			isFlatpickrActive = false;
		} else {
			flatpickr(element, {
				dateFormat: "d-m-Y",
				inline: true,
				prevArrow: '<span title="Previous month">&laquo;</span>',
				nextArrow: '<span title="Next month">&raquo;</span>',
				defaultDate: new Date(Date.now()),
			});
			isFlatpickrActive = true;
		}
	});
});
