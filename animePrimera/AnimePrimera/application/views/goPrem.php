<?php  $this->load->view('comuns/header'); ?>
<?php  $this->load->view('comuns/menu'); ?>
<body>

<div class="container-fluid">
    <div class="row">
        <div class="col text-center">
            <div class="premium">
                <h2 class="titleprem">Doações!</h2>
                <div id="paypal-button-container-P-19416200VX694391FMDXLC6I"></div>
                <script src="https://www.paypal.com/sdk/js?client-id=AZP44CLN4QF2svENamW_WupctYsDXZCPPpprP-a2rJo2tB1A9Ebdj6PPvQleiq1Dm-5tLg_-jlVIJws0&vault=true&intent=subscription" data-sdk-integration-source="button-factory"></script>
                <form action="https://www.paypal.com/donate" method="post" target="_top">
                    <input type="hidden" name="hosted_button_id" value="6SAK8GHH4KZ2A" />
                    <input type="image" src="https://www.paypalobjects.com/pt_PT/PT/i/btn/btn_donate_LG.gif" border="0" name="submit" title="PayPal - The safer, easier way to pay online!" alt="Donate with PayPal button" />
                    <img alt="" border="0" src="https://www.paypal.com/pt_PT/i/scr/pixel.gif" width="1" height="1" />
                </form>
                <br/>
                <h6>Perks de doar:</h6>
                <ul>
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
