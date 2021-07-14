<?php  $this->load->view('comuns/header'); ?>
<?php  $this->load->view('comuns/menu'); ?>
<body>

<div class="container-fluid">
    <div class="row">
        <div class="col text-center">
            <div class="premium">
                <h2 class="titleprem">GO PREMIUM!</h2>
                <div id="paypal-button-container-P-19416200VX694391FMDXLC6I"></div>
                <script src="https://www.paypal.com/sdk/js?client-id=AZP44CLN4QF2svENamW_WupctYsDXZCPPpprP-a2rJo2tB1A9Ebdj6PPvQleiq1Dm-5tLg_-jlVIJws0&vault=true&intent=subscription" data-sdk-integration-source="button-factory"></script>
                <script>
                    paypal.Buttons({
                        style: {
                            shape: 'rect',
                            color: 'gold',
                            layout: 'vertical',
                            label: 'subscribe'
                        },
                        createSubscription: function(data, actions) {
                            return actions.subscription.create({
                                /* Creates the subscription */
                                plan_id: 'P-19416200VX694391FMDXLC6I'
                            });
                        },
                        onApprove: function(data, actions) {
                            alert(data.subscriptionID); // You can add optional success message for the subscriber here
                            window.location.href = "<?php echo base_url('User/confirmPrem')?>";
                        }
                    }).render('#paypal-button-container-P-19416200VX694391FMDXLC6I'); // Renders the PayPal button
                </script>
                <br/>
                <h6>Perks de ser um user Premium:</h6>
                <ul>
                    <li>Sem Publicidade</li>
                    <li>Mais customização de Perfil</li>
                    <li>Nome Dourado</li>
                    <li>Maior quantidade de Bytes para Posts no Hub</li>
                    <li>Limite de palavras numa Mensagem maior</li>
                    <li>Prioridade ao solicitar um anime</li>
                </ul>
            </div>
        </div>
    </div>
</div>>

<?php $this->load->view('comuns/footer'); ?>
