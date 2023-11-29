const allSideMenu = document.querySelectorAll('#sidebar .side-menu.top li a');

allSideMenu.forEach(item=> {
	const li = item.parentElement;

	item.addEventListener('click', function () {
		allSideMenu.forEach(i=> {
			i.parentElement.classList.remove('active');
		})
		li.classList.add('active');
	})
});
// TOGGLE SIDEBAR
const menuBar = document.querySelector('#content nav .bx.bx-menu');
const sidebar = document.getElementById('sidebar');

menuBar.addEventListener('click', function () {
	sidebar.classList.toggle('hide');
})

const searchButton = document.querySelector('#content nav form .form-input button');
const searchButtonIcon = document.querySelector('#content nav form .form-input button .bx');
const searchForm = document.querySelector('#content nav form');


if(window.innerWidth < 768) {
	sidebar.classList.add('hide');
} else if(window.innerWidth > 576) {
	searchButtonIcon.classList.replace('bx-x', 'bx-search');
	searchForm.classList.remove('show');
}


window.addEventListener('resize', function () {
	if(this.innerWidth > 576) {
		searchButtonIcon.classList.replace('bx-x', 'bx-search');
		searchForm.classList.remove('show');
	}
})


document.addEventListener('DOMContentLoaded', function () {
	const switchMode = document.getElementById('switch-mode');

	// Функция для получения текущей темы из localStorage
	function getTheme() {
		return localStorage.getItem('theme') || 'light';
	}

	// Функция для сохранения текущей темы в localStorage
	function setTheme(theme) {
		localStorage.setItem('theme', theme);
	}

	// Применяем текущую тему при загрузке страницы
	function applyTheme() {
		const currentTheme = getTheme();
		if (currentTheme === 'dark') {
			switchMode.checked = true;
			document.body.classList.add('dark');
		} else {
			switchMode.checked = false;
			document.body.classList.remove('dark');
		}
	}

	// Обработчик изменения состояния чекбокса
	switchMode.addEventListener('change', function () {
		if (this.checked) {
			document.body.classList.add('dark');
			setTheme('dark'); // Сохраняем тему в localStorage при включении
		} else {
			document.body.classList.remove('dark');
			setTheme('light'); // Сохраняем тему в localStorage при выключении
		}
	});

	// Применяем текущую тему при загрузке страницы
	applyTheme();
});