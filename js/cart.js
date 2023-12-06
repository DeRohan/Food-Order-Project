// Toggle Cart
function toggleCart() {
    var cartSection = document.getElementById("cartSection");
    cartSection.style.display = (cartSection.style.display === "block") ? "none" : "block";
}

// Add item to Cart
function addToCart(itemId, itemName, itemPrice, itemImage) {
    var cartContainer = document.querySelector(".cart .container");
    var cartItem = document.createElement("div");
    cartItem.classList.add("cart-item");

    cartItem.innerHTML = `
        <div>
            <img src="${itemImage}" alt="${itemName}">
            <span>${itemName}</span>
        </div>
        <div>
            ${itemPrice}
        </div>
    `;

    cartContainer.appendChild(cartItem);
}
