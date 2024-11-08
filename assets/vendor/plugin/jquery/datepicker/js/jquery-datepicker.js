export const pickdate = () => {
	$(".pickdate").datepicker({
		showButtonPanel: true, // Display the button panel
		dateFormat: "yy-mm-dd", // Date format (e.g., YYYY-MM-DD)
		yearRange: "-100:+100", // Allows selection of years from 100 years ago to 100 years in the future
		beforeShow: function (input) {
			setTimeout(() => generateButtons(input), 1); // Call generateButtons with slight delay
		},
		onChangeMonthYear: function (yy, mm, inst) {
			setTimeout(() => generateButtons(inst.input), 1); // Call generateButtons on month or year change
		},
		showWeek: true,
		firstDay: 1,
		rangeSelect: true,
		showOtherMonths: true,
		selectOtherMonths: true,
		changeMonth: true,
		changeYear: true,
	});
};

// Function to generate custom buttons within the Datepicker
function generateButtons(input) {
	let buttonPane = $(input)
		.datepicker("widget")
		.find(".ui-datepicker-buttonpane");

	// Clear existing buttons to avoid duplicates
	buttonPane.empty();

	// Create "Today" button
	let todayButton = $("<button>", {
		text: "Today",
		type: "button", // Ensures button does not submit a form accidentally
		class:
			"ui-datepicker-clear ui-state-default ui-priority-primary ui-corner-all z-10",
		click: function () {
			$(input).datepicker("setDate", new Date()).datepicker("hide"); // Set date to today and hide Datepicker
		},
	});

	// Create "Next Month" button
	let nextButton = $("<button>", {
		text: "Next",
		type: "button",
		class:
			"ui-datepicker-clear ui-state-default ui-priority-primary ui-corner-all z-10",
		click: function () {
			let currentDate = $(input).datepicker("getDate") || new Date();
			currentDate.setMonth(currentDate.getMonth() + 1);
			$(input).datepicker("setDate", currentDate).datepicker("hide"); // Increment date by one month and hide Datepicker
		},
	});

	// Create "Next Week" button
	let nextWeekButton = $("<button>", {
		text: "Next Week",
		type: "button",
		class:
			"ui-datepicker-clear ui-state-default ui-priority-primary ui-corner-all z-10",
		click: function () {
			let currentDate = $(input).datepicker("getDate") || new Date();
			currentDate.setDate(currentDate.getDate() + 7);
			$(input).datepicker("setDate", currentDate).datepicker("hide"); // Increment date by one week and hide Datepicker
		},
	});

	// Append custom buttons to the button pane
	buttonPane.append(todayButton);
	buttonPane.append(nextButton);
	buttonPane.append(nextWeekButton);
}
