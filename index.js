const main = async () => {
    const response = await fetch('http://nix/menu/products', {
        headers: {
            'Content-type': 'application/json; charset=UTF-8',
        },
    });

    const json = await response.json();
    for (let i = 0; i < json.length; i++) {
        let product = document.querySelector('#product')

        const name = document.createElement('p')
        name.innerHTML = json[i].name;
        product.appendChild(name);

        const price = document.createElement('p')
        price.innerHTML = json[i].price;
        product.appendChild(price);

        const weight = document.createElement('p')
        weight.innerHTML = json[i].weight;
        product.appendChild(weight);

        const size = document.createElement('p')
        size.innerHTML = json[i].size;
        product.appendChild(size);

        const img = document.createElement('img')
        img.setAttribute('src', json[i].img);
        img.innerHTML = json[i].img;
        product.appendChild(img);

        for (let k = 0; k < json[i].composition.length; k++) {
            const composition = document.createElement('li')
            composition.innerHTML = json[i].composition[k].name;
            product.appendChild(composition);
        }
    }
}
main();
