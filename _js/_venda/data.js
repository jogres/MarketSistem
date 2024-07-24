
// Obtenha a data e hora atuais
const now = new Date();
    
// Formate a data e hora para o formato adequado
const year = now.getFullYear();
const month = String(now.getMonth() + 1).padStart(2, '0'); // adiciona zero à esquerda, se necessário
const day = String(now.getDate()).padStart(2, '0');
const hours = String(now.getHours()).padStart(2, '0');
const minutes = String(now.getMinutes()).padStart(2, '0');
const formattedDateTime = `${year}-${month}-${day}T${hours}:${minutes}`;
    
// Defina a data e hora atual no campo de data
document.getElementById('data').value = formattedDateTime; 
          