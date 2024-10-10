export const pickdate = () => {
	$(".pickdate").datepicker({
		showButtonPanel: true, // Display the button panel
		dateFormat: "yy-mm-dd", // Date format (e.g., YYYY-MM-DD)
		beforeShow: function (input) {
			generateButtons(input); // Call generateButtons function before showing the Datepicker
		},
		onChangeMonthYear: function (yy, mm, inst) {
			generateButtons(inst.input); // Call generateButtons function when month or year changes
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
	setTimeout(function () {
		var buttonPane = $(input)
			.datepicker("widget")
			.find(".ui-datepicker-buttonpane");

		// Create "Today" button
		var todayButton = $("<button>", {
			text: "Today",
			class:
				"ui-datepicker-clear ui-state-default ui-priority-primary ui-corner-all pull-left",
			click: function () {
				$(input).datepicker("setDate", new Date()).datepicker("hide"); // Set date to today and hide the Datepicker
			},
		});

		// Create "Next Month" button
		var nextButton = $("<button>", {
			text: "Next",
			class:
				"ui-datepicker-clear ui-state-default ui-priority-primary ui-corner-all pull-left",
			click: function () {
				var currentDate = $(input).datepicker("getDate");
				currentDate.setMonth(currentDate.getMonth() + 1);
				$(input).datepicker("setDate", currentDate).datepicker("hide"); // Increment date by one month and hide Datepicker
			},
		});

		// Create "Next Week" button
		var nextWeekButton = $("<button>", {
			text: "Next Week",
			class:
				"ui-datepicker-clear ui-state-default ui-priority-primary ui-corner-all pull-left",
			click: function () {
				var currentDate = $(input).datepicker("getDate");
				currentDate.setDate(currentDate.getDate() + 7);
				$(input).datepicker("setDate", currentDate).datepicker("hide"); // Increment date by one week and hide Datepicker
			},
		});

		// Clear existing buttons and append the custom buttons to the button pane
		buttonPane.empty();
		buttonPane.append(todayButton);
		buttonPane.append(nextButton);
		buttonPane.append(nextWeekButton);
	}, 1); // Delay to ensure Datepicker is fully rendered before modifying buttons
}
