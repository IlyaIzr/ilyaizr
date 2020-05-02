//window.onload = function() {
//	lax.setup() // init
//
//	const updateLax = () => {
//		lax.update(window.scrollY)
//		window.requestAnimationFrame(updateLax)
//	}
//
//	window.requestAnimationFrame(updateLax)
//}

let theme_switcher = document.getElementsByClassName('theme_switcher')[0];
function readCookie(name) {
	var nameEQ = name + "=";
	var ca = document.cookie.split(';');
	for(var i=0;i < ca.length;i++) {
			var c = ca[i];
			while (c.charAt(0)==' ') c = c.substring(1,c.length);
			if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
	}
	return null;
}
let lang_cookie = readCookie('lang');

theme_switcher.addEventListener('click', function(){
	if (readCookie('theme') == 'light') {		
		document.cookie = "theme=dark;";
		theme_stylesheet.href = "less/dark_theme.css";
		if (lang_cookie == 'ru'){
		theme_switcher_text.textContent = "к светлой теме";}
		else {
			theme_switcher_text.textContent = "to light theme";
		}
		console.log(readCookie('theme') + "Case 1 from light to dark")
  } else {
		document.cookie = "theme=light;";
		theme_stylesheet.href = "less/light_theme.css";
		if (lang_cookie == 'ru'){
			theme_switcher_text.textContent = "к тёмной теме";}
		else {
			theme_switcher_text.textContent = "to dark theme";
		}
		console.log(readCookie('theme') + "Case 2 from dark to light")
	}	
	console.log("clicked")
});

window.onload = function(){
	congratulations_image.src = "img/congratulations.gif";
};

//__ Mobile view edits

function tall_screen_actions(){
	
	main_styleshhet.href = "less/mobile.css";
	document.querySelector('.services').querySelector('.container').style = "";
	let service_comment_list = document.querySelector('.services').querySelectorAll('.services_comment');
	for (let i = 0; i < service_comment_list.length; i++) {
		let str_with_brackets = service_comment_list[i].textContent;
		let no_brackets = str_with_brackets.substring(1, str_with_brackets.length-1);
		service_comment_list[i].textContent = no_brackets;
	}
	
	document.querySelector('.improvments').querySelector('.container').style = "";
	let improvments_pathes_arr = document.querySelector('.improvments').querySelector('svg').querySelectorAll('path');
	improvments_pathes_arr[1].setAttribute('d', 'M 1 2 H 180');
	
	let separator_svg = document.querySelector('.two_lines_separator').querySelector('svg');
		separator_svg.setAttribute('viewBox', '0 0 ' + window.innerWidth + ' 10');
		separator_svg.firstElementChild.setAttribute('d', 'M 20 2 H ' + ( window.innerWidth/2 - 5 ));	
		separator_svg.lastElementChild.setAttribute('d', 'M ' + ( window.innerWidth/2 + 5 ) + ' 2 H ' + (window.innerWidth - 20));

	let process_nodes = document.querySelectorAll('.node');
	for (let i = 0; i < process_nodes.length; i++) {
		process_nodes[i].querySelector('svg').setAttribute('viewBox', '0 0 ' + window.innerWidth*0.75 + ' 28');
		//console.log(process_nodes[i].querySelector('svg'))
		if (process_nodes[i].querySelector('g')) {
			process_nodes[i].querySelector('g').setAttribute('transform', 'translate(50)');
		}
	}

	//__ Mobile AND russian lang
	if (lang_cookie == 'ru'){
		[...document.querySelectorAll(".services_options")]
   .filter(div => div.textContent.includes("Одностраничные приложения"))
	 .forEach(div => div.textContent = "SPA(single page app)");
	 document.querySelector(".prices .description").textContent = "Веб-страница по шаблону";
	}

}
if (window.innerHeight>=window.innerWidth){
	tall_screen_actions();
	console.log("tall_screen_actions used")
}
window.onorientationchange = function() { 
	if (window.innerHeight<window.innerWidth){
		tall_screen_actions();
		console.log("tall_screen_actions used")
  } else {
		window.location.reload(false); 
		console.log("REEEEELODING")
	}
};

let examples_container = document.querySelector('.examples .container');
let examples_anchors = examples_container.querySelectorAll('a');
//last anchor, which leads to this site
examples_anchors[examples_anchors.length-1].href = '#';