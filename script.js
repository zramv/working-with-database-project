const form = document.getElementById("form");
const nameForm = document.getElementById("name");
const ageForm = document.getElementById("age");
const tableBode = document.getElementById("tableBody");


//Show and fetch data
document.addEventListener('DOMContentLoaded',()=>{
  fetchData();
})

//insert code =========================================
form.addEventListener("submit",(e)=>{
  e.preventDefault();

  const data ={
    name: nameForm.value,
    age: ageForm.value
  }

  fetch("insert.php",{
    method:"POST",
    headers:{
      'content-Type':"application/json"
    },
    body:JSON.stringify(data)
  })
  .then(response => response.json())
  .then(data => {
    console.log("Response from PHP:",data);
    fetchData();
    form.reset();
    //write the condition for insert XXXXXXXXXXXXXXXXXXX
  }).catch(error=>{
    console.log("ERROR:",error);
  });
});

function fetchData(){
fetch('get_data.php',{
  method:"POST",
  headers:{
      'content-Type':"application/json"
  },
  body:''
})
.then(response =>response.json())
.then(data=>{
  tableBode.textContent='';
   showData(data)
}).catch(error=>{
  console.log("ERROR:",error);
})}


function showData(data){
  const fragment = document.createDocumentFragment();
    data.forEach(user => {
    const tr = document.createElement('tr');
    fragment.appendChild(tr);
    const id = document.createElement('td');
    id.textContent = user.id;
    tr.appendChild(id);

    const name = document.createElement('td');
    name.textContent = user.name;
    tr.appendChild(name);
    
    const age = document.createElement('td');
    age.textContent = user.age;
    tr.appendChild(age);

    const status = document.createElement('td');
    status.textContent = user.status;
    tr.appendChild(status);

    const button = document.createElement('button');
    button.textContent = 'Toggle';
    const action = document.createElement('td');
    action.appendChild(button);
    tr.appendChild(action);
  });
  tableBode.appendChild(fragment);
}
