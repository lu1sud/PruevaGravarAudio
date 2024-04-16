const micro = document.querySelector('.content__micro');
const audio = document.getElementById('audio');
const borderMicro = document.querySelector('.border__micro');

let stream = null
let mediaRecorder;
let audioChunks = [];
let startTime;
let timerInterval;

async function startRecording(){
    try{
        stream = await navigator.mediaDevices.getUserMedia({
            audio: true
        });

        mediaRecorder = new MediaRecorder(stream, {
            mimeType: "audio/webm"
        });

        mediaRecorder.ondataavailable = (event) => {
            audioChunks.push(event.data);
        };

        mediaRecorder.onstop = (e)=>{

            const blob = new Blob(audioChunks, {
                type: "audio/webm"
            });

            let form = new FormData();
            form.append("audio", blob, "recording.webm");

            let xhr = new XMLHttpRequest();
            xhr.open('post', 'http://localhost/proyectosPHP/pruevaGravarAudio/php/guardarAudio.php', true);
            xhr.onload = ()=>{
                if(xhr.state == XMLDocument.DONE){
                    if(xhr.status == 200){
                        let data = xhr.response;
                        console.log(data);
                        
                    }
                }
            };
            xhr.send(form);

            //console.log("termino de gravar");
            audioChunks.shift();
        };

        mediaRecorder.start();
        borderMicro.classList.add("micro__animate-active");
        
    }catch(error){

    }
}

function stopRecording(){
    mediaRecorder.stop();
    borderMicro.classList.remove("micro__animate-active");
}


micro.onclick = ()=>{
    if(mediaRecorder && mediaRecorder.state == "recording"){
        stopRecording();
    }else{
        startRecording();
    }
};

