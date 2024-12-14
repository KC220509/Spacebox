import './bootstrap';

// const roomId = "{{ $roomFirst->room_id }}";
const roomId = document.getElementById('roomCurrent').value;
window.Echo.channel(`room.${roomId}`).listen('.userOutRoom', (event) => {
    const userIdLeft = event.user_id; 
    const userElement = document.querySelector('#user-' + userIdLeft);
   
    if (userElement) {
        userElement.remove();
    }

    console.log(`User ${userIdLeft } has left the group`);

});