// JavaScript Document

function submitrefeicao(){
			window.alert("Salvo com sucesso!")
			window.location.href="refeicao.php"
		}
		
function errorefeicao(){
			window.alert("Erro ao salvar!")
			window.location.href="refeicao.php"
		}
		
function submithorario(){
			window.alert("Salvo com sucesso!")
			window.location.href="horario.php"
		}
		
function errohorario(){
			window.alert("Erro ao salvar!")
			window.location.href="horario.php"
		}
		
function submitgaleria(){
			window.alert("Salvo com sucesso!")
			window.location.href="galeria.php"
		}
		
function errogaleria(){
			window.alert("Erro ao salvar!")
			window.location.href="galeria.php"
		}
		
	function submitdieta(){
			window.alert("Salvo com sucesso!")
			window.location.href="dieta.php"
		}
		
function errodieta(){
			window.alert("Erro ao salvar!")
			window.location.href="dieta.php"
		}
		
function submitavaliacao(){
			window.alert("Salvo com sucesso!")
			window.location.href="avaliacao.php"
		}
		
function erroavaliacao(){
			window.alert("Erro ao salvar!")
			window.location.href="avaliacao.php"
		}
		
function submitalunos(){
			window.alert("Salvo com sucesso!")
			window.location.href="alunos.php"
		}
		
function erroalunos(){
			window.alert("Erro ao salvar!")
			window.location.href="alunos.php"
		}

function excluidorefeicao(){
			window.alert("Excluído com sucesso!")
			window.location.href="refeicao.php"
		}
		
function erroexcluidorefeicao(){
			window.alert("Erro ao excluir!")
			window.location.href="refeicao.php"
		}
	
	function excluidohorario(){
			window.alert("Excluído com sucesso!")
			window.location.href="horario.php"
		}
		
function erroexcluidohorario(){
			window.alert("Erro ao excluir!")
			window.location.href="horario.php"
		}
		
function excluidofoto(){
			window.alert("Excluído com sucesso!")
			window.location.href="galeria.php"
		}
		
function erroexcluidofoto(){
			window.alert("Erro ao excluir!")
			window.location.href="galeria.php"
		}
		
function excluidodieta(){
			window.alert("Excluído com sucesso!")
			window.location.href="dieta.php"
		}
		
function erroexcluidodieta(){
			window.alert("Erro ao excluir!")
			window.location.href="dieta.php"
		}
		
function excluidoavaliacao(){
			window.alert("Excluído com sucesso!")
			window.location.href="historico.php"
		}
		
function erroexcluidoavaliacao(){
			window.alert("Erro ao excluir!")
			window.location.href="historico.php"
		}
		
function excluidoaluno(){
			window.alert("Excluído com sucesso!")
			window.location.href="alunos.php"
		}
		
function erroexcluidoaluno(){
			window.alert("Erro ao excluir!")
			window.location.href="alunos.php"
		}
		
function alteradorefeicao(){
			window.alert("Alterado com sucesso!")
			window.location.href="refeicao.php"
		}
		
function erroalteradorefeicao(){
			window.alert("Erro ao alterar!")
			window.location.href="refeicao.php"
		}
		
	function alteradohorario(){
			window.alert("Alterado com sucesso!")
			window.location.href="horario.php"
		}
		
function erroalteradohorario(){
			window.alert("Erro ao alterar!")
			window.location.href="horario.php"
		}
		
function alteradofoto(){
			window.alert("Alterado com sucesso!")
			window.location.href="galeria.php"
		}
		
function erroalteradofoto(){
			window.alert("Erro ao alterar!")
			window.location.href="galeria.php"
		}
		
function alteradodieta(){
			window.alert("Alterado com sucesso!")
			window.location.href="dieta.php"
		}
		
function erroalteradodieta(){
			window.alert("Erro ao alterar!")
			window.location.href="dieta.php"
		}
		
function alteradoavaliacao(){
			window.alert("Alterado com sucesso!")
			window.location.href="historico.php"
		}
		
function erroalteradoavaliacao(){
			window.alert("Erro ao alterar!")
			window.location.href="historico.php"
		}
		
function alteradoaluno(){
			window.alert("Alterado com sucesso!")
			window.location.href="alunos.php"
		}
		
function erroalteradoaluno(){
			window.alert("Erro ao alterar!")
			window.location.href="alunos.php"
		}
		
function errovalidar(){
			window.alert("Acesso negado!")
			window.location.href="login.php"
		}
		
function logout(){
			window.alert("Até logo!")
			window.location.href="../index.php"
		}
		
function erroacessar(){
			window.alert("Erro ao acessar!")
			window.location.href="login.php"
		}
		
function erroacessarlinha(){
			window.alert("Erro no login!")
			window.location.href="login.php"
		}
		
function validar(){
			window.alert("Bem-vinda!")
			window.location.href="avaliacao.php"
		}
		
function validardata(){
			window.alert("Data inválida!")
		}
		
function submitpagamentos(){
			window.alert("Salvo com sucesso!")
			var r=confirm("Deseja incluir novo vencimento?");
			if (r==false) 
				{window.location.href="pagamentos.php"}
			if (r==true)
  				{var x;
 				var vencimento=prompt("Informe o vencimento:");}
 				var Reg = /^((((0?[1-9]|[12]\d|3[01])[\.\-\/](0?[13578]|1[02])      [\.\-\/]((1[6-9]|[2-9]\d)?\d{2}))|((0?[1-9]|[12]\d|30)[\.\-\/](0?[13456789]|1[012])[\.\-\/]((1[6-9]|[2-9]\d)?\d{2}))|((0?[1-9]|1\d|2[0-8])[\.\-\/]0?2[\.\-\/]((1[6-9]|[2-9]\d)?\d{2}))|(29[\.\-\/]0?2[\.\-\/]((1[6-9]|[2-9]\d)?(0[48]|[2468][048]|[13579][26])|((16|[2468][048]|[3579][26])00)|00)))|(((0[1-9]|[12]\d|3[01])(0[13578]|1[02])((1[6-9]|[2-9]\d)?\d{2}))|((0[1-9]|[12]\d|30)(0[13456789]|1[012])((1[6-9]|[2-9]\d)?\d{2}))|((0[1-9]|1\d|2[0-8])02((1[6-9]|[2-9]\d)?\d{2}))|(2902((1[6-9]|[2-9]\d)?(0[48]|[2468][048]|[13579][26])|((16|[2468][048]|[3579][26])00)|00))))$/;
				//if ((vencimento!=null) && (vencimento.length < 8))
				if (!((vencimento.match(Reg)) || (vencimento='')))
				{window.alert("Vencimento inválido!")
				erroincluirpagamento()}
			else
  				{x="Vencimento: " + vencimento;
				//window.alert(vencimento);
				//alert(id);
				
				var passaValor= function(valor)
				{
					window.location = "incluirpagamento.php?minhaVariavel="+valor;
				}
				
				var get = id+'-'+vencimento;
				
				passaValor(get);
				
				
				//window.alert("Incluido com sucesso!")
				//window.location.href="pagamentos.php"
				}
		}
		
function erroincluirpagamento(){
			var r=confirm("Deseja incluir novo vencimento?");
			if (r==false) 
				{window.location.href="pagamentos.php"}
			if (r==true)
  				{var x;
 				var vencimento=prompt("Informe o vencimento:");}
 				var Reg = /^((((0?[1-9]|[12]\d|3[01])[\.\-\/](0?[13578]|1[02])      [\.\-\/]((1[6-9]|[2-9]\d)?\d{2}))|((0?[1-9]|[12]\d|30)[\.\-\/](0?[13456789]|1[012])[\.\-\/]((1[6-9]|[2-9]\d)?\d{2}))|((0?[1-9]|1\d|2[0-8])[\.\-\/]0?2[\.\-\/]((1[6-9]|[2-9]\d)?\d{2}))|(29[\.\-\/]0?2[\.\-\/]((1[6-9]|[2-9]\d)?(0[48]|[2468][048]|[13579][26])|((16|[2468][048]|[3579][26])00)|00)))|(((0[1-9]|[12]\d|3[01])(0[13578]|1[02])((1[6-9]|[2-9]\d)?\d{2}))|((0[1-9]|[12]\d|30)(0[13456789]|1[012])((1[6-9]|[2-9]\d)?\d{2}))|((0[1-9]|1\d|2[0-8])02((1[6-9]|[2-9]\d)?\d{2}))|(2902((1[6-9]|[2-9]\d)?(0[48]|[2468][048]|[13579][26])|((16|[2468][048]|[3579][26])00)|00))))$/;
				//if ((vencimento!=null) && (vencimento.length < 8))
				if (!((vencimento.match(Reg)) || (vencimento='')))
				{window.alert("Vencimento inválido!")
				erroincluirpagamento()}
			else
  				{x="Vencimento: " + vencimento;
				//window.alert(vencimento);
				//alert(id);
				
				var passaValor= function(valor)
				{
					window.location = "incluirpagamento.php?minhaVariavel="+valor;
				}
				
				var get = id+'-'+vencimento;
				
				passaValor(get);
				
				//window.alert("Incluido com sucesso!")
				//window.location.href="pagamentos.php"
				}
		}
		
function erropagamentos(){
			window.alert("Erro ao salvar!")
			window.location.href="pagamentos.php"
		}
		
function submitincluirpagamento(){
			window.alert("Incluído com sucesso!")
			window.location.href="pagamentos.php"
		}
		
function backup(){
			window.alert("Preparando Backup..")
			window.location.href="backup/backup.php"
		}
		
function alteradopagamento(){
			window.alert("Alterado com sucesso!")
			window.location.href="pagamentos.php"
		}
		
function erroalteradopagamento(){
			window.alert("Erro ao alterar!")
			window.location.href="pagamentos.php"
		}
		
function excluidopagamento(){
			window.alert("Excluído com sucesso!")
			window.location.href="pagamentos.php"
		}
		
function erroexcluidopagamento(){
			window.alert("Erro ao excluir!")
			window.location.href="pagamentos.php"
		}
		
function submitquitarpagamento(){
			var r=confirm("Deseja quitar pagamento?");
			if (r==false) 
				{window.location.href="pagamentos.php"}
			if (r==true)
				var passaValor= function(valor)
				{
					window.location = "confirmarpagamento.php?minhaVariavel="+valor;
				}
				
				var get = id;
				
				passaValor(get);
				
				
				//window.alert("Incluido com sucesso!")
				//window.location.href="pagamentos.php"
		}
		
function quitado(){
			window.alert("Quitado com sucesso!")
		}
		
function erroquitar(){
			window.alert("Erro ao quitar!")
			window.location.href="pagamentos.php"
		}
		
function incluirpagamento(){
			var r=confirm("Deseja incluir novo vencimento?");
			if (r==false) 
				{window.location.href="pagamentos.php"}
			if (r==true)
  				{var x;
 				var vencimento=prompt("Informe o vencimento:");}
 				var Reg = /^((((0?[1-9]|[12]\d|3[01])[\.\-\/](0?[13578]|1[02])      [\.\-\/]((1[6-9]|[2-9]\d)?\d{2}))|((0?[1-9]|[12]\d|30)[\.\-\/](0?[13456789]|1[012])[\.\-\/]((1[6-9]|[2-9]\d)?\d{2}))|((0?[1-9]|1\d|2[0-8])[\.\-\/]0?2[\.\-\/]((1[6-9]|[2-9]\d)?\d{2}))|(29[\.\-\/]0?2[\.\-\/]((1[6-9]|[2-9]\d)?(0[48]|[2468][048]|[13579][26])|((16|[2468][048]|[3579][26])00)|00)))|(((0[1-9]|[12]\d|3[01])(0[13578]|1[02])((1[6-9]|[2-9]\d)?\d{2}))|((0[1-9]|[12]\d|30)(0[13456789]|1[012])((1[6-9]|[2-9]\d)?\d{2}))|((0[1-9]|1\d|2[0-8])02((1[6-9]|[2-9]\d)?\d{2}))|(2902((1[6-9]|[2-9]\d)?(0[48]|[2468][048]|[13579][26])|((16|[2468][048]|[3579][26])00)|00))))$/;
				//if ((vencimento!=null) && (vencimento.length < 8))
				if (!((vencimento.match(Reg)) || (vencimento='')))
				{window.alert("Vencimento inválido!")
				incluirpagamento()}
			else
  				{x="Vencimento: " + vencimento;
				//window.alert(vencimento);
				//alert(id);
				
				var passaValor= function(valor)
				{
					window.location = "incluirpagamento.php?minhaVariavel="+valor;
				}
				
				var get = id+'-'+vencimento;
				
				passaValor(get);
				
				//window.alert("Incluido com sucesso!")
				//window.location.href="pagamentos.php"
				}
		}