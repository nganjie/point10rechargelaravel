/*(function(){
    var socket = new WebSocket("ws://127.0.01:8060");

    function parseMessage(message)
    {
        var msg ={type:"",sender:"",text:""};
        try{
            msg=JSON.parse(message);
        }catch(e){
            return false;
        }
        return msg;
    }
    function appendMessage(message){
        var msgContainer =document.querySelector(".messages");
        console.log(msgContainer);
        var parsedMessage;
        if(parsedMessage=parseMessage(message))
        {
            console.log("appending message ...");
            console.log(parsedMessage);

            var msgElem,senderElem,textElem;
            var sender,text;

            msgElem=document.createElement('div');
            msgElem.classList.add('msg');
            msgElem.classList.add('msg'+parsedMessage.type);
            senderElem=document.createElement('span');
            senderElem.classList.add('msg-sender');

            textElem = document.createElement('span');
            textElem.classList.add('msg-text');

            sender =document.createTextNode(parsedMessage.sender+': ');
            text =document.createTextNode(parsedMessage.text);

            senderElem.appendChild(sender);
            textElem.appendChild(text);
            msgElem.appendChild(senderElem);
            msgElem.appendChild(textElem);
            msgContainer.appendChild(msgElem)
            console.log(msgContainer)
            console.log(msgElem);

        }
    }
    function setUp()
    {
        var sender=" ";
        var joinForm =document.querySelector('form.join-form');
        var msgForm =document.querySelector('form.msg-form');
        var closeForm =document.querySelector('form.close-form');

        var joinFormSubmit =(e)=>{
            e.preventDefault(); 
            var sender = document.getElementById('sender').value;
            var joionMsg={
                type:'join',
                sender:sender,
                text:sender+" joined the chat !"
            }
            socket.send(JSON.stringify(joionMsg));
            joinForm.classList.add('hidden');
            msgForm.classList.add('hidden');
            closeForm.classList.add('hidden');
        };
        var msgFormSubmit =(e)=>{
            e.preventDefault(); 
            var msgField,msgText,msg;
            msgField =document.getElementById('msg');
            msgText=msgField.value;
            msg={
                type:"normal",
                sender:sender,
                text:msgText
            }
            socket.send(JSON.stringify(msg));
            msgField.value ='';
        };
        var closeFormSubmit =(e)=>{
            e.preventDefault(); 
            socket.close();
            window.location.reload();
        };
        joinForm.addEventListener("submit",joinFormSubmit)
        msgForm.addEventListener("submit",msgFormSubmit)
        closeForm.addEventListener("submit",closeFormSubmit)

    }
    var socketOpen=(e)=>{
        console.log("connected to the socket");
        var msg ={
            type:"join",
            sender:"Browser",
            text:"connected to de chat server"
        };
        appendMessage(JSON.stringify(msg));
        setUp();
    }
    var socketMessage =(e)=>{
        console.log("Message from the the server ? "+e.data)
        appendMessage(e.data);
    }
    var socketClose =(e)=>{
        console.log("disconnection server")
    }
    var socketError =(e)=>{

    }
    socket.addEventListener("open",socketOpen);
    socket.addEventListener("message",socketMessage);
    socket.addEventListener("close",socketClose);
    socket.addEventListener("error",socketError);
})();*/

(function(){
    function sendMessage(message) {
        socket.send(message);
    }

    function parseMessage(message) {
        var msg = {type: "", sender: "", text: ""};
        try {
            msg = JSON.parse(message);
        }
        catch(e) {
            return false;
        }
        return msg;
    }

    function appendMessage(message) {
        
        var parsedMsg;
        var msgContainer = document.querySelector(".messages");
        if (parsedMsg = parseMessage(message)) {
            console.log('appending message');
            console.log(parsedMsg);

            var msgElem, senderElem, textElem;
            var sender, text;

            msgElem = document.createElement("div");
            msgElem.classList.add('msg');
            msgElem.classList.add('msg-' + parsedMsg.type);

            senderElem = document.createElement("span");
            senderElem.classList.add("msg-sender");

            textElem = document.createElement("span");
            textElem.classList.add("msg-text");

            sender = document.createTextNode(parsedMsg.sender + ': ');
            text = document.createTextNode(parsedMsg.text);

            console.log(sender);
            
            senderElem.appendChild(sender);
            textElem.appendChild(text);

            msgElem.appendChild(senderElem);
            msgElem.appendChild(textElem);

            msgContainer.appendChild(msgElem);
        }
    }

    function setup() {
        var sender = '';
        var joinForm = document.querySelector('form.join-form');
        var msgForm = document.querySelector('form.msg-form');
        var closeForm = document.querySelector('form.close-form');
    
        function joinFormSubmit(event) {
            event.preventDefault();
            sender = document.getElementById('sender').value;
            var joinMsg = {
                type: "join",
                sender: sender,
                text: sender + ' joined the chat!'
            };
            sendMessage(JSON.stringify(joinMsg));
            joinForm.classList.add('hidden');
            msgForm.classList.remove('hidden');
            closeForm.classList.remove('hidden');
        }
    
        joinForm.addEventListener('submit', joinFormSubmit);
    
        function msgFormSubmit(event) {
            event.preventDefault();
            var msgField, msgText, msg;
            msgField = document.getElementById('msg');
            msgText = msgField.value;
            msg = {
                type: "normal",
                sender: sender,
                text: msgText
            };
            msg = JSON.stringify(msg);
            sendMessage(msg);
            msgField.value = '';
        }
    
        msgForm.addEventListener('submit', msgFormSubmit);

        function closeFormSubmit(event) {
            event.preventDefault();
            socket.close();
            window.location.reload();
        }

        closeForm.addEventListener('submit', closeFormSubmit);
    }

    let socket = new WebSocket("ws://130.185.118.11:30027");

    var socketOpen = (e) => {
        console.log("connected to the socket");
        var msg = {
            type: 'join',
            sender: 'Browser',
            text: 'connected to the chat server'
        }
        appendMessage(JSON.stringify(msg));
        setup();
    }

    var socketMessage = (e) => {
        console.log(`Message from socket: ${e.data}`);
        appendMessage(e.data);
    }

    var socketClose = (e) => {
        var msg;
        console.log(e);
        if(e.wasClean) {
            console.log("The connection closed cleanly");
            msg = {
                type: 'left',
                sender: 'Browser',
                text: 'The connection closed cleanly'
            }
        }
        else {
            console.log("The connection closed for some reason");
            var msg = {
                type: 'left',
                sender: 'Browser',
                text: 'The connection closed for some reason'
            }
        }
        appendMessage(JSON.stringify(msg));
    }
    
    var socketError = (e) => {
        console.log("WebSocket Error");
        console.log(e);
    }

    socket.addEventListener("open", socketOpen);
    socket.addEventListener("message", socketMessage);
    socket.addEventListener("close", socketClose);
    socket.addEventListener("error", socketError);
})();