<!doctype html>
<html lang="pt-br">

<head>
	<title>Boleto - API de Pagamento PagSeguro</title>
	<link rel="shortcut icon" type="image/png" href="/favicon.ico" />

	<!-- CSS referente à página  -->
	<link rel="stylesheet" href="<?= base_url('assets/css/main.css') ?>">
	<!-- Fim -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

	<!-- JS necessário do PagSeguro - MODO SANDBOX -->
	<script type="text/javascript" src="https://stc.sandbox.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.directpayment.js"></script>
	<!-- Fim -->
</head>

<body>
	<div class="card">
		<div class=" text-center card-header">
			<a href="/listagem">Voltar</a> - <a rel="noopener noreferrer" target="_blank" href="https://github.com/matheuscastroweb/ci4-integration-pagseguro">CodeIgniter 4 Integration PagSeguro API</a>
		</div>
		<div class="card-body">
			<div class="text-center">
				<h5 class="card-title">Pagamento Boleto - API PagSeguro</h5>
				<p class="card-text">Esta funcionalidade está em desenvolvimento.</p>
			</div>
			<form class="form mx-auto col-5">
				<input type="hidden" class="form-control" id="hash_pagamento" name="hash_pagamento">
				<input type="hidden" class="form-control" name="typePayment" value="2">
				<div class="form-group mt-4 mb-0">
					<label class="text-left">Nome completo</label>
					<input type="text" class="my-1 form-control" readonly name="nome" placeholder="Gabriela Sueli Aline Rodrigues" value="Gabriela Sueli Aline Rodrigues">
				</div>
				<div class="form-group">
					<label class="text-left ">CPF</label>
					<input type="text" class="my-1 form-control" readonly name="cpf" placeholder="756.624.670-48" value="75662467048">
				</div>
				<div class="form-group">
					<label class="text-left">E-mail</label>
					<input type="text" class="my-1 form-control" readonly name="email" placeholder="v15638893625370231056@sandbox.pagseguro.com.br" value="v15638893625370231056@sandbox.pagseguro.com.br">
				</div>
				<div class="form-group">
					<label class="text-left">Referência</label>
					<input type="text" class="my-1 form-control" readonly name="ref" value="<?= md5(uniqid(rand(), true)) ?>">
					<p class="text-muted">Esta é a referência única ao seu pagamento</p>
				</div>
				<div class="form-group">
					<label class="text-left">Número de telefone</label>
					<div class="form-row">
						<div class="col-3">
							<input type="text" readonly class="form-control" name="ddd" placeholder="DDD" value="22">
						</div>
						<div class="col">
							<input type="text" readonly class="form-control" name="number" placeholder="Número" value="995151114">
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="text-left">Referência</label>
					<input type="text" class="my-1 form-control" readonly name="ref" value="<?= md5(uniqid(rand(), true)) ?>">
					<p class="text-muted">Esta é a referência única ao seu pagamento</p>
				</div>
				<div class="form-group">
					<label class="text-left">Dados do produto</label>
					<div class="form-row">
						<div class="col-3">
							<div class="input-group">
								<div class="input-group-prepend">
									<div class="input-group-text">#ID</div>
								</div>
								<input type="text" class="form-control" readonly name="itemId1" value="<?= rand(1, 50) ?>">
							</div>
						</div>
						<div class="col">
							<div class="input-group">
								<div class="input-group-prepend">
									<div class="input-group-text">Descrição</div>
								</div>
								<input type="text" class="form-control" readonly name="itemDescription1" value="Serviço de e-mail">
							</div>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="form-row">
						<div class="col">
							<div class="input-group">
								<div class="input-group-prepend">
									<div class="input-group-text">Quant.</div>
								</div>
								<input type="text" class="form-control" readonly name="itemQuantity1" value="<?= rand(1, 5) ?>">
							</div>
						</div>
						<div class="col">
							<div class="input-group">
								<div class="input-group-prepend">
									<div class="input-group-text">R$</div>
								</div>
								<input type="text" class="form-control" readonly name="itemAmount1" value="<?= rand(50, 200) . '.' . rand(10, 99) ?>">
							</div>
						</div>
					</div>
				</div>
				<input id="btn_pagar" type="submit" class="btn btn-info btn-pagar-boleto btn-block" onclick="pagarBoleto(event)" value="Pagar com boleto bancário"></input>
			</form>
			<div class="mt-3 text-center">
				<span class="msg"></span>
			</div>

		</div>
		<div class="card-footer text-muted text-center">
			<a rel="noopener noreferrer" target="_blank" href='https://github.com/matheuscastroweb'>GitHub</a> - Matheus de Castro Pelegrino < matheuscastroweb@gmail.com>
		</div>

	</div>

	<!-- JavaScript referente à página  -->
	<script src="<?= base_url('assets/js/boleto.js') ?>"></script>
	<script src="<?= base_url('assets/js/sessao.js') ?>"></script>
	<!-- Fim -->

	<!-- Jquery necessário -->
	<script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>

</html>