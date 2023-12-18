function showReplyForm(self) {
	var commentId = self.getAttribute("data-id");
	if (document.getElementById("form-" + commentId).style.display == "") {
		document.getElementById("form-" + commentId).style.display = "none";
	} else {
		document.getElementById("form-" + commentId).style.display = "";
	}
}

function showReplyForReplyForm(self) {
	var commentId = self.getAttribute("data-id");
	var name = self.getAttribute("data-name");

	if (document.getElementById("form-" + commentId).style.display == "") {
		document.getElementById("form-" + commentId).style.display = "none";
	} else {
		document.getElementById("form-" + commentId).style.display = "";
	}

	document.querySelector("#form-" + commentId + " textarea[name=comment]").value = "Reply to: @" + name;
	document.getElementById("form-" + commentId).scrollIntoView();
}