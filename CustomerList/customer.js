let buttons = document.getElementsByClassName('delete-btn');
for(let i = 0; i<buttons.length; i++){
    buttons[i].addEventListener('click', () => {
        openDialogue(buttons[i].id);
    });
}

function openDialogue(idValue){
    let result = confirm("Are you sure you want to delete the selected row?");
     if(result){
        deleteCall(idValue);
     }
}

function deleteCall(index){
     const xhr = new XMLHttpRequest();
     xhr.onload = function() {
        if (xhr.status >= 200 && xhr.status < 300) {
        console.log("Success:", xhr.responseText);
        window.location.reload();
        } else {
        console.error("Error:", xhr.status, xhr.statusText);
        }
    };
    xhr.open("POST", "deleteRow.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    const data = `id=${index}`; 
    xhr.send(data);
}
