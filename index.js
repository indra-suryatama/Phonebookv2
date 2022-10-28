function showUserCreateBox() {
  Swal.fire({
    title: 'Add new',
    html:
		'<form id="myForm" action="/phonebook/add.php" method="post">' +
		  '<input id="name" class="swal2-input" placeholder="Name">' +
		  '<input id="address" class="swal2-input" placeholder="Address">' +
		  '<input id="phoneNumber" class="swal2-input" placeholder="Phone Number">' +
		'</form>' ,
    focusConfirm: false,
    preConfirm: () => {
      userCreate();
    }
  })
}

function userCreate() {
  const name = document.getElementById("name").value;
  const address = document.getElementById("address").value;
  const phoneNumber = document.getElementById("phoneNumber").value;
 // console.log('name', name);
  
  const xhttp = new XMLHttpRequest();
  xhttp.open("POST", "http://localhost/phonebook/add.php");
  xhttp.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
  xhttp.send(JSON.stringify({"data":{ 
    "name": name, "address": address, "phoneNumber": phoneNumber
  }}));
  xhttp.onreadystatechange = function() {
	    console.log(this);
	  console.log(this.status);
    /*if (this.readyState == 4 && this.status == 200) {
      const objects = JSON.parse(this.responseText);
      Swal.fire(objects['message']);
      loadTable();
    }*/
  };
  
//document.getElementById("myForm").submit();
}