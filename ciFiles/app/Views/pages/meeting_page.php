<script src="<?php echo site_url("assets/js/socket.js"); ?>"></script>
<script src="https://unpkg.com/peerjs@1.3.1/dist/peerjs.min.js"></script>
<style>
video{
  width: 50%;
  padding: 2%;
}
</style>
<script>
    const ROOM_ID = "<?php echo $meetingData["public_id"]; ?>"
  </script>
<main class="page-content" id="meeting-page">

  <div class="container">
  
    <div id="videoGrid">
    </div>

    <!-- <button id="callStart" class="btn">Call</button> -->
  
  </div>

</main>
<script>
  const socket = io.connect('<?php echo site_url(); ?>', {path: "/conferesk/"});
const videoGrid = document.getElementById('videoGrid')
var myPeer = new Peer("<?php echo $_SESSION["id"]; ?>",{}); 
const myVideo = document.createElement('video')
myVideo.muted = true
const peers = {}
let peersList = [];
navigator.mediaDevices.getUserMedia({
  video: true,
  audio: true
}).then(stream => {
  addVideoStream(myVideo, stream)
  myPeer.on('call', call => {
    call.answer(stream)
    const video = document.createElement('video')
    call.on('stream', userVideoStream => {
      addVideoStream(video, userVideoStream)
    })
  })

  socket.on('user-connected', userId => {
    connectToNewUser(userId, stream)
  })
})

socket.on('user-disconnected', userId => {
  if (peers[userId]) peers[userId].close()
})

myPeer.on('open', id => {
  socket.emit('join-room', ROOM_ID, id)
})

function connectToNewUser(userId, stream) {
  const call = myPeer.call(userId, stream)
  const video = document.createElement('video')
  call.on('stream', userVideoStream => {
    addVideoStream(video, userVideoStream)
  })
  call.on('close', () => {
    video.remove()
  })
  peers[userId] = call
}

function addVideoStream(video, stream) {
  video.srcObject = stream
  video.addEventListener('loadedmetadata', () => {
    video.play()
  })
  videoGrid.append(video)
}
</script>