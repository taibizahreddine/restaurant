<?php include('partials-front/menu.php')?>

<style>




*{
    margin: 0 0;
    padding: 0 0;
    font-family: Arial, Helvetica, sans-serif;
}

.container{
  
    width: 80%;
    margin: 0 auto;  /* raha mka7za la page à droit*/
    padding: 1%;
   
}
.responsive-img{
    width: 100%;

}
.curve-img{
    border-radius: 15px;
}

.text-right{
    text-align: right;
}

.text-center{
    text-align: center;
}
.text-white{
    color: white;
}
.effacement{
    clear: both;
float: none;
}

a{
    color:black;
    text-decoration: none;
}
a:hover{
    color: rgb(76, 72, 72);
}
.btn{
    padding: 1%;
    border: none;
    font-size: 1rem;
    border-radius: 5px;
    
}
.btn-premier{
    background-color: black;
    color: white;
    cursor: pointer;
}
.btn-premier:hover{
    color: white;
    background-color:  rgb(76, 72, 72);
}

h2{
    color:#2f3542;
    font-size: 2rem;
    margin-bottom: 2%;
}

h3{
    font-size: 1.5rem;
}
.float-container{
    position: relative;
}

.float-text{
    position: absolute;
    bottom: 50px;
    left: 37%;
}


/* css bdn section */
.logo{
    width: 10%;
  
    float: left;
}
.menu{
    line-height: 60px;
}

.menu  ul{
list-style-type: none;
}

.menu ul li{
    display: inline;
    padding: 1%;
    font-weight: bold;
}


/* css for recherche-plat */



/* css pour menu */
.menu-plat{
    background-color: #ececec;
    padding: 5% 0;
}
.menu-plat-box{
    border: 1px solid black;
    width:40%;
    margin: 1%;
    padding: 2%;
    float: left;
    background-color: white;
    border-radius: 15px;
   
}
.menu-plat-img{
    width: 20%;
    float: left;
}
.description{
    width: 70%;
    float: left;
    margin-left: 8%;
}
.prix-plat{
    font-size: 1.2rem;
    margin: 2% 0;
}

.detail-plat{
    font-size: 1rem;
}












/* _________________________________________________________________________________________________ */
        /* CSS for Cart Icon/Button */
        .cart-icon button {
            background-color: #ff6347;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 20px;
            cursor: pointer;
        }

        /* CSS for Cart Display Area */
        .cart {
            position: fixed;
            top: 70px;
            right: 20px;
            background-color: #fff;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            display: none;
            z-index: 1000;
        }

        .cart h3 {
            margin-bottom: 10px;
        }

        .cart ul {
            list-style-type: none;
            padding: 0;
        }

        .cart ul li {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 5px;
            font-size: 14px;
        }

        .cart ul li .item-info {
            flex-grow: 1;
        }

        .cart ul li .item-quantity {
            display: flex;
            align-items: center;
        }

        .cart ul li .item-quantity button {
            padding: 5px 10px;
            font-size: 14px;
        }

        /* Style the cart toggle button when the cart is shown */
        .cart.show {
            display: block;
}

</style>

    <!-- recherche plat  section -->
   
     <!-- recherche  plat  section end-->



    <!-- fOOD MEnu Section Starts Here -->
    <section class="menu-plat">
        <div class="container">
            <h2 class="text-center">Menu</h2>
<?php

// table number from the url 
$tableNumber = isset($_GET['table_number']) ? $_GET['table_number'] : '';
//get food sfrom db that are active and featured

$sql = "SELECT * FROM tbl_food WHERE active='Yes' AND featured='Yes' LIMIT 8 ";
//execute
$res = mysqli_query($conn, $sql);

//count rows
$count = mysqli_num_rows($res);
//check if food availabale
if($count>0)
{
while($row=mysqli_fetch_assoc($res))
{
    //get values
    $id_food =$row['id_food'];
    $title =$row['title'];
    $price =$row['price'];
    $description =$row['description'];
    $image_name =$row['image_name'];
    ?>



                <div class="menu-plat-box">
                    <div class="menu-plat-img">
                    <?php 
                    //check whether image kayen or not
                    if($image_name=="")
                    {
                        //no image 
                        echo "<div class='error'>no image</div>";
                    }
                    else{
                        //kayna w tkoun
                        ?>

                <img src="<?php echo SITEURL; ?>images/food/<?php echo $image_name;  ?> " alt="le burger de la maison" class="responsive-img curve-img">
                                    


                        <?php

                    }
                    
                    
                    
                    ?>
                       </div>
                    <div class="description">
                        <h4><?php echo $title?></h4>
                        <p class="prix-plat"><?php echo $price . ' DA'; ?></p>

                        <p class="detail-plat">
                        <?php echo $description?>
                        </p><br>
                        <a  class="btn btn-premier" onclick="addItemToCart('<?php echo htmlspecialchars($title); ?>','<?php echo htmlspecialchars($price); ?>')">commender</a></div>
                        <!-- rani gle3t l'"href=" -->
                </div>

    <?php
    
}
}
else{
    echo  "<div class='error'>not food available.</div>";
}

?>

          


                <div class="effacement"></div>
            
           
            
        </div>

     </section>
     
    <div class="cart-icon">
        <button onclick="toggleCart()">Cart <span id="cartCount">0</span></button>
    </div>

    <div id="cart" class="cart">
        <h3>Cart</h3>
        <ul id="cartItems">
            <!-- Cart items will be dynamically added here -->
        </ul>
        <p id="totalPrice">Total: 0 DA</p>
        
        <button onclick="placeOrder()">Order-Now</button>
    </div>

    <!-- fOOD Menu Section Ends Here -->
    <?php include('partials-front/footer.php')?>

    
  
  <script>
      window.addEventListener('beforeunload', function () {
        localStorage.removeItem('cart');
    });

    // Load cart from local storage   
    window.onload = function () {
        const storedCart = localStorage.getItem('cart');
        if (storedCart) {
            cart = JSON.parse(storedCart);
            updateCart();
        }
    }
        let cart = [];

        // Function to toggle display of cart
        function toggleCart() {
            const cartDisplay = document.getElementById('cart');
            cartDisplay.classList.toggle('show');
        }

        // Function to add item to cart
        function addItemToCart(name, price) {
            const existingItem = cart.find(item => item.name === name);
            if (existingItem) {
                existingItem.quantity++;
            } else {
                cart.push({ name, price, quantity: 1 });
            }
            updateCart();
        }

        // Function to decrease item quantity
        function decreaseItemQuantity(name) {
            const item = cart.find(item => item.name === name);
            if (item.quantity > 1) {
                item.quantity--;
            } else {
                cart = cart.filter(item => item.name !== name);
            }
            updateCart();
        }

        // Function to increase item quantity
        function increaseItemQuantity(name) {
            const item = cart.find(item => item.name === name);
            item.quantity++;
            updateCart();
        }

        // Function to update cart display
        function updateCart() {
            const cartCount = document.getElementById('cartCount');
            const cartItemsList = document.getElementById('cartItems');
            const totalPriceElement = document.getElementById('totalPrice');

            cartCount.textContent = cart.reduce((total, item) => total + item.quantity, 0);

            // Clear existing cart items
            cartItemsList.innerHTML = '';

            // Populate cart items
            cart.forEach(item => {
                const li = document.createElement('li');
                const itemInfo = document.createElement('div');
                itemInfo.classList.add('item-info');
                itemInfo.textContent = `${item.name} - ${item.price}`;
                const itemQuantity = document.createElement('div');
                itemQuantity.classList.add('item-quantity');
                const decreaseButton = document.createElement('button');
                decreaseButton.textContent = '-';
                decreaseButton.onclick = () => decreaseItemQuantity(item.name);
                const quantitySpan = document.createElement('span');
                quantitySpan.textContent = item.quantity;
                const increaseButton = document.createElement('button');
                increaseButton.textContent = '+';
                increaseButton.onclick = () => increaseItemQuantity(item.name);
                itemQuantity.appendChild(decreaseButton);
                itemQuantity.appendChild(quantitySpan);
                itemQuantity.appendChild(increaseButton);
                li.appendChild(itemInfo);
                li.appendChild(itemQuantity);
                cartItemsList.appendChild(li);
            });

            // Update total price
            const totalPrice = calculateTotalPrice();
            totalPriceElement.textContent = `Total: ${totalPrice} DA`;

            // Update local storage
            localStorage.setItem('cart', JSON.stringify(cart));
        }

        // Function to calculate total price of items in the cart
        function calculateTotalPrice() {
            return cart.reduce((total, item) => total + (parseFloat(item.price) * item.quantity), 0);
        }

        // Load cart from local storage on page load
        window.onload = function () {
            const storedCart = localStorage.getItem('cart');
            if (storedCart) {
                cart = JSON.parse(storedCart);
                updateCart();
            }
        }
    </script>



<!-- (((((((((((((((((((((((((((((((((((((((((((((((()))))))))))))))))))))))))))))))))))))))))))))))) -->
<script>
function placeOrder() {
    let tableNumber;

    // Vérifier si le numéro de table est défini dans l'URL
    if ("<?php echo $tableNumber; ?>") {
        tableNumber = "<?php echo $tableNumber; ?>";
    } else {
        // Demander le numéro de table à l'utilisateur
        tableNumber = prompt("Entrez le numéro de la table :");
    }

    // Récupérer les informations du panier
    const orderItems = cart.map(item => ({
        name: item.name,
        price: item.price,
        quantity: item.quantity
    }));

    // Envoyer les données au serveur
    fetch('place_order.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ orderItems, tableNumber })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert("Commande passée avec succès!");
            cart = []; // Vider le panier
            updateCart();
            // Rediriger vers index2.php
            window.location.href = 'serveur/index2.php';
        } else {
            alert("Erreur lors de la passation de la commande : " + data.message);
        }
    })
    .catch(error => {
        alert("Une erreur est survenue lors de la passation de la commande.");
        console.error(error);
    });
}
</script>