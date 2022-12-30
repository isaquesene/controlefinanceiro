let tableBody = document.querySelector("tbody");
let btnSalvar = document.querySelector(".btn"),
    modals = document.querySelector(".modal-container"),
    form = document.querySelector("form");

var database = firebase.database();
var usersRef = firebase.database().ref('users/');

function writeUserData(descricao, valor, pagamento, categoria, data) {
   // const db = getDatabase();
   let userId = usersRef.push().key;
    usersRef.child(userId).set({
        descricao: descricao,
        valor: valor,
        pagamento: pagamento,
        categoria: categoria,
        data: data
    }).then((onFullFilled) =>{
        console.log("writed");
    },(onRejected)=>{
        console.log(onRejected);
    });
}

/*writeUserData(1, "Arroz", "20,00", "cc nun", "29/12/2022")
writeUserData(2, "Pão", "2,00", "cc nun", "29/12/2022")*/
//writeUserData("macarrão", "12,00", "cc nun", "comida", "29/12/2022")

usersRef.on('value', (snapshot) => {
    const users = snapshot.val();
    tableBody.innerHTML = "";
    //console.log(users);
    //updateStarCount(postElement, data);
    for(user in users)
    {
        //console.log(typeof users[user]);
        //console.log(typeof users);
        let tr = `
        <tr data-id= ${user}>
            <td data-label="Descrição">${users[user].descricao}</td>
            <td data-label="Valor">${users[user].valor}</td>
            <td data-label="Pagamento">${users[user].pagamento}</td>
            <td data-label="Categoria">${users[user].categoria}</td>
            <td data-label="Data">${users[user].data}</td>
            <td data-label="Ação">
                <button class="edit">Edit</button>
                <button class="delete">Delete</button>
            </td>
        </tr>
        `

        tableBody.innerHTML += tr;
    }

    let editButtons = document.querySelectorAll(".edit");
    editButtons.forEach(edit =>{
        edit.addEventListener("click", () =>{
            modals.classList.add("active");
            let userId = edit.parentElement.parentElement.dataset.id;
            usersRef.child(userId).get().then((snapshot => {
                //console.log(snapshot.val());
                form.descricao.value = snapshot.val().descricao;
                form.valor.value = snapshot.val().valor;
                form.pagamento.value = snapshot.val().pagamento;
                form.categoria.value = snapshot.val().categoria;
                form.data.value = snapshot.val().data;
            }))
            form.addEventListener("submit", (e) =>{
                e.preventDefault();
                usersRef.child(userId).update({
                    descricao: form.descricao.value,
                    valor: form.valor.value,
                    pagamento: form.pagamento.value,
                    categoria: form.categoria.value,
                    data: form.data.value
                }).then((onFullFilled) =>{
                    alert("Alterado com sucesso!")
                },(onRejected)=>{
                    console.log(onRejected);
                });
            })
        })
    })
});

// Open form

btnSalvar.addEventListener("click", () =>{
        modals.classList.add("active");
        form.addEventListener("submit", (e) => {
            e.preventDefault();
            writeUserData(form.descricao.value, form.valor.value, form.pagamento.value, 
            form.categoria.value, form.data.value)
        })
})


// Close Form
window.addEventListener("click", (e)=>{
    if(e.target == modals)
    {
        modals.classList.remove("active");
        form.reset()
    }
})
