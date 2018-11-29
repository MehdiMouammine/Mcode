function grey(n) {
    $("#b"+n).css('background-color', '#C0C0C0');
    $("#a"+n).css('color', '#FFFFFF');
  }
  function normal(n) {
    $("#b"+n).css('background-color', '#f8f8f8')
    $("#a"+n).css('color', '#000000')
  }
  function out() {
    $("#out").css('color', '#C0C0C0')
  }
  function lout() {
    $("#out").css('color', 'black')
  }
function openModal(n) {
  currentSlide(n);
  document.getElementById('ImgModal').style.display = "block";
}

function closeModal() {
  document.getElementById('ImgModal').style.display = "none";
}

var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("demo");
  var captionText = document.getElementById("caption");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
  captionText.innerHTML = dots[slideIndex-1].alt;
}
function modal(ser){
  var modal = document.getElementById('Modal');
  modal.style.display = "block";
  var xhttp1 = new XMLHttpRequest();
	xhttp1.onreadystatechange = function(){
		if (this.readyState == 4 && this.status == 200) {
			document.getElementById("modalp").innerHTML = this.responseText;
		}
	};
	xhttp1.open("GET", "ServiceP.php?Ser="+ser, true);
	xhttp1.send();
}
function modal2(ser){
  var modal = document.getElementById('Modal');
  modal.style.display = "block";
  var xhttp1 = new XMLHttpRequest();
	xhttp1.onreadystatechange = function(){
		if (this.readyState == 4 && this.status == 200) {
			document.getElementById("modalp").innerHTML = this.responseText;
		}
	};
	xhttp1.open("GET", "ProductP.php?Ser="+ser, true);
	xhttp1.send();
	var xhttp2 = new XMLHttpRequest();
	xhttp2.onreadystatechange = function(){
		if (this.readyState == 4 && this.status == 200) {
			document.getElementById("modalp2").innerHTML = this.responseText;
		}
	};
	xhttp2.open("GET", "ImgModal.php?Ser="+ser, true);
	xhttp2.send();
}
function nomodal() {
	var modal = document.getElementById('Modal');
    modal.style.display = "none";
}
function recherche() {
	var rech = $('#rech').val();
	getServices(rech);
	getProducts(rech);
}
function getServices(ser) {
	var xhttp1 = new XMLHttpRequest();
	xhttp1.onreadystatechange = function(){
		if (this.readyState == 4 && this.status == 200) {
			document.getElementById("services").innerHTML = this.responseText;
			tableau('');
		}
	};
	xhttp1.open("GET", "Services.php?Ser="+ser, true);
	xhttp1.send();
}
function getProducts(ser) {
	var xhttp1 = new XMLHttpRequest();
	xhttp1.onreadystatechange = function(){
		if (this.readyState == 4 && this.status == 200) {
			document.getElementById("products").innerHTML = this.responseText;
			tableau('2');
		}
	};
	xhttp1.open("GET", "Products.php?Ser="+ser, true);
	xhttp1.send();
}
function mail() {
	$('#affphone').hide();
	$('#affadresse').hide();
	$('#affmail').fadeToggle();
}
function phone() {
	$('#affmail').hide();
	$('#affadresse').hide();
	$('#affphone').fadeToggle();
}
function adresse() {
	$('#affmail').hide();
	$('#affphone').hide();
	$('#affadresse').fadeToggle();
}
function languages() {
	if ($("#larrow").html()=='<i class="fa fa-angle-down"></i>'){
		$("#larrow").html('<i class="fa fa-angle-right"></i>');
	}
	else if ($("#larrow").html()=='<i class="fa fa-angle-right"></i>'){
		$("#larrow").html('<i class="fa fa-angle-down"></i>');
	}
	$("#langs").slideToggle(2000);
}
function skills() {
	if ($("#sarrow").html()=='<i class="fa fa-angle-down"></i>'){
		$("#sarrow").html('<i class="fa fa-angle-right"></i>');
	}
	else if ($("#sarrow").html()=='<i class="fa fa-angle-right"></i>'){
		$("#sarrow").html('<i class="fa fa-angle-down"></i>');
	}
	$("#skis").slideToggle(2000);
}
function education() {
	if ($("#earrow").html()=='<i class="fa fa-angle-down"></i>'){
		$("#earrow").html('<i class="fa fa-angle-right"></i>');
	}
	else if ($("#earrow").html()=='<i class="fa fa-angle-right"></i>'){
		$("#earrow").html('<i class="fa fa-angle-down"></i>');
	}
	$("#eds").slideToggle(2000);
}
function fade(i) {
	$("#s"+i).css('opacity','0.7');
}
function clair(i) {
	$("#s"+i).css('opacity','1.0');
}
function fade2(i) {
	$("#p"+i).css('opacity','0.7');
}
function clair2(i) {
	$("#p"+i).css('opacity','1.0');
}
function tableau(arg) {
	$('#data'+arg).after('<div id="nav'+arg+'"></div>');
        var rowsShown = 3;
        var rowsTotal = $('#data'+arg+' div').length;
        var numPages = rowsTotal/rowsShown;
        for(i = 0;i < numPages;i++) {
            var pageNum = i + 1;
            $('#nav'+arg).append('<a href="#/" rel="'+i+'">'+pageNum+'</a> ');
        }
        $('#data'+arg+' div').hide();
        $('#data'+arg+' div').slice(0, rowsShown).show();
        $('#nav'+arg+' a:first').css({ 'color': 'white', 'background-color': '#000' });
        $('#nav'+arg+' a').bind('click', function(){
            $('#nav'+arg+' a').css({ 'color': 'black', 'background-color': '#DDD' });
            $(this).css({ 'color': 'white', 'background-color': '#000' });
            var currPage = $(this).attr('rel');
            var startItem = currPage * rowsShown;
            var endItem = startItem + rowsShown;
            $('#data'+arg+' div').css('opacity','0.0').hide().slice(startItem, endItem).
            css('display','table-row').animate({opacity:1}, 300);
	});
}