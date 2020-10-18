var output = [];
for(var i = 0; i < DistArr.length; i++){
    output.push(
        {
            country : "uk",
            county : DistArr[i][0],
            name:  DistArr[i][1],
            address:  DistArr[i][2],
            tel:   DistArr[i][3],
            fax:   DistArr[i][4],
            email:   DistArr[i][5],
            web:   DistArr[i][6],
            altweb:   DistArr[i][7],
            aauditions: DistArr[i][8]
        }
    );
}

console.log(output);