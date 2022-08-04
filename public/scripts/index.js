const main = async () => {
    const response = await fetch('http://nix/menu/products', {
        headers: {
            'Content-type': 'application/json; charset=UTF-8',
        },
    });

    const json = await response.json();
    for (let i = 0; i < json.length; i++) {
        let product = document.querySelector('#blockMenu');

        const menuItem = document.createElement('div');
        menuItem.className = 'menu-element';
        product.appendChild(menuItem);

        const name = document.createElement('p');
        name.className = 'pizza-name';
        name.innerHTML = json[i].name;
        menuItem.appendChild(name);

        const img = document.createElement('img');
        img.setAttribute('src', json[i].img);
        img.innerHTML = json[i].img;
        menuItem.appendChild(img);

        const link = document.createElement('a');
        link.href = '#';
        menuItem.appendChild(link);

        for (let j = 0; j < 3; j++) {
            const br = document.createElement('br');
            link.appendChild(br);
        }

        const description = document.createElement('ul');
        description.className = 'description';
        link.appendChild(description);

        for (let k = 0; k < json[i].composition.length; k++) {
            const composition = document.createElement('li');
            composition.innerHTML = json[i].composition[k].name;
            description.appendChild(composition);
        }
        const priceAndWeight = document.createElement('div');
        priceAndWeight.className = 'price-and-weight';
        link.appendChild(priceAndWeight);

        const price = document.createElement('p')
        price.innerHTML = json[i].price + ' ' + json[i].weight + ' ' + json[i].size;
        priceAndWeight.appendChild(price);
    }
}
main();
