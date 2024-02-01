import './bootstrap.js';

const name =document.getElementById("name-id");

const message =document.getElementById("message");

const submitMessage=document.getElementById("submitMessage");

const chatDiv=document.getElementById("chat");

submitMessage.addEventListener("click",()=>{
    axios.post("./chat",{
        name:name.value,
        message:message.value
    })
})

window.Echo.channel("chat")
.listen(".chat-message",(event)=>{
    console.log(event);
    chatDiv.innerHTML +=`<div class="col-start-6 col-end-13 p-3 rounded-lg">
    <div class="flex items-center justify-start flex-row-reverse">
      <div
        class="flex items-center justify-center h-10 w-10 rounded-full bg-indigo-500 flex-shrink-0"
      >
      ${event.name[0].toUpperCase()}
      </div>
      <div
        class="relative mr-3 text-sm bg-indigo-100 py-2 px-4 shadow rounded-xl"
      >
        <div>${event.message}</div>
      </div>
    </div>
  </div>`
})

//${event.message}
//${event.name[0].toUpperCase()}