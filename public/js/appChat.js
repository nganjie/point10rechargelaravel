import './bootstrap.js';

const name =document.getElementById("name-id");

const message =document.getElementById("message");

const submitMessage=document.getElementById("submitMessage");

submitMessage.addEventListener("click",()=>{
    console.log("envoyer")
    axios.post("visiteurs/chat",{
        name:name.textContent,
        message:message.textContent
    })
})

window.Echo.channel("chat")
.listen(".chat-message",(event)=>{
    console.log(event);
})