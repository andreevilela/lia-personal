<?php
if($_SERVER['REQUEST_METHOD'] == "POST"){

function validar_data(){
	$expressao_data =  '/^((((0?[1-9]|[12]\d|3[01])[\.\-\/](0?[13578]|1[02])[\.\-\/]((1[6-9]|[2-9]\d)?\d{2}))|((0?[1-9]|[12]\d|30)[\.\-\/](0?[13456789]|1[012])[\.\-\/]((1[6-9]|[2-9]\d)?\d{2}))|((0?[1-9]|1\d|2[0-8])[\.\-\/]0?2[\.\-\/]((1[6-9]|[2-9]\d)?\d{2}))|(29[\.\-\/]0?2[\.\-\/]((1[6-9]|[2-9]\d)?(0[48]|[2468][048]|[13579][26])|((16|[2468][048]|[3579][26])00)|00)))|(((0[1-9]|[12]\d|3[01])(0[13578]|1[02])((1[6-9]|[2-9]\d)?\d{2}))|((0[1-9]|[12]\d|30)(0[13456789]|1[012])((1[6-9]|[2-9]\d)?\d{2}))|((0[1-9]|1\d|2[0-8])02((1[6-9]|[2-9]\d)?\d{2}))|(2902((1[6-9]|[2-9]\d)?(0[48]|[2468][048]|[13579][26])|((16|[2468][048]|[3579][26])00)|00))))$/';
		
	$validou_data = preg_match($expressao_data,$_POST['data']);
	if(!$validou_data)
		{echo "<span style='color:red'>Data inválida!</span>";}
	else
		{return '0';};
}

function validar_ate(){
	$expressao_ate =  '/^((((0?[1-9]|[12]\d|3[01])[\.\-\/](0?[13578]|1[02])[\.\-\/]((1[6-9]|[2-9]\d)?\d{2}))|((0?[1-9]|[12]\d|30)[\.\-\/](0?[13456789]|1[012])[\.\-\/]((1[6-9]|[2-9]\d)?\d{2}))|((0?[1-9]|1\d|2[0-8])[\.\-\/]0?2[\.\-\/]((1[6-9]|[2-9]\d)?\d{2}))|(29[\.\-\/]0?2[\.\-\/]((1[6-9]|[2-9]\d)?(0[48]|[2468][048]|[13579][26])|((16|[2468][048]|[3579][26])00)|00)))|(((0[1-9]|[12]\d|3[01])(0[13578]|1[02])((1[6-9]|[2-9]\d)?\d{2}))|((0[1-9]|[12]\d|30)(0[13456789]|1[012])((1[6-9]|[2-9]\d)?\d{2}))|((0[1-9]|1\d|2[0-8])02((1[6-9]|[2-9]\d)?\d{2}))|(2902((1[6-9]|[2-9]\d)?(0[48]|[2468][048]|[13579][26])|((16|[2468][048]|[3579][26])00)|00))))$/';
		
	$validou_ate = preg_match($expressao_ate,$_POST['ate']);
	if(!$validou_ate)
		{echo "<span style='color:red'>Data inválida!</span>";}
	else
	{return '0';};
}

function validar_data_nascimento(){
	$expressao_data_nascimento =  '/^((((0?[1-9]|[12]\d|3[01])[\.\-\/](0?[13578]|1[02])[\.\-\/]((1[6-9]|[2-9]\d)?\d{2}))|((0?[1-9]|[12]\d|30)[\.\-\/](0?[13456789]|1[012])[\.\-\/]((1[6-9]|[2-9]\d)?\d{2}))|((0?[1-9]|1\d|2[0-8])[\.\-\/]0?2[\.\-\/]((1[6-9]|[2-9]\d)?\d{2}))|(29[\.\-\/]0?2[\.\-\/]((1[6-9]|[2-9]\d)?(0[48]|[2468][048]|[13579][26])|((16|[2468][048]|[3579][26])00)|00)))|(((0[1-9]|[12]\d|3[01])(0[13578]|1[02])((1[6-9]|[2-9]\d)?\d{2}))|((0[1-9]|[12]\d|30)(0[13456789]|1[012])((1[6-9]|[2-9]\d)?\d{2}))|((0[1-9]|1\d|2[0-8])02((1[6-9]|[2-9]\d)?\d{2}))|(2902((1[6-9]|[2-9]\d)?(0[48]|[2468][048]|[13579][26])|((16|[2468][048]|[3579][26])00)|00))))$/';
		
	$validou_data_nascimento = preg_match($expressao_data_nascimento,$_POST['data_nascimento']);
	if(!$validou_data_nascimento)
		{echo "<span style='color:red'>Data inválida!</span>";}
	else
	{return '0';};
}

function validar_aluno(){
	if(empty($_POST['aluno']))
		{echo "<span style='color:red'>Aluno inválido!</span>";}
		
	else if(($_POST['aluno']) == ('Selecione um aluno'))
		{echo "<span style='color:red'>Aluno inválido!</span>";}
	else
		{return '0';};
}

function validar_foto1(){
	if($_FILES['foto1']['error'] == UPLOAD_ERR_NO_FILE)
		{echo "<span style='color:red'>Foto inválida!</span>";}
	else	
		{return '0';}
}

function validar_foto2(){
	if($_FILES['foto2']['error'] == UPLOAD_ERR_NO_FILE)
		{echo "<span style='color:red'>Foto inválida!</span>";}
	else	
		{return '0';};
}

function validar_peso(){
	if(empty($_POST['peso']))
		{echo "<span style='color:red'>Peso inválido!</span>";}
	else
		{return '0';};
}

function validar_altura(){
	if(empty($_POST['altura']))
		{echo "<span style='color:red'>Altura inválida!</span>";}
	else
		{return '0';};
}

function validar_biceps(){
	if(empty($_POST['biceps']))
		{echo "<span style='color:red'>Bíceps inválido!</span>";}
	else
		{return '0';};
}

function validar_peitoral(){
	if(empty($_POST['peitoral']))
		{echo "<span style='color:red'>Peitoral inválido!</span>";}
	else
		{return '0';};
}

function validar_cintura(){
	if(empty($_POST['cintura']))
		{echo "<span style='color:red'>Cintura inválida!</span>";}
	else 
		{return '0';};
}

function validar_abdome(){
	if(empty($_POST['abdome']))
		{echo "<span style='color:red'>Abdome inválido!</span>";}
	else
		{return '0';};
}

function validar_quadril(){
	if(empty($_POST['quadril']))
		{echo "<span style='color:red'>Quadril inválido!</span>";}
	else
		{return '0';};
}

function validar_coxa(){
	if(empty($_POST['coxa']))
		{echo "<span style='color:red'>Coxa inválida!</span>";}
	else
		{return '0';};
}

function validar_tr(){
	if(empty($_POST['tr']))
		{echo "<span style='color:red'>TR inválido!</span>";}
	else
		{return '0';};
}

function validar_si(){
	if(empty($_POST['si']))
		{echo "<span style='color:red'>SI inválido!</span>";}
	else
		{return '0';};
}

function validar_se(){
	if(empty($_POST['se']))
		{echo "<span style='color:red'>SE inválido!</span>";}
	else
		{return '0';};
}

function validar_ab(){
	if(empty($_POST['ab']))
		{echo "<span style='color:red'>AB inválido!</span>";}
	else
		{return '0';};
}

function validar_status(){
	if($_POST['status'] == 'Selecione')
		{echo "<span style='color:red'>Status inválido!</span>";}
	else
		{return '0';};
}

function validar_nome(){
	if(empty($_POST['nome']))
		{echo "<span style='color:red'>Nome obrigatório!</span>";}
	else if(strlen($_POST['nome']) < (3))
		{echo "<span style='color:red'>Nome inválido!</span>";}
	else
		{return '0';};
}

function validar_telefone(){
	if ((!empty($_POST['telefone'])) && (strlen($_POST['telefone']) < (8)))
		{echo "<span style='color:red'>Telefone inválido!</span>";}
	else
		{return '0';};
}

function validar_celular(){
	if ((!empty($_POST['celular'])) && (strlen($_POST['celular']) < (8)))
		{echo "<span style='color:red'>Celular inválido!</span>";}
	else
		{return '0';};
}

function validar_vencimento(){
	$expressao_vencimento =  '/^((((0?[1-9]|[12]\d|3[01])[\.\-\/](0?[13578]|1[02])[\.\-\/]((1[6-9]|[2-9]\d)?\d{2}))|((0?[1-9]|[12]\d|30)[\.\-\/](0?[13456789]|1[012])[\.\-\/]((1[6-9]|[2-9]\d)?\d{2}))|((0?[1-9]|1\d|2[0-8])[\.\-\/]0?2[\.\-\/]((1[6-9]|[2-9]\d)?\d{2}))|(29[\.\-\/]0?2[\.\-\/]((1[6-9]|[2-9]\d)?(0[48]|[2468][048]|[13579][26])|((16|[2468][048]|[3579][26])00)|00)))|(((0[1-9]|[12]\d|3[01])(0[13578]|1[02])((1[6-9]|[2-9]\d)?\d{2}))|((0[1-9]|[12]\d|30)(0[13456789]|1[012])((1[6-9]|[2-9]\d)?\d{2}))|((0[1-9]|1\d|2[0-8])02((1[6-9]|[2-9]\d)?\d{2}))|(2902((1[6-9]|[2-9]\d)?(0[48]|[2468][048]|[13579][26])|((16|[2468][048]|[3579][26])00)|00))))$/';
		
	$validou_vencimento = preg_match($expressao_vencimento,$_POST['vencimento']);
	if(!$validou_vencimento)
		{echo "<span style='color:red'>Vencimento inválido!</span>";}
	else
		{return '0';};
}

function validar_busca(){
	if(empty($_POST['busca']))
		{echo "<span style='color:red'>Busca inválida! </span>";}
		
	else if(($_POST['busca']) == ('Selecione para buscar'))
		{echo "<span style='color:red'>Busca inválida! </span>";}
	else
		{return '0';};
}

function validar_descricao1(){
	if(empty($_POST['descricao1']))
		{echo "<span style='color:red'>Descrição obrigatória!</span>";}
	else if(strlen($_POST['descricao1']) > (50))
		{echo "<span style='color:red'>Descrição grande!</span>";}
	else
		{return '0';};
}

function validar_horario(){
	$expressao_horario =  '/^[0-9]{2}:[0-9]{2}$/';
		
	$validou_horario = preg_match($expressao_horario,$_POST['horario']);
	if(!$validou_horario)
		{echo "<span style='color:red'>Horário inválido!</span>";}
	else
		{return '0';};
}

function validar_refeicao(){
	if(empty($_POST['refeicao']))
		{echo "<span style='color:red'>Refeição obrigatória!</span>";}
	else if(strlen($_POST['refeicao']) > (50))
		{echo "<span style='color:red'>Refeição grande!</span>";}
	else
		{return '0';};
}

function validar_filtro(){
	if((((empty($_POST['busca'])) && (empty($_POST['filtro1'])) && (empty($_POST['filtro2'])))))
		{validar_busca();}
	else if((((empty($_POST['busca'])) && (empty($_POST['filtro1'])) && (!empty($_POST['filtro2'])))))
		{echo "<span style='color:red'>Busca inválida! </span>";}
	else
		{return '0';};
}

function validar_filtro1(){
	
	if(!empty($_POST['filtro1']))
		{$expressao_data =  '/^((((0?[1-9]|[12]\d|3[01])[\.\-\/](0?[13578]|1[02])[\.\-\/]((1[6-9]|[2-9]\d)?\d{2}))|((0?[1-9]|[12]\d|30)[\.\-\/](0?[13456789]|1[012])[\.\-\/]((1[6-9]|[2-9]\d)?\d{2}))|((0?[1-9]|1\d|2[0-8])[\.\-\/]0?2[\.\-\/]((1[6-9]|[2-9]\d)?\d{2}))|(29[\.\-\/]0?2[\.\-\/]((1[6-9]|[2-9]\d)?(0[48]|[2468][048]|[13579][26])|((16|[2468][048]|[3579][26])00)|00)))|(((0[1-9]|[12]\d|3[01])(0[13578]|1[02])((1[6-9]|[2-9]\d)?\d{2}))|((0[1-9]|[12]\d|30)(0[13456789]|1[012])((1[6-9]|[2-9]\d)?\d{2}))|((0[1-9]|1\d|2[0-8])02((1[6-9]|[2-9]\d)?\d{2}))|(2902((1[6-9]|[2-9]\d)?(0[48]|[2468][048]|[13579][26])|((16|[2468][048]|[3579][26])00)|00))))$/';
		
		$validou_filtro1 = preg_match($expressao_data,$_POST['filtro1']);
		if(!$validou_filtro1)
			{echo "<span style='color:red'>Data inválida! </span>";}
		else
			{return '0';};
	};
}

function validar_filtro2(){
	
	if(!empty($_POST['filtro2']))
		{$expressao_data =  '/^((((0?[1-9]|[12]\d|3[01])[\.\-\/](0?[13578]|1[02])[\.\-\/]((1[6-9]|[2-9]\d)?\d{2}))|((0?[1-9]|[12]\d|30)[\.\-\/](0?[13456789]|1[012])[\.\-\/]((1[6-9]|[2-9]\d)?\d{2}))|((0?[1-9]|1\d|2[0-8])[\.\-\/]0?2[\.\-\/]((1[6-9]|[2-9]\d)?\d{2}))|(29[\.\-\/]0?2[\.\-\/]((1[6-9]|[2-9]\d)?(0[48]|[2468][048]|[13579][26])|((16|[2468][048]|[3579][26])00)|00)))|(((0[1-9]|[12]\d|3[01])(0[13578]|1[02])((1[6-9]|[2-9]\d)?\d{2}))|((0[1-9]|[12]\d|30)(0[13456789]|1[012])((1[6-9]|[2-9]\d)?\d{2}))|((0[1-9]|1\d|2[0-8])02((1[6-9]|[2-9]\d)?\d{2}))|(2902((1[6-9]|[2-9]\d)?(0[48]|[2468][048]|[13579][26])|((16|[2468][048]|[3579][26])00)|00))))$/';
		
		$validou_filtro2 = preg_match($expressao_data,$_POST['filtro2']);
		if(!$validou_filtro2)
			{echo "<span style='color:red'>Data inválida! </span>";}
		else
			{return '0';};
	};
}
		

}
?>
