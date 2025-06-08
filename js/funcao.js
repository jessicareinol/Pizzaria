function confirmaExclusaoUser(id) {
    if (confirm("Deseja excluir o registro?")) {
        window.location.href = "deleteUser.php?id=" + id;
    }
}

function confirmaAtivarDesativar(id, status) {
    const mensagem = status === 1 ? "Deseja desativar este registro?" : "Deseja ativar este registro?";
        
    if (confirm(mensagem)) {
		if (status == 0) {
			status = 1;
		} else {
			status = 0;
		}
        window.location.href = `configUser.php?id=${encodeURIComponent(id)}&status=${encodeURIComponent(status)}`;
    }
}

function confirmaResetarSenha(id, status) {
    if (confirm("Deseja resetar a senha do registro?")) {
        window.location.href = "configUser.php?id=" + id + "&tipo=reset";
    }
}

function OpcaoMensagens($id) {
	if($id === 1) {
		window.alert('Registro gravado com sucesso!');
	}
	if($id === 2) {
		window.alert('Erro ao salvar o arquivo. Aparentemente voc&ecirc; não tem permissão de escrita.');
	}
	if($id === 3) {
		window.alert('Você poderá enviar apenas arquivos \"*.jpg;*.jpeg;*.gif;*.png\"');
	}
	if($id === 4) {
		window.alert('Registro já cadastrado!');
	}
	if($id === 5) {
		window.alert('Ocorreu um erro!');
	}
	if($id === 6) {
		window.alert('Registro alterado com sucesso!');
	}
	if($id === 7) {
		window.alert('Usuário e/ou senha inválido(s)!');
	}
	if($id === 8) {
		window.alert('Senhas não são iguais!');
	}
	if($id === 9) {
		window.alert('Registro excluido com sucesso!');
	}
	if($id === 10) {
		window.alert('Atenção!\nE-mail não encontrado em nosso cadastro.');
	}
	if($id === 11) {
		window.alert('CEP Inválido!');
	}
	if($id === 12) {
		window.alert('E-mail enviado com sucesso!');
	}
	if ($id === 13) {
		window.alert('E-mail enviado com sucesso!\nCaso não receba o e-mail verifique a pasta de Spam/Lixo Eletonico, ou \nEntre em contato com o site.');
	}
	if ($id === 14) {
		window.alert('Usuário Bloqueado!');
	}
}

function SessaoExpirada() {
	alert("WebSite diz: \nSua Sessão foi Expirada!");
}

function loginMensagem(){
    alert('Usuário e/ou senha invalido(s)!');
}


function confirmaExclusaoCardapio(id) {
    if (confirm("Deseja excluir o registro?")) {
        window.location.href = "../adm/deleteCardapio.php?id=" + id;
    }
}

function confirmaExclusaoMaisVendida(id) {
    if (confirm("Deseja excluir o registro?")) {
        window.location.href = "../adm/deleteMaisVendida.php?id=" + id;
    }
}
