@extends("layouts.guest", ["slot"=>""])
@section("content")
    <div class="container">
        <h1>Payement par Paypal</h1>
        <div>
            <!-- Le conteneur des boutons PayPal -->
            <div id="paypal-boutons"></div>
        </div>
    </div>
    <!-- Importation de la SDK JavaScript PayPal -->
    <script src="https://www.paypal.com/sdk/js?client-id=ASA-ZrkZl6SUT6P6dWBEr-jYY5F-F-PujtocU1QC3B7IDtfTk70LeHbz1qJJiA4z5vDIID0SGmoENKON"></script>
    <script type="text/javascript" async>
        // 2. Afficher le bouton PayPal
        paypal.Buttons({
// Configurer la transaction
            createOrder : function (data, actions) {
// Les produits à payer avec leurs details
                var produits = [
                    {
                        name : "Produit 1",
                        description : "Description du produit 1",
                        quantity : 1,
                        unit_amount : { value : 9.9, currency_code : "USD" }
                    },
                    {
                        name : "Produit 2",
                        description : "Description du produit 2",
                        quantity : 1,
                        unit_amount : { value : 8.0, currency_code : "USD" }
                    }
                ];
// Le total des produits
                var total_amount = produits.reduce(function (total, product) {
                    return total + product.unit_amount.value * product.quantity;
                }, 0);
// La transaction
                return actions.order.create({
                    purchase_units : [{
                        items : produits,
                        amount : {
                            value : total_amount,
                            currency_code : "USD",
                            breakdown : {
                                item_total : { value : total_amount, currency_code : "USD" }
                            }
                        }
                    }]
                });
            }
        }).render("#paypal-boutons");
    </script>
@endsection
