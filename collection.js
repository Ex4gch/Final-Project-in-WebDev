fetch("https://api.thecatapi.com/v1/images/search?limit=8&api_key=live_ggXiyNBHZBVbTuEtStIuOX3NnYLbkHTozq98KXOGMNIOeZMg5J9Z2St6YUwSrQbZ")
    .then((data)=> {
        return data.json();
    }).then((objectData)=>{
        console.log(objectData[0]);
        let tableData = "";
        objectData.map((values)=>{
            tableData += 
            `<div class="cat-container">
                <img src="${values.url}"/>
                <h3></h3>
            </div>`
        });
        document.getElementById("cont").
        innerHTML = tableData;
    });


