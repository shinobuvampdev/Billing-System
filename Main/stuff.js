const button = document.getElementById('select-btn');
button.textContent = "Select";

const productID=document.getElementById('p-ID');

const proPrice= document.getElementById('p-price');
let buttons = document.getElementsByClassName('items-btn');
for(let i = 0; i<buttons.length; i++){
    buttons[i].addEventListener('click', () => {
        button.textContent = buttons[i].textContent;
        getData(i);
        getpID(i);
    });
}

const quantity = document.getElementById('pquantity');
quantity.addEventListener('input', function(event) {
  const totPrice = document.getElementById('t-price');
    totPrice.value = proPrice.value * quantity.value;
});

function getData(dataIndex){
    $.ajax({
        url: "dataget.php",
        type: "GET",
        dataType: "json",
        success: function(data) {
            proPrice.value=data[dataIndex];
        },
        error: function(error) {
            console.log("Error fetching data: ", error);
        }
    });
}

function getpID(dataIndex){
    $.ajax({
        url: "pIDGet.php",
        type: "GET",
        dataType: "json",
        success: function(data) {
            console.log(data[dataIndex]);
            productID.value =  data[dataIndex];
        },
        error: function(error) {
            console.log("Error fetching data: ", error);
        }
    });
}

