const menu=document.querySelector('.menu'),
nav=document.querySelector('.nav');
if(menu&&nav){menu.addEventListener('click',()=>{const open=nav.classList.toggle('open');
menu.setAttribute('aria-expanded',String(open));menu.textContent=open?'✕':'☰';});}
const theme=document.getElementById('themeToggle');
if(theme){if(localStorage.getItem('chayma-theme')==='dark')document.body.classList.add('dark');
theme.textContent=document.body.classList.contains('dark')?'☀':'☾';theme.addEventListener('click',()=>{document.body.classList.toggle('dark')
;const dark=document.body.classList.contains('dark');
localStorage.setItem('chayma-theme',dark?'dark':'light');
theme.textContent=dark?'☀':'☾';});}
const filters=document.querySelectorAll('.filter'),cards=document.querySelectorAll('.project');
filters.forEach(btn=>btn.addEventListener('click',()=>{filters.forEach(b=>b.classList.remove('active'));
btn.classList.add('active');const f=btn.dataset.filter;
cards.forEach(card=>card.hidden=f!=='all'&&card.dataset.category!==f);}));