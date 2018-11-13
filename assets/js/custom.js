$(document).ready(function(){

	makanan1 = function(val){
		var a = $("#makanan1");
		if (val.checked == true) {
			a.removeClass('hide');
			document.getElementById('mkn1').setAttribute('required','required');
		} else {
			a.addClass('hide');
			document.getElementById('mkn1').required = false;
			document.getElementById('mkn1').value = '0';
		}
	}

	makanan2 = function(val){
		var b = $("#makanan2");
		if (val.checked == true) {
			b.removeClass('hide');
			document.getElementById('mkn2').setAttribute('required','required');
		} else {
			b.addClass('hide');
			document.getElementById('mkn2').required = false;
		}
	}

	makanan3 = function(val){
		var c = $("#makanan3");
		if (val.checked == true) {
			c.removeClass('hide');
			document.getElementById('mkn3').setAttribute('required','required');
		} else {
			c.addClass('hide');
			document.getElementById('mkn3').required = false;
		}
	}

	makanan4 = function(val){
		var d = $("#makanan4");
		if (val.checked == true) {
			d.removeClass('hide');
			document.getElementById('mkn4').setAttribute('required','required');
		} else {
			d.addClass('hide');
			document.getElementById('mkn4').required = false;
		}
	}

	makanan5 = function(val){
		var e = $("#makanan5");
		if (val.checked == true) {
			e.removeClass('hide');
			document.getElementById('mkn5').setAttribute('required','required');
		} else {
			e.addClass('hide');
			document.getElementById('mkn5').required = false;
		}
	}

	minuman1 = function(val){
		var f = $("#minuman1");
		if (val.checked == true) {
			f.removeClass('hide');
			document.getElementById('mnmn1').setAttribute('required','required');
		} else {
			f.addClass('hide');
			document.getElementById('mnmn1').required = false;
		}
	}

	minuman2 = function(val){
		var g = $("#minuman2");
		if (val.checked == true) {
			g.removeClass('hide');
			document.getElementById('mnmn2').setAttribute('required','required');
		} else {
			g.addClass('hide');
			document.getElementById('mnmn2').required = false;
		}
	}

	minuman3 = function(val){
		var h = $("#minuman3");
		if (val.checked == true) {
			h.removeClass('hide');
			document.getElementById('mnmn3').setAttribute('required','required');
		} else {
			h.addClass('hide');
			document.getElementById('mnmn3').required = false;
		}
	}

	minuman4 = function(val){
		var i = $("#minuman4");
		if (val.checked == true) {
			i.removeClass('hide');
			document.getElementById('mnmn4').setAttribute('required','required');
		} else {
			i.addClass('hide');
			document.getElementById('mnmn4').required = false;
		}
	}

	minuman5 = function(val){
		var j = $("#minuman5");
		if (val.checked == true) {
			j.removeClass('hide');
			document.getElementById('mnmn5').setAttribute('required','required');
		} else {
			j.addClass('hide');
			document.getElementById('mnmn5').required = false;
		}
	}

});