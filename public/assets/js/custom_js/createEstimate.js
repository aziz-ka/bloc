$(function () {

	// show forms as user selects values from dropdowns
	unhideFormSection("change", "select[name='project_type']", ".levels", "show");
	unhideFormSection("change", "select[name='project_type']", ".alert-success", "hide");
	unhideFormSection("change", "select[name='project_type']", ".project-description", "show");
	unhideFormSection("change", ".levels input[type='checkbox']", ".panel-primary.hidden", "show");
	unhideFormSection("change", ".levels input[type='checkbox']", ".save-cancel", "show");

	function unhideFormSection(event, el, target, action) {
		$(document).on(event, el, function(e) {
			action === "show" ? $(target).removeClass('hidden') : null;
			action === "hide" ? $(target).addClass('hidden') : null;
		});
	}

  $(document).on("click", ".add-support", function(e) {
  	// clone the last support config and insert at the end of the table with empty field values
    $(".tab-pane.active tbody tr").last().clone().insertAfter($(".tab-pane.active tbody tr").last());
    $(".tab-pane.active tbody tr").last().children().children().val("").attr("data-id", "");

    // grab the input fields of each table row's support config
  	var inputsArr = $(".tab-pane.active tbody tr").last().children().children();

  	// increment the name attribute number to create a loopable JSON object
    for(var i = 0; i < inputsArr.length - 1; i++) {
		  var nextNameAttrNum = $(".tab-pane.active tbody tr").length - 1;
		  var nameAttrVal = $((inputsArr)[i]).attr("data-name");
		  var nextNameAttrVal = "support[" + nextNameAttrNum + "][" + nameAttrVal + "]";
		  $((inputsArr)[i]).attr("name", nextNameAttrVal);
		}
  });

  // remove support
  $(document).on("click", ".remove-support", function(e) {
  	var supports = $(".tab-pane.active table tbody tr");
  	var itemId = $(this).attr("data-id");
  	// if support config has id i.e. it's in the DB and unless it's the only one then remove it from DB
  	if(itemId && supports.length > 1) {
  		$.ajax({
  			url: "item/" + itemId + "/delete",
  			method: 'GET'
  		})
  		.done(function() {
  			console.log("success");
  		})
  		.fail(function() {
  			console.log("error");
  		})
  		.always(function() {
  			console.log("complete");
  		});
  	}

		// unless there's only one support remove it
  	if(supports.length > 1) {
		  $(this).parent().parent().remove();
		}
	})

  // on form submit drop the support config input values of inactive tabs from being POSTed
	$(document).on("submit", "form", function(e) {
		for(var i = 0; i < 3; i++) {
			var tab = $(".tab-pane")[i];
		  if(!($(tab).hasClass("active"))) {
		    $(tab).children().remove();
		  }
		}
	});

	// add checkbox icon to an active tab
	$(document).on("click", ".nav-tabs li", function(e) {
		$(".fa-check-square").addClass("hidden");
	  $(this).children().children().removeClass("hidden");
	});
});