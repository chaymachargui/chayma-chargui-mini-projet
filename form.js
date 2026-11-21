const form=document.getElementById('contactForm');
if(form){form.addEventListener('submit',
e=>{const name=document.getElementById('name').value.trim(),
email=document.getElementById('email').value.trim(),
subject=document.getElementById('subject').value.trim(),
message=document.getElementById('message').value.trim(),
out=document.getElementById('formError');
let error='';
if(!name||!email||!subject||!message)error='Merci de remplir tous les champs.';
else if(!/^[^\s@]+@[^\s@]+\.[^\s@]{2,}$/.test(email))error='Adresse e-mail invalide.';
if(error){e.preventDefault();out.textContent=error;out.className='form-message error';}
else{out.textContent='';}});}