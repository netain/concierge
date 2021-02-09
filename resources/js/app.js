var menuBtn = document.querySelectorAll('.menu-btn');

if(menuBtn.length){
	menuBtn.forEach(function(el){
		el.addEventListener('click', e => {
			e.preventDefault();
			el.classList.toggle('close');
			document.querySelector(el.dataset.target).classList.toggle('show');
		})
	});
}