<script type="text/javascript">
window.addEventListener("load", function(){
document.body.addEventListener('click', fn, true); 
async function fn(event) {
console.log(event)
let url = document.location.origin;
let timestamp = Date.now().toString().substring(0,10);
console.log(timestamp)
    await postData('http://0.0.0.0:8077/api/stats', { click_pointer:'X: '+ event.x + 'Y: '+ event.y, site_url: url, realtime_created_at: timestamp})
      .then(data => {
        console.log(data); // JSON data parsed by `data.json()` call
      });
}

async function postData(url = '', data = {}) {
  // Default options are marked with *
  const response = await fetch(url, {
    method: 'POST', // *GET, POST, PUT, DELETE, etc.
    mode: 'cors', // no-cors, *cors, same-origin
    
    headers: {
      'Content-Type': 'application/from-data',
            'Content-Type': 'application/json',
        'Accept': 'application/json'
    },
    redirect: 'follow', // manual, *follow, error
    referrerPolicy: 'no-referrer', // no-referrer, *no-referrer-when-downgrade, origin, origin-when-cross-origin, same-origin, strict-origin, strict-origin-when-cross-origin, unsafe-url
    body: JSON.stringify(data) // body data type must match "Content-Type" header
  });
  return response.json(); // parses JSON response into native JavaScript objects
}
});
</script>

<?php
echo 123;
$b =3;

